<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PremierResource;
use App\Models\Premier;
use Illuminate\Http\Request;

//     $table->id();
//            $table->string('first_week');
//            $table->string('city');
//            $table->string('format');
//            $table->unsignedBigInteger('premier_id');
//            $table->foreign('premier_id')->references('id')->on('premier_types');
//            $table->timestamps();
class PremierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premiers = Premier::all();
        return PremierResource::collection($premiers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $premiers= Premier::create([
           'first_week'=>$request->first_week,
           'city'=>$request->city,
           'premier_id'=>$request->premier_id,
        ]);
        return new PremierResource($premiers);
    }

    /**
     * Display the specified resource.
     */
    public function show(Premier $premier)
    {
        return new PremierResource($premier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Premier $premier)
    {
        $premier->update([
           'first_week'=>$request->first_week,
           'city'=>$request->city,
           'premier_id'=>$request->premer_id,
        ]);
        return new PremierResource($premier);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Premier $premier)
    {
        $premier->delete();
        return response()->json([
         "data"=>$premier,
            "message"=>"Premier has been deleted",
            'status'=>200
        ]);
    }
}
