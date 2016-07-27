<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Tests\Utils\ModelCreateUtils;
use Carbon\Carbon;

use App\Product;
use App\Company;
use App\Category;
use App\UserList;
use App\User;

class UserListTest extends TestCase
{
    use DatabaseMigrations;

    public function testAddProductToUserList()
    {
        $product = factory(Product::class)->create([
            'name' => 'Notebook Acme',
            'company_id' => factory(Company::class)->create(['name' => 'Acme']),
            'category_id' => factory(Category::class)->create(['name' => 'Notebooks']),
            ]);
        $userList = factory(UserList::class)->create([
            'user_id' => factory(User::class)->create(['email' => 'user@email.com'])
            ]);

        $userList->addProduct($product);
        $this->assertEquals('Notebook Acme', $userList->products()->first()->name);
    }

    public function testLimitUserList()
    {
        $products = factory(Product::class, UserList::$elementsPerList + 2)->create();
        $userList = factory(UserList::class)->create();

        $products->each(function ($item, $key) use ($userList) {
            $userList->AddProduct($item);
        });

        $this->assertEquals(UserList::$elementsPerList, $userList->products()->count());
    }

    public function testRemoveProductsFromUserList()
    {
        $userList = factory(UserList::class)->create();
        $product = factory(Product::class)->create();

        $userList->addProduct($product);
        $userList->removeProduct($product);

        $this->assertEquals(0, $userList->products()->count());
    }
}
