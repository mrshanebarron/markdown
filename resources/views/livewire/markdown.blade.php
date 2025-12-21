@php
$themeStyles = [
    'default' => 'font-size: 16px; line-height: 1.7; color: #374151;',
    'compact' => 'font-size: 14px; line-height: 1.6; color: #374151;',
    'large' => 'font-size: 18px; line-height: 1.8; color: #374151;',
    'dark' => 'font-size: 16px; line-height: 1.7; color: #e5e7eb;',
];
$baseStyle = $themeStyles[$this->theme] ?? $themeStyles['default'];
@endphp

<div style="{{ $baseStyle }} max-width: 100%;">
    <style>
        .sb-markdown h1 { font-size: 2em; font-weight: 700; margin: 0 0 16px 0; color: #111827; }
        .sb-markdown h2 { font-size: 1.5em; font-weight: 600; margin: 24px 0 16px 0; color: #111827; }
        .sb-markdown h3 { font-size: 1.25em; font-weight: 600; margin: 20px 0 12px 0; color: #111827; }
        .sb-markdown p { margin: 0 0 16px 0; }
        .sb-markdown ul, .sb-markdown ol { margin: 0 0 16px 0; padding-left: 24px; }
        .sb-markdown li { margin: 4px 0; }
        .sb-markdown code { background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-family: monospace; font-size: 0.9em; }
        .sb-markdown pre { background: #111827; color: #f3f4f6; padding: 16px; border-radius: 8px; overflow-x: auto; margin: 0 0 16px 0; }
        .sb-markdown pre code { background: transparent; padding: 0; }
        .sb-markdown blockquote { border-left: 4px solid #e5e7eb; padding-left: 16px; margin: 0 0 16px 0; color: #6b7280; }
        .sb-markdown a { color: #2563eb; text-decoration: none; }
        .sb-markdown a:hover { text-decoration: underline; }
    </style>
    <div class="sb-markdown">
        {!! $this->getHtml() !!}
    </div>
</div>
