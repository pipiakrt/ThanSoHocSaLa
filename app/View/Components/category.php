<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category as Model;

class Category extends Component
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
        $categories = Model::all();
        return view('components.category', compact('categories'));
    }
}
