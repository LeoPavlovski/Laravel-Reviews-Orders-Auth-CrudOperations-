<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\AuthenticationControllerModerator;
use App\Http\Controllers\Api\AuthenticationControllerUser;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PromotionController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\RolesController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\WishlistController;
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

Route::middleware('auth:sanctum')->group(function(){
//When admin promotes
    Route::put('/authUser/admin/{user}',[AuthenticationController::class, 'authenticateUser']);
    Route::put('/authMod/admin/{user}',[AuthenticationController::class, 'authenticateModerator']);
    Route::put('/authAdmin/admin/{user}',[AuthenticationController::class, 'authenticateAdmin']);
//When Moderator promotes
    Route::put('/authUser/mod/{user}',[AuthenticationControllerModerator::class , 'authenticateUser']);
    Route::put('/authMod/mod/{user}',[AuthenticationControllerModerator::class , 'authenticateModerator']);
    Route::put('/authAdmin/mod/{user}',[AuthenticationControllerModerator::class , 'authenticateAdmin']);
//When user promotes
    Route::put('/authUser/user/{user}',[AuthenticationControllerUser::class , 'authenticateUser']);
    Route::put('/authMod/user/{user}',[AuthenticationControllerUser::class , 'authenticateModerator']);
    Route::put('/authAdmin/user/{user}',[AuthenticationControllerUser::class , 'authenticateAdmin']);
//Orders
    Route::get('/getOrders',[OrderController::class, 'index']);
    Route::get('/getOrder/{uuid}', [OrderController::class, 'show']);
    Route::post('/createOrder', [OrderController::class ,'store']);

// Reviews
    Route::get('/getReviews',[ReviewController::class,'index']);
    Route::post('/createReview',[ReviewController::class, 'store']);
    Route::get('/getReview/{review}',[ReviewController::class ,'show']);
    Route::put('/updateReview/{review}',[ReviewController::class, 'update']);
    Route::delete('/deleteReview/{review}',[ReviewController::class, 'destroy']);

//Wishlists

    Route::get('/getWishlists',[WishlistController::class,'index']);
    Route::post('/createWishlist',[WishlistController::class, 'store']);
    Route::get('/getWishlist/{wishlist}',[WishlistController::class ,'show']);
    Route::put('/updateWishlist/{wishlist}',[WishlistController::class, 'update']);
    Route::delete('/deleteWishlist/{wishlist}',[WishlistController::class, 'destroy']);



    Route::get('/getAuthors' , [AuthorController::class , 'index']);
    Route::post('/createAuthor' , [AuthorController::class , 'store']);
    Route::get('/getAuthor/{author}',[AuthorController::class, 'show']);
    Route::delete('/deleteAuthor/{author}',[AuthorController::class, 'destroy']);
    Route::put('/editAuthor/{author}',[Authorcontroller::class, 'update']);

    Route::get('/getGenres' , [Genrecontroller::class , 'index']);
    Route::post('/createGenre' , [Genrecontroller::class , 'store']);
    Route::get('/getGenre/{genre}',[Genrecontroller::class, 'show']);
    Route::delete('/deleteGenre/{genre}',[Genrecontroller::class, 'destroy']);
    Route::put('/editGenre/{genre}',[Genrecontroller::class, 'update']);

    Route::get('/getBooks' , [BookController::class , 'index']);
    Route::post('/createBook' , [BookController::class ,'store']);

    Route::get('/getBook/{book}',[BookController::class, 'show']);
    Route::delete('/deleteBook/{book}',[BookController::class, 'destroy']);
    Route::put('/editBook/{book}',[BookController::class, 'update']);

   //If the user is a admin , or moderator he can have access to routes.

    Route::post('/createRole/admin', [AuthenticationController::class, 'adminAuthentication']);
});

Route::post('/auth/login',[AuthenticationController::class, 'loginUser']);
Route::post('/auth/register',[AuthenticationController::class, 'registerUser']);

//ROLES
Route::get('/listRoles',[RolesController::class, 'index']);
Route::get('/listRole/{role}',[RolesController::class, 'show']);

//Search

Route::get('/search',[SearchController::class,'search']);

//Promotions

Route::get('/getCoupons',[CouponController::class, 'index']);
Route::post('/createCoupon' , [CouponController::class , 'store']);
Route::get('/getCoupon/{coupon}',[CouponController::class, 'show']);
Route::delete('/deleteCoupon/{coupon}',[CouponController::class, 'destroy']);
Route::put('/editCoupon/{coupon}',[CouponController::class, 'update']);

