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
Route::delete('contact/employment/{id}', 'Contact\EmploymentController@deleteService');
Route::put('contact/employment', 'Contact\EmploymentController@updateService');
Route::get('contact/employment/{contactId}', 'Contact\EmploymentController@retrieveService');

/**
 * Contact\Communication
 */
Route::post('contact/communication', 'Contact\CommunicationController@createService');
Route::put('contact/communication', 'Contact\CommunicationController@updateService');
Route::delete('contact/communication/{id}', 'Contact\CommunicationController@deleteService');
Route::get('contact/communication/{id}', 'Contact\CommunicationController@retrieveService');


/**
 * Contact\Conference
 */
Route::post('contact/conference', 'Contact\ConferenceController@createService');
Route::put('contact/conference', 'Contact\ConferenceController@updateService');
Route::delete('contact/conference/{id}', 'Contact\ConferenceController@deleteService');
Route::get('contact/conference/{id}', 'Contact\ConferenceController@retrieveService');

/**
 * Contact\Conference\Lecture
 */
Route::post('contact/conference/lecture', 'Contact\Conference\LectureController@createService');
Route::put('contact/conference/lecture', 'Contact\Conference\LectureController@updateService');
Route::delete('contact/conference/lecture/{id}', 'Contact\Conference\LectureController@deleteService');
Route::get('contact/conference/lecture/{id}', 'Contact\Conference\LectureController@retrieveService');



/**
 * Contact\Education
 */
Route::post('contact/education', 'Contact\EducationController@createService');
Route::put('contact/education', 'Contact\EducationController@updateService');
Route::delete('contact/education/{id}', 'Contact\EducationController@deleteService');
Route::get('contact/education/{id}', 'Contact\EducationController@retrieveService');


/**
 * Contact\Engagement
 */
Route::post('contact/engagement', 'Contact\EngagementController@createService');
Route::put('contact/engagement', 'Contact\EngagementController@updateService');
Route::delete('contact/engagement/{id}', 'Contact\EngagementController@deleteService');
Route::get('contact/engagement/{id}', 'Contact\EngagementController@retrieveService');


/**
 * Contact\Fellow
 */
Route::post('contact/fellow', 'Contact\FellowController@createService');
Route::put('contact/fellow', 'Contact\FellowController@updateService');
Route::delete('contact/fellow/{id}', 'Contact\FellowController@deleteService');
Route::get('contact/fellow/{id}', 'Contact\FellowController@retrieveService');


/**
 * Contact\Prefix
 */
Route::post('contact/prefix', 'Contact\PrefixController@createService');
Route::put('contact/prefix', 'Contact\PrefixController@updateService');
Route::delete('contact/prefix/{id}', 'Contact\PrefixController@deleteService');
Route::get('contact/prefix', 'Contact\PrefixController@retrieveService');


/**
 * Contact\Research
 */
Route::post('contact/research', 'Contact\ResearchController@createService');
Route::put('contact/research', 'Contact\ResearchController@updateService');
Route::delete('contact/research/{id}', 'Contact\ResearchController@deleteService');
Route::get('contact/research/{id}', 'Contact\ResearchController@retrieveService');


/**
 * Contact\training
 */
Route::post('contact/training', 'Contact\TrainingController@createService');
Route::put('contact/training', 'Contact\TrainingController@updateService');
Route::delete('contact/training/{id}', 'Contact\TrainingController@deleteService');
Route::get('contact/training/{id}', 'Contact\TrainingController@retrieveService');


/**
 * Saff\Classes
 */
Route::post('saaf/class', 'Saaf\ClassController@createService');
Route::put('saaf/class', 'Saaf\ClassController@updateService');
Route::delete('saaf/class/{id}', 'Saaf\ClassController@deleteService');
Route::get('saaf/class', 'Saaf\ClassController@retrieveService');



/**
 * Sector
 */
Route::post('sector', 'SectorController@createService');
Route::put('sector', 'SectorController@updateService');
Route::delete('sector/{id}', 'SectorController@deleteService');
Route::get('sector', 'SectorController@retrieveService');


/**
 * Trainees
 */
Route::post('trainees', 'TraineesController@createService');
Route::put('trainees', 'TraineesController@updateService');
Route::delete('trainees/{id}', 'TraineesController@deleteService');
Route::get('trainees/{id}', 'TraineesController@retrieveService');