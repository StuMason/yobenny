<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
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
        $this->login();

        $eventName = Uuid::uuid4()->toString();

        $this->browse(function ($browser) use ($eventName) {
            $browser->visit('/things/add')
                    ->assertSee('Event Title')
                    ->type("@thingTitle", $eventName)
                    ->value("@thingStartDate", Carbon::today()->toDateString())
                    ->value("@thingEndDate", Carbon::tomorrow()->toDateString())
                    ->value("@thingStartTime", "11:00")
                    ->value("@thingEndTime", "22:00")
                    ->attach("image_url", base_path('tests/fixtures/banner.jpeg'))
                    ->type("@thingLocation", "7 Ren")
                    ->pause(500)
                    ->keys("@thingLocation", ['{arrow_down}'])
                    ->keys("@thingLocation", ['{enter}'])
                    ->type("@thingDescription", "Description: " . $eventName)
                    ->type("@thingTags", "end ")
                    ->keys("@thingTags", ['{enter}'])
                    ->click('@thingSubmit')
                    ->assertSee($eventName)
                    ->assertSee("22:00");
        });
    }
}
