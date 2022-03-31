<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
      return view('auth.login');
    }

    public function loginUser(Request $request)
    {
      // dd($request);
      $request->validate([
          'email' => 'required|email',
          'password' => 'required',
      ]);
      $credentials = $request->only('email', 'password');
      // dd($credentials);
      if(Auth::attempt($credentials)) {
          
        if(Auth()->user()->isAdmin == 1){
          return redirect()->intended('admin');
        }
        else
        return redirect()->intended('dashboard')
          ->withSuccess('You have Successfully loggedin');
        }
          return redirect("dashboard")
            ->withSuccess('Oppes! You have entered invalid credentials');
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
