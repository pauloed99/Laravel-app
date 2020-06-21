<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{

    protected $fillable = [
        'firstname', 'lastname', 'email', 'cpf', 'password'
    ];
    

    public function generateHash($passwordField){
        $hashed = Hash::make($passwordField);
        return $hashed;
    }

    

}
