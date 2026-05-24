<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'CustEmail';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'CustEmail',
        'CustFName',
        'CustLName',
        'Title',
        'Address',
        'City',
        'State',
        'Country',
        'PostCode',
        'Phone',
    ];

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'CustEmail', 'CustEmail');
    }
}