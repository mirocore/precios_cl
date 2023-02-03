<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return Inertia::render('Auth2/Login');
    }

    public function register(){
        return Inertia::render('Auth2/Register');
    }

    public function createUser(Request $request){

        // DATA
        $newData = $request->input();

        // TODO VALIDACION

        // HASHEAR CONTRASEÑA
        $newData['password'] = Hash::make($newData['password']);

        // NUEVO REGISTRO
        $user = User::create($newData);
        
        return redirect()->route('register.page');
    }

    public function doLogin(Request $request){

        // OBTENGO LOS DATOS
        $email = $request->input('email');
        $password = $request->input('password');

        //TODO VALIDATION

        // INTENTA HACER LOGIN
        if( !Auth::attempt( [ 'email' => $email, 'password' => $password ] ) ){
            return redirect()->route('register.page');
        }

        // ESTA LOGUEADO
        return redirect()->route('products.index');

    }

    public function logout(){

        Auth::logout();

        return redirect()->route('products.index');
    }
}
