<?php

namespace App\Http\Controllers;

use App\Model\Troli;

class TroliController extends Controller {
    public function index() {
        $troli = Troli::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "troli",
            "result" => $troli
        ];

        return response()->json($troli, 200);
    }
}