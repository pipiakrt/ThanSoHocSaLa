<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductItem extends Component
{
    public $item;
    public $key;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item, $key)
    {
        $this->item = $item;
        $this->key = $key;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $item = $this->item;
        $key = $this->key;
        return view('components.product-item', compact(['item', 'key']));
    }
}
