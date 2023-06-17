<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DirectorResource;
use App\Models\Director;
use Illuminate\Http\Request;
//     $table->id();
//            $table->string('name');
//            $table->string('surname');
//            $table->string('expertise');
//            $table->string('genre');
//            $table->timestamps();
class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directors = Director::all();
        return DirectorResource::collection($directors);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $directors = Director::create([
           'name'=>$request->name,
           'surname'=>$request->surname,
           'expertise'=>$request->expertise,
           'genre'=>$request->genre
        ]);
        return new DirectorResource($directors);
    }

    /**
     * Display the specified resource.
     */
    public function show(Director $director)
    {
        return new DirectorResource($director);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        $director->update([
          'name'=>$request->name,
          'surname'=>$request->surname,
          'expertise'=>$request->expertise,
          'genre'=>$request->genre
        ]);
        return new DirectorResource($director);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        $director->delete();
        return response()->json([
           'Director Deleted'
        ]);
    }
}
