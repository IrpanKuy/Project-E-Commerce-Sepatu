<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'size', 'price', 'stock', 'sku',
    ];

    // Relasi: Varian ini milik sebuah produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}