import './style.css';
import './node_modules/reveal.js/dist/reveal.css';
import './node_modules/reveal.js/dist/theme/blood.css';
import Reveal from 'reveal.js';
import Markdown from 'reveal.js/plugin/markdown/markdown.esm.js';

let deck = new Reveal({
  plugins: [Markdown],
});
deck.initialize();
