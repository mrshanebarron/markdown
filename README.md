# Laravel Design Markdown

Markdown renderer component for Laravel. Supports Livewire, Blade, and Vue 3.

## Installation

```bash
composer require mrshanebarron/markdown
```

## Usage

### Livewire Component

```blade
<livewire:ld-markdown />
```

### Blade Component

```blade
<x-ld-markdown />
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=ld-markdown-config
```

## Customization

### Publishing Views

```bash
php artisan vendor:publish --tag=ld-markdown-views
```

## License

MIT
