<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\EventService;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Mockery as m;

class EventServiceTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatesANewEventWithFullData()
    {
        $file = m::mock(UploadedFile::class);
        $file->shouldReceive('store')->once()->with('public/event_images')->andReturn("public/event_images/iIc7E5FIc1IiGNJmk2vd1wPv8tzkj5Mftl2UFUe2.png");
        $this->be(factory(User::class)->create());
        $data = $this->getRequestData();
        $service = new EventService();
        $event = $service->addNewEvent($data, $file);
        $this->assertEquals(
            4,
            $event->categories->count(),
        "The 4 categories did not build correctly!"
        );
        $this->assertEquals(
            "G3 2LL",
            $event->address->postal_code,
        "The address did not save correctly!"
        );
    }

    private function getRequestData()
    {
        return  [
            "title" => "This is the title",
            "start_date" => "23-03-2018",
            "end_date" => "23-03-2018",
            "start_time" => "12:00",
            "end_time" => "13:00",
            "image_url" => "readme.png",
            "street_number" => "7",
            "route" => "Renfield Street",
            "postal_code" => "G3 2LL",
            "google_json" => '{"address_components":[{"long_name":"7","short_name":"7","types":["street_number"]},{"long_name":"Renfield Street","short_name":"Renfield St","types":["route"]},{"long_name":"Glasgow","short_name":"Glasgow","types":["postal_town"]},{"long_name":"Glasgow City","short_name":"Glasgow City","types":["administrative_area_level_2","political"]},{"long_name":"Scotland","short_name":"Scotland","types":["administrative_area_level_1","political"]},{"long_name":"United Kingdom","short_name":"GB","types":["country","political"]},{"long_name":"G2","short_name":"G2","types":["postal_code_prefix","postal_code"]}],"adr_address":"<span class=\"street-address\">7 Renfield St</span>, <span class=\"locality\">Glasgow</span> <span class=\"postal-code\">G2</span>, <span class=\"country-name\">UK</span>","formatted_address":"7 Renfield St, Glasgow G2, UK","geometry":{"location":{"lat":55.8607531,"lng":-4.257220899999993},"viewport":{"south":55.8593894697085,"west":-4.258446730291553,"north":55.8620874302915,"east":-4.255748769708475}},"icon":"https://maps.gstatic.com/mapfiles/place_api/icons/geocode-71.png","id":"c0da0d790ff37712a998eabcfab3593e0d42828d","name":"7 Renfield St","place_id":"ChIJI-gFa55GiEgR6WA2qIP9DoI","reference":"CmRbAAAAQ78UyBrIMgmzNY_Fl6B2n1TonBFxZ3ixvG5uwV3TnDsTw7z0k5Hx187aWWVoRsmhINlpBKYtqV-u5kLTtBDZJLiznI4Ghb7TI4FTvx6xeIWAuGWRLE1TU4-3GDWSRG2EEhDHifGHyDaHZmVEIoZzSNkjGhRGLetihK04Jnh3vTAE-YFhvdGYyw","scope":"GOOGLE","types":["street_address"],"url":"https://maps.google.com/?q=7+Renfield+St,+Glasgow+G2,+UK&ftid=0x4888469e6b05e823:0x820efd83a83660e9","utc_offset":0,"html_attributions":[]}',
            "country" => "United Kingdom",
            "latitude" => "55.8607531",
            "longitude" => "-4.257220899999993",
            "description" => "Description",
            "tags" => "adult,party,rave,illegal",
            "owner" => "on",
        ];
    }
}
