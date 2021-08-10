<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class sanpham extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $products = Product::take(2)->get();
        return view('components.sanpham', compact('products'));
    }
}
