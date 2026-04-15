<?php
if (!defined('ABSPATH')) {
    exit;
}

$hero_rel = '/assets/media/x-vrthing-hero.jpg';
$hero_abs = get_template_directory() . $hero_rel;
$hero_url = (is_readable($hero_abs)) ? xtechs_theme_asset_url($hero_rel) : '';
$ic_sparkles = '<svg class="xt-xv-sparkles" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m12 3-1.9 5.8a2 2 0 0 1-1.3 1.3L3 12l5.8 1.9a2 2 0 0 1 1.3 1.3L12 21l1.9-5.8a2 2 0 0 1 1.3-1.3L21 12l-5.8-1.9a2 2 0 0 1-1.3-1.3L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>';
?>

<div class="xt-xv-page">
    <div class="xt-xv-bg" aria-hidden="true">
        <?php if ($hero_url !== '') : ?>
            <div class="xt-xv-bg-photo xt-xv-bg-scale" style="background-image: url('<?php echo esc_url($hero_url); ?>');"></div>
        <?php else : ?>
            <div class="xt-xv-bg-fallback xt-xv-bg-scale"></div>
        <?php endif; ?>
        <div class="xt-xv-bg-overlay"></div>
    </div>

    <div class="xt-xv-shell xt-xv-enter">
        <div class="xt-xv-grid">
            <div class="xt-xv-col-headline">
                <h1 class="xt-xv-h1">
                    <span class="xt-xv-h1-line">DESIGN. INSTALL. SUPPLY.</span>
                    <span class="xt-xv-h1-line xt-xv-h1-gap">COMING SOON</span>
                </h1>
            </div>

            <div class="xt-xv-divider-v" aria-hidden="true">
                <div class="xt-xv-divider-v-line"></div>
            </div>

            <div class="xt-xv-col-form">
                <div class="xt-xv-eyebrow">
                    <?php echo $ic_sparkles; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG ?>
                    <span><?php echo esc_html__('Invite-Only Preview', 'xtechs-renewables'); ?></span>
                </div>
                <p class="xt-xv-blurb">
                    <?php echo esc_html__('We’re quietly building something for solar businesses—installers, EPCs and developers. Less noise. More throughput. Details shared with verified companies only.', 'xtechs-renewables'); ?>
                </p>

                <div class="xt-xv-pills" aria-hidden="true">
                    <?php foreach (['Design', 'Install', 'Supply'] as $pill) : ?>
                        <span class="xt-xv-pill">
                            <span class="xt-xv-pill-text"><?php echo esc_html($pill); ?></span>
                            <span class="xt-xv-pill-redact"></span>
                        </span>
                    <?php endforeach; ?>
                </div>

                <form class="xt-xv-form" id="xt-xv-form" novalidate>
                    <div class="xt-xv-field-row">
                        <div class="xt-xv-field">
                            <label class="xt-xv-label" for="xt-xv-name"><?php esc_html_e('Full Name', 'xtechs-renewables'); ?></label>
                            <input class="xt-xv-input" type="text" id="xt-xv-name" name="name" autocomplete="name" placeholder="Your name" />
                        </div>
                        <div class="xt-xv-field">
                            <label class="xt-xv-label xt-xv-label-muted" for="xt-xv-phone"><?php esc_html_e('Phone (optional)', 'xtechs-renewables'); ?></label>
                            <input class="xt-xv-input" type="tel" id="xt-xv-phone" name="phone" autocomplete="tel" placeholder="+61..." />
                        </div>
                    </div>
                    <div class="xt-xv-field">
                        <label class="xt-xv-label" for="xt-xv-email"><?php esc_html_e('Email', 'xtechs-renewables'); ?></label>
                        <input class="xt-xv-input" type="email" id="xt-xv-email" name="email" autocomplete="email" placeholder="your@company.com" />
                        <p class="xt-xv-error" id="xt-xv-error" hidden></p>
                    </div>
                    <div class="xt-xv-field-row">
                        <div class="xt-xv-field">
                            <label class="xt-xv-label xt-xv-label-muted" for="xt-xv-company"><?php esc_html_e('Company (optional)', 'xtechs-renewables'); ?></label>
                            <input class="xt-xv-input" type="text" id="xt-xv-company" name="company" autocomplete="organization" />
                        </div>
                        <div class="xt-xv-field">
                            <label class="xt-xv-label xt-xv-label-muted" for="xt-xv-interest"><?php esc_html_e('I’m interested as (optional)', 'xtechs-renewables'); ?></label>
                            <input class="xt-xv-input" type="text" id="xt-xv-interest" name="interest" placeholder="<?php echo esc_attr__('Installer/Electrician, EPC/Developer, Supplier/Manufacturer, Distributor, Other', 'xtechs-renewables'); ?>" />
                        </div>
                    </div>
                    <div class="xt-xv-check-row">
                        <input class="xt-xv-checkbox" type="checkbox" id="xt-xv-nda" name="nda" value="1" />
                        <label class="xt-xv-label xt-xv-check-label" for="xt-xv-nda"><?php esc_html_e('Contact me for a private beta under NDA.', 'xtechs-renewables'); ?></label>
                    </div>

                    <div class="xt-xv-captcha-block">
                        <span class="xt-xv-label"><?php esc_html_e('Security Verification', 'xtechs-renewables'); ?></span>
                        <div class="xt-xv-captcha" id="xt-xv-captcha">
                            <span class="xt-xv-captcha-loading" id="xt-xv-captcha-loading"><?php esc_html_e('Loading security verification…', 'xtechs-renewables'); ?></span>
                            <span class="xt-xv-captcha-ready" id="xt-xv-captcha-ready" hidden><?php esc_html_e('Verification ready', 'xtechs-renewables'); ?></span>
                        </div>
                    </div>

                    <button class="xt-btn xt-xv-submit" type="submit" id="xt-xv-submit" disabled>
                        <?php esc_html_e('Get Early Access', 'xtechs-renewables'); ?>
                    </button>
                    <p class="xt-xv-hint"><?php esc_html_e('We’ll only share details with verified business emails.', 'xtechs-renewables'); ?></p>
                    <p class="xt-xv-success" id="xt-xv-success" hidden><?php esc_html_e('Request received. We’ll be in touch.', 'xtechs-renewables'); ?></p>
                </form>

                <div class="xt-xv-socials">
                    <a class="xt-xv-social-link" href="mailto:hello@xtechs.au"><?php esc_html_e('Email', 'xtechs-renewables'); ?></a>
                    <span class="xt-xv-social-dot" aria-hidden="true">•</span>
                    <a class="xt-xv-social-link" href="https://www.instagram.com/" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Instagram', 'xtechs-renewables'); ?></a>
                </div>
            </div>

            <div class="xt-xv-divider-h" aria-hidden="true"></div>
        </div>
    </div>
