<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RecommendationResource;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recommendations  = Recommendation::all();
        return RecommendationResource::collection($recommendations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "user_id"=>"required|int",
            "book_id"=>'required|int',
            "recommendation_text"=>'required|string|max:50'
        ]);
        if($validator->fails()){
            //Display the errors
            return response()->json([
                'errors'=>$validator->errors()
            ]);

        }
        if($validator->passes()){
            $recommendations  = Recommendation::create([
                "user_id"=>$request->user_id,
                "book_id"=>$request->book_id,
                "recommendation_text"=>$request->recommendation_text,
            ]);
            return response()->json([
            'status'=>200,
            'data'=>new RecommendationResource($recommendations)
            ]);
        }
        //Store in databas
    }

    /**
     * Display the specified resource.
     */
    public function show(Recommendation $recommendation)
    {
        return new RecommendationResource($recommendation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recommendation $recommendation)
    {
        $validator = Validator::make($request->all(),[
            "user_id"=>"required|int",
            "book_id"=>'required|int',
            "recommendation_text"=>'required|string|max:50'
        ]);
        if($validator->fails()){
            //Display the errors
            return response()->json([
                'errors'=>$validator->errors()
            ]);

        }
        if($validator->passes()){
            $recommendation->update([
                "user_id"=>$request->user_id,
                "book_id"=>$request->book_id,
                "recommendation_text"=>$request->recommendation_text
            ]);
            return response()->json([
                'data'=>new RecommendationResource($recommendation),
                'status'=>200,
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recommendation $recommendation)
    {
        //Delete the elements
        $recommendation->delete();
        return response()->json([
           "The Recommendation has been deleted"
        ]);
    }
}
