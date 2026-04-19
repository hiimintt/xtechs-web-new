<?php
/**
 * Google Analytics 4
 *
 * Configuration: in wp-config.php (before "stop editing"):
 *   define( 'GA4_MEASUREMENT_ID', 'G-XXXXXXXXXX' );
 *
 * There is no inline gtag in header.php on purpose: assets/js/ga4.js is enqueued from
 * xtechs_enqueue_assets(), injects gtag/dataLayer after the user enables Analytics in the
 * cookie banner, and passes the ID via wp_localize_script (xtGa4Config.measurementId).
 *
 * Verify: Google Tag Assistant, or GA4 Admin → Data display → DebugView (with consent on).
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
