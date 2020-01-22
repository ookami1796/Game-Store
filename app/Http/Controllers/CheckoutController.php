<?php

namespace App\Http\Controllers;

use App\Model\Checkout;
use Illuminate\Http\Request;


class CheckoutController extends Controller {
    public function index() {
        $checkout = Checkout::OrderBy("id", "DESC")->paginate(2)->toArray();

        $output = [
            "message" => "checkout",
            "result" => $checkout
        ];

        return response()->json($checkout, 200);
    }
    public function store(Request $request){
        $input = $request->all();
        $validationRules = [
            'id_user' => 'required',
            'id_troli' => 'required',
            'id_pembayaran' => 'required',
            'id_ekspedisi' => 'required',
            'durasi' => 'required|in:Instan,Next Day,Regular(2 - 3 hari)'
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $chekout = Checkout::create($input);

        return response()->json($chekout, 200);
    }

    public function show($id){
        $chekout = Checkout::find($id);

        if(!$chekout){
            abort(404);
        }

        return response()->json($chekout, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $chekout = Checkout::find($id);

        if (!$chekout) {
            abort(404);
        }
        $validationRules = [
            'id_user' => 'required',
            'id_troli' => 'required',
            'id_pembayaran' => 'required',
            'id_ekspedisi' => 'required',
            'durasi' => 'required|in:Instan,Next Day,Regular(2 - 3 hari)'
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $chekout->fill($input);
        $chekout->save();

        return response()->json($chekout, 200);
    }
    
    public function destroy($id)
    {
        $chekout = Checkout::find($id);

        if(!$chekout){
            abort(404);
        }

        $chekout->delete();
        $message = ['message' => 'deleted successfully', 'chekout_id' => $id];

        return response()->json($message, 200);
    }
}