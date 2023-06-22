<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Movie;
use App\Models\REPORTED;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use MongoDB\Driver\Query;
use Spatie\QueryBuilder\QueryBuilder;

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

    //    }
    public function query(){
        $query = Review::query();
        $reviews = QueryBuilder::for($query)
        ->allowedFilters('rating','contents','likes','dislikes','votes',
          'reported_status','report_id','user_id','movie_id')
        ->allowedSorts('rating','contents','likes','dislikes','votes',
         'reported_status','report_id','user_id','movie_id')
            ->allowedIncludes('reported','user','movie','movie.director')->get();
        return ReviewResource::collection($reviews);
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
