<template>
  <div :class="['prose max-w-none', proseClass]" v-html="renderedHtml"></div>
</template>

<script>
import { computed } from 'vue';

export default {
  name: 'LdMarkdown',
  props: {
    content: { type: String, default: '' },
    proseClass: { type: String, default: '' }
  },
  setup(props) {
    const renderedHtml = computed(() => {
      let html = props.content;

      // Headers
      html = html.replace(/^### (.*$)/gm, '<h3>$1</h3>');
      html = html.replace(/^## (.*$)/gm, '<h2>$1</h2>');
      html = html.replace(/^# (.*$)/gm, '<h1>$1</h1>');

      // Bold and italic
      html = html.replace(/\*\*\*(.*?)\*\*\*/g, '<strong><em>$1</em></strong>');
      html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
      html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');

      // Strikethrough
      html = html.replace(/~~(.*?)~~/g, '<del>$1</del>');

      // Code blocks
      html = html.replace(/```(\w+)?\n([\s\S]*?)```/g, '<pre><code class="language-$1">$2</code></pre>');
      html = html.replace(/`([^`]+)`/g, '<code>$1</code>');

      // Links
      html = html.replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" target="_blank" rel="noopener">$1</a>');

      // Images
      html = html.replace(/!\[([^\]]*)\]\(([^)]+)\)/g, '<img src="$2" alt="$1" class="rounded-lg">');

      // Lists
      html = html.replace(/^\* (.*$)/gm, '<li>$1</li>');
      html = html.replace(/(<li>.*<\/li>)/s, '<ul>$1</ul>');
      html = html.replace(/^\d+\. (.*$)/gm, '<li>$1</li>');

      // Blockquotes
      html = html.replace(/^> (.*$)/gm, '<blockquote>$1</blockquote>');

      // Horizontal rules
      html = html.replace(/^---$/gm, '<hr>');

      // Line breaks and paragraphs
      html = html.replace(/\n\n/g, '</p><p>');
      html = html.replace(/\n/g, '<br>');
      html = `<p>${html}</p>`;

      // Clean up empty paragraphs
      html = html.replace(/<p><\/p>/g, '');
      html = html.replace(/<p>(<h[1-6]>)/g, '$1');
      html = html.replace(/(<\/h[1-6]>)<\/p>/g, '$1');
      html = html.replace(/<p>(<ul>)/g, '$1');
      html = html.replace(/(<\/ul>)<\/p>/g, '$1');
      html = html.replace(/<p>(<pre>)/g, '$1');
      html = html.replace(/(<\/pre>)<\/p>/g, '$1');

      return html;
    });

    return { renderedHtml };
  }
};
</script>
