<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Display the books
        $books= Book::all();
        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $books = Book::create([
           "title"=>$request->title,
            "ISBN"=>$request->ISBN,
            "publication_year"=>$request->publication_year,
            "year"=>$request->year,
            "price"=>$request->price,
            "author_id"=>$request->author_id,
            "genre_id"=>$request->genre_id
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
            "publication_year"=>$request->publication_year,
            "year"=>$request->year,
            "price"=>$request->price,
            "author_id"=>$request->author_id,
            "genre_id"=>$request->genre_id
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
