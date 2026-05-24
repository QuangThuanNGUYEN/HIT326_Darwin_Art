<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $primaryKey = 'TestimonialID';
    public $timestamps = true;

    protected $fillable = [
        'CustEmail',
        'Content',
        'Approved',
    ];

    protected $casts = [
        'Approved' => 'boolean',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CustEmail', 'CustEmail');
    }

    public function scopeApproved($query)
    {
        return $query->where('Approved', true);
    }

    public function scopePending($query)
    {
        return $query->where('Approved', false);
    }
}