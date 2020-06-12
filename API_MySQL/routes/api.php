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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});




Route::prefix('v1')->namespace('Api')->group(function() {

    Route::post('login', 'ClientController@login')->name('login');

    // CLIENTS
    Route::name('clients.')->group(function(){
        Route::resource('clients', 'ClientController');
    });

    //PROFESSIONAL
    Route::name('professionals.')->group(function(){
        Route::resource('professionals', 'ProfessionalController');
        Route::get('professional/id/{name}', 'ProfessionalController@getIdByName');
        Route::put('schedule/professional/{professionalId}', 'ProfessionalController@makeScheduleByProfessional');
        Route::get('professional/names', 'ProfessionalController@namesProfessional');
        Route::get('professional/names/{serviceName}', 'ProfessionalController@getNameByService');
    });

    Route::delete('cancel/{id}', 'ScheduleClientController@cancelScheduleByClient')->name('cancel');
    Route::delete('cancel/prof/{id}', 'ScheduleProfessionalController@cancelScheduleByProfessional')->name('cancelProf');

    Route::put('services/type/{id}', 'ServiceController@RegisterTypeService');

    Route::group(['middleware' => ['jwt.auth']], function(){

        // LOGOUT
        Route::get('logout', 'ClientController@logout')->name('logout');
        Route::post('refresh', 'ClientController@refresh')->name('refresh');
        Route::get('recover', 'ClientController@recoverData')->name('recover');


        // SERVICE
        Route::name('services.')->group(function(){
            Route::resource('services', 'ServiceController');
        });





        Route::put('schedule/client', 'ClientController@makeScheduleByClient');
        Route::resource('schedules', 'PossibleScheduleController');
        Route::resource('scheduledTime/professional', 'ScheduleProfessionalController');

    });




});
