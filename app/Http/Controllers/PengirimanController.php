<?php

namespace App\Http\Controllers;

use App\Model\Pengiriman;

class PengirimanController extends Controller {
    public function index() {
        $pengiriman = Pengiriman::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "pengiriman",
            "result" => $pengiriman
        ];

        return response()->json($pengiriman, 200);
    }
}