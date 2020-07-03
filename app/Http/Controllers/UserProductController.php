<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin === '1'){
            $users = User::with('products')->get();

            return view('admin.userProduct.index', ['users' => $users]);
        }

        $user = User::where('email', Auth::user()->email)->with('products')->first();

        return view('userProduct.index', ['userProducts' => $user->products]);
    }   


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', Auth::user()->email)->first();
    
        $user->products()->attach($request->product_id);

        return redirect()->route('userProducts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productUserId)
    {
        $user = User::where('email', Auth::user()->email)->first();

        $userProduct = $user->products()->where('product_user_id', $productUserId)->first();

        return view('userProduct.show', ['userProduct' => $userProduct]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($productUserId)
    {
        $user = User::where('email', Auth::user()->email)->first();

        $user->products()->wherePivot('product_user_id', $productUserId)->detach();

        return redirect()->route('userProducts.index');
    }
}
