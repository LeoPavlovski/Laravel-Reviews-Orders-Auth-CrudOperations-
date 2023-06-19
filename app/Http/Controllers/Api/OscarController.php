<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OscarResource;
use App\Models\Oscar;
use Illuminate\Http\Request;

//  $table->id();
//            $table->string('role');
//            $table->year('year');
//            $table->unsignedBigInteger('actor_id');
//            $table->foreign('actor_id')->references('id')->on('actors');
//            $table->timestamps();
class OscarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oscars = Oscar::all();
        if($oscars->isEmpty()){
            return response()->json([
                'message'=>'This is empty'
            ]);
        }
        else{
            return OscarResource::collection($oscars);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation for oscars
        //TODO IMPLEMENT THE VALIDATION FOR OSCARS PREMIERS TVSERIES etc (same logic)
        $oscars = Oscar::create([
            'role'=>$request->role,
            'year'=>$request->year,
            'actor_id'=>$request->actor_id,

        ]);
        return new OscarResource($oscars);
    }
    /**
     * Display the specified resource.
     */
    public function show(Oscar $oscar)
    {
        return new OscarResource($oscar);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Oscar $oscar)
    {
        $oscar->update([
           'role'=>$request->role,
           'year'=>$request->year,
           'actor_id'=>$request->actor_id
        ]);
        return new OscarResource($oscar);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Oscar $oscar)
    {
        $oscar->delete();
        return response()->json([
           'Item has been deleted'
        ]);
    }
}
