<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Livewire\WithPagination;

class Product extends Model
{
    use WithPagination;
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 'thumnail_image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // Relasi: Sebuah produk memiliki banyak gambar
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    } 
}
