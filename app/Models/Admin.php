<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $primaryKey = 'AdminID';
    public $timestamps = true;

    protected $fillable = [
        'Username',
        'PasswordHash',
    ];

    protected $hidden = [
        'PasswordHash',
    ];

    public function verifyPassword($password)
    {
        return Hash::check($password, $this->PasswordHash);
    }

    public static function createAdmin($username, $password)
    {
        return static::create([
            'Username' => $username,
            'PasswordHash' => Hash::make($password),
        ]);
    }
}