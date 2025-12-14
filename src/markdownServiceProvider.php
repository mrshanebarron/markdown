<?php

namespace MrShaneBarron\markdown;

use Illuminate\Support\ServiceProvider;
use MrShaneBarron\markdown\Livewire\markdown;
use MrShaneBarron\markdown\View\Components\markdown as Blademarkdown;
use Livewire\Livewire;

class markdownServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/sb-markdown.php', 'sb-markdown');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'sb-markdown');

        Livewire::component('sb-markdown', markdown::class);

        $this->loadViewComponentsAs('ld', [
            Blademarkdown::class,
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
