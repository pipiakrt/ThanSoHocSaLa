<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class Tintuclienquan extends Component
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
        $posts = Post::orderby('id', 'desc')->take(2)->get();
        return view('components.tintuclienquan', compact('posts'));
    }
}
