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

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/approve', 'AdminController@approveThings')->name('admin.approve');
Route::get('/admin/approve/{thing_uuid}', 'AdminController@approve')->name('admin.approve.thing');

Route::get('auth/social', 'Auth\SocialAuthController@show')->name('social.login');
Route::get('oauth/{driver}', 'Auth\SocialAuthController@redirectToProvider')->name('social.oauth');
Route::get('oauth/{driver}/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('social.callback');

Route::get('/about', function () {
    return view('pages.about');
})->name('pages.about');

Route::get('/terms', function () {
    return view('pages.terms');
})->name('pages.terms');

Route::get('/privacy', function () {
    return view('pages.privacy');
})->name('pages.privacy');
