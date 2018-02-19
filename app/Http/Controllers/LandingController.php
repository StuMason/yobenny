<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thing;

class LandingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landing', ['things' => Thing::whereNotNull('approved_by')->get()]);
    }
}
