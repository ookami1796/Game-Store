<?php

namespace App\Http\Controllers;

use App\Model\User;

class UserController extends Controller {
    public function index() {
        $user = User::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "user",
            "result" => $user
        ];

        return response()->json($user, 200);
    }
}