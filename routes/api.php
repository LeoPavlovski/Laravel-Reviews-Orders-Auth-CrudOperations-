<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\AuthenticationControllerModerator;
use App\Http\Controllers\Api\AuthenticationControllerUser;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\GenreController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RecommendationController;
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

Route::middleware(['auth:sanctum','api.throttle:10,1'])->group(function(){
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
//Authors
    Route::get('/getAuthors' , [AuthorController::class , 'index']);
    Route::post('/createAuthor' , [AuthorController::class , 'store']);
    Route::get('/getAuthor/{author}',[AuthorController::class, 'show']);
    Route::delete('/deleteAuthor/{author}',[AuthorController::class, 'destroy']);
    Route::put('/editAuthor/{author}',[Authorcontroller::class, 'update']);
//Genres
    Route::get('/getGenres' , [Genrecontroller::class , 'index']);
    Route::post('/createGenre' , [Genrecontroller::class , 'store']);
    Route::get('/getGenre/{genre}',[Genrecontroller::class, 'show']);
    Route::delete('/deleteGenre/{genre}',[Genrecontroller::class, 'destroy']);
    Route::put('/editGenre/{genre}',[Genrecontroller::class, 'update']);
//Books
    Route::get('/getBooks' , [BookController::class , 'index']);
    Route::get('/getBooks2' , [BookController::class , 'index2']);

    Route::post('/createBook' , [BookController::class ,'store']);
    Route::get('/getBook/{book}',[BookController::class, 'show']);
    Route::delete('/deleteBook/{book}',[BookController::class, 'destroy']);
    Route::put('/editBook/{book}',[BookController::class, 'update']);
});
//Register / Login
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

//Recommendations No Authentication
Route::get('/getRecommendations',[RecommendationController::class, 'index']);
Route::post('/createRecommendation',[RecommendationController::class, 'store']);
Route::get('/getRecommendation/{recommendation}',[RecommendationController::class , 'show']);
Route::delete('/deleteRecommendation/{recommendation}',[RecommendationController::class, 'destroy']);
Route::put('/editRecommendation/{recommendation}',[RecommendationController::class, 'update']);


Route::get('/getBooksQuery', [BookController::class ,'queries']);
Route::get('/getOrdersQuery',[OrderController::class,'queries']);
Route::get('/getGenresQuery',[GenreController::class, 'queries']);
Route::get('/getRolesQuery',[RolesController::class, 'queries']);
Route::get('/getWishListsQuery',[WishlistController::class,'queries']);
Route::get('/getAuthorsQuery', [AuthorController::class, 'queries']);
Route::get('/getCouponsQuery',[CouponController::class,'queries']);
Route::get('/getRecommendationsQuery', [RecommendationController::class,'queries']);
Route::get('/getReviewQuery',[ReviewController::class , 'queries']);





