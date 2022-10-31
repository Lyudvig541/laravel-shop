<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Products extends Component
{
    public $products;
    public $categories;
    public $category_id;


    public function mount($products)
    {
        $this->products = $products;
    }

    public function updated()
    {
        $this->products = \App\Models\Product::when($this->category_id, function ($query, $category_id){
            return $query->where('category_id', $category_id);
        })->get();
    }

    public function render()
    {
        return view('livewire.frontend.products', [
            'products' => $this->products,
            'categories' => $this->categories,
        ]);
    }
}
