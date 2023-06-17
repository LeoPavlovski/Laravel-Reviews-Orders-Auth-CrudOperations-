<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TVResource;
use App\Models\Tv;
use Illuminate\Http\Request;
//"tv_channel"=>'telma',
//                'episodes'=>'something',
//                'actor_id'=>1,

class TvSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $series = Tv::all();
        return TVResource::collection($series);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $series = Tv::create([
           'tv_channel'=>$request->tv_channel,
           'episodes'=>$request->episodes,
           'actor_id'=>$request->actor_id
        ]);
        return new TVResource($series);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tv $tv)
    {
        return new TVResource($tv);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tv $tv)
    {
        $tv->update([
            'tv_channel'=>$request->tv_channel,
            'episodes'=>$request->episodes,
            'actor_id'=>$request->actor_id
        ]);
        return new TVResource($tv);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tv $tv)
    {
        $tv->delete();
        return response()->json([
           'Tv Series Deleted'
        ]);
    }
}
