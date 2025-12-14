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

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created successfully');
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

    public function destroy(Product $product){
        if ($product->image) {
					Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
