(function () {
  'use strict';

  function openModal(modal, img, src, alt) {
    if (!modal || !img || !src) return;
    img.src = src;
    img.alt = alt || '';
    modal.hidden = false;
    document.documentElement.style.overflow = 'hidden';
  }

  function closeModal(modal) {
    if (!modal) return;
    modal.hidden = true;
    document.documentElement.style.overflow = '';
  }

  document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('xt-sf-ias-modal');
    if (!modal) return;

    var modalImg = modal.querySelector('.xt-sf-ias-modal__img');
    var closeBtn = modal.querySelector('.xt-sf-ias-modal__close');

    document.querySelectorAll('.xt-ias-item').forEach(function (btn) {
      btn.setAttribute('tabindex', '0');
      btn.addEventListener('click', function () {
        var src = btn.getAttribute('data-full-src');
        var alt = btn.getAttribute('data-full-alt') || '';
        openModal(modal, modalImg, src, alt);
      });
      btn.addEventListener('keydown', function (e) {
        if (e.key !== 'Enter' && e.key !== ' ') return;
        e.preventDefault();
        var src = btn.getAttribute('data-full-src');
        var alt = btn.getAttribute('data-full-alt') || '';
        openModal(modal, modalImg, src, alt);
      });
    });

    modal.addEventListener('click', function (e) {
      if (e.target === modal) closeModal(modal);
    });

    if (closeBtn) {
      closeBtn.addEventListener('click', function () {
        closeModal(modal);
      });
    }

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal && !modal.hidden) closeModal(modal);
    });
  });
})();
