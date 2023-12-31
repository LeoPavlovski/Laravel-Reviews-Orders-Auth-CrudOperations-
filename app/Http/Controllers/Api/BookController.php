<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index2(Request $request)
    {
        $book_pages =$request->book_pages ?? 20;
        $books = Book::query()->paginate($book_pages);
        return BookResource::collection($books);
    }

    public function index()
    {
        $books = Book::all();
        return BookResource::collection($books);
    }
   public function queries(){
        $query = Book::query();
        //Orders need to be fixed
        $books = QueryBuilder::for($query)->allowedIncludes('reviews.user','author','coupons','wishlists','orders','genre')
            ->allowedFilters('title','ISBN','year_of_production','price','year','language','pages')
            ->allowedSorts('title','year_of_production','ISBN','year','price','language','pages')
            ->get();
        return BookResource::collection($books);
   }
   public function query1(){
        $query= Book::query();
        $books = QueryBuilder::for($query)->allowedFilters('pages')
            ->allowedSorts('pages')
            ->allowedIncludes('genre')->get();
        return BookResource::collection($books);
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request , Book $book)
    {
        $validator = Validator::make($request->all(), [
            'ISBN' => 'required|digits:13',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation Error',
                'message' => 'Wrong ISBN number. Please enter exactly 13 digits.'
            ], 422);
        }

        $books = Book::create([
           "title"=>$request->title,
            "ISBN"=>$request->ISBN,
            "year_of_production"=>$request->year_of_production,
            "year"=>$request->year,
            "price"=>$request->price,
            "author_id"=>$request->author_id,
            "genre_id"=>$request->genre_id,
            "language"=>$request->language,
            "pages"=>$request->pages,
            "cover_image"=>$request->cover_image,
            "edition"=>$request->edition
        ]);
        return new BookResource($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return new BookResource($book);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->update([
            "title"=>$request->title,
            "ISBN"=>$request->ISBN,
            "year_of_production"=>$request->year_of_production,
            "year"=>$request->year,
            "price"=>$request->price,
            "author_id"=>$request->author_id,
            "genre_id"=>$request->genre_id,
            "language"=>$request->language,
            "pages"=>$request->pages,
            "cover_image"=>$request->cover_image,
            "edition"=>$request->edition

        ]);
        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
           "The book has been deleted"
        ]);
    }
}
