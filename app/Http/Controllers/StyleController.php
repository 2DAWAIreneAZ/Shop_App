<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StyleController extends Controller {
	public function index(): View {
		$styles = Style::withCount('products')->get();
		return view('styles.index', compact('styles'));
	}

	public function create(): View {
		return view('styles.create');
	}

	public function store(Request $request) {
		$data = $request->validate([
			'name' => 'required|max:100|unique:style',
			'difficulty' => 'required|in:Easy,Medium,Hard',
		]);

		try {
			$style = Style::create($data);
			$textMessage = 'El estilo se ha creado correctamente.';

			$result = true;

    } catch (\Exception $e) {
			$textMessage = 'El estilo no se ha podido crear.';
			$result = false;
    }

    $message = ['mensajeTexto' => $textMessage];

    if ($result) {
        return redirect()->route('styles.index')->with($message);
    } else {
        return back()->withInput()->withErrors($message);
    }
	}

    public function show(Style $style): View {
			return view('styles.show', compact('style'));
    }

    public function edit(Style $style): View {
			return view('styles.edit', compact('style'));
    }

    public function update(Request $request, Style $style) {
			$data = $request->validate([
				'name' => 'required|max:100|unique:style,name,' . $style->id,
				'difficulty' => 'required|in:Easy,Medium,Hard',
			]);

			$style->update($data);

			return redirect()->route('styles.index')->with('success', 'Style updated');
    }

    public function destroy(Style $style) {

    try {
        $result = $style->delete();
        $textMessage = 'El estilo se ha eliminado.';

    } catch (\Exception $e) {
        $textMessage = 'El estilo no se ha podido eliminar. Primero revisa que no tenga productos.';
        $result = false;
    }

    $message = ['mensajeTexto' => $textMessage];

    if ($result) {
        return redirect()->route('styles.index')->with($message);
    } else {
        return back()->withInput()->withErrors($message);
    }
	}
}