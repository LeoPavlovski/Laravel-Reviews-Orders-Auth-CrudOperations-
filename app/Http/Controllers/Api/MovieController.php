<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        if($movies->isEmpty()){
            return response()->json([
               //Movies are empty
                "message"=>'Movies are empty'
            ]);
        }
        return MovieResource::collection($movies);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validator =Validator::make($request->all(),[
           'name'=>'required|max:20|string|unique:movies,name',
           'director_id'=>'required|integer',
            'salary'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
               'message'=>$validator->errors()
            ]);
        }
        if($validator->passes()){
            $movies = Movie::create([
                    'name'=>$request->name,
                    'director_id'=>$request->director_id,
                    'salary'=>$request->salary
                ]
            );
            return response()->json([
                'data'=>new MovieResource($movies),
                'message'=>"Movie Added"
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($movieId, Request $request)
    {
        $movie =Movie::find($movieId);
        if(!$movie){
            //that movie doesn't exist
            return response()->json([
               'message'=>'that movie doesnt exist'
            ]);
        }
        //show the validator.
        $validator = Validator::make($request->all(),[
           //test the validation here, what do we want to validate.
            ['movie_id'=>$movieId],
            ['movie_id'=>'required|integer']
        ]);
        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }
        else if($validator->passes()) {
            return response()->json([
                'message' => 'Validator Passed',
                'data' => new MovieResource($movie)
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $movieId)
    {
        //TODO check the id, check if the validator passed or failed.

        $movie=Movie::find($movieId);
        $movieIds = Movie::pluck('id')->toArray();
        if(!$movie){
            //If the movie doesn't exist
            response()->json([
                'message'=>'Movie doesnt exist',
                'data that we have available : '=>$movieIds
            ]);
        }
        $validator = Validator::make($request->all(),[
           'name'=>'max:15|required|string',
           'director_id'=>'integer|required',
           'salary'=>'required'
        ]);
        if($validator->fails()){
            //if this fails
            return response()->json([
               'message'=>'The validator failed',
            ]);
        }
        else if($validator->passes()){
            $movie->update([
                'name'=>$request->name,
                'director_id'=>$request->director_id,
                'salary'=>$request->salary
            ]);
            return response()->json([
               //Return something here.
                'message'=>'Movie updated.',
                'data'=> new MovieResource($movie)
            ]);
        }
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
