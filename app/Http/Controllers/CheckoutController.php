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