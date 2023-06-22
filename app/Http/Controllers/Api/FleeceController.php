<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FleeceResource;
use App\Models\Fleece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FleeceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 400);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);

            $fleece = Fleece::create([
                'image' => $imageName,
            ]);

            return response()->json([
                'message' => 'Fleece created!',
                'data' => [
                    'id' => $fleece->id,
                    'image_url' => asset('storage/images/'.$imageName),
                ],
            ], 201);
        }
    }

    public function destroy($fleeceId)
    {
        $agent = Fleece::find($fleeceId);

        if(!$agent){
            //the agent doesn't exist
            return response()->json([
                'message'=>'You found fleece johnson'
            ]);
        }
        $agent->delete();
        return response()->json([
            "Item Deleted!"
        ]);
    }
}
