<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'image_path', 'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    // Relasi: Gambar ini dimiliki oleh sebuah produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}