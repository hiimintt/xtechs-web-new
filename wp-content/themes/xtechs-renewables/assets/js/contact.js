(() => {
  const qs = (sel, root = document) => root.querySelector(sel);
  const qsa = (sel, root = document) => Array.from(root.querySelectorAll(sel));

  const contactRoot = qs(".xt-contact");
  const unifiedForm = qs("[data-xt-unified-form]");
  const intentSelect = qs("[data-xt-intent]");
  const titleEl = qs("[data-xt-contact-title]");
  const subEl = qs("[data-xt-contact-sub]");
  const messageEl = qs("[data-xt-message]");
  const subjectEl = qs("[data-xt-subject]");
  const bookingSteps = qsa("[data-xt-booking-step]");
  const bookingNote = qs(".xt-contact-note");
  const bookingOnlyInputs = qsa(
    "[data-xt-booking-field] input, [data-xt-booking-field] select, [data-xt-booking-field] textarea"
  );

  const currentIntent = () => (intentSelect ? intentSelect.value : "site-assessment");

  // Booking
  const dateBtns = qsa("[data-xt-date]");
  const timesWrap = qs("[data-xt-booking-times]");
  const timeGrid = qs("[data-xt-time-grid]");
  const formWrap = qs("[data-xt-booking-form]");
  const dateLabel = qs("[data-xt-booking-date-label]");
  const timeLabel = qs("[data-xt-booking-time-label]");
  const submitBtn = qs("[data-xt-submit]");
  const msgEl = qs("[data-xt-msg]");
  const contactCfg = window.xtContact || {};
  const bookingApiUrl = contactCfg.bookingApiUrl || "/api/bookings";
  const bookingPaymentUrl =
    contactCfg.bookingPaymentUrl || "https://buy.stripe.com/00weV61gj1G5gXF5C38Ra03";

  const WORKING = { start: 8, end: 17, lunchStart: 12, lunchEnd: 13 };
  const buildTimes = () => {
    const out = [];
    for (let h = WORKING.start; h < WORKING.end; h++) {
      if (h >= WORKING.lunchStart && h < WORKING.lunchEnd) continue;
      out.push(`${String(h).padStart(2, "0")}:00`);
      out.push(`${String(h).padStart(2, "0")}:30`);
    }
    return out;
  };

  let selectedDate = "";
  let selectedTime = "";
  let bookedTimes = [];
  let turnstileToken = "";

  const setMsg = (text, ok) => {
    if (!msgEl) return;
    msgEl.textContent = text;
    msgEl.style.color = ok ? "#0f766e" : "#b91c1c";
  };

  const updateSubmitState = () => {
    if (!submitBtn) return;
    const intent = currentIntent();
    const requiredFields = unifiedForm
      ? qsa("input[required], textarea[required], select[required]", unifiedForm)
      : [];

    const allFilled = requiredFields.every((el) => el.value.trim() !== "");
    const allValid = requiredFields.every((el) => el.checkValidity());
    const captchaOk = !contactCfg.turnstileEnabled || turnstileToken !== "";
    const hasSelection = intent === "site-assessment" ? selectedDate !== "" && selectedTime !== "" : true;
    submitBtn.disabled = !(hasSelection && allFilled && allValid && captchaOk);
  };

  const turnstileWrap = qs("[data-xt-turnstile]");
  const renderTurnstile = () => {
    if (!contactCfg.turnstileEnabled || !turnstileWrap) return;
    if (!window.turnstile || turnstileWrap.dataset.rendered === "1") return;

    window.turnstile.render(turnstileWrap, {
      sitekey: contactCfg.turnstileSiteKey,
      callback: (token) => {
        turnstileToken = token || "";
        updateSubmitState();
      },
      "expired-callback": () => {
        turnstileToken = "";
        updateSubmitState();
      },
      "error-callback": () => {
        turnstileToken = "";
        updateSubmitState();
        setMsg("Captcha error. Please retry.", false);
      },
    });
    turnstileWrap.dataset.rendered = "1";
  };

  const timeToMinutes = (t) => {
    const [hh, mm] = String(t)
      .split(":")
      .map((x) => parseInt(x, 10));
    if (Number.isNaN(hh) || Number.isNaN(mm)) return -1;
    return hh * 60 + mm;
  };

  const buildBlockedTimes = () => {
    const blocked = new Set();
    bookedTimes.forEach((t) => {
      const start = timeToMinutes(t);
      if (start < 0) return;
      [0, 30, 60].forEach((offset) => {
        const minutes = start + offset;
        const hh = String(Math.floor(minutes / 60)).padStart(2, "0");
        const mm = String(minutes % 60).padStart(2, "0");
        blocked.add(`${hh}:${mm}`);
      });
    });
    return blocked;
  };

  const fetchAvailability = async (date) => {
    bookedTimes = [];
    if (!date) return;
    try {
      const res = await fetch(`${bookingApiUrl}?date=${encodeURIComponent(date)}`);
      if (!res.ok) return;
      const json = await res.json();
      bookedTimes = Array.isArray(json.times) ? json.times : [];
    } catch (_err) {
      bookedTimes = [];
    }
  };

  const buildPaymentUrl = (bookingId, email) => {
    try {
      const url = new URL(bookingPaymentUrl);
      if (bookingId) {
        url.searchParams.set("client_reference_id", bookingId);
      }
      if (email) {
        url.searchParams.set("prefilled_email", email);
      }
      return url.toString();
    } catch (_err) {
      return bookingPaymentUrl;
    }
  };

  const renderTimes = () => {
    if (!timeGrid) return;
    timeGrid.innerHTML = "";
    const blockedTimes = buildBlockedTimes();
    buildTimes().forEach((t) => {
      const b = document.createElement("button");
      b.type = "button";
      const isBlocked = blockedTimes.has(t);
      b.className = "xt-contact-time";
      if (isBlocked) {
        b.classList.add("is-unavailable");
        b.disabled = true;
      }
      b.textContent = t;
      b.setAttribute("aria-pressed", "false");
      b.addEventListener("click", () => {
        if (isBlocked) return;
        selectedTime = t;
        qsa(".xt-contact-time", timeGrid).forEach((x) => {
          const on = x.textContent === t;
          x.classList.toggle("is-selected", on);
          x.setAttribute("aria-pressed", on ? "true" : "false");
        });
        if (timeLabel) timeLabel.textContent = selectedTime;
        if (formWrap) formWrap.hidden = false;
        if (bookingNote) {
          bookingNote.hidden = !(selectedDate && selectedTime);
        }
        updateSubmitState();
      });
      timeGrid.appendChild(b);
    });
  };

  dateBtns.forEach((b) =>
    b.addEventListener("click", async () => {
      selectedDate = b.getAttribute("data-xt-date") || "";
      dateBtns.forEach((x) => {
        const on = x === b;
        x.classList.toggle("is-selected", on);
        x.setAttribute("aria-pressed", on ? "true" : "false");
      });
      selectedTime = "";
      if (dateLabel) dateLabel.textContent = selectedDate;
      if (timeLabel) timeLabel.textContent = "";
      if (timesWrap) timesWrap.hidden = false;
      if (formWrap) formWrap.hidden = true;
      if (bookingNote) {
        bookingNote.hidden = true;
      }
      setMsg("", true);
      await fetchAvailability(selectedDate);
      updateSubmitState();
      renderTimes();
    })
  );

  // Render turnstile widget if enabled
  renderTurnstile();

  // File input label (Contact form)
  const filesLabel = qs("[data-xt-files-label]");
  const fileInput = qs(".xt-contact-file-btn input[type=file]");
  if (filesLabel && fileInput) {
    fileInput.addEventListener("change", () => {
      const n = fileInput.files ? fileInput.files.length : 0;
      filesLabel.textContent = n ? `${n} file(s) selected` : "No file chosen";
    });
  }

  if (contactCfg.turnstileEnabled && turnstileWrap && !window.turnstile) {
    const maxChecks = 40;
    let checks = 0;
    const timer = window.setInterval(() => {
      checks += 1;
      renderTurnstile();
      if (window.turnstile || checks >= maxChecks) {
        window.clearInterval(timer);
      }
    }, 250);
  }

  if (unifiedForm && submitBtn) {
    unifiedForm.addEventListener("input", updateSubmitState);
    unifiedForm.addEventListener("change", updateSubmitState);
    unifiedForm.addEventListener("blur", updateSubmitState, true);

    unifiedForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const intent = currentIntent();

      setMsg("", true);
      if (!unifiedForm.reportValidity()) return;

      if (intent === "site-assessment") {
        if (!selectedDate || !selectedTime) {
          setMsg("Please select date and time first.", false);
          return;
        }
        if (contactCfg.turnstileEnabled && turnstileToken === "") {
          setMsg("Please complete captcha verification.", false);
          return;
        }

        const fd = new FormData(unifiedForm);
        const payload = {
          firstName: (fd.get("firstName") || "").toString().trim(),
          lastName: (fd.get("lastName") || "").toString().trim(),
          email: (fd.get("email") || "").toString().trim(),
          phone: (fd.get("phone") || "").toString().trim(),
          address: (fd.get("address") || "").toString().trim(),
          serviceType: (fd.get("serviceType") || "").toString().trim(),
          notes: (fd.get("message") || "").toString().trim(),
          selectedDate,
          selectedTime,
          type: intent,
          captchaToken: turnstileToken,
        };

        submitBtn.disabled = true;
        const oldText = submitBtn.textContent;
        submitBtn.textContent = "Submitting...";

        try {
          const res = await fetch(bookingApiUrl, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload),
          });

          const json = await res.json().catch(() => ({}));
          if (!res.ok || !json.success) {
            throw new Error((json && json.error) || "Failed to create booking");
          }

          setMsg("Appointment confirmed. We will contact you shortly.", true);
          bookedTimes = [...bookedTimes, selectedTime];
          renderTimes();
          if (window.xtGa4 && typeof window.xtGa4.track === "function") {
            window.xtGa4.track("generate_lead", {
              form_id: "contact_booking",
              form_destination: "site_assessment",
              value: 1,
            });
            window.xtGa4.track("quote_request", {
              type: "site_assessment_booking",
            });
          }
          const paymentUrl = buildPaymentUrl(json.bookingId, payload.email);
          window.location.assign(paymentUrl);
        } catch (err) {
          const errorMessage = err instanceof Error ? err.message : "Could not create booking.";
          setMsg(errorMessage, false);
        } finally {
          submitBtn.textContent = oldText || "Submit";
          updateSubmitState();
        }
        return;
      }

      if (intent === "message") {
        if (contactCfg.turnstileEnabled && turnstileToken === "") {
          setMsg("Please complete captcha verification.", false);
          return;
        }

        const fd = new FormData(unifiedForm);
        const firstName = (fd.get("firstName") || "").toString().trim();
        const lastName = (fd.get("lastName") || "").toString().trim();
        const email = (fd.get("email") || "").toString().trim();
        const phone = (fd.get("phone") || "").toString().trim();
        const subject = (fd.get("subject") || "").toString().trim();
        const message = (fd.get("message") || "").toString().trim();

        submitBtn.disabled = true;
        const oldText = submitBtn.textContent;
        submitBtn.textContent = "Sending...";

        try {
          const res = await fetch(contactCfg.apiUrl || "/api/contact", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
              firstName,
              lastName,
              name: `${firstName} ${lastName}`.trim(),
              email,
              phone,
              subject,
              message,
              source: "contact-form",
              turnstileToken,
            }),
          });

          const json = await res.json().catch(() => ({}));
          if (!res.ok || !json.success) {
            throw new Error((json && json.message) || "Failed to submit");
          }

          setMsg("Message sent successfully. We will contact you soon.", true);
          if (window.xtGa4 && typeof window.xtGa4.track === "function") {
            window.xtGa4.track("generate_lead", {
              form_id: "contact_message",
              form_destination: "contact_form",
              value: 1,
            });
            window.xtGa4.track("contact_form_submit", {
              intent: "message",
            });
          }
        } catch (_err) {
          setMsg("Could not send your message. Please try again.", false);
        } finally {
          submitBtn.textContent = oldText || "Submit";
          updateSubmitState();
        }
      }
    });

    updateSubmitState();
  }

  if (contactRoot) {
    // remove legacy class toggle behavior
    contactRoot.classList.remove("is-contact-tab");
  }

  const syncIntentUi = () => {
    const intent = currentIntent();
    const isBooking = intent === "site-assessment";

    bookingSteps.forEach((el) => {
      el.hidden = !isBooking;
    });

    if (!isBooking) {
      selectedDate = "";
      selectedTime = "";
      if (dateLabel) dateLabel.textContent = "";
      if (timeLabel) timeLabel.textContent = "";
      if (timesWrap) timesWrap.hidden = true;
      if (formWrap) formWrap.hidden = false;
      if (bookingNote) bookingNote.hidden = true;
      qsa(".xt-contact-date").forEach((x) => {
        x.classList.remove("is-selected");
        x.setAttribute("aria-pressed", "false");
      });
      qsa(".xt-contact-time").forEach((x) => {
        x.classList.remove("is-selected");
        x.setAttribute("aria-pressed", "false");
      });
    }
    if (isBooking && bookingNote) {
      bookingNote.hidden = !(selectedDate && selectedTime);
    }

    bookingOnlyInputs.forEach((el) => {
      if (!(el instanceof HTMLInputElement || el instanceof HTMLTextAreaElement || el instanceof HTMLSelectElement)) return;
      if (isBooking) {
        el.disabled = false;
        el.setAttribute("required", "required");
      } else {
        el.disabled = true;
        el.removeAttribute("required");
        el.value = "";
      }
    });

    if (subjectEl) subjectEl.required = !isBooking;
    if (messageEl) {
      messageEl.placeholder = isBooking ? "Any specific requirements or questions..." : "Type your message here.";
    }

    if (titleEl) titleEl.textContent = isBooking ? "Book Site Assessment" : "Contact Us";
    if (subEl) {
      subEl.textContent = isBooking
        ? "Schedule a professional site assessment for your solar, battery, or electrical project."
        : "Have questions about our services? Send us a message and we'll get back to you as soon as possible.";
    }
    if (submitBtn) submitBtn.textContent = isBooking ? "Confirm Appointment" : "Send Message";

    setMsg("", true);
    updateSubmitState();
  };

  if (intentSelect) {
    intentSelect.addEventListener("change", () => {
      syncIntentUi();
      updateSubmitState();
    });
  }
  syncIntentUi();
})();

