<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *  'rating',
    'contents',
    'likes',
    'dislikes',
    'votes',
    'reported_status',
    'reported_id',
    'user_id',
    'movie_id'
     */
    public function index()
    {
        $review = Review::all();
        return ReviewResource::collection($review);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = Review::create([
           'rating'=>$request->rating,
            'contents'=>$request->contents,
            'likes'=>$request->likes,
            'dislikes'=>$request->dislikes,
            'votes'=>$request->votes,
            'reported_status'=>$request->reported_status,
            'reported_by'=>$request->reported_by,
            'user_id'=>$request->user_id,
            'movie_id'=>$request->movie_id
        ]);
        return new ReviewResource($review);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $review->update([
            'rating'=>$request->rating,
            'contents'=>$request->contents,
            'likes'=>$request->likes,
            'dislikes'=>$request->dislikes,
            'votes'=>$request->votes,
            'reported_status'=>$request->reported_status,
            'reported_by'=>$request->reported_by,
            'user_id'=>$request->user_id,
            'movie_id'=>$request->movie_id
        ]);
        return new ReviewResource($review);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json([
           'message'=>'Review Deleted'
        ]);
    }
}
