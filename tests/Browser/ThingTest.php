<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

class ThingTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testAddThingWorksAsExpected()
    {
        $this->loginUser();

        $eventName = Uuid::uuid4()->toString();

        $this->browse(function ($browser) use ($eventName) {
            $browser->visit('/things/add')
                    ->assertSee('Event Title')
                    ->type("@thingTitle", $eventName)
                    ->value("@thingStartDate", Carbon::today()->toDateString())
                    ->value("@thingEndDate", Carbon::tomorrow()->toDateString())
                    ->value("@thingStartTime", "11:00")
                    ->value("@thingEndTime", "22:00")
                    ->value("@thingImage", "https://lorempixel.com/640/480/")
                    ->keys("@thingLocation", "7 Ren")
                    ->keys("@thingLocation", ['{arrow_down}'])
                    ->pause(2000)
                    ->keys("@thingLocation", ['{enter}'])
                    ->type("@thingDescription", "Description: " . $eventName)
                    ->click('@thingSubmit')
                    ->assertSee($eventName);
        });
    }
}
