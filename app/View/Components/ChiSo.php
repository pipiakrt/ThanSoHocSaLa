<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\HomePage;

class ChiSo extends Component
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
        $data = HomePage::find(1)->data;
        return view('components.chi-so', compact('data'));
    }
}
