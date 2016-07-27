<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration
{

    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('product_prices', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('cart_detail', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('cart_detail', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_company_id_foreign');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::table('product_prices', function (Blueprint $table) {
            $table->dropForeign('product_prices_product_id_foreign');
        });
        Schema::table('cart_detail', function (Blueprint $table) {
            $table->dropForeign('cart_detail_product_id_foreign');
        });
        Schema::table('cart_detail', function (Blueprint $table) {
            $table->dropForeign('cart_detail_user_id_foreign');
        });
    }
}
