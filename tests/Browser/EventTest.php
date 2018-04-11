<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;

class EventTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testAddEventWorksAsExpected()
    {
        $this->login();

        $eventName = Uuid::uuid4()->toString();

        $this->browse(function ($browser) use ($eventName) {
            $browser->visit('/events/add')
                    ->assertSee('Event Title')
                    ->type("@eventTitle", $eventName)
                    ->value("@eventStartDate", Carbon::today()->toDateString())
                    ->value("@eventEndDate", Carbon::tomorrow()->toDateString())
                    ->value("@eventStartTime", "11:00")
                    ->value("@eventEndTime", "22:00")
                    ->attach("image_url", base_path('tests/fixtures/banner.jpeg'))
                    ->type("@eventLocation", "7 Ren")
                    ->pause(500)
                    ->keys("@eventLocation", ['{arrow_down}'])
                    ->keys("@eventLocation", ['{enter}'])
                    ->type("@eventDescription", "Description: " . $eventName)
                    ->type("@eventTags", "end ")
                    ->keys("@eventTags", ['{enter}'])
                    ->click('@eventSubmit')
                    ->assertSee($eventName)
                    ->assertSee("22:00");
        });
    }
}
