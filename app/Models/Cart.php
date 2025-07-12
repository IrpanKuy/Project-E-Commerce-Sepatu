<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_variant_id', 'quantity'];

    // Relasi: Item keranjang ini milik seorang user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Item keranjang ini merujuk ke satu varian produk
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}