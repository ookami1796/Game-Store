<?php

namespace App\Http\Controllers;

use App\Model\Checkout;

class CheckoutController extends Controller {
    public function index() {
        $checkout = Checkout::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "checkout",
            "result" => $checkout
        ];

        return response()->json($checkout, 200);
    }
}