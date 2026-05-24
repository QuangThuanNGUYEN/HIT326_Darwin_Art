<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    protected $primaryKey = 'ItemNo';
    public $timestamps = true;

    protected $fillable = [
        'Quantity',
        'PurchaseNo',
        'ProductNo',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'PurchaseNo', 'PurchaseNo');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ProductNo', 'ProductNo');
    }

    public function getSubtotalAttribute()
    {
        return $this->Quantity * $this->product->Price;
    }
}