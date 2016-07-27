<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Collection;
use Tests\Utils\ModelCreateUtils;

use App\Product;
use App\Company;
use App\Category;
use App\ProductPrice;

class ViewProductTest extends TestCase
{
    use DatabaseMigrations;

    public function testShowProduct()
    {
        $product = factory(Product::class)->create([
            'name' => 'Notebook Acme',
            'company_id' => factory(Company::class)->create(['name' => 'Acme']),
            'category_id' => factory(Category::class)->create(['name' => 'Notebooks']),
            ]);
        $prices = ModelCreateUtils::createProductPrices($product, 5);

        $this->visit('/producto/'.$product->id)
             ->see('Notebook Acme')
             ->see('Acme')
             ->see('Notebooks')
             ->see($product->image_url)
             ->see($prices[0]->price);
    }

    public function testFindProduct()
    {
        $company = factory(Company::class)->create(['name' => 'Acme']);
        $category = factory(Category::class)->create(['name' => 'Notebooks']);
        $products = factory(Product::class, 5)->create([
            'name' => 'a modificar',
            'company_id' => $company->id,
            'category_id' => $category->id,
        ]);

        $products->each(function ($item, $key) {
            $item->name = 'Notebook Acme '.$key;
            $item->save();
            factory(ProductPrice::class)->create([
                'price' => 5000 * $key,
                'product_id' => $item->id,
            ]);
        });

        $this->post('/busqueda/', [
            'word' => 'Notebook',
            'company_id' => $company->id,
            'category_id' => $category->id,
            'isAsc' => 1,
            ])
            ->see('Notebook Acme')
            ->see('Acme')
            ->see('Notebooks')
            ->see($product->image_url)
            ->see('5000');
    }
}
