<?php

use App\Http\Controllers\Api\ActorController;
use App\Http\Controllers\Api\ActorMovieController;
use App\Http\Controllers\Api\AdminPromotesController;
use App\Http\Controllers\Api\FleeceController;
use App\Http\Controllers\Api\ModeratorController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\AgentController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\DirectorController;
use App\Http\Controllers\Api\FilmsController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\MovieTypesController;
use App\Http\Controllers\Api\OscarController;
use App\Http\Controllers\Api\PremierController;
use App\Http\Controllers\Api\PremierTypeController;
use App\Http\Controllers\Api\TvSerieController;
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

Route::middleware(['auth:sanctum','api.throttle:10,1'])->group( function (){
    Route::get('/getActors',[ActorController::class,'index']);
    Route::get('/getActor/{actor}',[ActorController::class,'show']);
    Route::post('/createActor',[ActorController::class,'store']);
    Route::put('/updateActor/{actor}',[ActorController::class,'update']);
    Route::delete('/deleteActor/{actor}',[ActorController::class,'destroy']);
//TODO fix the actor movies, because we don't have a id in the migration.
    Route::get('/getActorMovies',[ActorMovieController::class,'index']);
    Route::get('/getActorMovie/{actor_movie}',[ActorMovieController::class,'show']);
    Route::post('/createActorMovie',[ActorMovieController::class,'store']);
    Route::put('/updateActorMovie/{actor_movie}',[ActorMovieController::class,'update']);
    Route::delete('/deleteActorMovie/{actor_movie}',[ActorMovieController::class,'destroy']);

//Tested : Works.
    Route::get('/getAgents',[AgentController::class,'index']);
    Route::get('/getAgent/{agent}',[AgentController::class,'show']);
    Route::post('/createAgent',[AgentController::class,'store']);
    Route::put('/updateAgent/{agent}',[AgentController::class,'update']);
    Route::delete('/deleteAgent/{agent}',[AgentController::class,'destroy']);
    //New

    Route::delete('/deleteAgentConfirmation/{agent}',[AgentController::class,'confirmDelete']);

    Route::get('/getDirectors',[DirectorController::class,'index']);
    Route::get('/getDirector/{director}',[DirectorController::class,'show']);
    Route::post('/createDirector',[DirectorController::class,'store']);
    Route::put('/updateDirector/{director}',[DirectorController::class,'update']);
    Route::delete('/deleteDirector/{director}',[DirectorController::class,'destroy']);

    Route::get('/getFilms',[FilmsController::class,'index']);
    Route::get('/getFilm/{film}',[FilmsController::class,'show']);
    Route::post('/createFilm',[FilmsController::class,'store']);
    Route::put('/updateFilm/{film}',[FilmsController::class,'update']);
    Route::delete('/deleteFilm/{film}',[FilmsController::class,'destroy']);

    Route::get('/getMovies',[MovieController::class,'index']);
    Route::get('/getMovie/{movie}',[MovieController::class,'show']);
    Route::post('/createMovie',[MovieController::class,'store']);
    Route::put('/updateMovie/{movie}',[MovieController::class,'update']);
    Route::delete('/deleteMovie/{movie}',[MovieController::class,'destroy']);

    Route::get('/getOscars',[OscarController::class,'index']);
    Route::get('/getOscar/{oscar}',[OscarController::class,'show']);
    Route::post('/createOscar',[OscarController::class,'store']);
    Route::put('/updateOscar/{oscar}',[OscarController::class,'update']);
    Route::delete('/deleteOscar/{oscar}',[OscarController::class,'destroy']);

    Route::get('/getPremiers',[PremierController::class,'index']);
    Route::get('/getPremier/{premier}',[PremierController::class,'show']);
    Route::post('/createMoviePremier',[PremierController::class,'store']);
    Route::put('/updateMoviePremier/{premier}',[PremierController::class,'update']);
    Route::delete('/deleteMovieType/{premier}',[PremierController::class,'destroy']);

    Route::get('/getPremierTypes',[PremierTypeController::class,'index']);
    Route::get('/getPremierType/{premierTypes}',[PremierTypeController::class,'show']);
    Route::post('/createPremierType',[PremierTypeController::class,'store']);
    Route::put('/updatePremierType/{premierTypes}',[PremierTypeController::class,'update']);
    Route::delete('/deletePremierType/{premierTypes}',[PremierTypeController::class,'destroy']);

    Route::get('/getMovieTypes',[MovieTypesController::class,'index']);
    Route::get('/getMovieType/{movieType}',[MovieTypesController::class,'show']);
    Route::post('/createMovieType',[MovieTypesController::class,'store']);
    Route::put('/updateMovieType/{movieType}',[MovieTypesController::class,'update']);
    Route::delete('/deletemovietype/{movieType}',[MovieTypesController::class,'destroy']);


    Route::get('/getTVS',[TVSerieController::class,'index']);
    Route::post('/createTV',[TvSerieController::class,'store']);
    Route::get('/getTv/{tv}',[TvSerieController::class,'show']);
    Route::put('/updateTv/{tv}',[TvSerieController::class,'update']);
    Route::delete('/deleteTv/{tv}',[TvSerieController::class,'destroy']);

    //Getting the roles
    //Not everyone can do this. (only if the user is admin)
    Route::get('/getRoles',[RoleController::class, 'index']);
    Route::get('/getRole/{role}',[RoleController::class, 'show']);
    Route::post('/createRole',[RoleController::class,'store']);
    Route::put('/editRole/{role}',[RoleController::class,'update']);
    Route::delete('/deleteRole/{role}',[RoleController::class,'destroy']);

    //When Admin Promotes
    Route::put('/admin/promote/user/to/admin/{user}',[AdminPromotesController::class, 'PromotingUserToAdmin']);
    Route::put('/admin/promote/moderator/to/admin/{user}',[AdminPromotesController::class, 'PromotingModeratorToAdmin']);
    Route::put('/admin/promote/user/to/moderator/{user}',[AdminPromotesController::class,'PromotingUserToModerator']);
    //When Admin Demotes
    Route::put('/admin/downgrade/admin/to/moderator/{user}',[AdminPromotesController::class, 'DemotingAdminToModerator']);
    Route::put('/admin/downgrade/admin/to/user/{user}',[AdminPromotesController::class, 'DemotingAdminToUser']);
    Route::put('/admin/downgrade/moderator/to/user/{user}',[AdminPromotesController::class,'DemotingModeratorsToUsers']);

    //When Moderator Promotes=
    Route::put('/moderator/promote/user/to/moderator/{user}',[ModeratorController::class, 'PromoteUserToModerator']);
    //When Moderator Downgrades
    Route::put('/moderator/downgrade/moderator/to/user/{user}',[ModeratorController::class,'DemotingModeratorToUser']);

    /**
        Make Some message that the users, can't promote
     **/

});
//Register and Login
Route::post('/auth/register', [AuthenticationController::class, 'register']);
Route::post('/auth/login', [AuthenticationController::class ,'login']);

//Queries

Route::get('Director/Query', [DirectorController::class ,'queries']);
Route::get('Actor/Query',[ActorController::class,'query']);
Route::get('/ActorMovie/Query',[ActorMovieController::class,'query']);
Route::get('/Agent/Query',[AgentController::class,'query']);
Route::get('/Film/Query',[FilmsController::class,'query']);

//Reported

Route::get('/getReports',[ReportController::class,'index']);
Route::get('/getReport/{report}',[ReportController::class,'show']);
Route::post('/createReport',[ReportController::class,'store']);
Route::put('/updateReport/{report}',[ReportController::class,'update']);
Route::delete('/deleteReport/{report}',[ReportController::class,'destroy']);

//Reviews

Route::get('/getReviews',[ReviewController::class,'index']);
Route::get('/getReview/{review}',[ReviewController::class,'show']);
Route::post('/createReview',[ReviewController::class,'store']);
Route::put('/updateReview/{review}',[ReviewController::class,'update']);
Route::delete('/deleteReview/{review}',[ReviewController::class,'destroy']);



