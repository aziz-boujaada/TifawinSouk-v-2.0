<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'reference',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
        'supplier_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function isInStock(): bool
    {
        return $this->stock > 0;
    }

    public function hasLowStock(): bool
    {
        return $this->stock < 10;
    }

    public function hasStock(int $quantity): bool
    {
        return $this->stock >= $quantity;
    }

    public function decreaseStock(int $quantity): void
    {
        $this->decrement('stock', $quantity);
    }


    public function increaseStock(int $quantity): void
    {
        $this->increment('stock', $quantity);
    }


    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            return Storage::url($this->image);
        }
        return null;
    }

    public function scopeAvailable($query)
    {
        return $query->where('stock', '>', 0);
    }

    public function scopeLowStock($query, $threshold = 10)
    {
        return $query->where('stock', '<', $threshold)->where('stock', '>', 0);
    }

    public function scopeSearch($query, $term)
    {
        return $query->where(function ($q) use ($term) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('reference', 'like', "%{$term}%")
              ->orWhere('description', 'like', "%{$term}%");
        });
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($product) {
            if ($product->image && !$product->isForceDeleting()) {
                // Don't delete image on soft delete, only on force delete
                if ($product->isForceDeleting() && Storage::exists($product->image)) {
                    Storage::delete($product->image);
                }
            }
        });
    }
}