<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;



class User extends Model implements AuthenticatableContract,
AuthorizableContract
{
    use Authenticatable, Authorizable;

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

