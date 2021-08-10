<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostItem extends Component
{
    public $item;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $item = $this->item;
        return view('components.post-item', compact('item'));
    }
}
