<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider as Model;

class Slider extends Component
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
        $sliders = Model::all();
        return view('components.slider', compact('sliders'));
    }
}
