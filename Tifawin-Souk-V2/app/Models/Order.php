<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;
   
    protected $fillable = ['status' , 'total_price' , 'user_id'];


    // one order has many items
    public function orderItems():HasMany{
          return $this->hasMany(OrderItem::class);
    }

    // orders created by one uszer
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

}
