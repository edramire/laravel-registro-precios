<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (App\Company::all() as $company) {
            foreach (App\Category::all() as $category) {
                factory(App\Product::class, 2)->create([
                    'category_id' => $category->id,
                    'company_id' => $company->id,
                    ]);
            }
        }
    }
}
