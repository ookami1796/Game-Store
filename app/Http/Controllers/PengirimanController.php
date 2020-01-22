<?php

namespace App\Http\Controllers;

use App\Model\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller {
    public function index() {
        $pengiriman = Pengiriman::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "pengiriman",
            "result" => $pengiriman
        ];

        return response()->json($pengiriman, 200);
    }
    public function store(Request $request){
        $input = $request->all();
        $validationRules = [
            'nama' => 'required',
            'no_resi' => 'required'
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $pengiriman = Pengiriman::create($input);
        return response()->json($pengiriman, 200);
    }

    public function show($id){
        $pengiriman = Pengiriman::find($id);

        if(!$pengiriman){
            abort(404);
        }

        return response()->json($pengiriman, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $pengiriman = Pengiriman::find($id);

        if (!$pengiriman) {
            abort(404);
        }

        $validationRules = [
            'nama' => 'required',
            'no_resi' => 'required'
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $pengiriman->fill($input);
        $pengiriman->save();

        return response()->json($pengiriman, 200);
    }
    
    public function destroy($id)
    {
        $pengiriman = Pengiriman::find($id);

        if(!$pengiriman){
            abort(404);
        }

        $pengiriman->delete();
        $message = ['message' => 'deleted successfully', 'pengiriman_id' => $id];

        return response()->json($message, 200);
    }
}

