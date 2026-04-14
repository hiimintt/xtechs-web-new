(function () {
  'use strict';

  var root = document.querySelector('[data-xt-loc-process]');
  if (!root) {
    return;
  }

  var buttons = root.querySelectorAll('[data-xt-process-step]');
  var panels = root.querySelectorAll('[data-xt-process-panel]');

  function activate(id) {
    buttons.forEach(function (btn) {
      var active = btn.getAttribute('data-xt-process-step') === id;
      btn.classList.toggle('is-active', active);
      btn.setAttribute('aria-selected', active ? 'true' : 'false');
    });
    panels.forEach(function (panel) {
      panel.hidden = panel.getAttribute('data-xt-process-panel') !== id;
    });
  }

  buttons.forEach(function (btn) {
    btn.addEventListener('click', function () {
      activate(btn.getAttribute('data-xt-process-step'));
    });
  });
})();
