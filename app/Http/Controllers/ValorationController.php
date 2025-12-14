<?php

namespace App\Http\Controllers;

use App\Models\Valoration;
use App\Models\Product;
use Illuminate\Http\Request;

class ValorationController extends Controller
{
    public function index() {
        $valorations = Valoration::with('product')->orderBy('date', 'desc')->get();
        return view('valorations.index', compact('valorations'));
    }

    public function create() {
        $products = Product::all();
        return view('valorations.create', compact('products'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'id_product' => 'required|exists:product,id',
            'puntuation' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'date' => 'required|date'
        ]);

        try {
        $valoration = Valoration::create($validated);
        $textMessage = 'La valoración se ha añadido correctamente.';
        $result = true;

				} catch (\Exception $e) {
						$textMessage = 'La valoración no se ha podido añadir.';
						$result = false;
				}

				$message = ['mensajeTexto' => $textMessage];

				if ($result) {
						return redirect()->route('products.show', $validated['id_product'])->with($message);
				} else {
						return back()->withInput()->withErrors($message);
				}
    }

    public function edit(Valoration $valoration) {
        $products = Product::all();
        return view('valorations.edit', compact('valoration', 'products'));
    }

    public function update(Request $request, Valoration $valoration) {
        $validated = $request->validate([
            'id_product' => 'required|exists:product,id',
            'puntuation' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'date' => 'required|date'
        ]);

        $valoration->update($validated);
        return redirect()->route('products.show', $validated['id_product'])->with('success', 'Valoration updated successfully');
    }

    public function destroy(Valoration $valoration) {
        $productId = $valoration->id_product;
				try {
					$result = $valoration->delete();
					$textMessage = 'La valoración se ha eliminado correctamente.';

			} catch (\Exception $e) {

					$textMessage = 'La valoración no se ha podido eliminar.';
					$result = false;
			}

			$message = ['mensajeTexto' => $textMessage];

			if ($result) {
					return redirect()->route('valorations.index', $productId)->with($message);
			} else {
					return back()->withInput()->withErrors($message);
			}
		}
}
