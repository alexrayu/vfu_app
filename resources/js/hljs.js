import hljs from 'highlight.js';
import hljsBlade from 'highlightjs-blade';
hljs.registerLanguage("blade", hljsBlade);

document
  .querySelectorAll('code')
  .forEach((block) => hljs.highlightElement(block));
