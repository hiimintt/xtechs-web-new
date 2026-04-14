(function () {
  'use strict';

  function onReady(fn) {
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', fn);
    } else {
      fn();
    }
  }

  onReady(function () {
    var chatbotFallbackFab = document.getElementById('xt-chatbot-fallback-fab');
    if (chatbotFallbackFab) {
      var chatbotScriptSrc = chatbotFallbackFab.getAttribute('data-chatbot-src') || '';
      var openChatbotShell = function () {
        var realFab = document.querySelector('.xt-chatbot-fab');
        if (realFab && !realFab.hidden) {
          realFab.click();
          return true;
        }
        return false;
      };

      chatbotFallbackFab.addEventListener('click', function () {
        if (openChatbotShell()) return;

        if (chatbotScriptSrc && !document.querySelector('script[src*="assets/js/chatbot.js"]')) {
          var script = document.createElement('script');
          script.src = chatbotScriptSrc;
          script.defer = true;
          document.body.appendChild(script);
        }

        var attempts = 0;
        var timer = window.setInterval(function () {
          attempts += 1;
          if (openChatbotShell() || attempts > 20) {
            window.clearInterval(timer);
          }
        }, 150);
      });

      window.setInterval(function () {
        var realFab = document.querySelector('.xt-chatbot-fab');
        var chatWindow = document.querySelector('.xt-chatbot-window');
        var isWindowOpen = !!(chatWindow && !chatWindow.hidden && chatWindow.offsetWidth > 0 && chatWindow.offsetHeight > 0);
        if (isWindowOpen) {
          chatbotFallbackFab.hidden = true;
          return;
        }
        if (!realFab) {
          chatbotFallbackFab.hidden = false;
          return;
        }
        var isVisible = !realFab.hidden && realFab.offsetWidth > 0 && realFab.offsetHeight > 0;
        chatbotFallbackFab.hidden = isVisible;
      }, 400);
    }

    var menuBtn = document.querySelector('.xt-menu-toggle');
    var mobileNav = document.getElementById('xt-mobile-nav');
    if (menuBtn && mobileNav) {
      menuBtn.addEventListener('click', function () {
        var open = menuBtn.classList.toggle('is-open');
        menuBtn.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (open) {
          mobileNav.removeAttribute('hidden');
        } else {
          mobileNav.setAttribute('hidden', '');
        }
      });
    }

    var track = document.getElementById('xt-hero-rotate');
    if (track && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      var lines = track.querySelectorAll('.xt-hero-rotate-line');
      if (lines.length > 1) {
        var hi = 0;
        window.setInterval(function () {
          lines[hi].classList.remove('is-active');
          hi = (hi + 1) % lines.length;
          lines[hi].classList.add('is-active');
        }, 2800);
      }
    }

    var processRoot = document.getElementById('xt-process');
    if (processRoot) {
      var stepBtns = processRoot.querySelectorAll('.xt-step-btn');
      var panels = processRoot.querySelectorAll('.xt-step-panel');
      stepBtns.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var id = btn.getAttribute('data-step');
          stepBtns.forEach(function (b) {
            var on = b === btn;
            b.classList.toggle('is-active', on);
            b.setAttribute('aria-selected', on ? 'true' : 'false');
          });
          panels.forEach(function (p) {
            var on = p.getAttribute('data-step-panel') === id;
            p.classList.toggle('is-active', on);
            if (on) {
              p.removeAttribute('hidden');
            } else {
              p.setAttribute('hidden', '');
            }
          });
        });
      });
    }

    var reviewsRoot = document.getElementById('xt-reviews-root');
    if (reviewsRoot) {
      var cards = reviewsRoot.querySelectorAll('.xt-review-card');
      var dotBtns = reviewsRoot.querySelectorAll('.xt-reviews-dot');
      var prevBtn = reviewsRoot.querySelector('.xt-reviews-prev');
      var nextBtn = reviewsRoot.querySelector('.xt-reviews-next');
      var ri = 0;

      function showReview(idx) {
        var n = cards.length;
        if (!n) {
          return;
        }
        ri = ((idx % n) + n) % n;
        cards.forEach(function (c, j) {
          c.classList.toggle('is-active', j === ri);
        });
        dotBtns.forEach(function (d, j) {
          d.classList.toggle('is-active', j === ri);
        });
      }

      if (prevBtn) {
        prevBtn.addEventListener('click', function () {
          showReview(ri - 1);
        });
      }
      if (nextBtn) {
        nextBtn.addEventListener('click', function () {
          showReview(ri + 1);
        });
      }
      dotBtns.forEach(function (d) {
        d.addEventListener('click', function () {
          var go = parseInt(d.getAttribute('data-go'), 10);
          if (!isNaN(go)) {
            showReview(go);
          }
        });
      });
    }

    var calcRoot = document.getElementById('xt-calc');
    if (calcRoot) {
      var postcodeInput = document.getElementById('xt-calc-postcode');
      var systemInput = document.getElementById('xt-calc-system');
      var batteryInput = document.getElementById('xt-calc-battery');
      var includeBatteryInput = document.getElementById('xt-calc-include-battery');
      var eligibilityInputs = calcRoot.querySelectorAll('.xt-calc-elig-item');
      var runBtn = document.getElementById('xt-calc-run');
      var emptyEl = document.getElementById('xt-calc-empty');
      var outputEl = document.getElementById('xt-calc-output');
      var zoneLabelEl = document.getElementById('xt-calc-zone-label');
      var systemLabelEl = document.getElementById('xt-calc-system-label');
      var batteryLabelEl = document.getElementById('xt-calc-battery-label');
      var stcEl = document.getElementById('xt-calc-stc');
      var stcValueEl = document.getElementById('xt-calc-stc-value');
      var svStatusEl = document.getElementById('xt-calc-sv-status');
      var breakPvEl = document.getElementById('xt-calc-break-pv');
      var vicEl = document.getElementById('xt-calc-vic');
      var totalEl = document.getElementById('xt-calc-total');
      var proposalBatteryRow = document.getElementById('xt-calc-proposal-battery-row');
      var proposalSvRow = document.getElementById('xt-calc-proposal-sv-row');
      var proposalPanelsEl = document.getElementById('xt-calc-proposal-panels');
      var proposalInverterEl = document.getElementById('xt-calc-proposal-inverter');
      var marketEl = document.getElementById('xt-calc-market');
      var finalEl = document.getElementById('xt-calc-final');
      var pvDiscountEl = document.getElementById('xt-calc-proposal-pv-discount');
      var batteryDiscountEl = document.getElementById('xt-calc-proposal-battery-discount');
      var svDiscountEl = document.getElementById('xt-calc-proposal-sv-discount');
      var pvTooltipBodyEl = document.getElementById('xt-calc-pv-tooltip-body');
      var zoneRowEl = document.getElementById('xt-calc-zone-row');
      var postcodeErrEl = document.getElementById('xt-calc-postcode-err');
      var panelsMiniEl = document.getElementById('xt-calc-panels-mini');

      var fmtCurrency = function (val) {
        return new Intl.NumberFormat('en-AU', {
          style: 'currency',
          currency: 'AUD',
          maximumFractionDigits: 0
        }).format(val);
      };

      var clamp = function (val, min, max) {
        return Math.max(min, Math.min(max, val));
      };

      var zoneFromPostcode = function (postcode) {
        var p = parseInt(postcode || '', 10);
        if (isNaN(p)) return 0;
        if (p === 3000) return 0;
        if (p >= 800 && p <= 999) return 1;
        if (p >= 200 && p <= 299) return 3;
        if (p >= 3000 && p <= 3999) return 4;
        if (p >= 2000 && p <= 2999) return 3;
        if (p >= 4000 && p <= 4999) return 3;
        if (p >= 5000 && p <= 5999) return 3;
        if (p >= 6000 && p <= 6999) return 4;
        if (p >= 7000 && p <= 7999) return 4;
        return 0;
      };

      var zoneFactorByZone = { 1: 1.622, 2: 1.536, 3: 1.382, 4: 1.185 };

      var runCalc = function () {
        var systemKw = clamp(parseFloat(systemInput && systemInput.value ? systemInput.value : '0') || 0, 0, 30);
        var includeBattery = !!(includeBatteryInput && includeBatteryInput.checked);
        var batteryKwh = includeBattery ? clamp(parseFloat(batteryInput && batteryInput.value ? batteryInput.value : '0') || 0, 0, 50) : 0;
        if (batteryInput) batteryInput.disabled = !includeBattery;
        var postcode = postcodeInput && postcodeInput.value ? postcodeInput.value.replace(/\D/g, '').slice(0, 4) : '';
        var zone = zoneFromPostcode(postcode);
        var zoneFactor = zoneFactorByZone[zone] || 0;
        var postNum = parseInt(postcode || '', 10);
        var isValidVic = postcode.length === 4 && !isNaN(postNum) && postNum >= 3000 && postNum <= 3999 && zone > 0;
        var deemingYears = 6;

        var stcCount = Math.floor(systemKw * zoneFactor * deemingYears);
        var stcUnitValue = 38;
        var stcValue = stcCount * stcUnitValue;
        var batteryStcCount = includeBattery ? Math.floor(batteryKwh * zoneFactor * deemingYears) : 0;
        var batteryStcValue = batteryStcCount * stcUnitValue;

        var checkedCount = 0;
        eligibilityInputs.forEach(function (el) { if (el.checked) checkedCount += 1; });
        var solarVictoriaRebate = checkedCount === 4 ? 1400 : 0;

        var estimatedMarketPrice = Math.round((systemKw * 1200) + ((systemKw / 1.33) * 150) + (includeBattery ? batteryKwh * 400 : 0) + 800);
        var totalIncentive = stcValue + batteryStcValue + solarVictoriaRebate;
        var finalCustomerPrice = Math.round(Math.max(0, estimatedMarketPrice - totalIncentive) * 1.05);
        var panelCount = Math.max(1, Math.round(systemKw / 0.44));
        var inverterKw = [3, 5, 6, 8, 10, 15, 20, 25, 30].find(function (kw) { return kw >= (systemKw / 1.33); }) || 30;

        if (systemLabelEl) systemLabelEl.textContent = systemKw.toFixed(1) + ' kW';
        if (batteryLabelEl) batteryLabelEl.textContent = Math.round(batteryKwh) + ' kWh';
        if (zoneLabelEl) zoneLabelEl.textContent = isValidVic ? String(zone) : '-';
        if (zoneRowEl && postcodeErrEl) {
          if (postcode.length < 4) {
            zoneRowEl.classList.add('is-hidden');
            postcodeErrEl.classList.add('is-hidden');
          } else if (isValidVic) {
            zoneRowEl.classList.remove('is-hidden');
            postcodeErrEl.classList.add('is-hidden');
          } else {
            zoneRowEl.classList.add('is-hidden');
            postcodeErrEl.classList.remove('is-hidden');
          }
        }
        if (panelsMiniEl) {
          panelsMiniEl.textContent = panelCount + ' x 440 W';
        }
        if (svStatusEl) {
          if (checkedCount === 4) {
            svStatusEl.classList.add('is-eligible');
            svStatusEl.innerHTML = '<svg class="xt-calc-sv-check" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg> Eligible for Solar Victoria rebates';
          } else {
            svStatusEl.classList.remove('is-eligible');
            svStatusEl.innerHTML = '<span class="xt-warn-dot" aria-hidden="true">!</span> ' + checkedCount + '/4 criteria met - Check all requirements';
          }
        }

        if (pvTooltipBodyEl) {
          if (!isValidVic) {
            pvTooltipBodyEl.innerHTML = '<p class="xt-tooltip-muted">Enter a valid VIC postcode to see STC calculation.</p>';
          } else {
            var rawSolarStcs = systemKw * zoneFactor * deemingYears;
            var breakdownLine = panelCount + ' panels x 440 W = ' + systemKw.toFixed(1) + ' kW x zone factor ' + zoneFactor.toFixed(3) + ' x ' + deemingYears + ' years';
            pvTooltipBodyEl.innerHTML =
              '<p class="xt-tooltip-mono">' + breakdownLine + '</p>' +
              '<p>Raw calculation: ' + rawSolarStcs.toFixed(1) + ' STCs (floored to ' + stcCount + ')</p>' +
              '<p class="xt-tooltip-note">* STC price: $' + stcUnitValue + ' per STC</p>';
          }
        }

        if (stcEl) {
          stcEl.textContent = isValidVic ? stcCount.toString() : '0';
        }
        if (stcValueEl) {
          stcValueEl.textContent = isValidVic ? fmtCurrency(stcValue) : '$0';
        }
        if (breakPvEl) breakPvEl.textContent = isValidVic ? fmtCurrency(stcValue) : '$0';
        if (vicEl) {
          vicEl.textContent = isValidVic ? fmtCurrency(solarVictoriaRebate) : '$0';
        }
        if (totalEl) {
          totalEl.textContent = isValidVic ? fmtCurrency(totalIncentive) : '$0';
        }
        if (proposalPanelsEl) proposalPanelsEl.textContent = 'Solar Panels (' + panelCount + ' x 440 W)';
        if (proposalInverterEl) proposalInverterEl.textContent = 'Inverter (' + inverterKw + ' kW)';
        if (marketEl) marketEl.textContent = fmtCurrency(estimatedMarketPrice);
        if (pvDiscountEl) pvDiscountEl.textContent = '-' + (isValidVic ? fmtCurrency(stcValue) : '$0');
        if (batteryDiscountEl) batteryDiscountEl.textContent = '-' + (isValidVic ? fmtCurrency(batteryStcValue) : '$0');
        if (svDiscountEl) svDiscountEl.textContent = '-' + (isValidVic ? fmtCurrency(solarVictoriaRebate) : '$0');
        if (finalEl) finalEl.textContent = isValidVic ? fmtCurrency(finalCustomerPrice) : fmtCurrency(Math.round(estimatedMarketPrice * 1.05));
        if (proposalBatteryRow) proposalBatteryRow.style.display = includeBattery ? 'flex' : 'none';
        if (proposalSvRow) proposalSvRow.style.display = solarVictoriaRebate > 0 ? 'flex' : 'none';

        if (emptyEl && outputEl) {
          if (isValidVic) {
            emptyEl.classList.add('is-hidden');
            outputEl.classList.remove('is-hidden');
          } else {
            emptyEl.classList.remove('is-hidden');
            outputEl.classList.add('is-hidden');
          }
        }
        if (runBtn) {
          runBtn.textContent = isValidVic ? 'Calculate Rebates' : 'Enter Valid Postcode';
        }

        if (systemInput && systemInput.classList.contains('xt-range')) {
          var min = parseFloat(systemInput.min || '3');
          var max = parseFloat(systemInput.max || '30');
          var val = parseFloat(systemInput.value || '6.6');
          var pct = ((val - min) / (max - min)) * 100;
          systemInput.style.background = 'linear-gradient(90deg, #1d74d9 0%, #1d74d9 ' + pct + '%, #e2e8f0 ' + pct + '%, #e2e8f0 100%)';
        }
      };

      if (runBtn) {
        runBtn.addEventListener('click', function () {
          runCalc();
          var postcode = postcodeInput && postcodeInput.value ? postcodeInput.value.replace(/\D/g, '').slice(0, 4) : '';
          var postNum = parseInt(postcode || '', 10);
          var isValidVic = postcode.length === 4 && !isNaN(postNum) && postNum >= 3000 && postNum <= 3999 && postNum !== 3000;
          if (!isValidVic) {
            return;
          }
          var systemKw = parseFloat(systemInput && systemInput.value ? systemInput.value : '6.6') || 6.6;
          var zone = zoneFromPostcode(postcode);
          var zoneFactor = zoneFactorByZone[zone] || 1.185;
          var stcCount = Math.floor(systemKw * zoneFactor * 6);
          var stcValue = stcCount * 38;
          var checkedCount = 0;
          eligibilityInputs.forEach(function (el) { if (el.checked) checkedCount += 1; });
          var total = stcValue + (checkedCount === 4 ? 1400 : 0);

          var msg = 'Total Rebates: ' + fmtCurrency(total) + '\n\n'
            + 'Breakdown:\n'
            + 'Federal STCs (PV): ' + stcCount + ' STCs (' + fmtCurrency(stcValue) + ')\n'
            + (checkedCount === 4 ? 'Solar Victoria: ' + fmtCurrency(1400) : 'Solar Victoria: Not eligible (need all 4 criteria)') + '\n\n'
            + 'System: 15 panels × 440W = ' + systemKw.toFixed(1) + 'kW';

          alert(msg);
        });
      }
      if (systemInput) {
        systemInput.addEventListener('input', runCalc);
      }
      if (batteryInput) {
        batteryInput.addEventListener('input', runCalc);
      }
      if (postcodeInput) {
        postcodeInput.addEventListener('input', runCalc);
      }
      if (includeBatteryInput) includeBatteryInput.addEventListener('change', runCalc);
      eligibilityInputs.forEach(function (el) { el.addEventListener('change', runCalc); });
      runCalc();
    }
  });

  /* PV clone (Next.js /pv-battery parity): process stepper, FAQ, hub chips, compare strip */
  var pvProcess = document.querySelector('[data-xt-pv-process]');
  if (pvProcess) {
    var stepBtns = pvProcess.querySelectorAll('.xt-pvclone-step-btn');
    var panels = pvProcess.querySelectorAll('.xt-pvclone-process-panel');
    stepBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        var id = btn.getAttribute('data-step');
        stepBtns.forEach(function (b) {
          b.classList.toggle('is-active', b === btn);
          b.setAttribute('aria-selected', b === btn ? 'true' : 'false');
        });
        panels.forEach(function (p) {
          var on = p.getAttribute('data-panel') === id;
          p.toggleAttribute('hidden', !on);
          p.classList.toggle('is-active', on);
        });
      });
    });
  }

  var hubChips = document.querySelector('[data-xt-pv-hub-chips]');
  if (hubChips) {
    hubChips.querySelectorAll('[data-xt-pv-chip]').forEach(function (chip) {
      chip.addEventListener('click', function () {
        chip.classList.toggle('is-active');
      });
    });
  }

  var compare = document.querySelector('[data-xt-pv-compare]');
  if (compare) {
    var track = compare.querySelector('[data-xt-compare-track]');
    var left = compare.querySelector('[data-xt-compare-left]');
    var right = compare.querySelector('[data-xt-compare-right]');
    if (track && left && right) {
      left.addEventListener('click', function () {
        track.scrollBy({ left: -300, behavior: 'smooth' });
      });
      right.addEventListener('click', function () {
        track.scrollBy({ left: 300, behavior: 'smooth' });
      });
    }
  }

  var faqRoot = document.querySelector('[data-xt-pv-faq]');
  if (faqRoot) {
    var faqSearch = faqRoot.querySelector('[data-xt-faq-search]');
    var faqEmpty = faqRoot.querySelector('[data-xt-faq-empty]');
    var faqItems = faqRoot.querySelectorAll('.xt-pvclone-faq-item');
    var faqCats = faqRoot.querySelectorAll('.xt-pvclone-faq-nav button[data-faq-cat]');
    var activeCat = 'power-backup';

    function applyFaqFilter() {
      var q = faqSearch ? (faqSearch.value || '').trim().toLowerCase() : '';
      var n = 0;
      faqItems.forEach(function (item) {
        var cat = item.getAttribute('data-faq-cat');
        var blob = (item.getAttribute('data-faq-search') || '').toLowerCase();
        var catOk = !q && cat === activeCat;
        var searchOk = q && blob.indexOf(q) !== -1;
        var show = q ? searchOk : catOk;
        item.toggleAttribute('hidden', !show);
        if (show) n += 1;
      });
      if (faqEmpty) {
        faqEmpty.toggleAttribute('hidden', n !== 0);
      }
    }

    faqCats.forEach(function (btn) {
      if (btn.tagName !== 'BUTTON') return;
      btn.addEventListener('click', function () {
        activeCat = btn.getAttribute('data-faq-cat') || activeCat;
        faqCats.forEach(function (b) {
          if (b.tagName === 'BUTTON') {
            b.classList.toggle('is-active', b === btn);
          }
        });
        if (faqSearch) faqSearch.value = '';
        applyFaqFilter();
      });
    });

    if (faqSearch) {
      faqSearch.addEventListener('input', function () {
        applyFaqFilter();
      });
    }
    applyFaqFilter();

    faqRoot.querySelectorAll('.xt-pvclone-faq-copy').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var hash = btn.getAttribute('data-copy-url') || '';
        var url = window.location.origin + window.location.pathname + hash;
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(url).then(function () {
            var t = btn.textContent;
            btn.textContent = 'Copied!';
            setTimeout(function () {
              btn.textContent = t;
            }, 2000);
          });
        }
      });
    });
  }
})();
