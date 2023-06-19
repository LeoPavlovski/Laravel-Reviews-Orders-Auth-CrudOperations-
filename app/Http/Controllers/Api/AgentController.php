<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgentResource;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

//   Schema::create('agents', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->string('code');
//            $table->timestamps();
//        });

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Test if we have agents in the table.
        $agents = Agent::all();
        if($agents->isEmpty()){
            return response()->json([
               'message'=>"No Data Found in Agents Table"
            ]);
        }
        return AgentResource::collection($agents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validate the name,code
        $validator = Validator::make($request->all(), [
            //validate here
            'name' => 'required|string|max:20|',
            //Code needs to be 10 characters even
            'code' => 'required|string|max:10|min:10|unique:agents,code'
        ]);
        if ($validator->fails()) {
            return response()->json([
                //display errors
                "errors" => $validator->errors()
            ]);
        }
        if ($validator->passes()) {
            $agents = Agent::create([
                'name' => $request->name,
                'code' => $request->code,
            ]);
            return response()->json([
                'message' => 'Agent created!',
                'data' => new AgentResource($agents)
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,$agentId)
    {
        $agent = Agent::find($agentId);
        //i can use pluck for everything to make the validation even better.
        //Testing for route ROUTE::get('getActor/1')
        $agentNumbers =Agent::pluck('id')->toArray();
        $agentName =Agent::pluck('name')->toArray();
        //If actor doesn't exist

            if (!$agent) {
            return response()->json([
                'message' => 'Agent Doesnt exist!',
                'message2'=>"Pick a number from the data object",
                'data'=>$agentNumbers,
                'data2'=>$agentName
            ]);
        }

        //check the actor numbers
        $validator = Validator
            ::make(['agent_id' => $agent->id],
                ['agent_id' => 'required|integer']
            );
        if ($validator->fails()) {
            //Failed Validator display errors
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        } else
            return response()->json([
                'data' => new AgentResource($agent),
                'status' => 200,
                'message' => 'Validator Passed1!'
            ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $agentId)
    {
        //TODO check if the id is the same.
        //make validation for the update function
        $agent = Agent::find($agentId);
        $agents = Agent::pluck('id')->toArray();
        $validator = Validator::make($request->all(),
        [
           'name'=>'required|max:20|string',
           'code'=>'required|max:10|min:10|string|unique:agents,code'
        ]);
        if(!$agent){
            return response()->json([
                //Agent doesn't exist
                'message'=>'Agent Doesnt exist',
                'message2'=>'Pick some of the names',
                'data'=>$agents
            ]);
        }
        if($validator->fails()){
            return response()->json([
               //Validator fails
                'errors'=>$validator->errors()
            ]);
        }
        else if($validator->passes()){
            $agent->update([
                'name'=>$request->name,
                'code'=>$request->code,
            ]);
            return response()->json([
               'data'=>new AgentResource($agent),
               'message'=>"Agent Updated"
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($agentId)
    {
        $agent = Agent::find($agentId);
        $agentNumber = Agent::pluck('id')->toArray();
        if(!$agent){
            //the agent doesn't exist
            return response()->json([
               'message'=>'Agent Doesnt Exist, Pick an agent from below',
                'data'=>$agentNumber
            ]);
        }
//            $agent->delete();
            return response()->json([
                "message"=>'Are u sure u want to delete this item?',
                "message2"=>"Go to /api/deleteAgent/id",
                'data'=>$agentNumber
            ]);
        }
        public function destroy($agentId){
        //Find the Id of the agent
            $agent = Agent::find($agentId);
            $agentNumber = Agent::pluck('id')->toArray();
            if(!$agent){
                //The agent doesn't exist
                return response()->json([
                   'message'=>"Agent doesn't exist",
                    'data'=>$agentNumber
                ]);
            }
            $agent->delete();
            return response()->json([
               //Delete
                'message'=>"Item Deleted!"
            ]);
        }
}
