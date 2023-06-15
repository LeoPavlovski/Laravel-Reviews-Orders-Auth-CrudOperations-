<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\QueryBuilder;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $reviews = Review::query()->paginate(3);
        return ReviewResource::collection($reviews);
    }
    public function queries(){
        $query = Review::query();
        $reviews = QueryBuilder::for($query)->allowedIncludes('user','book')
            ->allowedFilters(['grade','description','subject'])
            ->allowedSorts('grade','description','subject')
            ->get();
        return ReviewResource::collection($reviews);
    }

    /**
     * Store a newly created resource in storage.
     */
//    Validate that the grade of the review must be1/5.


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
           "subject"=>'required|string',
            "description"=>'required|string',
            "grade"=>'required|integer|max:5|min:1',
            'user_id'=>'required|integer',
            'book_id'=>'required|integer'
        ]);
        if($validator->passes()){
            $reviews = Review::create([
                "subject"=>$request->subject,
                "description"=>$request->description,
                "grade"=>$request->grade,
                "user_id"=>$request->user_id,
                "book_id"=>$request->book_id,

            ]);
        }
        else if($validator->fails()){
            return response()->json([
               "errors"=>$validator->errors()
            ]);
        }

           return response()->json([
            "message"=>"Review Has Been created!",
            "data"=> new ReviewResource($reviews),
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //show the element
        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Review $review)
    {
        $validator = Validator::make($request->all(),
        [
           //get the constraints
            "subject"=>"required|string",
            "description"=>"required|string",
            "grade"=>"required|integer|max:5|min:1",
            "user_id"=>"required|integer",
            "book_id"=>"required|integer"
        ]);
        if($validator->passes()){

            $review->update([
                "subject"=>$request->subject,
                "description"=>$request->description,
                "grade"=>$request->grade,
                "user_id"=>$request->user_id,
                "book_id"=>$request->book_id,
            ]);
            return response()->json([
               "message"=>"Validator passed, no issues. Item Updated",
               "data"=>new ReviewResource($review),
            ]);
        }
        else if($validator->fails()){
            return response()->json([
               //when the validator fails
                "errors"=>$validator->errors(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json([
            "The Item has been Deleted!"
        ]);
    }
}
