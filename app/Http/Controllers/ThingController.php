<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function addThingForm()
    {
        return view('things.add');
    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addThingProcess(Request $request)
    {
        dd($request->all());
    }
}
