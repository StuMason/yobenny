<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new', function() {
    return view('new');
});

Route::get('/mascanner', function (Request $req) { //mascanner?site=https://stuartmason.co.uk
    //I enter a web address
    $site = $req->get('site');
    $homepage = file_get_contents($site);
    dd($homepage);
});

