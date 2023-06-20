<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AppointmentUsersController;
use App\Http\Controllers\Api\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function (){
    //ADMIN
    Route::delete('/deleteAppointment/{appointment}',[AppointmentController::class, 'destroy']);
    Route::post('/createAppointment',[AppointmentController::class ,'store']);
    Route::put('/updateAppointment/{appointment}',[AppointmentController::class ,'update']);
    Route::get('/getAppointments', [AppointmentController::class, 'index']);
    Route::get('/getAppointment/{appointment}', [AppointmentController::class, 'show']);
    //USER
    Route::delete('/deleteAppointmentUser/{appointment}',[AppointmentUsersController::class, 'destroy']);
    Route::post('/createAppointmentUser',[AppointmentUsersController::class ,'store']);
    Route::put('/updateAppointmentUser/{appointment}',[AppointmentUsersController::class ,'update']);
    Route::get('/getAppointmentsUser', [AppointmentUsersController::class, 'index']);
    Route::get('/getAppointmentUser/{appointment}', [AppointmentUsersController::class, 'show']);

});

Route::post('/auth/register', [AuthenticationController::class , 'register']);
Route::post('/auth/login', [AuthenticationController::class , 'login']);
