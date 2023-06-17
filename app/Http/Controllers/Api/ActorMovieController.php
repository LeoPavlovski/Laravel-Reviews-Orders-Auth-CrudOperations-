<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorMovieResource;
use App\Models\Actor_Movie;
use App\Models\ActorMovie;
use Illuminate\Http\Request;

class ActorMovieController extends Controller

// Schema::create('actor_movie', function (Blueprint $table) {
//           $table->unsignedBigInteger('actor_id');
//           $table->foreign('actor_id')->references('id')->on('actors');
//            $table->unsignedBigInteger('movie_id');
//            $table->foreign('movie_id')->references('id')->on('movies');
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actor_movie = ActorMovie::all();
        return ActorMovieResource::collection($actor_movie);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actor_movie = ActorMovie::create([
           'actor_id'=>$request->actor_id,
           'movie_id'=>$request->movie_id
        ]);
        return new ActorMovieResource($actor_movie);
    }

    /**
     * Display the specified resource.
     */
    public function show(ActorMovie $actorMovie)
    {
        return new ActorMovieResource($actorMovie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ActorMovie $actorMovie)
    {
        $actorMovie->update([
           'actor_id'=>$request->actor_id,
            'movie_id'=>$request->movie_id
        ]);
        return new ActorMovieResource($actorMovie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActorMovie $actorMovie)
    {
        $actorMovie->delete();
        return response()->json([
           "Item has been deleted!"
        ]);
    }
}
