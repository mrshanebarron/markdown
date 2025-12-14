<div @class([
    'prose max-w-none',
    'prose-sm' => $theme === 'compact',
    'prose-lg' => $theme === 'large',
    'prose-invert' => $theme === 'dark',
])>
    {!! $this->getHtml() !!}
</div>
