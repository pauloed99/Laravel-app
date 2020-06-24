<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginUserRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('logout');
    }
    
    public function show(){
        return view('auth.login');
    }

    public function authenticate(LoginUserRequest $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('products.index');
        }
        else{
            return redirect()->route('login.show');
        }
            
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.show');
    }

}
