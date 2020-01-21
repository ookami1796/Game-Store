<?php

namespace App\Http\Controllers;

use App\Model\Payment;

class PaymentController extends Controller {
    public function index() {
        $payment = Payment::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "payment",
            "result" => $payment
        ];

        return response()->json($payment, 200);
    }
}