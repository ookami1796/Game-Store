<?php

namespace App\Http\Controllers;

use App\Model\Troli;
use App\Model\TroliProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TroliController extends Controller {
    public function index() {
        $troli = Troli::where('checkedout',false)->where('id_user', Auth::user()->id)->with('products')->first();
        if (!$troli) {
            $troli=new Troli;
            $troli->id_user = Auth::user()->id;
            $troli->save();
            $troli->with('products');
        }

        $output = [
            "message" => "troli",
            "result" => $troli
        ];

        return response()->json($troli, 200);
    }

    public function show($id){
        $product = Troli::find($id);

        if(!$product){
            abort(404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'id_produk' => 'required|exists:product,id',
            'jumlah_produk' => 'required|min:1'

        ]);
        $input = $request->all();

        $troli = Troli::where('checkedout',false)->where('id_user', Auth::user()->id)->with('products')->first();
        if (!$troli) {
            $troli=new Troli;
            $troli->id_user = Auth::user()->id;
            $troli->save();
        }

        $troli->products()->sync([$request->input('id_produk')=>['jumlah_produk'=>$request->input('jumlah_produk')]],false);

        $troli->fill($input);
        $troli->save();

        return response()->json($troli, 200);
    }
    
    public function deleteProduct($id_produk){
        $troli = Troli::where('checkedout',false)->where('id_user', Auth::user()->id)->with('products')->first();
        
        if (!$troli) {
            abort(403, 'tambahkan produk ke troli terlebih dahulu!');
        }
        if (count($troli->products)==0) {
            abort(403, 'tambahkan produk ke troli terlebih dahulu');
        }

        $troliProduct = TroliProduct::where('id_troli', $troli->id)->where('id_produk', $id_produk)->delete();

        if ($troliProduct == 0) {
            abort(403, 'tidak berhasil menghapus produk atau produk sudah di hapus');
        }
        $message = ['message' => 'deleted successfully', 'id_produk' => $id_produk];

        return response()->json($message, 200);
    }
}