</div>

<script>
(function () {
  var form = document.getElementById('xt-xv-form');
  if (!form) return;

  var nameEl = document.getElementById('xt-xv-name');
  var phoneEl = document.getElementById('xt-xv-phone');
  var emailEl = document.getElementById('xt-xv-email');
  var companyEl = document.getElementById('xt-xv-company');
  var interestEl = document.getElementById('xt-xv-interest');
  var ndaEl = document.getElementById('xt-xv-nda');
  var errEl = document.getElementById('xt-xv-error');
  var successEl = document.getElementById('xt-xv-success');
  var submitBtn = document.getElementById('xt-xv-submit');
  var capLoading = document.getElementById('xt-xv-captcha-loading');
  var capReady = document.getElementById('xt-xv-captcha-ready');

  var freeDomains = ['gmail.com','yahoo.com','outlook.com','hotmail.com','icloud.com','proton.me','protonmail.com','aol.com','live.com'];
  var captchaOk = false;

  function isFreeDomain(e) {
    var m = (e.split('@')[1] || '').toLowerCase();
    return m ? freeDomains.indexOf(m) !== -1 : true;
  }

  function setError(msg) {
    if (!errEl) return;
    if (msg) {
      errEl.textContent = msg;
      errEl.hidden = false;
      emailEl.setAttribute('aria-describedby', 'xt-xv-error');
    } else {
      errEl.textContent = '';
      errEl.hidden = true;
      emailEl.removeAttribute('aria-describedby');
    }
  }

  setTimeout(function () {
    captchaOk = true;
    if (capLoading) capLoading.hidden = true;
    if (capReady) capReady.hidden = false;
    if (submitBtn) submitBtn.disabled = false;
  }, 1200);

  form.addEventListener('submit', function (ev) {
    ev.preventDefault();
    setError('');
    successEl.hidden = true;

    var name = (nameEl.value || '').trim();
    var email = (emailEl.value || '').trim();
    var phone = (phoneEl.value || '').trim();
    if (name.length < 2) {
      setError('Enter your full name');
      return;
    }
    if (!/^\S+@\S+\.\S+$/.test(email)) {
      setError('Enter a valid work email');
      return;
    }
    if (isFreeDomain(email) && !(companyEl.value || '').trim()) {
      setError('Use a company email or add your company name for verification');
      return;
    }
    if (!captchaOk) {
      setError('Please complete the CAPTCHA verification');
      return;
    }

    submitBtn.disabled = true;
    var payload = {
      name: name,
      phone: phone,
      email: email,
      company: (companyEl.value || '').trim(),
      interest: (interestEl.value || '').trim(),
      nda: ndaEl.checked ? 1 : 0
    };
    var apiUrls = [
      '<?php echo esc_url(home_url('/api/trial')); ?>',
      '<?php echo esc_url(home_url('/index.php?trial_api=1')); ?>'
    ];

    var postTrial = function (url) {
      return fetch(url, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      })
        .then(function (res) {
          var ctype = (res.headers.get('content-type') || '').toLowerCase();
          if (ctype.indexOf('application/json') === -1) {
            return { ok: false, json: { message: 'Invalid response format from server' } };
          }
          return res.json().then(function (j) { return { ok: res.ok, json: j || {} }; });
        });
    };

    postTrial(apiUrls[0])
      .then(function (out) {
        if (out.ok && out.json && out.json.success) {
          return out;
        }
        return postTrial(apiUrls[1]);
      })
      .then(function (out) {
        if (!out.ok || !out.json.success) {
          throw new Error((out.json && out.json.message) ? out.json.message : 'Failed to submit');
        }
        successEl.hidden = false;
        form.reset();
      })
      .catch(function (err) {
        setError(err && err.message ? err.message : 'Could not submit request');
      })
      .finally(function () {
        submitBtn.disabled = false;
      });
  });
})();
</script>
