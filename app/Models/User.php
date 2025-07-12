<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi: Seorang user bisa memiliki banyak alamat
    public function addresses()
    {
        return $this->hasMany(UserAddress::class);
    }

    // Relasi: Seorang user bisa memiliki banyak pesanan
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relasi: Seorang user bisa memiliki banyak item di keranjang
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}