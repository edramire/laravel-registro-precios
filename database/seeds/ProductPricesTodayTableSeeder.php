<?php

use Illuminate\Database\Seeder;

class ProductPricesTodayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Product::all()->each(function ($p) {
            factory(App\ProductPrice::class)->create([
                'product_id' => $p->id
                ]);
        });
    }
}
