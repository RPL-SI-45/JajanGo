<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
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
                    ->clickLink('Profile')
                    ->waitForText('Edit Profil', 20)
                    ->clickLink('Edit Profil')
                    ->waitForLocation('/pedagang/1/edit', 20)
                    ->assertPathIs('/pedagang/1/edit')
                    ->waitFor('input[name="no_telepon_pedagang"]', 20)
                    ->type('no_telepon_pedagang', '087777997708')
                    ->press('Simpan Perubahan')
                    ->assertPathIs('/pedagang/1');
        });
    }
}