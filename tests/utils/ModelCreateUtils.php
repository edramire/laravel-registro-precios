<?php

namespace Tests\Utils;

use Carbon\Carbon;

use App\Product;
use App\Company;
use App\Category;
use App\ProductPrice;

class ModelCreateUtils
{
    //actualmente guarda 2 veces
    //examinar necesidad de modificar timestamp
    public static function createProductPrices(Product $product, $quantity)
    {
        $prices = factory(ProductPrice::class, $quantity)->make();
        $product->prices()->saveMany($prices);

        return $prices->each(function ($item, $key) use ($quantity) {
            $item->created_at = Carbon::now()->subDays($quantity - $key);
            $item->updated_at = Carbon::now()->subDays($quantity - $key);
            $item->save();
        });
    }
}
