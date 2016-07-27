<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{

    protected $table = 'product_prices';
    public $timestamps = true;

    protected $fillable = [
        'price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function userList()
    {
        return $this->belongsTo('App\UserList');
    }
}
