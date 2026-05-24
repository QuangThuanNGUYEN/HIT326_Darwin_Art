<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'ProductNo';
    public $timestamps = true;

    protected $fillable = [
        'Description',
        'Price',
        'Category',
        'Colour',
        'Size',
        'Available',
    ];

    protected $casts = [
        'Available' => 'boolean',
        'Price' => 'decimal:2',
    ];

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'ProductNo', 'ProductNo');
    }

    public function scopeAvailable($query)
    {
        return $query->where('Available', true);
    }
}