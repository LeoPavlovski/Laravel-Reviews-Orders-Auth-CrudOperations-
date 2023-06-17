<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = User::all();
        return UserResource::collection($movies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movies = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$request->password
            ]
        );
        return new UserResource($movies);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $movie)
    {
        //show the movie
        return new UserResource($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $movie)
    {
        $movie->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->password
      ]);
        return new UserResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $movie)
    {
        $movie->delete();
        return response()->json([
            "The User is deleted"
        ]);
    }
}
