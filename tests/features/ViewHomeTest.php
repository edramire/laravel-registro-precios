<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ViewHomeTest extends TestCase
{
    use DatabaseMigrations;

    public function testRegisterUserPage()
    {
        $this->visit('/')
             ->seePageIs('/');
    }
}
