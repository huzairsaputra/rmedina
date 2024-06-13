<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', 'superadmin@admin.com')
                ->type('password', 'password')
                ->press('Login')
                ->assertPathIs('/admin/home');

            /*$browser->visit('/login')
                ->type('email', 'superadmin@admin.com')
                ->type('password', 'tesss')
                ->press('Login')
                ->assertSee('These credentials do not match our records.');*/
        });
    }
}
