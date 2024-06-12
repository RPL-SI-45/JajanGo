<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RecommendationTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group recommendation
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://localhost:8000/login/pedagang')
                    ->type('username_pedagang', 'tokoabc')
                    ->type('password', '12345678')
                    ->press('Login')
                    ->assertPathIs('/pedagang/daftarmenu')
                    ->press('Recommend');
        });
    }
}
