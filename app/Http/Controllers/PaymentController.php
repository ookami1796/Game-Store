<?php

namespace App\Http\Controllers;

use App\Model\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    public function index() {
        $payment = Payment::OrderBy("id", "DESC")->paginate(2)->toArray();

        $output = [
            "message" => "payment",
            "result" => $payment
        ];

        return response()->json($payment, 200);
    }
    public function store(Request $request){
        $input = $request->all();
        $payment = Payment::create($input);

        return response()->json($payment, 200);
    }

    public function show($id){
        $payment = Payment::find($id);

        if(!$payment){
            abort(404);
        }

        return response()->json($payment, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $payment = Payment::find($id);

        if (!$payment) {
            abort(404);
        }

        $payment->fill($input);
        $payment->save();

        return response()->json($payment, 200);
    }
    
    public function destroy($id)
    {
        $payment = Payment::find($id);

        if(!$payment){
            abort(404);
        }

        $payment->delete();
        $message = ['message' => 'deleted successfully', 'payment_id' => $id];

        return response()->json($message, 200);
    }
}