<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id]
        );

        return view('cart.index', compact('cart'));
    }


    public function addProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // If product exists, increment quantity
        $existing = $cart->products()->where('product_id', $request->product_id)->first();

        if ($existing) {
            $cart->products()->updateExistingPivot(
                $request->product_id,
                ['quantity' => $existing->pivot->quantity + $request->quantity]
            );
        } else {
            $cart->products()->attach($request->product_id, ['quantity' => $request->quantity]);
        }

        return redirect()->back();
    }



    public function updateProduct(Request $request, $productId)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $cart = Cart::where('user_id', Auth::id())->firstOrFail();

    $cart->products()->updateExistingPivot($productId, [
        'quantity' => $request->quantity
    ]);

    return response()->json(['success' => true]);
}



public function removeProduct($productId)
{
    $cart = Cart::where('user_id', Auth::id())->firstOrFail();

    $cart->products()->detach($productId);

    return redirect()->back();
}





    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {

    }
}
