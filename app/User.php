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

}

