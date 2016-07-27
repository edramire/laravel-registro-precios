<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\ProductList;

class UserList extends Model
{
    public static $elementsPerList = 4;

    protected $table = 'lists';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_list', 'list_id', 'product_id');
    }

    public function addProduct(Product $product)
    {
        $myProducts = $this->products();
        if ($myProducts->count() < UserList::$elementsPerList) {
            $myProducts->attach($product->id);
            return $this;
        }
        return null;
    }

    public function removeProduct(Product $product)
    {
        $this->products()->detach($product->id);
    }
}
