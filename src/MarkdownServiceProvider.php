<?php

namespace MrShaneBarron\Markdown;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\Markdown\Livewire\Markdown;
use MrShaneBarron\Markdown\View\Components\Markdown as BladeMarkdown;
use Livewire\Livewire;

class MarkdownServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-markdown.php', 'sb-markdown');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-markdown');

        Livewire::component('sb-markdown', Markdown::class);

        $this->loadViewComponentsAs('ld', [
            BladeMarkdown::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/sb-markdown.php' => config_path('sb-markdown.php'),
            ], 'sb-markdown-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/sb-markdown'),
            ], 'sb-markdown-views');
        }
    }
}
