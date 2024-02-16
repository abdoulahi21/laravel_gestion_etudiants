<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //function redirect of login page
    public function login()
    {
        return view('auth.login');
    }

    //function disconnect
    public function logout()
    {
        Auth::logout();
        return to_route('auth.login');
    }

    //function for validate connect
    public function doLogin(LoginRequest $request)
    {
        //validation des request(si les champs du formulaire sont remplies)
       $credential=$request->validated();

       //connected user
       if(Auth::attempt($credential)){
           $request->session()->regenerate();
           return redirect()->intended(route('auth.etudiant'))->with('Vous etes connecté');
       }
       return to_route('auth.login')->withErrors([
               'email'=>"Email Invalide"
           //garder l'ancien email saisi
           ] )->onlyInput('email');
    }
    //
}
