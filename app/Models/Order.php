<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'discount_id', 'invoice_number', 'shipping_address', 'subtotal', 'discount_amount', 'shipping_cost', 'grand_total', 'status',
    ];

    // Relasi: Pesanan ini milik seorang user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Pesanan ini bisa memiliki satu diskon
    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }

    // Relasi: Sebuah pesanan memiliki banyak item
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Relasi: Sebuah pesanan memiliki satu pembayaran
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}