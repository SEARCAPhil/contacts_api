<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Contact
 */
Route::post('contact', 'Contact\PersonalInfo@createService');
Route::delete('contact', 'Contact\PersonalInfo@deleteService');
Route::put('contact', 'Contact\PersonalInfo@updateService');
Route::get('contact', 'Contact\PersonalInfo@retrieveService');

/**
 * Contact\Employment
 */
Route::post('contact/employment', 'Contact\EmploymentController@createService');
Route::delete('contact/employment', 'Contact\EmploymentControllert@deleteService');
Route::put('contact/employment', 'Contact\EmploymentController@updateService');
Route::get('contact/employment/{contactId}', 'Contact\EmploymentController@retrieveService');

/**
 * Contact\Communication
 */
Route::post('contact/employment/communication', 'Contact\CommunicationController@createService');
Route::put('contact/employment/communication', 'Contact\CommunicationController@updateService');
Route::delete('contact/employment/communication/{id}', 'Contact\CommunicationController@deleteService');
Route::get('contact/employment/communication/{id}', 'Contact\CommunicationController@retrieveService');
