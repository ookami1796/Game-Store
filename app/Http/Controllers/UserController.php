<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;


class UserController extends Controller {
    public function index() {
        $user = User::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "user",
            "result" => $user
        ];

        return response()->json($user, 200);
    }
    public function store(Request $request){
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

        $user = User::create($input);
        return response()->json($user, 200);
    }

    public function show($id){
        $user = User::find($id);

        if(!$user){
            abort(404);
        }

        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

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

        $user->fill($input);
        $user->save();

        return response()->json($user, 200);
    }
    
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user){
            abort(404);
        }

        $user->delete();
        $message = ['message' => 'deleted successfully', 'category_id' => $id];

        return response()->json($message, 200);
    }
}
