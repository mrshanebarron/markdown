<?php

namespace MrShaneBarron\Markdown\View\Components;

use Illuminate\View\Component;

class Markdown extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('sb-markdown::components.markdown');
    }
}
