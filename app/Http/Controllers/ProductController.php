<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function index() {
        $product = Product::with('category')->OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "product",
            "result" => $product
        ];

        return response()->json($product, 200);
    }
    public function store(Request $request){
        $input = $request->all();
        $this->validate($request, [
            'no_seri' => 'required',
            'nama_produk' => 'required',
            'id_kategori' => ' required|exists:kategori,id',
            'harga' => 'required',
            'photo_produk' => 'required',
            'deskripsi' => ' required',
        ]);
        $product = Product::create($input);
        return response()->json($product, 200);
    }

    public function show($id){
        $product = Product::with('category')->find($id);

        if(!$product){
            abort(404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $this->validate($request, [
            'no_seri' => 'required',
            'nama_produk' => 'required',
            'id_kategori' => ' required|exists:kategori,id',
            'harga' => 'required',
            'photo_produk' => 'required',
            'deskripsi' => ' required',
        ]);

        $product->fill($input);
        $product->save();

        return response()->json($product, 200);
    }
    
    public function destroy($id)
    {
        $product = Product::find($id);

        if(!$product){
            abort(404);
        }

        $product->delete();
        $message = ['message' => 'deleted successfully', 'category_id' => $id];

        return response()->json($message, 200);
    }
}