<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use PhpParser\Node\Stmt\Foreach_;

class User extends Model implements AuthenticatableContract,
AuthorizableContract
{
    use Authenticatable, Authorizable;

    protected $primaryKey = 'cpf';
    protected $keyType = 'string';

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

    public function compareHash($passwordField, $userPassword){
        if (Hash::check($passwordField, $userPassword)) {
            return true;
        }
    }

    public function countUserProducts($email){

        $user = User::where('email', $email)->with('products')->first();

        $count = 0;

        foreach ($user->products as $userProduct) {
            $count += $userProduct->price;
        }

        return $count;
    }

}

