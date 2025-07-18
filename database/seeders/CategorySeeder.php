<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Sneakers',
            'Running',
            'Casual',
            'Formal',
            'Sandals',
            'Boots',
            'Loafers',
            'Athletic',
            'Slip-Ons',
            'Dress Shoes',
        ];

        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName),
            ]);
        }
    }
}
