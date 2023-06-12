<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        //Display the books
        $books= Genre::all();
        return GenreResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        $books = Genre::create([
            "title"=>$request->title,
            "ISBN"=>$request->ISBN,
            "publication_year"=>$request->publication_year,
            "year"=>$request->year,
            "price"=>$request->price,
            "author_id"=>$request->author_id,
            "genre_id"=>$request->genre_id
        ]);
        return new GenreResource($books);
    }

    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        return new GenreResource($genre);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update([
            "title"=>$request->title,
            "ISBN"=>$request->ISBN,
            "publication_year"=>$request->publication_year,
            "year"=>$request->year,
            "price"=>$request->price,
            "author_id"=>$request->author_id,
            "genre_id"=>$request->genre_id
        ]);
        return new GenreResource($genre);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json([
            "The book has been deleted"
        ]);
    }
}
