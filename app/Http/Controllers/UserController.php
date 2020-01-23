<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function index() {
        $user = User::OrderBy("id", "DESC")->paginate(10);

        $output = [
            "message" => "user",
            "result" => $user
        ];

        return response()->json($user, 200);
    }
    public function register(Request $request){
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
        $user->save();        
        return response()->json($user, 200);
    }
    public function login(Request $request){
        $input = $request->all();

        $validationRules = [
            'username' => 'required',
            'password' => ' required',
        ];

        $validator =\Validator::make($input, $validationRules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = $request->only(['username', 'password']);

        if (! $token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60 * 24
        ], 200);

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
        $plainPassword = $request->input('password');
        $user->password = app('hash')->make($plainPassword);
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
