<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Http\Resources\CouponResource;
use App\Models\Book;
use App\Models\Coupon;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::query()->paginate(3);
        return CouponResource::collection($coupons);
    }
    public function queries(){
        $query = Coupon::query();
        $coupon = QueryBuilder::for($query)
            ->allowedIncludes('book','book.author','book.orders','book.reviews','book.wishlists')
            ->get();
       return CouponResource::collection($coupon);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coupons = Coupon::create([
           "code"=>$request->code,
           "is_active"=>$request->is_active,
           "description"=>$request->description,
           "valid_from"=>$request->valid_from,
           "valid_until"=>$request->valid_until,
           "name"=>$request->name,
            "book_id"=>$request->book_id,
        ]);
        return new CouponResource($coupons);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        return new CouponResource($coupon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $coupon->update([
            "code"=>$request->code,
            "is_active"=>$request->is_active,
            "description"=>$request->description,
            "valid_from"=>$request->valid_from,
            "valid_until"=>$request->valid_until,
            "name"=>$request->name,
            "book_id"=>$request->book_id,
        ]);
        return new CouponResource($coupon);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return response()->json([
           "Item is deleted!"
        ]);
    }
}
