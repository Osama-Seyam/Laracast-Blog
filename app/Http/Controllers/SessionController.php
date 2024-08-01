<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function login(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(! auth()->attempt($attributes)){
            throw ValidationException::withMessages(['email'=> 'Email or Password is incorrect']);
        }
        
        session()->regenerate();
        return redirect('/')->with('success','Welcome Back!');
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'You are logged out successfully');
    }
}
