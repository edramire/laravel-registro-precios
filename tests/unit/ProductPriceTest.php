<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\Utils\ModelCreateUtils;
use Carbon\Carbon;

use App\Product;
use App\Company;
use App\Category;
use App\ProductPrice;

class ProductPriceTest extends TestCase
{
    use DatabaseMigrations;

    public function testProductPriceCreation()
    {
        $product = factory(Product::class)->create([
            'name' => 'Notebook Acme',
            'company_id' => factory(Company::class)->create(['name' => 'Acme']),
            'category_id' => factory(Category::class)->create(['name' => 'Notebooks']),
            ]);

        $prices = factory(ProductPrice::class, 5)->create([
            'price' => 3000,
            'product_id' => $product->id,
            ]);

        $this->assertEquals(5, $product->prices()->count());
    }
}
