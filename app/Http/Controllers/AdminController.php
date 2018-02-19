<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thing;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    public function approveThings(Request $request)
    {
        try {
            $request->user()->authorizeRoles(Role::ADMIN);
            $things = Thing::whereNull('approved_by')->get();
            return view('admin.things.approve', ['things' => $things]);
        } catch (\Exception $e) {
            $message = sprintf("Error - Message: %s File: %s Line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            Log::error($message);
            return redirect()->back()->withError("There was a problem loading the approve events.");
        }
    }

    public function approve(Request $request, $thing_id)
    {
        try {
            $request->user()->authorizeRoles(Role::ADMIN);

            $thing = Thing::findOrFail($thing_uuid);
            $thing->approved_by = Auth::user()->uuid;
            $thing->save();
    
            $message = "Event successfully approved! It's now live on the landing page";
            return redirect("/admin/approve")->withMessage($message);
        } catch (\Exception $e) {
            $message = sprintf("Error - Message: %s File: %s Line: %s",
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            );
            Log::error($message);
            return redirect()->back()->withError("There was a problem approving the event.");
        }
    }
}
