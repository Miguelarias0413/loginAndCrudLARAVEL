<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //
    function index(){
        return view('auth.register');
    }
    function store(Request $request)
    {
        $userRegisteredValidated = $request->validate([
            "name" => 'required|min:10',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|confirmed|min:5'
        ],[
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener al menos 10 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser un email',
            'password.required' => 'La contraseña es requerida',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña debe tener al menos 5 caracteres'

        ]);

        $userRegisteredValidated['password'] = bcrypt($userRegisteredValidated['password']);
        
        User::create($userRegisteredValidated);

        Auth::attempt($request->only('email','password'));

        return redirect()->route('products.index')->with('success','Usuario registrado correctamente');


    }
}
