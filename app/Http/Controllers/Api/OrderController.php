<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $order = new Order();
//        $order->uuid=Str::uuid();
//        $order->total_price = $request->total_price;
//        $order->save();

        $orders = Order::create([
            "total" => 10.99,
            "book_id" => 1,
            "user_id" => 1,
            "order_id" => Str::uuid()->toString(),
        ]);
//        return response()->json([
//            'message' => 'Order created successfully',
//            'uuid' => $order->uuid,
//        ]);

        return new OrderResource($orders);
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, order $order)
    {
        //We are not going to update.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //Not deleting the order.
    }
}
