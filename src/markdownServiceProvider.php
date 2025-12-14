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
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-markdown.php', 'ld-markdown');
    }

    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-markdown');

        Livewire::component('ld-markdown', markdown::class);

        $this->loadViewComponentsAs('ld', [
            Blademarkdown::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/ld-markdown.php' => config_path('ld-markdown.php'),
            ], 'ld-markdown-config');

            $this->publishes([
                __DIR__ . '/../resources/views' => resource_path('views/vendor/ld-markdown'),
            ], 'ld-markdown-views');
        }
    }
}
