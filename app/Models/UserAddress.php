<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'label', 'phone_number', 'address_details', 'city', 'province', 'postal_code', 'is_primary',
    ];

    // Relasi: Alamat ini dimiliki oleh seorang user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}