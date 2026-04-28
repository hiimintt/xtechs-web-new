(function () {
  'use strict';

  var state = {
    content: '',
    ready: false,
    registered: false
  };

  function parseMainContent(html) {
    if (!html) return '';
    var doc = new window.DOMParser().parseFromString(html, 'text/html');
    var main = doc.querySelector('main');
    var root = main || doc.body;
    if (!root) return '';

    root.querySelectorAll('script, style, noscript').forEach(function (el) {
      el.remove();
    });
    return root.innerHTML.trim();
  }

  function fetchFrontendHtml() {
    if (!window.xtYoastHardcodedAnalysis || !window.xtYoastHardcodedAnalysis.url) {
      return Promise.resolve('');
    }
    return window
      .fetch(String(window.xtYoastHardcodedAnalysis.url), {
        method: 'GET',
        credentials: 'same-origin',
        headers: { Accept: 'text/html' }
      })
      .then(function (res) {
        if (!res.ok) return '';
        return res.text();
      })
      .then(function (html) {
        if (!html) return '';
        if (html.indexOf('There has been a critical error on this website') !== -1) {
          return '';
        }
        return parseMainContent(html);
      })
      .catch(function () {
        return '';
      });
  }

  function registerWithYoast() {
    if (state.registered) return;
    if (!state.ready || !state.content) return;
    if (typeof window.YoastSEO === 'undefined' || !window.YoastSEO.app) return;

    var pluginName = 'xtechsHardcodedPagesContent';
    var extra = state.content;

    window.YoastSEO.app.registerPlugin(pluginName, { status: 'ready' });
    window.YoastSEO.app.registerModification(
      'content',
      function (base) {
        var current = String(base || '');
        if (current.indexOf(extra) !== -1) return current;
        return (current ? current + '\n\n' : '') + extra;
      },
      pluginName,
      10
    );

    state.registered = true;
  }

  function bootstrap() {
    fetchFrontendHtml().then(function (content) {
      state.content = content;
      state.ready = true;
      registerWithYoast();
    });

    if (typeof window.YoastSEO !== 'undefined' && window.YoastSEO.app) {
      registerWithYoast();
    } else {
      window.addEventListener('YoastSEO:ready', registerWithYoast);
      document.addEventListener('YoastSEO:ready', registerWithYoast);
      if (window.jQuery && typeof window.jQuery === 'function') {
        window.jQuery(window).on('YoastSEO:ready', registerWithYoast);
      }
    }
  }

  bootstrap();
})();
