<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

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
        return response()->json(["message"=>"Metodo Login ok"]);
    }

    public function userProfile(Request $request){

    }

    public function logout(){

    }

    public function allUsers(Request $request){

    }
}
