<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','brand'];

    protected $primaryKey = 'product_id';

    public function users(){
        return $this->belongsToMany('App\User', 'product_user', 'product_id', 'cpf_user')
        ->withTimestamps()->withPivot('product_user_id');
    }

}
