<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Thing;
use App\Models\Role;
use App\Models\Address;
use App\Models\Category;
use App\Services\ThingService;
use App\Http\Requests\CreateNewThing;

class ThingController extends Controller
{
    private $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ThingService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
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
            $this->throwAndGoBack($e);
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
            $this->throwAndGoBack($e);
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addThingProcess(CreateNewThing $request)
    {
        try {
            $thing = $this->service->addNewThing($request->all(), $request->file('image_url'));
            return redirect("things/{$thing->uuid}")->withMessage("Event successfully added!");
        } catch (\Exception $e) {
            $this->throwAndGoBack($e);
        }
    }
}
