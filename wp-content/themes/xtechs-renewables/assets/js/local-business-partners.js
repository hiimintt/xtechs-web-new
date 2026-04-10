(() => {
  const qs = (sel, root = document) => root.querySelector(sel);
  const apiUrl = (window.xtPartner && window.xtPartner.apiUrl) || "/api/contact";
  const apiFallbackUrl = (window.xtPartner && window.xtPartner.apiFallbackUrl) || "/index.php?contact_api=1";

  const form = qs("[data-xt-partner-form]");
  const msg = qs("[data-xt-partner-msg]");
  const submitBtn = qs("[data-xt-partner-submit]");
  const rewardEl = qs("[data-xt-partner-reward]");
  const rewardsToggleBtn = qs("[data-xt-rewards-toggle]");
  const rewardsDetails = qs("[data-xt-rewards-details]");
  const interest = form ? qs("select[name=interest]", form) : null;

  const rewardByInterest = {
    solar_battery: "$500 Grounded Grocer Gift Card",
    solar_only: "$250 Grounded Grocer Gift Card",
    battery_only: "$250 Grounded Grocer Gift Card",
    not_sure: "Gift card depends on final install type",
  };

  const setMsg = (text, ok) => {
    if (!msg) return;
    msg.textContent = text;
    msg.style.color = ok ? "#0f766e" : "#b91c1c";
  };

  const updateRewardText = () => {
    if (!interest || !rewardEl) return;
    rewardEl.textContent = rewardByInterest[interest.value] || rewardByInterest.not_sure;
  };

  if (interest) {
    interest.addEventListener("change", updateRewardText);
    updateRewardText();
  }

  if (rewardsToggleBtn && rewardsDetails) {
    rewardsToggleBtn.addEventListener("click", () => {
      const isExpanded = rewardsToggleBtn.getAttribute("aria-expanded") === "true";
      rewardsToggleBtn.setAttribute("aria-expanded", isExpanded ? "false" : "true");
      rewardsDetails.hidden = isExpanded;
      rewardsToggleBtn.textContent = isExpanded ? "Show Gift Card Rewards" : "Hide rewards";
    });
  }

  if (!form || !submitBtn) return;

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    setMsg("", true);

    if (!form.reportValidity()) {
      return;
    }

    const fd = new FormData(form);
    const name = (fd.get("name") || "").toString().trim();
    const email = (fd.get("email") || "").toString().trim();
    const phone = (fd.get("phone") || "").toString().trim();
    const postcode = (fd.get("postcode") || "").toString().trim();
    const suburb = (fd.get("suburb") || "").toString().trim();
    const notes = (fd.get("notes") || "").toString().trim();
    const interestValue = (fd.get("interest") || "not_sure").toString().trim();
    const partnerName = (fd.get("partnerName") || "Grounded Grocer").toString().trim();
    const leadSource = (fd.get("leadSource") || "partner_grounded_grocer").toString().trim();

    const messageLines = [
      "Local Business Partner Enquiry",
      `Partner: ${partnerName}`,
      `Interest: ${interestValue}`,
      `Expected reward: ${rewardByInterest[interestValue] || rewardByInterest.not_sure}`,
      postcode ? `Postcode: ${postcode}` : "",
      suburb ? `Suburb: ${suburb}` : "",
      phone ? `Phone: ${phone}` : "",
      notes ? `Notes:\n${notes}` : "",
      document.referrer ? `Referrer: ${document.referrer}` : "",
    ].filter(Boolean);

    submitBtn.disabled = true;
    const oldText = submitBtn.textContent;
    submitBtn.textContent = "Submitting...";

    try {
      let res = await fetch(apiUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
          name,
          email,
          phone,
          message: messageLines.join("\n"),
          source: leadSource,
          leadType: "get_your_quote_submit",
          tenantId: "Sales",
        }),
      });

      // Local Apache setups may not have rewrite rules active for /api/contact.
      if (res.status === 404 && apiFallbackUrl !== apiUrl) {
        res = await fetch(apiFallbackUrl, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            name,
            email,
            phone,
            message: messageLines.join("\n"),
            source: leadSource,
            leadType: "get_your_quote_submit",
            tenantId: "Sales",
          }),
        });
      }

      const json = await res.json().catch(() => ({}));
      if (!res.ok || !json.success) {
        throw new Error((json && json.message) || "Submission failed. Please try again.");
      }

      if (window.xtGa4 && typeof window.xtGa4.track === "function") {
        window.xtGa4.track("generate_lead", {
          form_id: "partner_quote",
          form_destination: leadSource,
          value: 1,
        });
        window.xtGa4.track("quote_request", {
          type: "local_business_partner",
          partner: partnerName,
        });
      }

      form.reset();
      updateRewardText();
      setMsg("Thank You for your details. Our Solar Expert will get in touch with you.", true);
    } catch (err) {
      const errorMessage = err instanceof Error ? err.message : "Something went wrong. Please try again.";
      setMsg(errorMessage, false);
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = oldText || "Get My Quote";
    }
  });
})();
