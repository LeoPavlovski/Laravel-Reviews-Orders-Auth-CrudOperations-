<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActorResource;
use App\Models\Actor;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\QueryBuilder\QueryBuilder;

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
        //VALIDATION IN ROUTE : Route::get('/api/getActors')
        $actor = Actor::all();
        if($actor->isEmpty()){
            return response()->json([
               //Actors don't exist
                'message'=>'No Data in Actors'
            ]);
        }
        return ActorResource::collection($actor);
    }
    //      'name',
    //      'nickname',
    //      'date_of_birth',
    //      'agent_id',
    public function query(){
        $query = Actor::query();
        $actors = QueryBuilder::for($query)
        ->allowedFilters('name','nickname','date_of_birth','agent_id')
        ->allowedSorts('name','nickname','date_of_birth','agent_id')
        ->allowedIncludes('agent')->get();
        return ActorResource::collection($actors);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        //TODO make more validation ( because we are not getting id from the routes, we dont need to test for ID)
        //TODO test if the actor already exist with the same nickname (it's gonna work with the validator)
        //TODO make command to create the actor in database.
    {
        $validator = Validator::make($request->all(), [
            //Testing for the creation of the actors.
                'name' => 'required|max:20|string|unique:actors,name',
                'nickname' => 'required|max:20|unique:actors,nickname',
                'date_of_birth' => 'required|date_format:Y-m-d',
                'agent_id' => [
                'required',
                'integer',

               Rule::exists('agents', 'id'),
            ]
        ]);
        $agentId = $request->agent_id;
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
                "agent_id" => $agentId
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
        //Testing for route ROUTE::get('getActor/1')
        $actorNumbers =Actor::pluck('id')->toArray();
        $actorNames =Actor::pluck('name')->toArray();
        //If actor doesn't exist
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
     * Update the specified resource in storage..
     * We can send the model instance, but we can also send the ID in the parameter in order to retrieve information about the actor.
     * We can use this to check the data in the model.
     */
    public function update(Request $request, $actorId)
    {
        //Updating Actor
        $validator = Validator::make($request->all(),[
              'name'=>'required|string|max:20',
                'nickname'=>'required|string|max:20|unique:actors,nickname',
                //TODO DO MORE TESTS ABOUT THE DATE(format)
                'date_of_birth'=>'required|date_format:Y-m-d',
                'agent_id'=>'required|integer'
         ]);
        $actor = Actor::find($actorId);
        $actorIds = Actor::pluck('id')->toArray();
        $actorNames = Actor::pluck('name')->toArray();
        if(!$actor){
            //Actor doesnt exist
            return response()->json([
                'message'=>'Actor Doesnt exist try some other number',
                'data'=>$actorIds,
                'actorNames'=>$actorNames
            ]);
        }
            if($validator->fails()){
                //display all of the errors.
                return response()->json([
                   'errors'=>$validator->errors()
                ]);
            }
            else if($validator->passes()){

                $actor->update([
                    "name"=>$request->name,
                    "nickname"=>$request->nickname,
                    "date_of_birth"=>$request->date_of_birth,
                    "agent_id"=>$request->agent_id,
                ]);
                return response()->json([
                   //Validator passed
                  'message'=>'Actor Updated!',
                    'data'=> new ActorResource($actor)
                ]);
            }
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
