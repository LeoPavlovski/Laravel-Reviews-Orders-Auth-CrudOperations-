<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieTypeResource;
use App\Models\MovieTypes;
use Illuminate\Http\Request;


// DB::table('movies_types')->insert([
//            [
//               'types'=>MOVIES_TYPES::FILM->name,
//                'id'=>MOVIES_TYPES::FILM->value,
//            ],
//            [
//                'types'=>MOVIES_TYPES::TV_SERIES->name,
//                'id'=>MOVIES_TYPES::TV_SERIES->value,
//            ],
//        ]);
class MovieTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = MovieTypes::all();
        return MovieTypeResource::collection($types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $types = MovieTypes::create([
           'type'=>$request->type,
        ]);
        return new MovieTypeResource($types);
    }

    /**
     * Display the specified resource.
     */
    public function show(MovieTypes $movieType)
    {
        return new MovieTypeResource($movieType);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MovieTypes $movieType)
    {
        $types = MovieTypes::create([
           'type'=>$request->type,
        ]);
        return new MovieTypeResource($types);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MovieTypes $movieType)
    {
        $movieType->delete();
        return response()->json([
           'Item has been deleted'
        ]);
    }
}
