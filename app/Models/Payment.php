<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'amount', 'proof_of_payment', 'payment_date', 'status', 'verified_at',
    ];

    protected $casts = [
        'payment_date' => 'date',
        'verified_at' => 'datetime',
    ];

    // Relasi: Pembayaran ini milik sebuah pesanan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
