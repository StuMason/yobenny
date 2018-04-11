<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Role;
use App\Models\Address;
use App\Models\Category;
use App\Services\EventService;
use App\Http\Requests\CreateNewEvent;

class EventController extends Controller
{
    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EventService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEvent(Request $request, $event_uuid)
    {
        try {
            return view('events.show', ['event' => Event::findOrFail($event_uuid)]);
        } catch (\Exception $e) {
            $this->throwAndGoBack($e);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEventForm()
    {
        try {
            return view('events.add', ['admin' => Auth::user()->hasRole(Role::ADMIN)]);
        } catch (\Exception $e) {
            $this->throwAndGoBack($e);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addEventProcess(CreateNewEvent $request)
    {
        try {
            $event = $this->service->addNewEvent($request->all(), $request->file('image_url'));
            return redirect("events/{$event->uuid}")->withMessage("Event successfully added!");
        } catch (\Exception $e) {
            $this->throwAndGoBack($e);
        }
    }
}
