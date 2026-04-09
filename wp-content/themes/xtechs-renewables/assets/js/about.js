(() => {
  const prefersReduced =
    typeof window !== "undefined" &&
    window.matchMedia &&
    window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const qs = (sel, root = document) => root.querySelector(sel);
  const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  // ---- Reveal on scroll (stagger) ----
  const revealEls = qsa(".xt-reveal");
  if (!prefersReduced && revealEls.length) {
    const io = new IntersectionObserver(
      (entries) => {
        for (const e of entries) {
          if (!e.isIntersecting) continue;
          const el = e.target;
          const delay = Number(el.getAttribute("data-reveal-delay") || "0");
          el.style.setProperty("--xt-reveal-delay", `${delay}ms`);
          el.classList.add("is-inview");
          io.unobserve(el);
        }
      },
      { root: null, threshold: 0.12 }
    );
    revealEls.forEach((el) => io.observe(el));
  } else {
    revealEls.forEach((el) => el.classList.add("is-inview"));
  }

  // ---- Stats count-up ----
  const statsRoot = qs("[data-xt-about-stats]");
  const counters = statsRoot ? qsa("[data-xt-about-count]", statsRoot) : [];
  const runCounters = () => {
    counters.forEach((el) => {
      const target = Number(el.getAttribute("data-xt-about-count") || "0");
      const duration = 1200;
      const start = performance.now();
      const from = 0;
      const tick = (t) => {
        const p = Math.min(1, (t - start) / duration);
        // easeOutCubic
        const eased = 1 - Math.pow(1 - p, 3);
        const v = Math.floor(from + (target - from) * eased);
        el.textContent = String(v);
        if (p < 1) requestAnimationFrame(tick);
      };
      requestAnimationFrame(tick);
    });
  };

  if (counters.length) {
    let ran = false;
    const io = new IntersectionObserver(
      (entries) => {
        const any = entries.some((e) => e.isIntersecting);
        if (any && !ran) {
          ran = true;
          runCounters();
          io.disconnect();
        }
      },
      { threshold: 0.25 }
    );
    io.observe(statsRoot);
  }

  // ---- Team photo modal ----
  const openBtn = qs("[data-xt-about-open]");
  const modal = qs("[data-xt-about-modal]");
  if (openBtn && modal) {
    const closeEls = qsa("[data-xt-about-close]", modal);
    const onClose = () => {
      modal.hidden = true;
      document.documentElement.classList.remove("xt-modal-open");
    };
    const onOpen = () => {
      modal.hidden = false;
      document.documentElement.classList.add("xt-modal-open");
    };
    openBtn.addEventListener("click", onOpen);
    closeEls.forEach((el) => el.addEventListener("click", onClose));
    window.addEventListener("keydown", (e) => {
      if (e.key === "Escape" && !modal.hidden) onClose();
    });
  }
})();

