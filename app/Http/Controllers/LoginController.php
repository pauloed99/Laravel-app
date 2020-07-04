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
        if(Auth::check()){
            return redirect()->back();
        }

        return view('auth.login');
    }

    public function authenticate(LoginUserRequest $request){

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('products.index');
        }
        else{
            return redirect()->back()->with('msg', 'Erro ao fazer login, dados incorretos !');
        }
            
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login.show');
    }

}
