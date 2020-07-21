<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/adminhome{any}', 'AdminPageController@index')->where('any', '.*');

Route::get('/staffhome{any}',  'EmployeePageController@index')->where('any', '.*');




Route::get('guest-get-allemployees', 'GuestController@getAllEmployees');

Route::get('guest-get-employee/{id}', 'GuestController@getEmployeeById');

Route::get('guest-get-allemployees', 'GuestController@getAllEmployees');


Route::get('/', function () {
    return view('adhome');
});

Route::get('/podcasts', function () {
    return view('podcasts');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/partners', function () {
    return view('partners');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/impact', function () {
    return view('impact');
});

Route::get('/employ{any}', function () {
    return view('staff');
})->where('any', '.*');


Auth::routes();
