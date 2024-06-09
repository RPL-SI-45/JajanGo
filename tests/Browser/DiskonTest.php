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
            $browser->visit('/diskon/create')
                    ->waitFor('@namaMenu')
                    ->assertSee('Buat Kode Promo')
                    ->pause(2000)
                    ->assertSee('Nama Menu')
                    ->select('@namaMenu', 'Soto Banjar')
                    ->assertVisible('@persentaseDiskon')
                    ->type('@kodeKupon','mahasiswa')
                    ->type('@persentaseDiskon','5')
                    ->press('@submit')
                    ->assertPathIs('/diskon/daftardiskon');
            $browser->visit('/diskon/daftardiskon')
                    ->assertSee('Daftar Kode Promo');
            $browser->visit('/diskon/daftarpromo')
                    ->assertSee('Daftar Promo')
                    ->press('Beli')
                    ;
        });
    }
}
