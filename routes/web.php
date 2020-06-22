<?php

use Illuminate\Support\Facades\Route;


Route::resource('users', 'UserController')->middleware('auth');

Route::resource('products', 'ProductController')->middleware('auth');

Route::get('login', 'LoginController@show')->name('login.show');

Route::post('login', 'LoginController@authenticate')->name('login.authenticate');

Route::get('logout', 'LoginController@logout')->name('logout');
