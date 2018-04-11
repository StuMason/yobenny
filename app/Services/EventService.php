<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Event;
use App\Models\Role;
use App\Models\Address;
use App\Models\Category;
use Illuminate\Support\Carbon;

class EventService
{
    public function addNewEvent($input, $image)
    {
        $event = new Event();
        $event->owner_uuid = Auth::user()->uuid;
        $event->title = $input['title'];
        $event->approved_by = $this->setApprovedBy($input);
        $event->start_date = Carbon::parse($input['start_date']);
        $event->end_date = Carbon::parse($input['end_date']);
        $event->start_time = Carbon::parse($input['start_time']);
        $event->end_time = Carbon::parse($input['end_time']);
        $event->image_url = $this->storeImage($image);
        $event->description = $input['description'];
        $event->save();

        $address = new Address();
        $address->country = $input['country'];
        $address->latitude = $input['latitude'];
        $address->longitude = $input['longitude'];
        $address->postal_code = $input['postal_code'];
        $address->route = $input['route'];
        $address->street_number = $input['street_number'];
        $address->address_json = $input['google_json'];
        $address->save();

        $event->address()->save($address);
        $event->categories()->attach($this->tags($input['tags']));

        return $event;
    }

    private function setApprovedBy($input)
    {
        return isset($input['approved_by']) && $input['approved_by'] == "on" ? Auth::user()->uuid : null;
    }

    private function tags($tags)
    {
        return collect(explode(",", $tags))->map(function ($tag) {
            return Category::firstOrCreate(['name' => $tag])->getUuid();
        });
    }

    private function storeImage($image)
    {
        return substr($image->store('public/event_images'), 6);
    }
}
