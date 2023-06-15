<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BlogUserController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
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
//Middleware
Route::middleware('auth:sanctum')->group(function(){
Route::get('/getUsers',[UserController::class , 'index']);
Route::get('/getUser/{user}',[UserController::class , 'show']);
Route::post('/createUser',[UserController::class , 'store']);
Route::put('/editUser/{user}',[UserController::class , 'update']);
Route::delete('/deleteUser/{user}',[UserController::class, 'destroy']);

    Route::get('/getBlogs',[BlogController::class , 'index']);
    Route::get('/getBlog/{blog}',[BlogController::class , 'show']);
    Route::post('/createBlog',[BlogController::class , 'store']);
    Route::put('/editBlog/{blog}',[BlogController::class , 'update']);
    Route::delete('/deleteBlog/{blog}',[BlogController::class, 'destroy']);

    Route::get('/getRoles',[Rolecontroller::class , 'index']);
    Route::get('/getRole/{role}',[Rolecontroller::class , 'show']);
    Route::post('/createRole',[Rolecontroller::class , 'store']);
    Route::put('/editRole/{role}',[Rolecontroller::class , 'update']);
    Route::delete('/deleteRole/{role}',[Rolecontroller::class, 'destroy']);

    Route::get('/getBlogsUsers',[BlogUsercontroller::class , 'index']);
    Route::get('/getBlogUser/{blogUser}',[BlogUsercontroller::class , 'show']);
    Route::post('/createBlogUser',[BlogUsercontroller::class , 'store']);
    Route::put('/editBlogUser/{blogUser}',[BlogUsercontroller::class , 'update']);
    Route::delete('/deleteBlogUser/{blogUser}',[BlogUsercontroller::class, 'destroy']);
});
Route::post('/auth/login',[AuthenticationController::class, 'loginUser']);
Route::post('/auth/register',[AuthenticationController::class, 'registerUser']);
