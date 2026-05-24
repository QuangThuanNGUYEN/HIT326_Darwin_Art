<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $primaryKey = 'PurchaseNo';
    public $timestamps = true;

    protected $fillable = [
        'CustEmail',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustEmail', 'CustEmail');
    }

    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class, 'PurchaseNo', 'PurchaseNo');
    }

    public function getTotalAttribute()
    {
        return $this->purchaseItems->sum(function ($item) {
            return $item->Quantity * $item->product->Price;
        });
    }
}