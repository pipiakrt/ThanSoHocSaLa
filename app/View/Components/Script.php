<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\SeoPage;

class Script extends Component
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
        $url = '';
        $pages = request()->segments();
        if ($pages) {
            foreach ($pages as $item) {
                $url = $url . '/' . $item;
            }
        }
        else {
            $url = '/';
        }

        $schema = SeoPage::where('url', $url)->first();

        if (!$schema) {
            $url = '/';
            $schema = SeoPage::where('url', $url)->first();
        }
        return view('components.script', compact('schema'));
    }
}
