<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        try {
            $request->user()->authorizeRoles(Role::ADMIN);
            $query = $request->all();

            $events = Event::all();
            return view('admin.index', ['events' => $events]);
        } catch (\Exception $e) {
            $message = sprintf(
                "Error - Message: %s File: %s Line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            Log::error($message);
            return redirect()->back()->withError("There was a problem loading the approve events.");
        }
    }

    public function approveEvents(Request $request)
    {
        try {
            $request->user()->authorizeRoles(Role::ADMIN);
            $events = Event::whereNull('approved_by')->get();
            return view('admin.events.approve', ['events' => $events]);
        } catch (\Exception $e) {
            $message = sprintf(
                "Error - Message: %s File: %s Line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            Log::error($message);
            return redirect()->back()->withError("There was a problem loading the approve events.");
        }
    }

    public function approve(Request $request, $event_uuid)
    {
        try {
            $request->user()->authorizeRoles(Role::ADMIN);
            $event = Event::findOrFail($event_uuid);
            if ($event->approved_by) {
                $event->approved_by = null;
            } else {
                $event->approved_by = Auth::user()->uuid;
            }
            $event->save();
            return redirect("/admin")->withMessage("Event successfully approved! It's now live on the landing page");
        } catch (\Exception $e) {
            $message = sprintf(
                "Error - Message: %s File: %s Line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            Log::error($message);
            return redirect()->back()->withError("There was a problem approving the event.");
        }
    }
}
