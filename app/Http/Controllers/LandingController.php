<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class LandingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::whereNotNull('approved_by')->orderBy('start_date', 'DESC')->get();
        return view('landing', ['events' => $events]);
    }
}
