<?php
/**
 * Google Analytics 4 — set GA4_MEASUREMENT_ID in wp-config.php (G-XXXXXXXXXX).
 * Script enqueue: xtechs_enqueue_assets() in functions.php. Loads after cookie consent; respects Analytics toggle.
 *
 * Events (mark as conversions in GA4 → Admin → Events → toggle “Mark as conversion”):
 *   - generate_lead — contact message, booking handoff, partner quote (recommended GA4 event)
 *   - contact_form_submit — contact page message intent
 *   - quote_request — booking / partner quote funnel
 *   - phone_call_click — tel: links
 *   - email_click — mailto: links
 *   - scroll_depth — params percent_scrolled 25|50|75|90
 *   - cta_click — primary/outline buttons (.xt-btn-primary, .xt-btn-outline)
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @return bool
 */
function xtechs_ga4_is_configured(): bool {
    return defined('GA4_MEASUREMENT_ID') && is_string(GA4_MEASUREMENT_ID) && GA4_MEASUREMENT_ID !== ''
        && strpos((string) GA4_MEASUREMENT_ID, 'G-') === 0;
}
