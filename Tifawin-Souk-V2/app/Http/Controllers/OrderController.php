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
        $orders = Order::with(['products','user'])->where('user_id' , Auth::id())->paginate(10);
        return view('admin.orders.index' , compact('orders'));
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
            'products' => 'required|array|min:1',
            'products.*.quantity'   => 'required|integer|min:1',
            'products.*.product_id' => 'integer|exists:products,id',
            
            ]);
            
            
                    foreach($request->products as $product){
                        
                        OrderItem::create([
                            'quantity' => $product['quantity'],
                            'product_id' => $product['product_id'],
                            'order_id' => $order->id,
                            'unit_price' => $product['unit_price']
                        ]);
                    }


         

        $total = $this->calculateToatl($order->id);
        $order->update([
            'total_price' => $total
        ]);

        $cart = Cart::where('user_id' , Auth::id())->first();
        $cart->products()->detach();


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
        $order->load('products');
        return view('admin.orders.show' , compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit' , compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)

    {

 
        $order_status = $request->validate([
            'status' => 'string|in:pending,delivered,canceled,processing',
        ]);

        
        $order->update([
            'status' => $order_status['status']
        ]);
        return redirect()->route('orders')->with('success' , 'Order updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
