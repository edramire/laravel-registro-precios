<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ViewUserTest extends TestCase
{
    use DatabaseMigrations;

    public function testRegisterUserPage()
    {
        $this->visit('/registro')
             ->type('Esteban', 'name')
             ->type('esteban@correo.com', 'email')
             ->type('miPassword', 'password')
             ->type('miPassword', 'password_confirmation')
             ->press('Registrarse')
             ->seePageIs('/')
             ->see('Esteban');

        $user = User::findByEmail('esteban@correo.com');
        $this->assertEquals('Esteban', $user->name);
    }

    // revisar,aun no funciona bien
    public function testLoginUserPage()
    {
        $user = factory(User::class)->create([
            'name' => 'Esteban',
            'email' => 'esteban.registro@correo.com',
            'password' => 'miPassword'
            ]);

        $this->visit('/inicio_sesion')
             ->type('esteban.registro@correo.com', 'email')
             ->type('miPassword', 'password')
             ->check('remember')
             ->press('Iniciar sesión')
             ->seePageIs('/');
    }

    public function testLogout()
    {
        $user = factory(User::class)->create(['name' => 'Esteban']);

        $this->actingAs($user)
             ->visit('/')
             ->click('Esteban')
             ->click('Cerrar sesión')
             ->seePageis('/')
             ->see('Registrarse')
             ->see('Iniciar sesión');
    }
}
