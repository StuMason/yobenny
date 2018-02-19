<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Thing;

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
Route::get('/', 'LandingController@index')->name('landing');

Auth::routes();

Route::get('/user/profile', 'ProfileController@index')->name('profile');

Route::get('/things/add', 'ThingController@addThingForm')->name('things.add.form');
Route::post('/things/add', 'ThingController@addThingProcess')->name('things.add.process');
Route::get('/things/{thing_uuid}', 'ThingController@showThing')->name('things.show');


Route::get('/admin/approve', 'AdminController@approveThings')->name('admin.approve');
Route::get('/admin/approve/{thing_uuid}', 'AdminController@approve')->name('admin.approve.thing');
