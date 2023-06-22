<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TVResource;
use App\Models\Tv;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

//"tv_channel"=>'telma',
//                'episodes'=>'something',
//                'actor_id'=>1,

class TvSerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * 'tv_channel',
    'episodes',
    'actor_id',
     */
    public function index()
    {
        $series = Tv::all();
        return TVResource::collection($series);
    }
    public function query(){
        $query = Tv::query();
        $tvs = QueryBuilder::for($query)
            ->allowedFilters('tv_channel','episodes','actor_id')
            ->allowedSorts('tv_channel','episodes','actor_id')
            ->allowedIncludes('actor')->get();
        return TVResource::collection($tvs);
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
