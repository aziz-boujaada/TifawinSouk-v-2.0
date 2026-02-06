<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $orders = Order::with(['OrderItems.product' , 'user'])->get();
        return view('orders.index' , compact('orders'));
    }

  

    /**
     * Store a newly created resource in storage.
     */
       public function store(Request $request)
    {


        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => 0,
        ]);

        $orderItems = $request->validate([
            'quantity'   => 'required|integer|min:1',
                'product_id' => 'integer|exists:products,id',
            'unit_price' => 'required|numeric|min:0'
        ]);

        OrderItem::create([
            'quantity' => $orderItems['quantity'],
            'product_id' => $orderItems['product_id'],
            'order_id' => $order->id,
            'unit_price' => $orderItems['unit_price']
        ]);

        $total = $this->calculateToatl($order->id);
        $order->update([
            'total_price' => $total
        ]);
        return redirect()->route('orders');
    }

    public function calculateToatl($orderId)
    {

        $orderItems = OrderItem::with('product')->where('order_id', $orderId)->get();
        $orderTotal = 0;
        foreach ($orderItems as $order) {
            $orderTotal += $order->quantity * $order->unit_price;
        }

        return $orderTotal;
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $orderItems = Order::with('orderItems.product')->get();
        return view('orders.show' , compact('order' , 'orderItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
