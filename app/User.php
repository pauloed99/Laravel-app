<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable 
{

    protected $primaryKey = 'cpf';

    protected $fillable = [
        'firstname', 'lastname', 'email', 'cpf', 'password'
    ];
    
    public function generateHash($passwordField){
        $hashed = Hash::make($passwordField);
        return $hashed;
    }    

    public function products(){
        return $this->belongsToMany('App\Product', 'product_user', 'cpf_user', 'product_id')
        ->withTimestamps()->withPivot('product_user_id');
    }

}

