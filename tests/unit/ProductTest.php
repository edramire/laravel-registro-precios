<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\Utils\ModelCreateUtils;

use App\Product;
use App\Company;
use App\Category;

class ProductTest extends TestCase
{
    use DatabaseMigrations;

    public function testProductCreation()
    {
        $product = factory(Product::class)->create([
            'name' => 'Notebook Acme',
            'company_id' => factory(Company::class)->create(['name' => 'Acme'])->id,
            'category_id' => factory(Category::class)->create(['name' => 'Notebooks'])->id,
            ]);

        $productLoaded = Product::find($product->id);
        $this->assertEquals('Notebook Acme', $productLoaded->name);
        $this->assertEquals('Acme', $productLoaded->company->name);
        $this->assertEquals('Notebooks', $productLoaded->category->name);
    }
}
