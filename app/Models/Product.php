<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'colour',
        'size',
        'image',
        'available',
    ];

    protected $casts = [
        'available' => 'boolean',
        'price'     => 'decimal:2',
    ];

    public function scopeAvailable($query)
    {
        return $query->where('available', true);
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'ProductNo', 'id');
    }
}