<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Illuminate\Http\Request;
//$table->string('premier_week');
//            $table->string('city');
//            $table->string('formats');
//            $table->unsignedBigInteger('oscar_id');
//            $table->foreign('oscar_id')->references('id')->on('oscars');
//            $table->timestamps();

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return response()->json([
            "data" =>new FilmResource($films),
            "status"=>200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $films = Film::create([
           'city'=>$request->city,
           'formats'=>$request->formats,
           'oscar_id'=>$request->oscar_id,
        ]);
        return new FilmResource($films);
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        return new FilmResource($film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $films = Film::create([
            'city'=>$request->city,
            'formats'=>$request->formats,
            'oscar_id'=>$request->oscar_id,
        ]);
        return new FilmResource($films);
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
