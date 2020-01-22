<?php

namespace App\Http\Controllers;

use App\Model\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller{
    public function regiter(Request $request){
        $input = $request->all();
        $validationRules = [
            'nama' => 'required',
            'username' => 'required',
            'password' => ' required',
            'no_telp' => 'required',
            'photo' => 'required',
            'role' => ' required|in:admin,pelanggan',
            'alamat' => 'required'
        ];

        $validator = \Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = new User;
        $user->nama = $request->input('nama');
        $user->username = $request->input('username');
        $plainPassword = $request->input('password');
        $user->password = app('hash')->make($plainPassword);
        $user->nama = $request->input('nama');
        $user->no_telp = $request->input('no_telp');
        $user->photo = $request->input('photo');
        $user->role = $request->input('role');
        $user->alamat = $request->input('alamat');
        return response()->json($user, 200);
    }

}