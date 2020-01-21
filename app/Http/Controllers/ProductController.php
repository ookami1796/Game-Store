<?php

namespace App\Http\Controllers;

use App\Model\Product;

class ProductController extends Controller {
    public function index() {
        $product = Product::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "product",
            "result" => $product
        ];

        return response()->json($product, 200);
    }
}