<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
//Movie Controller
//$table->string('name');
//            $table->unsignedBigInteger('director_id');
//            $table->foreign('director_id')->references('id')->on('directors');
//            $table->float('salary');
//            $table->timestamps();


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return MovieResource::collection($movies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movies = Movie::create([
            'name'=>$request->name,
                'director_id'=>$request->director_id,
                'salary'=>$request->salary
            ]
        );
        return new MovieResource($movies);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //show the movie
        return new MovieResource($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $movie->update([
           'name'=>$request->name,
           'director_id'=>$request->director_id,
           'salary'=>$request->salary
        ]);
        return new MovieResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json([
           "The Movie has been deleted"
        ]);
    }
}
