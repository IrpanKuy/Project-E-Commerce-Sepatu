<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class Home extends Component
{
    public $categories;
    public $selectedCategory = null;
    public $products = [];
    public $newestProducts = [];

    public function mount()
    {
        $this->categories = Category::all();
        $this->newestProducts = Product::latest()->take(8)->get();
        $this->loadProducts();
    }

    public function updatedSelectedCategory()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        if ($this->selectedCategory) {
            $this->products = Product::where('category_id', $this->selectedCategory)->get();
        } else {
            $this->products = Product::all();
        }
    }

    public function render()
    {
        return view('livewire.pages.home');
    }
}
