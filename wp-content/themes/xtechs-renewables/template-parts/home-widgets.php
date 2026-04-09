<?php
if (!defined('ABSPATH')) {
    exit;
}

$reviews = xtechs_home_static_reviews();
?>
<section id="calculator-tile" class="xt-section xt-section-white">
    <div class="xt-container xt-container-narrow">
        <div class="xt-calc-header">
            <h2 class="xt-calc-title"><?php esc_html_e('Solar Advantage Calculator', 'xtechs-renewables'); ?></h2>
            <p class="xt-calc-sub"><?php esc_html_e('Estimate federal STCs and Victoria rebates for PV & battery.', 'xtechs-renewables'); ?></p>
        </div>
        <div class="xt-calc-shell xt-calc-shell-3col" id="xt-calc">
            <section class="xt-calc-card xt-calc-card-system">
                <header class="xt-calc-card-heading">
                    <span class="xt-calc-card-ico xt-calc-card-ico-blue" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </span>
                    <div class="xt-calc-card-heading-text">
                        <h3 class="xt-calc-card-title"><?php esc_html_e('System Details', 'xtechs-renewables'); ?></h3>
                        <p class="xt-calc-card-sub"><?php esc_html_e('Enter your location and system specifications', 'xtechs-renewables'); ?></p>
                    </div>
                </header>

                <div class="xt-calc-field">
                    <label for="xt-calc-postcode"><?php esc_html_e('Postcode', 'xtechs-renewables'); ?> <span class="xt-req" aria-hidden="true">*</span></label>
                    <input id="xt-calc-postcode" class="xt-calc-input-mono" type="text" maxlength="4" placeholder="3000" inputmode="numeric" autocomplete="postal-code" />
                </div>

                <div class="xt-calc-zone-row is-hidden" id="xt-calc-zone-row">
                    <span class="xt-calc-zone-check" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                    </span>
                    <span class="xt-badge-zone"><?php esc_html_e('STC Zone', 'xtechs-renewables'); ?>: <strong id="xt-calc-zone-label">4</strong></span>
                </div>
                <p class="xt-calc-postcode-err is-hidden" id="xt-calc-postcode-err" role="alert">
                    <span class="xt-calc-postcode-err-ico" aria-hidden="true">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                    </span>
                    <?php esc_html_e('Invalid postcode for Victoria', 'xtechs-renewables'); ?>
                </p>

                <div class="xt-calc-field">
                    <label for="xt-calc-system"><?php esc_html_e('System Size', 'xtechs-renewables'); ?>: <strong id="xt-calc-system-label">6.6 kW</strong></label>
                    <input id="xt-calc-system" class="xt-range" type="range" min="3" max="30" step="0.1" value="6.6" />
                    <div class="xt-calc-range-row"><span>3.1 kW</span><span>29.9 kW</span></div>
                    <p class="xt-calc-mini"><?php esc_html_e('Panels:', 'xtechs-renewables'); ?> <span id="xt-calc-panels-mini">15 x 440 W</span></p>
                </div>

                <div class="xt-calc-inline xt-calc-check">
                    <label>
                        <input id="xt-calc-include-battery" type="checkbox" />
                        <span class="xt-check-icon" aria-hidden="true">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="18" height="10" rx="2"/><path d="M22 11v2"/></svg>
                        </span>
                        <?php esc_html_e('Include Battery Storage', 'xtechs-renewables'); ?>
                    </label>
                </div>
                <input id="xt-calc-battery" type="hidden" value="0" />

                <div class="xt-calc-field">
                    <label for="xt-calc-audience"><?php esc_html_e('Audience', 'xtechs-renewables'); ?></label>
                    <select id="xt-calc-audience">
                        <option value="residential"><?php esc_html_e('Residential', 'xtechs-renewables'); ?></option>
                        <option value="business"><?php esc_html_e('Business', 'xtechs-renewables'); ?></option>
                        <option value="builder"><?php esc_html_e('Builders', 'xtechs-renewables'); ?></option>
                    </select>
                </div>

                <div class="xt-calc-elig">
                    <p><?php esc_html_e('Solar Victoria Eligibility', 'xtechs-renewables'); ?></p>
                    <label><input type="checkbox" class="xt-calc-elig-item" /> <?php esc_html_e('I am the homeowner', 'xtechs-renewables'); ?></label>
                    <label><input type="checkbox" class="xt-calc-elig-item" /> <?php esc_html_e('Annual income under $210,000', 'xtechs-renewables'); ?></label>
                    <label><input type="checkbox" class="xt-calc-elig-item" /> <?php esc_html_e('Property value under $3 million', 'xtechs-renewables'); ?></label>
                    <label><input type="checkbox" class="xt-calc-elig-item" /> <?php esc_html_e('No solar installed in the last 10 years', 'xtechs-renewables'); ?></label>
                </div>
            </section>

            <section class="xt-calc-card xt-calc-card-rebates" aria-labelledby="xt-calc-rebates-title">
                <header class="xt-calc-card-heading xt-calc-rebates-head">
                    <span class="xt-calc-card-ico xt-calc-rebates-ico" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/></svg>
                    </span>
                    <div class="xt-calc-card-heading-text">
                        <h3 class="xt-calc-card-title" id="xt-calc-rebates-title"><?php esc_html_e('Estimated Rebates', 'xtechs-renewables'); ?></h3>
                        <p class="xt-calc-card-sub"><?php esc_html_e('Your potential savings and incentives', 'xtechs-renewables'); ?></p>
                    </div>
                </header>

                <div class="xt-calc-output is-hidden" id="xt-calc-output">
                    <div class="xt-rebate-panel xt-rebate-sv">
                        <div class="xt-rebate-row-head">
                            <h4><?php esc_html_e('Solar Victoria Rebates', 'xtechs-renewables'); ?></h4>
                            <div class="xt-info-wrap">
                                <button type="button" class="xt-info-dot" aria-describedby="xt-tooltip-sv" aria-label="<?php esc_attr_e('Solar Victoria rebate information', 'xtechs-renewables'); ?>">i</button>
                                <div class="xt-tooltip" id="xt-tooltip-sv" role="tooltip">
                                    <ul class="xt-tooltip-list">
                                        <li><?php esc_html_e('Eligibility requires meeting all 4 checklist items.', 'xtechs-renewables'); ?></li>
                                        <li><?php esc_html_e('Rebate $1,400; optional interest-free loan of $1,400 over 4 years.', 'xtechs-renewables'); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p id="xt-calc-sv-status"><span class="xt-warn-dot" aria-hidden="true">!</span> <?php esc_html_e('0/4 criteria met - Check all requirements', 'xtechs-renewables'); ?></p>
                    </div>

                    <div class="xt-rebate-panel xt-rebate-fed">
                        <div class="xt-rebate-fed-top">
                            <h4><?php esc_html_e('Federal STCs (PV)', 'xtechs-renewables'); ?></h4>
                            <div class="xt-rebate-fed-top-right">
                                <span class="xt-rebate-badge"><strong id="xt-calc-stc">0</strong> STCs</span>
                                <div class="xt-info-wrap">
                                    <button type="button" class="xt-info-dot" aria-describedby="xt-tooltip-pv" aria-label="<?php esc_attr_e('PV STC calculation details', 'xtechs-renewables'); ?>">i</button>
                                    <div class="xt-tooltip xt-tooltip-wide" id="xt-tooltip-pv" role="tooltip">
                                        <div class="xt-tooltip-body" id="xt-calc-pv-tooltip-body"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="xt-rebate-value xt-rebate-value-hero" id="xt-calc-stc-value">$0</p>
                    </div>

                    <div class="xt-rebate-panel xt-rebate-total">
                        <div class="xt-rebate-row-head">
                            <h4><?php esc_html_e('Total Rebates', 'xtechs-renewables'); ?></h4>
                            <p class="xt-rebate-total-value" id="xt-calc-total">$0</p>
                        </div>
                        <div class="xt-rebate-breakdown">
                            <span class="xt-rebate-break-pv"><?php esc_html_e('PV STCs', 'xtechs-renewables'); ?>: <strong id="xt-calc-break-pv">$0</strong></span>
                            <span class="xt-rebate-break-sv"><?php esc_html_e('Solar Victoria', 'xtechs-renewables'); ?>: <strong id="xt-calc-vic">$0</strong></span>
                        </div>
                    </div>
                </div>
                <div class="xt-calc-empty" id="xt-calc-empty">
                    <div class="xt-calc-empty-icon" aria-hidden="true">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.6">
                            <rect x="4" y="2.5" width="16" height="19" rx="2.5"></rect>
                            <rect x="7" y="5.5" width="10" height="3.8" rx="1"></rect>
                            <circle cx="8.2" cy="12.4" r="1"></circle>
                            <circle cx="12" cy="12.4" r="1"></circle>
                            <circle cx="15.8" cy="12.4" r="1"></circle>
                            <circle cx="8.2" cy="16.3" r="1"></circle>
                            <circle cx="12" cy="16.3" r="1"></circle>
                            <circle cx="15.8" cy="16.3" r="1"></circle>
                        </svg>
                    </div>
                    <p><?php esc_html_e('Enter a valid Victorian postcode to see your rebate estimates', 'xtechs-renewables'); ?></p>
                </div>

                <button type="button" class="xt-btn xt-btn-primary xt-btn-block" id="xt-calc-run"><?php esc_html_e('Enter Valid Postcode', 'xtechs-renewables'); ?></button>
            </section>

            <section class="xt-calc-card xt-calc-card-proposal">
                <header class="xt-calc-card-heading">
                    <span class="xt-calc-card-ico xt-calc-card-ico-blue" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </span>
                    <div class="xt-calc-card-heading-text">
                        <h3 class="xt-calc-card-title"><?php esc_html_e('Proposal Summary', 'xtechs-renewables'); ?></h3>
                        <p class="xt-calc-card-sub"><?php esc_html_e('System components and estimated customer price', 'xtechs-renewables'); ?></p>
                    </div>
                </header>
                <div class="xt-calc-table">
                    <div class="xt-calc-table-head"><span><?php esc_html_e('Particulars', 'xtechs-renewables'); ?></span><span><?php esc_html_e('Qty', 'xtechs-renewables'); ?></span><span><?php esc_html_e('Unit Price', 'xtechs-renewables'); ?></span><span><?php esc_html_e('Total', 'xtechs-renewables'); ?></span></div>
                    <div class="xt-calc-table-row"><span id="xt-calc-proposal-panels"><?php esc_html_e('Solar Panels (15 × 440 W)', 'xtechs-renewables'); ?></span><span>15</span><span>XXX</span><span>XXX</span></div>
                    <div class="xt-calc-table-row"><span id="xt-calc-proposal-inverter"><?php esc_html_e('Inverter (5 kW)', 'xtechs-renewables'); ?></span><span>1</span><span>XXX</span><span>XXX</span></div>
                    <div class="xt-calc-table-row"><span><?php esc_html_e('Mounting Kit', 'xtechs-renewables'); ?></span><span>1</span><span>XXX</span><span>XXX</span></div>
                    <div class="xt-calc-table-row"><span><?php esc_html_e('Independent Inspection', 'xtechs-renewables'); ?></span><span>1</span><span>XXX</span><span>XXX</span></div>
                    <div class="xt-calc-table-foot"><?php esc_html_e('All pricing lines use placeholder values (XXX). Contact us for an exact quote.', 'xtechs-renewables'); ?></div>
                </div>

                <div class="xt-calc-proposal">
                    <div class="xt-calc-proposal-row xt-calc-proposal-market"><span><?php esc_html_e('Estimated market price', 'xtechs-renewables'); ?></span><strong id="xt-calc-market">$0</strong></div>
                    <div class="xt-calc-proposal-discounts">
                        <div class="xt-calc-proposal-row xt-calc-proposal-discount"><span><?php esc_html_e('PV STCs', 'xtechs-renewables'); ?></span><strong id="xt-calc-proposal-pv-discount">-$0</strong></div>
                        <div class="xt-calc-proposal-row xt-calc-proposal-discount" id="xt-calc-proposal-battery-row"><span><?php esc_html_e('Battery STCs', 'xtechs-renewables'); ?></span><strong id="xt-calc-proposal-battery-discount">-$0</strong></div>
                        <div class="xt-calc-proposal-row xt-calc-proposal-discount" id="xt-calc-proposal-sv-row"><span><?php esc_html_e('Solar Victoria', 'xtechs-renewables'); ?></span><strong id="xt-calc-proposal-sv-discount">-$0</strong></div>
                    </div>
                    <div class="xt-calc-proposal-row xt-calc-proposal-total"><span><?php esc_html_e('Estimated final customer price', 'xtechs-renewables'); ?></span><strong id="xt-calc-final">$0</strong></div>
                    <p class="xt-calc-disclaimer xt-calc-disclaimer-inline">
                        <?php esc_html_e('The prices you see are just estimates — reach out and we\'ll give you the exact quote for your project.', 'xtechs-renewables'); ?>
                    </p>
                </div>
                <a class="xt-btn xt-btn-primary xt-btn-block" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact Us for Exact Pricing', 'xtechs-renewables'); ?></a>
            </section>
        </div>        
    </div>
