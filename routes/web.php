<?php

use App\Http\Controllers\MailController;
use App\Models\User;
use App\Notifications\InvoiceCreated;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Route::get("/notifications", function (Request $request) {
    $user = User::find(1);
    $user->notify(new InvoiceCreated);
});
