<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'product_variant_id', 'quantity', 'price', 'product_name', 'size_value',
    ];

    // Relasi: Item ini adalah bagian dari sebuah pesanan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: Item ini merujuk ke satu varian produk
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
