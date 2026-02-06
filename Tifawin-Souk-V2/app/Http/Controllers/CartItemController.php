<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::firstOrCreate([
            'user_id' => auth()->id(),
        ]);
    }


    public function show(CartItem $cartItem)
    {
        //
    }



    public function update(Request $request, CartItem $cartItem)
    {
            $request->validate([
                'quantity' => 'required|integer|min:1',
            ]);

            $cartItem->update([
                'quantity' => $request->quantity,
            ]);

        return $cartItem;
    }


    public function destroy(CartItem $cartItem)
        {
            $cartItem->delete();
        } 
    }
