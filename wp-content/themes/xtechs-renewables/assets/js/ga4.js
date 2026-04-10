/**
 * Google Analytics 4 — loads only when cookie consent analytics = true.
 * Events: form_submit / generate_lead, phone_click, email_click, scroll_depth, cta_click.
 * In GA4 Admin → Events: mark generate_lead, phone_call_click, quote_request, contact_form_submit as conversions.
 */
(() => {
  const cfg = window.xtGa4Config || {};
  const MID = typeof cfg.measurementId === "string" ? cfg.measurementId.trim() : "";
  if (!MID) {
    window.xtGa4 = {
      track() {},
      isEnabled() {
        return false;
      },
    };
    return;
  }

  const COOKIE_KEY = "xtechs_consent_v1";

  const readConsent = () => {
    const row = document.cookie.split("; ").find((c) => c.startsWith(COOKIE_KEY + "="));
    if (!row) return { necessary: false, analytics: false, marketing: false };
    try {
      const raw = decodeURIComponent(row.split("=")[1] || "");
      return JSON.parse(raw);
    } catch (_e) {
      return { necessary: false, analytics: false, marketing: false };
    }
  };

  window.dataLayer = window.dataLayer || [];
  function gtag() {
    window.dataLayer.push(arguments);
  }
  window.gtag = gtag;

  let scriptInjected = false;

  const injectScript = () => {
    if (scriptInjected) return;
    scriptInjected = true;
    const s = document.createElement("script");
    s.async = true;
    s.src = "https://www.googletagmanager.com/gtag/js?id=" + encodeURIComponent(MID);
    document.head.appendChild(s);
    gtag("js", new Date());
    gtag("config", MID, {
      send_page_view: true,
    });
  };

  const ensureLoaded = () => {
    if (!readConsent().analytics) return false;
    injectScript();
    return true;
  };

  window.xtGa4 = {
    track(eventName, params) {
      if (!readConsent().analytics) return;
      ensureLoaded();
      gtag("event", eventName, params || {});
    },
    isEnabled() {
      return !!readConsent().analytics;
    },
  };

  if (readConsent().analytics) {
    injectScript();
  }

  window.addEventListener("xtechs:consent-updated", () => {
    ensureLoaded();
  });

  /** ---- Delegated events (only fire when analytics on) ---- */
  const safeTrack = (name, params) => {
    if (!readConsent().analytics) return;
    ensureLoaded();
    gtag("event", name, params || {});
  };

  document.addEventListener(
    "click",
    (e) => {
      if (!readConsent().analytics) return;
      const t = e.target;
      if (!(t instanceof Element)) return;

      const phoneA = t.closest('a[href^="tel:"]');
      if (phoneA instanceof HTMLAnchorElement) {
        safeTrack("phone_call_click", {
          link_url: phoneA.href,
          link_text: (phoneA.textContent || "").trim().slice(0, 120),
        });
        return;
      }

      const mailA = t.closest('a[href^="mailto:"]');
      if (mailA instanceof HTMLAnchorElement) {
        safeTrack("email_click", {
          link_url: mailA.href,
          link_text: (mailA.textContent || "").trim().slice(0, 120),
        });
      }
    },
    true
  );

  document.addEventListener(
    "click",
    (e) => {
      if (!readConsent().analytics) return;
      const t = e.target;
      if (!(t instanceof Element)) return;
      if (t.closest("[data-xt-no-ga]")) return;

      const cta = t.closest(
        "a.xt-btn-primary, a.xt-btn-outline, button.xt-btn-primary, button.xt-btn-outline, .xt-btn-primary, .xt-btn-outline"
      );
      if (!cta) return;
      if (cta.closest('a[href^="tel:"], a[href^="mailto:"]') || (cta instanceof HTMLAnchorElement && (/^tel:/i.test(cta.href) || /^mailto:/i.test(cta.href)))) {
        return;
      }
      const label = (cta.textContent || "").trim().replace(/\s+/g, " ").slice(0, 120);
      const href =
        cta instanceof HTMLAnchorElement
          ? cta.href
          : cta instanceof HTMLButtonElement && cta.form
            ? (cta.getAttribute("formaction") || "")
            : "";
      safeTrack("cta_click", {
        link_text: label || "cta",
        link_url: href || window.location.pathname,
      });
    },
    true
  );

  /** Scroll depth (once per threshold per page) */
  const scrollMarks = { 25: false, 50: false, 75: false, 90: false };
  const onScroll = () => {
    if (!readConsent().analytics) return;
    const doc = document.documentElement;
    const body = document.body;
    const scrollTop = window.scrollY || doc.scrollTop || body.scrollTop;
    const viewH = window.innerHeight;
    const fullH = Math.max(body.scrollHeight, doc.scrollHeight, body.offsetHeight, doc.offsetHeight);
    if (fullH <= viewH) return;
    const pct = Math.min(100, Math.round(((scrollTop + viewH) / fullH) * 100));
    [25, 50, 75, 90].forEach((mark) => {
      if (!scrollMarks[mark] && pct >= mark) {
        scrollMarks[mark] = true;
        ensureLoaded();
        gtag("event", "scroll_depth", {
          percent_scrolled: mark,
        });
      }
    });
  };

  let scrollT = 0;
  window.addEventListener(
    "scroll",
    () => {
      window.clearTimeout(scrollT);
      scrollT = window.setTimeout(onScroll, 150);
    },
    { passive: true }
  );
})();
