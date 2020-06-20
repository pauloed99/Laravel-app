<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_products', function (Blueprint $table) {
            $table->integer('user_product_id')->autoIncrement();
            $table->string('cpf_user');
            $table->integer('product_id');
            $table->foreign('cpf_user')->references('cpf')->on('users')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_products');
    }
}
