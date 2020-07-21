<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth']], function () {


        Route::get('employee-dashboard', 'EmployeePageController@dashboard');

        // ------------------------------------------------------------

        Route::get('admin-get-comments1', 'AdminPageController@getThisWeekComments');

        Route::get('admin-get-comments2', 'AdminPageController@getLastWeekComments');

        Route::get('admin-get-comments3', 'AdminPageController@getThisMonthComments');

        Route::get('admin-get-comments4', 'AdminPageController@getLastMonthComments');

        Route::get('admin-get-comments5', 'AdminPageController@getAllComments');

        Route::delete('admin-delete-comment/{id}', 'AdminPageController@deleteSpecificComment');

        // ---------------------------------------------------------

        Route::get('admin-get-alladmins', 'AdminPageController@getAllAdmins');

        Route::delete('admin-delete-admin/{id}', 'AdminPageController@deleteSpecificAdmin');

        Route::get('admin-get-admin/{id}', 'AdminPageController@getAdminById');

        Route::put('admin-update-admin/{id}', 'AdminPageController@updateSpecificAdmin');

        Route::post('admin-add-admin', 'AdminPageController@addAdmin');

        Route::post('admin-update-avatar', 'AdminPageController@UpdateAvatar');

        // ---------------------------------------------------------


        Route::post('admin-add-employee', 'AdminPageController@addEmployee');

        Route::get('admin-get-allemployees', 'AdminPageController@getAllEmployees');

        Route::post('admin-update-user', 'AdminPageController@updateStaff');

        Route::get('admin-get-employee/{id}', 'AdminPageController@getEmployeeById');

        Route::delete('admin-delete-user/{id}', 'AdminPageController@deleteSpecificUser');

        Route::get('admin-dashboard', 'AdminPageController@dashboard');

});













