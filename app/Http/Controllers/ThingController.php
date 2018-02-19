<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Thing;
use App\Models\Role;

class ThingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showThing(Request $request, $thing_uuid)
    {
        try {
            return view('things.show', ['thing' => Thing::findOrFail($thing_uuid)]);
        } catch (\Exception $e) {
            $message = sprintf("Error - Message: %s File: %s Line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            Log::error($message);
            return redirect()->back()->withError("There was a problem loading the event.");
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addThingForm()
    {
        try {
            return view('things.add', ['admin' => Auth::user()->hasRole(Role::ADMIN)]);
        } catch (\Exception $e) {
            $message = sprintf("Error - Message: %s File: %s Line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            Log::error($message);
            return redirect()->back()->withError("There was a problem loading the add event page.");
        }
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addThingProcess(Request $request)
    {
        //try {

            $request->validate([
                "title" => "required",
                "start_date" => "required|date",
                "end_date" => "required|date",
                "start_time" => "required|date",
                "end_time" => "required|date",
                "image_url" => "required|url",
                "location_url" => "required|url",
                "description" => "required",
                "owner" => "required",
            ]);
    
            $thing = new Thing();
            $thing->owner_id = Auth::user()->uuid;
            $thing->title = $request->input('title');
            $thing->approved_by = $this->setApprovedBy($request->all());
            $thing->start_date = $request->input('start_date');
            $thing->end_date = $request->input('end_date');
            $thing->start_time = $request->input('start_time');
            $thing->end_time = $request->input('end_time');
            $thing->image_url = $request->input('image_url');
            $thing->location_url = $request->input('location_url');
            $thing->description = $request->input('description');
            $thing->save();

            return redirect("things/{$thing->uuid}")->withMessage("Event successfully added!");

        // } catch (\Exception $e) {
        //     $message = sprintf("Error - Message: %s File: %s Line: %s",
        //         $e->getMessage(),
        //         $e->getFile(),
        //         $e->getLine()
        //     );
        //     Log::error($message);
        //     return redirect()->back()->withError("There was a problem adding this event.");
        // }
    }

    private function setApprovedBy($data)
    {
        return isset($data['approved_by']) && $data['approved_by'] == "on" ? Auth::user()->uuid : null;
    }
}
