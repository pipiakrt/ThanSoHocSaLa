<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category as Model;
use App\Models\Tag;

class DanhMuc extends Component
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
        $tags = Tag::all();
        return view('components.danh-muc', compact(['categories', 'tags']));
    }
}
