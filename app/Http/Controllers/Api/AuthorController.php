<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Models\ROLES;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Spatie\QueryBuilder\QueryBuilder;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //Get everything from of the books

      $authors = Author::query()->paginate(3);
        return AuthorResource::collection($authors);
    }
        public function authorQuery(){
        $query=QueryBuilder::for(Author::class)
            ->allowedFilters('name','biography')->get();
        return response()->json([
            $query
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        //store it in database (POST)
        $authors = Author::create([
           "name"=>$request->name,
            "biography"=>$request->biography,
        ]);
        return new AuthorResource($authors);
    }
    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //Show the id of the author. // we can just return the model class.
        return new AuthorResource($author);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author ->update([
            "name"=>$request->name,
            "biography"=>$request->name,
        ]);
        return new AuthorResource($author);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //Delete the element
        $author ->delete();
       return response()->json([
          "the Author has been deleted"
       ]);
    }

}
