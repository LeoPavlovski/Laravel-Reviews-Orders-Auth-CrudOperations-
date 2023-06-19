<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        if($films->isEmpty()){
            return response()->json([
               'message'=>'films empty'
            ]);
        }
        return response()->json([
            "data" => FilmResource::collection($films),
            "status"=>200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'premier_week'=>'required|string|unique:films,premier_week',
            'city'=>'required|string',
            'formats'=>'required|string',
            'oscar_id'=>'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
               //validator failed
                'message'=>'Validator Failed',
                'errors'=>$validator->errors()
            ]);
        }
        else if($validator->passes()){
            $films = Film::create([
                'premier_week'=>$request->premier_week,
                'city'=>$request->city,
                'formats'=>$request->formats,
                'oscar_id'=>$request->oscar_id,
            ]);
            return response()->json([
            'data'=> new FilmResource($films),
            'message'=>'film added successfully'
            ]);
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Request $request, $filmId)
    {
        //TODO get the id, check if it exists
        $film = Film::find($filmId);
        if(!$film){
            return response()->json([
               //this is not valid
                'error'=>'Film doesnt exist'
            ]);
        }
        $validator = Validator::make($request->all(),[
           ['film_id'=>$filmId],
           ['film_id'=>'required|integer']
        ]);
        if($validator->fails()){
            return response()->json([
                'error'=>$validator->fails()
            ]);
        }
        else if($validator->passes()){
            //this passed.
            return response()->json([
              'data'=>  new FilmResource($film),
                'message'=>'validator passed'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $film ->update([
            'premier_week'=>$request->premier_week,
            'city'=>$request->city,
            'formats'=>$request->formats,
            'oscar_id'=>$request->oscar_id,
        ]);
        return new FilmResource($film);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return response()->json([
           "Film Deleted"
        ]);
    }
}
