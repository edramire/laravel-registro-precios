<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function testUserCanBeFoundByEmail()
    {
        $user = factory(User::class)->create(['email' => 'user@email.example.com']);
        
        $foundedUser = User::findByEmail('user@email.example.com');

        $this->assertEquals($user->id, $foundedUser->id);
        $this->assertEquals($user->email, $foundedUser->email);
    }
}
