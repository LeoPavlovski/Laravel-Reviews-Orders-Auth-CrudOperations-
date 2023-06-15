<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WishtlistResource;
use App\Models\wishlist;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get all of the wishlists
        $wishlists =WishList::with('user','book')
            ->get();
        return WishtlistResource::collection($wishlists);

    }
    public function queries(){
        $query = WishList::query();
        $wishlists = QueryBuilder::for($query)->allowedFilters(['user_id','book_id','status'])

            ->allowedIncludes('user', 'book')
            ->allowedSorts('user_id', 'book_id','status')
            ->get();
       return WishtlistResource::collection($wishlists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wishlists = Wishlist::create([
           "wishlist_id"=>$request->id,
           "status"=>$request->status,
           'user_id'=>$request->user_id,
           "book_id"=>$request->book_id
        ]);
        return new WishtlistResource($wishlists);
    }

    /**
     * Display the specified resource.
     */
    public function show(wishlist $wishlist)
    {
        return new WishtlistResource($wishlist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, wishlist $wishlist)
    {
        $wishlist->update([
            "wishlist_id"=>$request->id,
            "status"=>$request->status,
            'user_id'=>$request->user_id,
            "book_id"=>$request->book_id
        ]);
        return new WishtlistResource($wishlist);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(wishlist $wishlist)
    {
        $wishlist->delete();
        return response()->json([
           "Wishlist has been deleted!"
        ]);
    }
}
