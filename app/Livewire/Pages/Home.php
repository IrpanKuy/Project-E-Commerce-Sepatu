<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use livewire\WithPagination;

class Home extends Component
{
    public $categories;
    public $newestProducts;
    public $products;

    public function mount()
    {
        $this->categories = Category::latest()->take(8)->get();
        $this->newestProducts = Product::latest()->take(8)->get();
        $this->products = Product::with('category')->withMin('variants', 'price')->latest()->get();

    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
