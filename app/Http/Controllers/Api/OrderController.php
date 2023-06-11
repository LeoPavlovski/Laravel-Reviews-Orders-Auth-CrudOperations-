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
        //Better query than all.
        $orders =Order::with('book','user')->get();
        return OrderResource::collection($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $orderId = Str::uuid();

        $order = new Order(); // Create a new instance of the Order model

        $order->order_id = $orderId;
        $order->tax = $request->input('tax');
        $order->subtotal = $request->input('subtotal');
        $order->quantity = $request->input('quantity');
        $order->user_id = $request->input('user_id');
        $order->book_id = $request->input('book_id');

        $order->save(); // Save the order to the database

        return new OrderResource($order); // Return the created order as a resource
    }
    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
       $order = Order::where('order_id', $uuid)->get();
       return OrderResource::collection($order);
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
