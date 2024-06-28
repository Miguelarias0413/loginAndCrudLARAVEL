<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('auth.login');
    }


    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'

        ],[
            'email.required' => 'El email es obligatorio',
            'email.email' => 'Debes ingresar un email valido',
            'password.required' => 'El password es obligatorio',
            'password.min' => 'La contraseña debe ser mayor a 5 digitos'

        ]);

        if (Auth::attempt($request->only('email','password')))
        {
            return redirect()->route('products.index');
        }
        return back()->withErrors([
            'userfail' => 'Las credenciales no coinciden'
        ]);

        
        
    }
}
