<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogUserResource;
use App\Http\Resources\RoleResource;
use App\Models\BlogUser;
use App\Models\Role;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    public function index()
    {
        $blogUser =BlogUser::all();
        return BlogUserResource::collection($blogUser);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blogUser = BlogUser::create([
         "user_id"=>$request->user_id,
         "blog_id"=>$request->blog_id,
        ]);
        return new BlogUserResource($blogUser);
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogUser $role)
    {
        return new BlogUserResource($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogUser $blogUser)
    {
        //How to update? simple
        $blogUser->update([
            "user_id"=>$request->user_id,
            "blog_id"=>$request->blog_id,
        ]);
        return new BlogUserResource($blogUser);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogUser $blogUser)
    {
        $blogUser->delete();
        return response()->json([
            "Item has been deleted!"
        ]);
    }
}
