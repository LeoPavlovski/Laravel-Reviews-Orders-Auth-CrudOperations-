<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Review;
use App\Models\STATUS;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
//  Testing queries

        $query = $request->input('query');

        $books = Book::where('title', 'like', "%$query%")
        ->orWhereHas('author', function($authorQuery) use($query){
           $authorQuery->where('name', 'like', "%$query%");
        })->get();

        $authors = Author::where('name', 'like', "%$query%")->get();
        $genres = Genre::where('name', 'like', "%$query%")->get();
        //Or if u want to find all of the grades of the reviews
        $grades = Review::where('grade', 'like', "%$query%")->get();
        $reviews = Review::where('description','like',"%$query%")->get();

        return response()->json([
            'books' => $books,
            'authors' => $authors,
            'genres'=>$genres,
            'reviews'=>$reviews,
        ]);
    }
}
