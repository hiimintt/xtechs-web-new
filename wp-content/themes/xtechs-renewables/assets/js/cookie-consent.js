(() => {
  const COOKIE_KEY = "xtechs_consent_v1";
  const banner = document.getElementById("xt-cookie-banner");
  const modal = document.getElementById("xt-cookie-modal");
  const analyticsEl = document.getElementById("xt-cookie-analytics");
  const marketingEl = document.getElementById("xt-cookie-marketing");

  if (!banner) return;

  const readConsent = () => {
    const row = document.cookie
      .split("; ")
      .find((c) => c.startsWith(COOKIE_KEY + "="));
    if (!row) return null;
    try {
      return JSON.parse(decodeURIComponent(row.split("=")[1] || ""));
    } catch (_err) {
      return null;
    }
  };

  const writeConsent = (consent) => {
    const expires = new Date(Date.now() + 365 * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie =
      COOKIE_KEY +
      "=" +
      encodeURIComponent(JSON.stringify(consent)) +
      "; path=/; samesite=lax; expires=" +
      expires;
    window.dispatchEvent(new Event("xtechs:consent-updated"));
  };

  const setHidden = (el, hide) => {
    if (!el) return;
    if (hide) {
      el.setAttribute("hidden", "hidden");
    } else {
      el.removeAttribute("hidden");
    }
  };

  const closeAll = () => {
    setHidden(banner, true);
    setHidden(modal, true);
  };

  const existing = readConsent();
  if (!existing) {
    setHidden(banner, false);
  }

  document.addEventListener("click", (e) => {
    const target = e.target;
    if (!(target instanceof HTMLElement)) return;
    const action = target.getAttribute("data-xt-cookie-action");
    if (!action) return;

    if (action === "accept-all") {
      writeConsent({ necessary: true, analytics: true, marketing: true });
      closeAll();
      return;
    }
    if (action === "reject") {
      writeConsent({ necessary: true, analytics: false, marketing: false });
      closeAll();
      return;
    }
    if (action === "preferences") {
      const c = readConsent();
      if (analyticsEl) analyticsEl.checked = !!(c && c.analytics);
      if (marketingEl) marketingEl.checked = !!(c && c.marketing);
      setHidden(modal, false);
      return;
    }
    if (action === "close-preferences") {
      setHidden(modal, true);
      return;
    }
    if (action === "save-preferences") {
      writeConsent({
        necessary: true,
        analytics: !!(analyticsEl && analyticsEl.checked),
        marketing: !!(marketingEl && marketingEl.checked),
      });
      closeAll();
    }
  });
})();
