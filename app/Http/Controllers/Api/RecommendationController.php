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
     *  'user_id',
    'text',
    'grade',
    'type'
     */
    public function index()
    {
        $recommendations = Recommendation::all();
        if($recommendations->isEmpty()){
            return response()->json([
               'message'=>'Recommendation is empty'
            ]);
        }
        return RecommendationResource::collection($recommendations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
           'text'=>'required|string|',
            'grade'=>'required|max:5|min:1|integer',
            'type'=>'required|integer|max:5',
            'user_id'=>'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
               'errors'=>$validator->errors(),
            ]);
        }
         else if($validator->passes()){
            $recommendations = Recommendation::create([
                'text'=>$request->text,
                'grade'=>$request->grade,
                'type'=>$request->type,
                'user_id'=>$request->user_id
            ]);
            return response()->json([
               'message'=>'validator passed',
               'data'=> new RecommendationResource($recommendations)
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , $recommendationId)
    {
        //Check about the recommendations number
        $recommendation = Recommendation::find($recommendationId);
        $recommendationIds = Recommendation::pluck('id')->toArray();
        if(!$recommendation){
            return response()->json([
               'message'=>'Parameter doesnt exist. Pick from the Recommendation ids',
                'data'=>$recommendationIds,
            ]);
         }
            return response()->json([
               'message'=>'Object Found',
               'data'=> new RecommendationResource($recommendation)
            ]);


//        else if($recommendationValidator->passes()){
//            return response()->json([
//                'data'=>new RecommendationResource($recommendation),
//                'message'=>'Validator Passed'
//            ]);
//        }
        //show the recommendation
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $recommendationIds)
    {
        $recommendation = Recommendation::find($recommendationIds);
        $recommendationIds =Recommendation::pluck('id')->toArray();
        if(!$recommendation){
            return response()->json([
               'message'=>'The parameter doesnt exist. Choose from the following ids',
               'data'=>$recommendationIds
            ]);
        }
        $validator = Validator::make($request->all(),[
            'text'=>'required|string|',
            'grade'=>'required|max:5|min:1|integer',
            'type'=>'required|integer|max:5',
            'user_id'=>'required|integer'
        ]);
        if($validator->fails()){
            return response()->json([
               'message'=>'Validator failed',
               'errors'=>$validator->errors(),
            ]);
        }
        else if($validator->passes()){

           $recommendation->update([
                'text'=>$request->text,
                'grade'=>$request->grade,
                'type'=>$request->type,
                'user_id'=>$request->user_id
            ]);
            return response()->json([
               'message'=>'Validator Passed',
                'data'=>new RecommendationResource($recommendation)
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($recommendationId)
    {
        $recommendation = Recommendation::find($recommendationId);
        $recommendationText = Recommendation::pluck('text')->toArray();
        $recommendationType = Recommendation::pluck('type')->toArray();
        $recommendationUser = Recommendation::pluck('user_id')->toArray();
        if(!$recommendation){
            return response()->json([
                'text'=>$recommendationText,
                'type'=>$recommendationType,
                'user'=>$recommendationUser
            ]);
        }
        $recommendation->delete();
        return response()->json([
           'message'=>'Item has been deleted'
        ]);
    }
}
