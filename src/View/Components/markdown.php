<?php

namespace MrShaneBarron\markdown\View\Components;

use Illuminate\View\Component;

class markdown extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('ld-markdown::components.markdown');
    }
}
