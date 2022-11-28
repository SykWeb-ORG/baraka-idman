<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $this->validate($request ,[
            "name"=>"required",
            "email" => "required",
            "password" => "required"
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make( $request->password)
        ]);
        return response()->json([
            'message' => "register with successufult"
        ]);
    }
    public function login(Request $request){
        $user = User::whereEmail($request->email)->first();
        if(isset($user->id)){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'message' => 'login with successufly',
                    'token' => $token
                ]);
            }
            else{
                return response()->json([
                    'message' => "invalid login"
                ]);
            }

        }
    }
}
