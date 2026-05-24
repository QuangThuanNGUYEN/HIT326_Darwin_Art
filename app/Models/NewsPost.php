<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    protected $primaryKey = 'PostID';
    public $timestamps = true;

    protected $fillable = [
        'Content',
    ];

    public static function getLatest()
    {
        return static::latest()->first();
    }
}