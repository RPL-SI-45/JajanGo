<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DiskonTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/inputdiskon/create')
                    ->assertSee('Buat Kode Promo')
                    ->type('@kodeKupon','mahasiswa')
                    ->type('@persentasediskon','5')
                    ->press('@submit')
                    ->assertPathIs('/inputdiskon/daftardiskon')
                    ->assertSee('Daftar Kode Promo')
                    ;
        });
    }
}
