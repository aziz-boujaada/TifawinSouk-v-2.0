<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /** @use HasFactory<\Database\Factories\CartFactory> */
    use HasFactory;

     protected $fillable = [
        'user_id',
    ];
    
     public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }
    public function totalPrice()
    {
        $user = auth()->user();

        $cart = Cart::firstOrCreate(
            ['user_id' => $user->id] // search criteria
        );
        $cartItems = $cart->items;
        $cartTotal = 0;
        $cart->load('items.product');
        foreach ($cartItems as $item) {

            $cartTotal = $cartTotal + $item->product->price * $item->quantity;

        }
        return $cartTotal;
    }
    public function totalQuantity()
{
    return $this->items->sum('quantity');
}
}
