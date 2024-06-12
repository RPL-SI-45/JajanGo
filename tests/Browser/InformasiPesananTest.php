<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InformasiPesananTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login/pedagang')
                    ->screenshot('login_page')
                    ->waitFor('input[name="username_pedagang"]', 20)
                    ->type('username_pedagang', 'bojotfamily')
                    ->waitFor('input[name="password"]', 20)
                    ->type('password', 'cimolbojot')
                    ->press('Login')
                    ->waitForLocation('/pedagang/daftarmenu', 20)
                    ->assertPathIs('/pedagang/daftarmenu')
                    ->clickLink('Informasi Pesanan')
                    ->waitForText('Informasi Pesanan', 20)
                    ->assertPathIs('/pedagang/informasipesanan');
        });
    }
}
