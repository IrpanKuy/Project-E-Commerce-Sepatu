<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'type', 'value', 'max_uses', 'uses', 'starts_at', 'expires_at', 'is_active',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relasi: Sebuah diskon bisa digunakan di banyak pesanan
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}