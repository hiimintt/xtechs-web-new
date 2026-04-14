(() => {
  const config = window.xtChatbot || {};
  const apiUrl = config.apiUrl || "/api/chat";
  const apiFallbackUrl = config.apiFallbackUrl || "/index.php?chat_api=1";
  const contactUrl = config.contactUrl || "/contact";

  const escapeHtml = (value) =>
    String(value || "")
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;");

  const nowGreeting = () => {
    const hour = new Date().getHours();
    if (hour >= 5 && hour < 12) return "Good morning";
    if (hour >= 12 && hour < 17) return "Good afternoon";
    if (hour >= 17 && hour < 21) return "Good evening";
    return "G'day";
  };

  const shell = document.createElement("div");
  shell.className = "xt-chatbot-shell";
  shell.innerHTML = `
    <button class="xt-chatbot-fab" type="button" aria-label="Open chat" aria-expanded="false" aria-controls="xt-chatbot-panel">
      <span class="xt-chatbot-fab-glyph" aria-hidden="true">💬</span>
    </button>
    <section id="xt-chatbot-panel" class="xt-chatbot-window" aria-label="xTechs chat support" hidden>
      <header class="xt-chatbot-header">
        <strong>xTechs Chat Support</strong>
        <div class="xt-chatbot-header-actions">
          <button type="button" data-chatbot-close aria-label="Close chat">×</button>
        </div>
      </header>

      <div class="xt-chatbot-body" data-chatbot-body hidden></div>
      <div class="xt-chatbot-suggestions" data-chatbot-suggestions hidden></div>
      <footer class="xt-chatbot-footer" data-chatbot-footer hidden>
        <input type="text" data-chatbot-input placeholder="Type your message..." />
        <button type="button" data-chatbot-send>Send</button>
      </footer>
      <a class="xt-chatbot-contact-link" href="${contactUrl}" hidden>Book Site Visit</a>
    </section>
  `;
  document.body.appendChild(shell);

  const fab = shell.querySelector(".xt-chatbot-fab");
  const win = shell.querySelector(".xt-chatbot-window");
  const closeBtn = shell.querySelector("[data-chatbot-close]");
  const body = shell.querySelector("[data-chatbot-body]");
  const input = shell.querySelector("[data-chatbot-input]");
  const sendBtn = shell.querySelector("[data-chatbot-send]");
  const suggestionsWrap = shell.querySelector("[data-chatbot-suggestions]");
  const footer = shell.querySelector("[data-chatbot-footer]");
  const contactLink = shell.querySelector(".xt-chatbot-contact-link");
  let loading = false;
  let customerInfo = null;
  let history = [];
  let panelInitialized = false;

  try {
    const savedCustomerInfo = sessionStorage.getItem("xt-chatbot-customer-info");
    if (savedCustomerInfo) {
      customerInfo = JSON.parse(savedCustomerInfo);
    }
  } catch (err) {
    customerInfo = null;
  }

  const addMessage = (role, content) => {
    const bubble = document.createElement("div");
    bubble.className = `xt-chatbot-msg xt-chatbot-msg-${role}`;
    bubble.innerHTML = `<p>${escapeHtml(content)}</p>`;
    body.appendChild(bubble);
    body.scrollTop = body.scrollHeight;
    history.push({ role, content });
  };

  const clearSuggestions = () => {
    suggestionsWrap.innerHTML = "";
  };

  const renderSuggestions = (text) => {
    clearSuggestions();
    const lower = text.toLowerCase();
    const suggestions = [];
    if (lower.includes("solar")) suggestions.push("What about battery storage?");
    if (lower.includes("battery")) suggestions.push("How much do batteries cost?");
    suggestions.push("Do you service my suburb?");
    suggestions.push("How do I get a quote?");
    suggestions.slice(0, 3).forEach((label) => {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className = "xt-chatbot-chip";
      btn.textContent = label;
      btn.addEventListener("click", () => {
        input.value = label;
        sendMessage();
      });
      suggestionsWrap.appendChild(btn);
    });
  };

  const showChatUI = () => {
    body.hidden = false;
    suggestionsWrap.hidden = false;
    footer.hidden = false;
    contactLink.hidden = false;
  };

  const setPanelOpen = (open) => {
    win.hidden = !open;
    fab.hidden = open;
    fab.setAttribute("aria-expanded", open ? "true" : "false");
    if (open && !panelInitialized) {
      panelInitialized = true;
      showChatUI();
      if (body.children.length === 0) {
        const name = customerInfo && customerInfo.fullName ? ` ${String(customerInfo.fullName).split(" ")[0]}` : "";
        addMessage("assistant", `${nowGreeting()}${name}! Welcome to xTechs Renewables. How can I help you today?`);
        renderSuggestions("solar");
      }
      setTimeout(() => input.focus(), 120);
    }
    if (open && panelInitialized) {
      setTimeout(() => {
        if (!footer.hidden) input.focus();
      }, 80);
    }
  };

  const setLoading = (isLoading) => {
    loading = isLoading;
    sendBtn.disabled = isLoading;
    input.disabled = isLoading;
    sendBtn.textContent = isLoading ? "..." : "Send";
  };

  const callChatApi = async (payload) => {
    let response = await fetch(apiUrl, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });
    if (response.status === 404 && apiFallbackUrl !== apiUrl) {
      response = await fetch(apiFallbackUrl, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload),
      });
    }
    return response;
  };

  const sendMessage = async () => {
    const message = input.value.trim();
    if (!message || loading) return;
    addMessage("user", message);
    input.value = "";
    clearSuggestions();
    setLoading(true);
    try {
      const res = await callChatApi({
        message,
        conversationHistory: history.slice(0, -1),
        customerInfo: customerInfo || undefined,
      });
      const json = await res.json().catch(() => ({}));
      if (!res.ok || !json.response) throw new Error(json.message || "Chat unavailable");
      addMessage("assistant", json.response);
      renderSuggestions(json.response);
    } catch (err) {
      addMessage("assistant", "Sorry, I am having trouble right now. Please call 1300 983 247.");
    } finally {
      setLoading(false);
      input.focus();
    }
  };

  fab.addEventListener("click", () => setPanelOpen(true));
  closeBtn.addEventListener("click", () => setPanelOpen(false));
  sendBtn.addEventListener("click", sendMessage);
  input.addEventListener("keydown", (event) => {
    if (event.key === "Enter") {
      event.preventDefault();
      sendMessage();
    }
  });

  // Panel starts closed; FAB opens it. Chat state is preserved when closing.
})();
