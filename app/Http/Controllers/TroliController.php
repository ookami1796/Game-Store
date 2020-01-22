<?php

namespace App\Http\Controllers;

use App\Model\Troli;
use Illuminate\Http\Request;

class TroliController extends Controller {
    public function index() {
        $troli = Troli::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "troli",
            "result" => $troli
        ];

        return response()->json($troli, 200);
    }
    public function store(Request $request){
        $input = $request->all();
        $validationRules = [
            'id_user' => 'required',
            'id_produk' => 'required',
            'jumlah_produk' => ' required',
            
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $troli = Troli::create($input);
        return response()->json($troli, 200);
    }

    public function show($id){
        $product = Troli::find($id);

        if(!$product){
            abort(404);
        }

        return response()->json($product, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $troli = Troli::find($id);

        if (!$troli) {
            abort(404);
        }

        $validationRules = [
            'id_user' => 'required',
            'id_produk' => 'required',
            'jumlah_produk' => ' required',
            
        ];


        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $troli->fill($input);
        $troli->save();

        return response()->json($troli, 200);
    }
    
    public function destroy($id)
    {
        $troli = Troli::find($id);

        if(!$troli){
            abort(404);
        }

        $troli->delete();
        $message = ['message' => 'deleted successfully', 'category_id' => $id];

        return response()->json($message, 200);
    }
}