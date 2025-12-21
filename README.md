# Markdown

A markdown renderer component for Laravel applications. Converts markdown text to styled HTML. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/markdown
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-markdown :content="$markdownContent" />
```

### With Custom Styling

```blade
<livewire:sb-markdown
    :content="$article"
    prose-class="prose-lg prose-blue"
/>
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `content` | string | `''` | Markdown content |
| `prose-class` | string | `''` | Additional prose classes |

## Vue 3 Usage

### Setup

```javascript
import { SbMarkdown } from './vendor/sb-markdown';
app.component('SbMarkdown', SbMarkdown);
```

### Basic Usage

```vue
<template>
  <SbMarkdown :content="markdown" />
</template>

<script setup>
const markdown = `
# Hello World

This is **bold** and *italic* text.

## Lists

- Item one
- Item two
- Item three

## Code

\`\`\`javascript
const greeting = 'Hello!';
console.log(greeting);
\`\`\`
`;
</script>
```

### Blog Post Example

```vue
<template>
  <article class="max-w-3xl mx-auto py-8">
    <h1 class="text-4xl font-bold mb-4">{{ post.title }}</h1>
    <p class="text-gray-500 mb-8">{{ post.date }}</p>

    <SbMarkdown
      :content="post.content"
      prose-class="prose-lg"
    />
  </article>
</template>
```

### Documentation Viewer

```vue
<template>
  <div class="flex">
    <nav class="w-64 p-4 border-r">
      <button
        v-for="doc in docs"
        :key="doc.id"
        @click="activeDoc = doc"
        class="block w-full text-left px-3 py-2 rounded hover:bg-gray-100"
      >
        {{ doc.title }}
      </button>
    </nav>

    <main class="flex-1 p-8">
      <SbMarkdown :content="activeDoc.content" />
    </main>
  </div>
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `content` | String | `''` | Markdown string |
| `proseClass` | String | `''` | Additional Tailwind prose classes |

## Supported Syntax

| Markdown | Output |
|----------|--------|
| `# Heading` | `<h1>` |
| `## Heading` | `<h2>` |
| `### Heading` | `<h3>` |
| `**bold**` | `<strong>` |
| `*italic*` | `<em>` |
| `~~strikethrough~~` | `<del>` |
| `` `code` `` | `<code>` |
| ` ``` ` | `<pre><code>` |
| `[link](url)` | `<a>` |
| `![alt](src)` | `<img>` |
| `* item` | `<ul><li>` |
| `1. item` | `<ol><li>` |
| `> quote` | `<blockquote>` |
| `---` | `<hr>` |

## Features

- **Headers**: H1, H2, H3 support
- **Emphasis**: Bold, italic, strikethrough
- **Links**: External links with noopener
- **Images**: Rounded image styling
- **Lists**: Ordered and unordered
- **Code**: Inline and block code
- **Blockquotes**: Quote styling
- **Prose Styling**: Tailwind Typography

## Styling

Uses Tailwind CSS Typography:
- Prose base styling
- Customizable with prose modifiers
- Automatic paragraph spacing
- Code block styling
- Link styling

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x
- @tailwindcss/typography (recommended)

## License

MIT License
