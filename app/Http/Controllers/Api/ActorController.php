<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all, [
            //Testing for the creation of the actors.
            'name' => 'required|max:20|string|unique:actors',
            'nickname' => 'required|max:20|unique:actors',
            'date_of_birth' => 'required|max:20',
            'agent_id' => 'required|max:20|integer'
        ]);

        if ($validator->fails()) {
            //display the errors
            return response()->json([
                'errors' => $validator->errors()
            ]);
        } else if ($validator->passes()) {
            $actor = Actor::create([
                "name" => $request->name,
                "nickname" => $request->nickname,
                "date_of_birth" => $request->date_of_birth,
                "agent_id" => $request->agent_id,
            ]);
            return response()->json([
                'data' => new ActorResource($actor),
                'message' => 'Actor Has Been Created!',
                'status' => 200
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $actorId)
    {
        $actor = Actor::find($actorId);
        //i can use pluck for everything to make the validation even better.
        $actorNumbers =Actor::pluck('id')->toArray();
        $actorNames =Actor::pluck('name')->toArray();
        if (!$actor) {
            return response()->json([
                'message' => 'Actor Doesnt exist!',
                'message2'=>"Pick a number from the data object",
                'data'=>$actorNumbers,
                'data2'=>$actorNames
            ]);
        }
        //check the actor numbers

        $validator = Validator
            ::make(['actor_id' => $actor->id],
                ['actor_id' => 'required|integer']
            );
        if ($validator->fails()) {
            //Failed Validator display errors
            return response()->json([
               'errors'=>$validator->errors()
            ]);
        } else
            return response()->json([
                'data' => new ActorResource($actor),
                'status' => 200,
                'message' => 'Validator Passed1!'
            ]);
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