</section>

<section class="xt-reviews-section" id="xt-reviews-root" data-reviews="<?php echo esc_attr(wp_json_encode($reviews)); ?>">
    <div class="xt-container xt-reviews-inner">
        <header class="xt-reviews-header">
            <h2 class="xt-reviews-title"><?php esc_html_e('What Our Customers Say', 'xtechs-renewables'); ?></h2>
            <p class="xt-reviews-sub"><?php esc_html_e('Real reviews from satisfied customers who chose xTechs Renewables', 'xtechs-renewables'); ?></p>
        </header>

        <div class="xt-reviews-frame">
            <button type="button" class="xt-reviews-nav xt-reviews-prev" aria-label="<?php esc_attr_e('Previous review', 'xtechs-renewables'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button type="button" class="xt-reviews-nav xt-reviews-next" aria-label="<?php esc_attr_e('Next review', 'xtechs-renewables'); ?>">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
            </button>

            <div class="xt-reviews-card-wrap">
                <?php foreach ($reviews as $i => $r) : ?>
                    <div class="xt-review-card<?php echo $i === 0 ? ' is-active' : ''; ?>" data-review-index="<?php echo esc_attr((string) $i); ?>">
                        <div class="xt-review-layout">
                            <div class="xt-review-quote-icon" aria-hidden="true">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="white"><path d="M7.17 7H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-5l-4-5zm10 0h-3.17a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h5a2 2 0 0 0 2-2v-5l-4-5z"/></svg>
                            </div>
                            <div class="xt-review-body">
                                <div class="xt-review-stars" aria-hidden="true">
                                    <?php for ($s = 0; $s < 5; $s++) : ?>
                                        <span class="xt-star">★</span>
                                    <?php endfor; ?>
                                </div>
                                <blockquote class="xt-review-text">“<?php echo esc_html($r['text']); ?>”</blockquote>
                                <div class="xt-review-author">
                                    <div class="xt-review-avatar"><?php echo esc_html(function_exists('mb_substr') ? mb_substr($r['author_name'], 0, 1) : substr($r['author_name'], 0, 1)); ?></div>
                                    <div>
                                        <p class="xt-review-name"><?php echo esc_html($r['author_name']); ?></p>
                                        <p class="xt-review-source"><?php echo esc_html($r['source']); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="xt-reviews-dots" role="tablist">
            <?php foreach ($reviews as $i => $_r) : ?>
                <button type="button" class="xt-reviews-dot<?php echo $i === 0 ? ' is-active' : ''; ?>" data-go="<?php echo esc_attr((string) $i); ?>" aria-label="<?php echo esc_attr(sprintf(__('Go to review %d', 'xtechs-renewables'), $i + 1)); ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="xt-reviews-links">
            <p class="xt-reviews-links-lead"><?php esc_html_e('Read more reviews on', 'xtechs-renewables'); ?></p>
            <div class="xt-reviews-links-row">
                <a class="xt-reviews-ext" href="https://www.google.com/search?q=xTechs+Renewables+reviews" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Google Reviews', 'xtechs-renewables'); ?></a>
                <a class="xt-reviews-ext" href="https://www.solarquotes.com.au/solar-reviews/" target="_blank" rel="noopener noreferrer"><?php esc_html_e('SolarQuotes Reviews', 'xtechs-renewables'); ?></a>
            </div>
            <p class="xt-reviews-note"><?php esc_html_e('*Reviews shown from Google My Business and SolarQuotes.', 'xtechs-renewables'); ?></p>
        </div>
    </div>
</section>
