<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartDetailTable extends Migration {

    public function up()
    {
        Schema::create('cart_detail', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('quantity');
            $table->integer('user_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('cart_detail');
    }
}
