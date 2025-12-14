<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ImageController extends Controller {
		function imagen($id): BinaryFileResponse {
        $product = Peinado::find($id);
        if($product == null ||
                $product->image == null ||
                !file_exists(storage_path('app/private') . '/' . $product->image)) {
            return response()->file(base_path('public/img/noimage.jpg'));
        }
        return response()->file(storage_path('app/private') . '/' . $product->image);
    }
}
