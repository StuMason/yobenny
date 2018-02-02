<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function approveThings(Request $request)
    {
        //This isn't built yet
        $request->user()->authorizeRoles('manager');
        return view('admin.approve');
    }
}
