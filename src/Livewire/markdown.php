<?php

namespace MrShaneBarron\Markdown\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Markdown extends Component
{
    public string $content = '';
    public bool $allowHtml = false;
    public string $theme = 'default';

    public function mount(
        string $content = '',
        bool $allowHtml = false,
        string $theme = 'default'
    ): void {
        $this->content = $content;
        $this->allowHtml = $allowHtml;
        $this->theme = $theme;
    }

    public function getHtml(): string
    {
        return Str::markdown($this->content, [
            'html_input' => $this->allowHtml ? 'allow' : 'strip',
            'allow_unsafe_links' => false,
        ]);
    }

    public function render()
    {
        return view('ld-markdown::livewire.markdown');
    }
}
