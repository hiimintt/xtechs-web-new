<?php
if (!defined('ABSPATH')) {
    exit;
}

$partner_name = 'Grounded Grocer';
$partner_slug = 'grounded-grocer';
$partner_logo = get_template_directory_uri() . '/assets/media/partners/grounded-cafe.png';
$xlogo = get_template_directory_uri() . '/assets/media/xlogo.png';
?>
<section class="xt-partner-landing" data-xt-partner-page>
    <div id="top"></div>

    <section class="xt-partner-hero">
        <div class="xt-container">
            <div class="xt-partner-badges">
                <span class="xt-partner-badge xt-partner-badge-primary">xTechs Local Business Partners</span>
                <span class="xt-partner-badge xt-partner-badge-outline">Grounded Grocer Partner Page</span>
            </div>

            <div class="xt-partner-logo-card">
                <img src="<?php echo esc_url($partner_logo); ?>" alt="Grounded Grocer logo" width="240" height="72" loading="eager" />
                <span class="xt-partner-logo-divider" aria-hidden="true"></span>
                <img src="<?php echo esc_url($xlogo); ?>" alt="xTechs Renewables logo" width="180" height="64" loading="eager" />
                <p>Local partnership</p>
            </div>

            <h1>Grounded Grocer Customers Get Rewarded for Going Solar</h1>
            <p class="xt-partner-subheadline">A local partnership built on trust - not advertising.</p>
            <p class="xt-partner-intro">
                You're here because Grounded Grocer has partnered with xTechs Renewables. That means they trust us enough to recommend us to their customers.
            </p>

            <div class="xt-partner-hero-actions">
                <a class="xt-btn xt-btn-primary" href="#get-a-quote">Get My Quote</a>
                <a class="xt-btn xt-btn-outline" href="#rewards">See Gift Card Rewards</a>
            </div>

            <p class="xt-partner-terms-link">Offer terms apply. <a href="#offer-terms">View terms</a>.</p>
        </div>
    </section>

    <section class="xt-partner-body">
        <div class="xt-container xt-partner-body-inner">
            <div class="xt-partner-grid">
                <div class="xt-partner-main">
                    <h2>Why This Partnership Exists</h2>
                    <p>Most people don't trust solar ads. And honestly - that's fair.</p>
                    <p>Local businesses don't recommend companies unless they genuinely believe in their work and are willing to put their reputation on the line.</p>
                    <p><?php echo esc_html($partner_name); ?> has partnered with xTechs Renewables because of our:</p>

                    <div class="xt-partner-trust-grid">
                        <article class="xt-partner-trust-item">
                            <h3>
                                <span class="xt-partner-trust-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm-1.2 14.2-3.3-3.3 1.4-1.4 1.9 1.9 4.4-4.4 1.4 1.4Z"></path>
                                    </svg>
                                </span>
                                <span>Professionalism</span>
                            </h3>
                            <p>Clear communication, clean process, and reliable scheduling.</p>
                        </article>
                        <article class="xt-partner-trust-item">
                            <h3>
                                <span class="xt-partner-trust-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm-1.2 14.2-3.3-3.3 1.4-1.4 1.9 1.9 4.4-4.4 1.4 1.4Z"></path>
                                    </svg>
                                </span>
                                <span>Transparent pricing</span>
                            </h3>
                            <p>No confusion, no hidden surprises.</p>
                        </article>
                        <article class="xt-partner-trust-item">
                            <h3>
                                <span class="xt-partner-trust-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm-1.2 14.2-3.3-3.3 1.4-1.4 1.9 1.9 4.4-4.4 1.4 1.4Z"></path>
                                    </svg>
                                </span>
                                <span>Quality installations</span>
                            </h3>
                            <p>Clean, compliant work designed for long-term performance.</p>
                        </article>
                        <article class="xt-partner-trust-item">
                            <h3>
                                <span class="xt-partner-trust-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false" aria-hidden="true">
                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2Zm-1.2 14.2-3.3-3.3 1.4-1.4 1.9 1.9 4.4-4.4 1.4 1.4Z"></path>
                                    </svg>
                                </span>
                                <span>Long-term accountability</span>
                            </h3>
                            <p>We stand behind the job - before and after install.</p>
                        </article>
                        <blockquote class="xt-partner-quote">
                            <p>"We partnered with xTechs Renewables because they're professional, transparent, and they look after people properly."</p>
                            <cite>Grounded Grocer</cite>
                        </blockquote>
                    </div>
                </div>

                <aside class="xt-partner-side">
                    <article class="xt-partner-card" id="offer-terms">
                        <h3>Offer terms</h3>
                        <ul>
                            <li>Offer applies to new solar and/or battery installs with xTechs Renewables initiated via this partner page.</li>
                            <li>One gift card per household/address.</li>
                            <li>Offer cannot be combined with other promotions unless explicitly stated.</li>
                            <li>Gift card is issued within 7 days of installation completion.</li>
                        </ul>
                        <p class="xt-partner-fine-print">By submitting this form you agree to be contacted about your enquiry. See our <a href="<?php echo esc_url(home_url('/privacy')); ?>">Privacy Policy</a>.</p>
                    </article>

                    <article class="xt-partner-card">
                        <h3>What happens next</h3>
                        <ul>
                            <li>We review your details and confirm the best available rebates.</li>
                            <li>We design a properly sized system (no overselling).</li>
                            <li>Your gift card offer is recorded as a <?php echo esc_html($partner_name); ?> referral.</li>
                        </ul>
                    </article>
                </aside>
            </div>

            <article class="xt-partner-card xt-partner-rebate-card">
                <h3>How the Federal Battery Rebate Works (simple version)</h3>
                <div class="xt-partner-grid">
                    <div class="xt-partner-main">
                        <p>There is no fixed cash rebate for batteries.</p>
                        <p>Your discount is applied upfront at installation and depends on the available government credits at that time.</p>
                        <ul>
                            <li><strong>Install earlier</strong> - bigger discount</li>
                            <li><strong>Install later</strong> - smaller discount</li>
                        </ul>

                        <details class="xt-partner-details">
                            <summary>Why the rebate reduces over time</summary>
                            <div>
                                <p>The rebate reduces over time by design as batteries become more common and prices fall.</p>
                                <ul>
                                    <li>Installing later generally means less support is applied upfront</li>
                                    <li>The lost rebate typically can't be "claimed later"</li>
                                    <li>Correct sizing matters (oversized batteries can receive reduced support)</li>
                                </ul>
                            </div>
                        </details>
                    </div>
                    <aside class="xt-partner-side">
                        <article class="xt-partner-card">
                            <h3>What this means for you</h3>
                            <p>If you're already considering Solar or Battery:</p>
                            <ul>
                                <li>Installing sooner can mean more rebate applied upfront</li>
                                <li>Waiting can mean paying more for the same system</li>
                                <li>The lost rebate typically cannot be recovered later</li>
                            </ul>
                            <p><strong>Timing matters - especially when you're close to a decision.</strong></p>
                        </article>
                    </aside>
                </div>
            </article>

            <article class="xt-partner-card">
                <h3>How It Works</h3>
                <div class="xt-partner-steps">
                    <div class="xt-partner-step"><span>1</span><p>Request your quote through this page</p></div>
                    <div class="xt-partner-step"><span>2</span><p>Receive a properly sized Solar and/or Battery solution</p></div>
                    <div class="xt-partner-step"><span>3</span><p>Install with xTechs Renewables</p></div>
                    <div class="xt-partner-step"><span>4</span><p>Receive your Grounded Grocer gift card</p></div>
                </div>
                <p class="xt-partner-muted">No pressure. No obligation. Just clear information.</p>
            </article>

            <section id="get-a-quote" class="xt-partner-quote-section">
                <h2>Get Your Solar &amp; Battery Quote</h2>
                <p>Send your details and we'll confirm rebates, design the right system size, and record your Grounded Grocer gift card offer.</p>

                <div class="xt-partner-grid">
                    <div class="xt-partner-main">
                        <article class="xt-partner-card">
                            <h3>Get Your Quote</h3>
                            <p class="xt-partner-form-intro">This form tags your enquiry as a <strong>Grounded Grocer referral</strong> so your gift card offer is recorded. No pressure. No obligation.</p>

                            <form class="xt-partner-form" data-xt-partner-form novalidate>
                                <div class="xt-contact-form-grid2">
                                    <label class="xt-contact-field">
                                        <span>Full name *</span>
                                        <input type="text" name="name" required placeholder="Your name" />
                                    </label>
                                    <label class="xt-contact-field">
                                        <span>Email *</span>
                                        <input type="email" name="email" required placeholder="you@example.com" />
                                    </label>
                                </div>

                                <div class="xt-contact-form-grid2">
                                    <label class="xt-contact-field">
                                        <span>Phone (optional)</span>
                                        <input type="text" name="phone" placeholder="04XX XXX XXX" />
                                    </label>
                                    <label class="xt-contact-field">
                                        <span>What are you looking to install?</span>
                                        <select name="interest">
                                            <option value="not_sure" selected>Not sure yet</option>
                                            <option value="solar_battery">Solar + Battery</option>
                                            <option value="solar_only">Solar only</option>
                                            <option value="battery_only">Battery only</option>
                                        </select>
                                    </label>
                                </div>

                                <p class="xt-partner-fine-print">Reward estimate: <strong data-xt-partner-reward>Gift card depends on final install type</strong></p>

                                <div class="xt-contact-form-grid2">
                                    <label class="xt-contact-field">
                                        <span>Postcode (optional)</span>
                                        <input type="text" name="postcode" placeholder="3000" maxlength="4" inputmode="numeric" />
                                    </label>
                                    <label class="xt-contact-field">
                                        <span>Suburb (optional)</span>
                                        <input type="text" name="suburb" placeholder="Your suburb" />
                                    </label>
                                </div>

                                <label class="xt-contact-field">
                                    <span>Notes (optional)</span>
                                    <textarea name="notes" rows="5" placeholder="Anything helpful (e.g., current solar, blackout concerns, usage patterns)."></textarea>
                                </label>

                                <p class="xt-contact-form-msg" data-xt-partner-msg aria-live="polite"></p>
                                <button class="xt-btn xt-btn-primary xt-btn-block" type="submit" data-xt-partner-submit>Get My Quote</button>

                                <p class="xt-partner-fine-print">By submitting, you agree to be contacted about your enquiry. Read our <a href="<?php echo esc_url(home_url('/privacy')); ?>">Privacy Policy</a>.</p>

                                <input type="hidden" name="partnerSlug" value="<?php echo esc_attr($partner_slug); ?>" />
                                <input type="hidden" name="partnerName" value="<?php echo esc_attr($partner_name); ?>" />
                                <input type="hidden" name="leadSource" value="partner_grounded_grocer" />
                            </form>
                        </article>
                    </div>

                    <aside class="xt-partner-side">
                        <div id="rewards" class="xt-partner-rewards-shell">
                            <article class="xt-partner-card">
                                <h3>Gift Card Rewards</h3>
                                <p class="xt-partner-rewards-collapsed">Click below to reveal the gift card amounts.</p>
                                <button class="xt-btn xt-btn-outline xt-btn-block" type="button" data-xt-rewards-toggle aria-expanded="false" aria-controls="xt-partner-rewards-details">
                                    Show Gift Card Rewards
                                </button>
                                <div id="xt-partner-rewards-details" class="xt-partner-rewards-expanded" data-xt-rewards-details hidden>
                                    <p class="xt-partner-rewards-intro">When you install Solar and/or Battery with xTechs Renewables using this page, you receive a <strong>Grounded Grocer gift card</strong>.</p>
                                    <ul>
                                        <li><strong>Solar + Battery</strong> - <strong>$500</strong> Grounded Grocer Gift Card</li>
                                        <li><strong>Solar Only</strong> OR <strong>Battery Only</strong> - <strong>$250</strong> Gift Card</li>
                                        <li>Gift card valid for 24 months</li>
                                        <li>Issued after installation completion</li>
                                    </ul>
                                    <div class="xt-partner-rewards-note">
                                        <p><strong>Why this matters</strong></p>
                                        <p>You lower your energy bills and get rewarded to spend locally.</p>
                                    </div>
                                </div>
                                <p class="xt-partner-fine-print">Prefer to talk first? <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact us</a> and mention "Grounded Grocer".</p>
                            </article>

                            <article class="xt-partner-card">
                                <h3>Quick reminder</h3>
                                <ul>
                                    <li>Offer terms apply and will be confirmed before you proceed.</li>
                                </ul>
                                <div class="xt-partner-reminder-box">
                                    <p><strong>Battery rebate</strong></p>
                                    <p>Install earlier -> bigger discount. Install later -> smaller discount.</p>
                                </div>
                                <p class="xt-partner-fine-print">Offer terms: <a href="#offer-terms">view here</a>.</p>
                            </article>
                        </div>
                    </aside>
                </div>
            </section>

            <article class="xt-partner-card xt-partner-faq-card">
                <h3>FAQ</h3>
                <details class="xt-partner-details">
                    <summary>Do I have to be a Grounded Grocer customer to qualify?</summary>
                    <div>No - anyone who submits an enquiry through this page and proceeds with an eligible install can qualify for the gift card, subject to the offer terms.</div>
                </details>
                <details class="xt-partner-details">
                    <summary>When do I receive the gift card?</summary>
                    <div>Gift cards are issued within 7 days after installation completion (subject to the offer terms).</div>
                </details>
                <details class="xt-partner-details">
                    <summary>Can I combine this with other xTechs promotions?</summary>
                    <div>No - this offer cannot be combined with other promotions unless explicitly stated.</div>
                </details>
            </article>

            <p class="xt-partner-bottom-line">Local Businesses Supporting Smarter Energy Choices</p>
        </div>
    </section>
</section>
