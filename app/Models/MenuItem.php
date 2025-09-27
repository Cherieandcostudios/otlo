<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    protected $fillable = ['menu_sub_category_id', 'name', 'description', 'price', 'image'];

    protected $casts = ['price' => 'decimal:2'];

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(MenuSubCategory::class, 'menu_sub_category_id');
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}