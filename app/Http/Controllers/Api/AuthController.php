<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(Request $request){
        //Validacion de los datos
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|confirmed'
        // ]);

        //alta de usuario
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        //respuesta
        return response($user, Response::HTTP_CREATED);
        // return response()->json(["message"=>"Metodo Register ok"]);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'     =>['required','email'],
            'password'  =>['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('cookie_token', $token, 60 * 24);
            return response(["token"=>$token], Response::HTTP_OK)->withoutCookie($cookie);
        } else {
            return response(["message"=> "Credenciales inválidas"],Response::HTTP_UNAUTHORIZED);
        }
        // return response()->json(["message"=>"Metodo Login ok"]);
    }

    public function userProfile(Request $request){
        return response()->json([
            "message"   => "userProfile OK",
            "userData"  => auth()->user()
        ], Response::HTTP_OK);
    }

    public function logout(){
        $cookie = Cookie::forget('cookie_token');
        return response(["message"=>"Cierre de sesion OK"], Response::HTTP_OK)->withCookie($cookie);
    }

    public function allUsers(Request $request){
        $users = User::all();
        return response()->json([
            "users"=>$users
        ]);
    }
}
