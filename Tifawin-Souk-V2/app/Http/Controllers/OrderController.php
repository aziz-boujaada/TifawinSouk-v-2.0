<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Product;

use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{


    public function index()
    {
        $orders = Order::with(['OrderItems.product' , 'user'])->where('user_id' , Auth::id())->get();
        return view('orders.index' , compact('orders'));
    }

  
public function create()
    {
        $cart = Cart::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $cart->load('items.product');

        return view('orders.create', compact('cart'));
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
            'items' => 'required|array|min:1',
            'items.*.quantity'   => 'required|integer|min:1',
            'items.*.product_id' => 'integer|exists:products,id',
            
            ]);
            
            
                    foreach($request->items as $item){
                        
                        OrderItem::create([
                            'quantity' => $item['quantity'],
                            'product_id' => $item['product_id'],
                            'order_id' => $order->id,
                            'unit_price' => $item['unit_price']
                        ]);
                    }


         

        $total = $this->calculateToatl($order->id);
        $order->update([
            'total_price' => $total
        ]);

        $cart = Cart::where('user_id' , Auth::id())->first();
        $cart->items()->delete();


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
