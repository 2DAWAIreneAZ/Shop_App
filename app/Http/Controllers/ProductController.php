<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('style')->withAvg('valorations', 'puntuation')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $styles = Style::all();
        return view('products.create', compact('styles'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:150|unique:product',
            'id_style' => 'required|exists:style,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
        // Guardar la imagen si existe
        if ($request->hasFile('image')) {
					$validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($validated);

        $textMessage = 'El producto se ha creado correctamente.';
        $result = true;

				} catch (\Exception $e) {
						$textMessage = 'El producto no se ha podido crear.';
						$result = false;
				}

				$message = ['mensajeTexto' => $textMessage];

				if ($result) {
						return redirect()->route('products.index')->with($message);
				} else {
						return back()->withInput()->withErrors($message);
				}
    }

    public function show(Product $product)
    {
        $product->load(['style', 'valorations' => function($query) {
            $query->orderBy('date', 'desc');
        }]);
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $styles = Style::all();
        return view('products.edit', compact('product', 'styles'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150|unique:product,name,' . $product->id,
            'id_style' => 'required|exists:style,id',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product) {
        try {

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->valorations()->delete();

        $result = $product->delete();

        $textMessage = 'El producto se ha eliminado correctamente.';
				
				} catch (\Exception $e) {
						\Log::error('Error deleting product: ' . $e->getMessage());
						$textMessage = 'El producto no se ha podido eliminar.';
						$result = false;
				}

				$message = ['mensajeTexto' => $textMessage];

				if ($result) {
						return redirect()->route('products.index')->with($message);
				} else {
						return back()->withInput()->withErrors($message);
				}
	}
}
