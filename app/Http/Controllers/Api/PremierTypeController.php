<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PremierResource;
use App\Http\Resources\PremierTypeResource;
use App\Models\PremierTypes;
use Illuminate\Http\Request;
// $table->string('types');
class PremierTypeController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premiers = PremierTypes::all();
        return PremierTypeResource::collection($premiers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $premiers= PremierTypes::create([
            'types'=>$request->type,
        ]);
        return new PremierTypeResource($premiers);
    }

    /**
     * Display the specified resource.
     */
    public function show(PremierTypes $premierTypes)
    {
        return new PremierTypeResource($premierTypes);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PremierTypes $premierTypes)
    {
        $premierTypes= PremierTypes::create([
            'types'=>$request->type,
        ]);
        return new PremierTypeResource($premierTypes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PremierTypes $premierTypes)
    {
        $premierTypes->delete();

    }
}
