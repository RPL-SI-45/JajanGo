<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/login/user')
                    ->screenshot('login-page')
                    ->type('email', 'antoniosirait29@gmail.com')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/home');
        });
    }
}
