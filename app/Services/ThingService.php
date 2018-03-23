<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Thing;
use App\Models\Role;
use App\Models\Address;
use App\Models\Category;
use Illuminate\Support\Carbon;

class ThingService
{
    public function addNewThing($input)
    {
        $thing = new Thing();
        $thing->owner_uuid = Auth::user()->uuid;
        $thing->title = $input['title'];
        $thing->approved_by = $this->setApprovedBy($input);
        $thing->start_date = Carbon::parse($input['start_date']);
        $thing->end_date = Carbon::parse($input['end_date']);
        $thing->start_time = Carbon::parse($input['start_time']);
        $thing->end_time = Carbon::parse($input['end_time']);
        $thing->image_url = $input['image_url'];
        $thing->description = $input['description'];
        $thing->save();

        $address = new Address();
        $address->country = $input['country'];
        $address->latitude = $input['latitude'];
        $address->longitude = $input['longitude'];
        $address->postal_code = $input['postal_code'];
        $address->route = $input['route'];
        $address->street_number = $input['street_number'];
        $address->address_json = $input['google_json'];
        $address->save();

        $thing->address()->save($address);
        $thing->categories()->attach($this->tags($input['tags']));

        return $thing;
    }

    private function setApprovedBy($input)
    {
        return isset($input['approved_by']) && $input['approved_by'] == "on" ? Auth::user()->uuid : null;
    }

    private function tags($tags)
    {
        return collect(explode(",", $tags))->map(function ($tag) {
            return Category::firstOrCreate(['name' => $tag])->id();
        });
    }
}
