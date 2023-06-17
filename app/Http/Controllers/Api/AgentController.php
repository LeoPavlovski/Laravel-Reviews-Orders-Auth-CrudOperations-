<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgentResource;
use App\Models\Agent;
use Illuminate\Http\Request;

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
        $agents = Agent::all();
        return AgentResource::collection($agents);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $agents = Agent::create([
           'name'=>$request->name,
           'code'=>$request->code,
        ]);
        return new AgentResource($agents);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agent $agent)
    {
        return new AgentResource($agent);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Agent $agent)
    {
        $agent->update([
           'name'=>$request->name,
           'code'=>$request->code,
        ]);
        return new AgentResource($agent);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return response()->json([
           "Item Deleted!"
        ]);
    }
}
