<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;

// $table->id();
//            $table->string('name');
//            $table->string('nickname');
//            $table->date('date_of_birth');
//            $table->unsignedBigInteger('agent_id');
//            $table->foreign('agent_id')->references('id')->on('agents');
//            $table->timestamps();
class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actor = Actor::all();
        return ActorResource::collection($actor);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $actor= Actor::create([
           "name"=>$request->name,
           "nickname"=>$request->nickname,
           "date_of_birth"=>$request->date_of_birth,
           "agent_id"=>$request->agent_id,
        ]);
        return new ActorResource($actor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Actor $actor)
    {
        return new ActorResource($actor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Actor $actor)
    {
        $actor->update([
           "name"=>$request->name,
           "nickname"=>$request->nickname,
           "date_of_birth"=>$request->date_of_birth,
           "agent_id"=>$request->agent_id,
        ]);
        return new ActorResource($actor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Actor $actor)
    {
        $actor->delete();
        return response()->json([
           "Item Has been deleted"
        ]);
    }
}
