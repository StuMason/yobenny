<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use \App\User;

class ProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testShouldNotAllowAccessToProfileWithoutBeingLoggedIn()
    {
        $this->be(User::find(1));
        $this->browse(function (Browser $browser) {
            $browser->visit('/profile')
                    ->assertSee('profile');
        });
    }
}
