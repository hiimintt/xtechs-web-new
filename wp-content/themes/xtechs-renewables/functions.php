<?php
if (!defined('ABSPATH')) {
    exit;
}

define('XTECHS_THEME_VERSION', '1.4.3');

require_once get_template_directory() . '/inc/ga4.php';
require_once get_template_directory() . '/inc/resend-notify.php';

/**
 * Whether to load the chatbot script + footer FAB (skip thin legal pages by default).
 */
function xtechs_should_enqueue_chatbot(): bool {
    if (is_admin() || wp_doing_ajax()) {
        return false;
    }
    if (is_feed() || is_embed()) {
        return false;
    }
    if (is_page(['privacy', 'cookies', 'terms'])) {
        return false;
    }

    return (bool) apply_filters('xtechs_enqueue_chatbot', true);
}

/**
 * Disable page caching aggressively on local Docker hosts so CSS/JS changes are visible immediately.
 */
function xtechs_is_local_runtime_host(): bool {
    $http_host = isset($_SERVER['HTTP_HOST']) ? (string) $_SERVER['HTTP_HOST'] : '';
    return strpos($http_host, 'host.docker.internal') !== false
        || strpos($http_host, 'localhost') !== false
        || strpos($http_host, '127.0.0.1') !== false;
}

add_action('init', function (): void {
    if (!xtechs_is_local_runtime_host()) {
        return;
    }
    if (!defined('DONOTCACHEPAGE')) {
        define('DONOTCACHEPAGE', true);
    }
    if (!defined('DONOTCACHEOBJECT')) {
        define('DONOTCACHEOBJECT', true);
    }
    if (!defined('DONOTCACHEDB')) {
        define('DONOTCACHEDB', true);
    }
}, 1);

add_action('send_headers', function (): void {
    // Only localhost / Docker — production visitors are not affected (audits often miss this guard).
    if (!xtechs_is_local_runtime_host()) {
        return;
    }
    nocache_headers();
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    header('Pragma: no-cache');
    header('Expires: Wed, 11 Jan 1984 05:00:00 GMT');
}, 1);

/**
 * If permalinks are still "Plain" (?page_id=), switch to Post name once (first admin visit with capability).
 * Server must support rewrites (.htaccess or nginx rules). Settings → Permalinks still allows manual override.
 *
 * Disabled by default: set in wp-config.php before this file loads:
 *   define( 'XTECHS_AUTO_PRETTY_PERMALINKS', true );
 * so production is not surprised by a rewrite break on first admin visit.
 */
function xtechs_theme_enable_pretty_permalinks_once(): void {
    if (!defined('XTECHS_AUTO_PRETTY_PERMALINKS') || !XTECHS_AUTO_PRETTY_PERMALINKS) {
        return;
    }
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }
    if (get_option('xtechs_pretty_permalink_scan_done') === XTECHS_THEME_VERSION) {
        return;
    }
    update_option('xtechs_pretty_permalink_scan_done', XTECHS_THEME_VERSION);
    $structure = get_option('permalink_structure');
    if ($structure === '' || $structure === false) {
        update_option('permalink_structure', '/%postname%/');
        flush_rewrite_rules(false);
    }
}
add_action('admin_init', 'xtechs_theme_enable_pretty_permalinks_once', 2);

add_action('after_setup_theme', 'xtechs_theme_setup');
function xtechs_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'xtechs-renewables'),
        'footer' => __('Footer Menu', 'xtechs-renewables'),
    ]);
}

add_action('wp_enqueue_scripts', 'xtechs_enqueue_assets');
function xtechs_enqueue_assets() {
    $critical_css_path = get_template_directory() . '/assets/css/critical.css';
    $global_css_path = get_template_directory() . '/assets/css/global.css';
    $global_css_min_path = get_template_directory() . '/assets/css/global.min.css';
    $legal_css_path = get_template_directory() . '/assets/css/legal-pages.css';
    $locations_css_path = get_template_directory() . '/assets/css/locations-pages.css';
    $loc_landing_css_path = get_template_directory() . '/assets/css/location-landing.css';
    $contact_css_path = get_template_directory() . '/assets/css/contact-page.css';
    $contact_css_min_path = get_template_directory() . '/assets/css/contact-page.min.css';
    $home_interactive_css_path = get_template_directory() . '/assets/css/home-interactive.css';
    $home_interactive_css_min_path = get_template_directory() . '/assets/css/home-interactive.min.css';
    $xclasses_css_path = get_template_directory() . '/assets/css/xclasses.css';
    $xvrthing_css_path = get_template_directory() . '/assets/css/x-vrthing.css';
    $loc_process_js_path = get_template_directory() . '/assets/js/location-process.js';
    $theme_js_path = get_template_directory() . '/assets/js/theme.js';
    $theme_js_min_path = get_template_directory() . '/assets/js/theme.min.js';
    $theme_home_js_path = get_template_directory() . '/assets/js/theme-home.js';
    $theme_home_js_min_path = get_template_directory() . '/assets/js/theme-home.min.js';
    $theme_pv_js_path = get_template_directory() . '/assets/js/theme-pv.js';
    $theme_pv_js_min_path = get_template_directory() . '/assets/js/theme-pv.min.js';
    $about_js_path = get_template_directory() . '/assets/js/about.js';
    $contact_js_path = get_template_directory() . '/assets/js/contact.js';
    $contact_js_min_path = get_template_directory() . '/assets/js/contact.min.js';
    $local_partner_js_path = get_template_directory() . '/assets/js/local-business-partners.js';
    $chatbot_js_path = get_template_directory() . '/assets/js/chatbot.js';
    $cookie_js_path = get_template_directory() . '/assets/js/cookie-consent.js';
    $ga4_js_path = get_template_directory() . '/assets/js/ga4.js';
    $is_local_host = xtechs_is_local_runtime_host();
    $disable_asset_cache = (is_user_logged_in() && current_user_can('manage_options')) || $is_local_host;
    $runtime_ver = (string) time();

    $critical_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($critical_css_path) ? (string) filemtime($critical_css_path) : XTECHS_THEME_VERSION);
    $active_global_css_path = file_exists($global_css_min_path) ? $global_css_min_path : $global_css_path;
    $active_global_css_uri = file_exists($global_css_min_path)
        ? get_template_directory_uri() . '/assets/css/global.min.css'
        : get_template_directory_uri() . '/assets/css/global.css';
    $global_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($active_global_css_path) ? (string) filemtime($active_global_css_path) : XTECHS_THEME_VERSION);
    $legal_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($legal_css_path) ? (string) filemtime($legal_css_path) : XTECHS_THEME_VERSION);
    $locations_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($locations_css_path) ? (string) filemtime($locations_css_path) : XTECHS_THEME_VERSION);
    $loc_landing_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($loc_landing_css_path) ? (string) filemtime($loc_landing_css_path) : XTECHS_THEME_VERSION);
    $active_contact_css_path = file_exists($contact_css_min_path) ? $contact_css_min_path : $contact_css_path;
    $active_contact_css_uri = file_exists($contact_css_min_path)
        ? get_template_directory_uri() . '/assets/css/contact-page.min.css'
        : get_template_directory_uri() . '/assets/css/contact-page.css';
    $contact_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($active_contact_css_path) ? (string) filemtime($active_contact_css_path) : XTECHS_THEME_VERSION);
    $use_home_interactive_min = !$disable_asset_cache && file_exists($home_interactive_css_min_path);
    $active_home_interactive_css_path = $use_home_interactive_min ? $home_interactive_css_min_path : $home_interactive_css_path;
    $active_home_interactive_css_uri = $use_home_interactive_min
        ? get_template_directory_uri() . '/assets/css/home-interactive.min.css'
        : get_template_directory_uri() . '/assets/css/home-interactive.css';
    $home_interactive_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($active_home_interactive_css_path) ? (string) filemtime($active_home_interactive_css_path) : XTECHS_THEME_VERSION);
    $xclasses_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($xclasses_css_path) ? (string) filemtime($xclasses_css_path) : XTECHS_THEME_VERSION);
    $xvrthing_css_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($xvrthing_css_path) ? (string) filemtime($xvrthing_css_path) : XTECHS_THEME_VERSION);
    $loc_process_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($loc_process_js_path) ? (string) filemtime($loc_process_js_path) : XTECHS_THEME_VERSION);
    $active_theme_js_path = file_exists($theme_js_min_path) ? $theme_js_min_path : $theme_js_path;
    $active_theme_js_uri = file_exists($theme_js_min_path)
        ? get_template_directory_uri() . '/assets/js/theme.min.js'
        : get_template_directory_uri() . '/assets/js/theme.js';
    $theme_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($active_theme_js_path) ? (string) filemtime($active_theme_js_path) : XTECHS_THEME_VERSION);
    $use_theme_home_min = !$disable_asset_cache && file_exists($theme_home_js_min_path);
    $active_theme_home_js_path = $use_theme_home_min ? $theme_home_js_min_path : $theme_home_js_path;
    $active_theme_home_js_uri = $use_theme_home_min
        ? get_template_directory_uri() . '/assets/js/theme-home.min.js'
        : get_template_directory_uri() . '/assets/js/theme-home.js';
    $theme_home_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($active_theme_home_js_path) ? (string) filemtime($active_theme_home_js_path) : XTECHS_THEME_VERSION);
    $active_theme_pv_js_path = file_exists($theme_pv_js_min_path) ? $theme_pv_js_min_path : $theme_pv_js_path;
    $active_theme_pv_js_uri = file_exists($theme_pv_js_min_path)
        ? get_template_directory_uri() . '/assets/js/theme-pv.min.js'
        : get_template_directory_uri() . '/assets/js/theme-pv.js';
    $theme_pv_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($active_theme_pv_js_path) ? (string) filemtime($active_theme_pv_js_path) : XTECHS_THEME_VERSION);
    $about_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($about_js_path) ? (string) filemtime($about_js_path) : XTECHS_THEME_VERSION);
    $active_contact_js_path = file_exists($contact_js_min_path) ? $contact_js_min_path : $contact_js_path;
    $active_contact_js_uri = file_exists($contact_js_min_path)
        ? get_template_directory_uri() . '/assets/js/contact.min.js'
        : get_template_directory_uri() . '/assets/js/contact.js';
    $contact_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($active_contact_js_path) ? (string) filemtime($active_contact_js_path) : XTECHS_THEME_VERSION);
    $local_partner_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($local_partner_js_path) ? (string) filemtime($local_partner_js_path) : XTECHS_THEME_VERSION);
    $chatbot_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($chatbot_js_path) ? (string) filemtime($chatbot_js_path) : XTECHS_THEME_VERSION);
    $cookie_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($cookie_js_path) ? (string) filemtime($cookie_js_path) : XTECHS_THEME_VERSION);
    $ga4_js_ver = $disable_asset_cache
        ? $runtime_ver
        : (file_exists($ga4_js_path) ? (string) filemtime($ga4_js_path) : XTECHS_THEME_VERSION);

    wp_enqueue_style('xtechs-theme-style', get_stylesheet_uri(), [], XTECHS_THEME_VERSION);
    wp_enqueue_style(
        'xtechs-theme-critical',
        get_template_directory_uri() . '/assets/css/critical.css',
        ['xtechs-theme-style'],
        $critical_css_ver
    );
    wp_enqueue_style(
        'xtechs-theme-main',
        $active_global_css_uri,
        ['xtechs-theme-critical'],
        $global_css_ver
    );
    if (is_page(['privacy', 'cookies', 'terms'])) {
        wp_enqueue_style(
            'xtechs-legal-pages',
            get_template_directory_uri() . '/assets/css/legal-pages.css',
            ['xtechs-theme-main'],
            $legal_css_ver
        );
    }
    if (is_page(['locations', 'melbourne'])) {
        wp_enqueue_style(
            'xtechs-locations-pages',
            get_template_directory_uri() . '/assets/css/locations-pages.css',
            ['xtechs-theme-main'],
            $locations_css_ver
        );
    }
    $loc_landing_slugs = ['melbourne-cbd', 'bendigo', 'geelong', 'mornington-peninsula', 'south-east-melbourne'];
    if (is_page($loc_landing_slugs)) {
        wp_enqueue_style(
            'xtechs-loc-landing',
            get_template_directory_uri() . '/assets/css/location-landing.css',
            ['xtechs-theme-main'],
            $loc_landing_css_ver
        );
        wp_enqueue_script(
            'xtechs-loc-process',
            get_template_directory_uri() . '/assets/js/location-process.js',
            [],
            $loc_process_js_ver,
            true
        );
    }
    if (is_page('x-vrthing')) {
        wp_enqueue_style(
            'xtechs-xvrthing-page',
            get_template_directory_uri() . '/assets/css/x-vrthing.css',
            ['xtechs-theme-main'],
            $xvrthing_css_ver
        );
    }
    if (is_page('x-classes')) {
        wp_enqueue_style(
            'xtechs-xclasses-page',
            get_template_directory_uri() . '/assets/css/xclasses.css',
            ['xtechs-theme-main'],
            $xclasses_css_ver
        );
    }
    if (is_page('contact')) {
        wp_enqueue_style(
            'xtechs-contact-page',
            $active_contact_css_uri,
            ['xtechs-theme-main'],
            $contact_css_ver
        );
    }
    if (is_front_page() || is_home()) {
        wp_enqueue_style(
            'xtechs-home-interactive',
            $active_home_interactive_css_uri,
            ['xtechs-theme-main'],
            $home_interactive_css_ver
        );
    }

    wp_enqueue_script(
        'xtechs-theme-main',
        $active_theme_js_uri,
        [],
        $theme_js_ver,
        true
    );
    if (is_front_page() || is_home()) {
        wp_enqueue_script(
            'xtechs-theme-home',
            $active_theme_home_js_uri,
            ['xtechs-theme-main'],
            $theme_home_js_ver,
            true
        );
    }
    $pv_page_slugs = ['pv-battery', 'battery', 'ev-chargers', 'residential', 'business', 'off-grid', 'builders'];
    if (is_page($pv_page_slugs)) {
        wp_enqueue_script(
            'xtechs-theme-pv',
            $active_theme_pv_js_uri,
            ['xtechs-theme-main'],
            $theme_pv_js_ver,
            true
        );
    }

    wp_enqueue_script(
        'xtechs-cookie-consent',
        get_template_directory_uri() . '/assets/js/cookie-consent.js',
        [],
        $cookie_js_ver,
        true
    );
    wp_localize_script('xtechs-cookie-consent', 'xtCookieConsent', [
        'privacyUrl' => home_url('/privacy'),
        'cookiesUrl' => home_url('/cookies'),
    ]);

    if (xtechs_ga4_is_configured()) {
        wp_enqueue_script(
            'xtechs-ga4',
            get_template_directory_uri() . '/assets/js/ga4.js',
            ['xtechs-cookie-consent'],
            $ga4_js_ver,
            true
        );
        wp_localize_script('xtechs-ga4', 'xtGa4Config', [
            'measurementId' => (string) GA4_MEASUREMENT_ID,
        ]);
    }

    $ga4_dep = xtechs_ga4_is_configured() ? ['xtechs-ga4'] : [];

    if (is_page('about')) {
        wp_enqueue_script(
            'xtechs-about',
            get_template_directory_uri() . '/assets/js/about.js',
            [],
            $about_js_ver,
            true
        );
    }

    if (is_page('contact')) {
        $turnstile_site_key = defined('TURNSTILE_SITE_KEY') ? TURNSTILE_SITE_KEY : '';
        $booking_payment_url = defined('BOOKING_PAYMENT_URL') ? BOOKING_PAYMENT_URL : 'https://buy.stripe.com/00weV61gj1G5gXF5C38Ra03';
        if ($turnstile_site_key !== '') {
            wp_enqueue_script(
                'xtechs-turnstile',
                'https://challenges.cloudflare.com/turnstile/v0/api.js',
                [],
                null,
                true
            );
        }
        wp_enqueue_script(
            'xtechs-contact',
            $active_contact_js_uri,
            $ga4_dep,
            $contact_js_ver,
            true
        );
        wp_localize_script('xtechs-contact', 'xtContact', [
            'apiUrl' => home_url('/api/contact'),
            'bookingApiUrl' => home_url('/api/bookings'),
            'bookingPaymentUrl' => $booking_payment_url,
            'turnstileEnabled' => $turnstile_site_key !== '',
            'turnstileSiteKey' => $turnstile_site_key,
        ]);
    }

    if (is_post_type_archive('partner') || is_singular('partner')) {
        wp_enqueue_script(
            'xtechs-local-business-partners',
            get_template_directory_uri() . '/assets/js/local-business-partners.js',
            $ga4_dep,
            $local_partner_js_ver,
            true
        );
        wp_localize_script('xtechs-local-business-partners', 'xtPartner', [
            'apiUrl' => home_url('/api/contact'),
            'apiFallbackUrl' => home_url('/index.php?contact_api=1'),
        ]);
    }

    if (xtechs_should_enqueue_chatbot()) {
        wp_enqueue_script(
            'xtechs-chatbot',
            get_template_directory_uri() . '/assets/js/chatbot.js',
            [],
            $chatbot_js_ver,
            true
        );
        wp_localize_script('xtechs-chatbot', 'xtChatbot', [
            'apiUrl' => home_url('/api/chat'),
            'apiFallbackUrl' => home_url('/index.php?chat_api=1'),
            'contactUrl' => home_url('/contact'),
        ]);
        xtechs_mark_script_defer('xtechs-chatbot');
    }

    xtechs_mark_script_defer('xtechs-theme-main');
    xtechs_mark_script_defer('xtechs-theme-home');
    xtechs_mark_script_defer('xtechs-theme-pv');
    xtechs_mark_script_defer('xtechs-cookie-consent');
    xtechs_mark_script_defer('xtechs-contact');
    xtechs_mark_script_defer('xtechs-about');
    xtechs_mark_script_defer('xtechs-local-business-partners');
    xtechs_mark_script_defer('xtechs-loc-process');
    xtechs_mark_script_defer('xtechs-ga4');

}

/**
 * Mark a script as defer when the current WP version supports it.
 */
function xtechs_mark_script_defer(string $handle): void {
    if (!wp_script_is($handle, 'enqueued')) {
        return;
    }
    wp_script_add_data($handle, 'strategy', 'defer');
}

/**
 * Load heavy theme CSS asynchronously after critical CSS is applied.
 */
add_filter('style_loader_tag', function (string $html, string $handle, string $href, string $media): string {
    if ($handle !== 'xtechs-theme-main') {
        return $html;
    }
    $href_attr = esc_url($href);
    return "<link rel='preload' href='{$href_attr}' as='style' onload=\"this.onload=null;this.rel='stylesheet'\">"
        . "<noscript><link rel='stylesheet' href='{$href_attr}'></noscript>";
}, 10, 4);

/**
 * Optimize attachment image attributes by default.
 */
add_filter('wp_get_attachment_image_attributes', function (array $attr): array {
    if (empty($attr['decoding'])) {
        $attr['decoding'] = 'async';
    }

    $class_name = isset($attr['class']) ? (string) $attr['class'] : '';
    $is_hero = strpos($class_name, 'hero') !== false || strpos($class_name, 'brand') !== false;

    if (!isset($attr['fetchpriority'])) {
        $attr['fetchpriority'] = $is_hero ? 'high' : 'low';
    }
    if (!isset($attr['loading'])) {
        $attr['loading'] = $is_hero ? 'eager' : 'lazy';
    }

    return $attr;
}, 10, 1);

/**
 * Add fast-loading defaults for hardcoded <img> tags in theme templates.
 */
function xtechs_optimize_html_img_tags(string $html): string {
    if (stripos($html, '<img') === false) {
        return $html;
    }

    return (string) preg_replace_callback('/<img\b[^>]*>/i', static function (array $matches): string {
        $tag = $matches[0];
        $class_name = '';
        if (preg_match('/\bclass=(["\'])(.*?)\1/i', $tag, $m)) {
            $class_name = strtolower((string) $m[2]);
        }

        $is_lcp_candidate = strpos($class_name, 'hero') !== false
            || strpos($class_name, 'brand') !== false
            || stripos($tag, 'fetchpriority=') !== false;

        $append_attr = static function (string $current_tag, string $attr): string {
            return (string) preg_replace('/\s*\/?>$/', ' ' . $attr . '$0', $current_tag, 1);
        };

        if (stripos($tag, 'decoding=') === false) {
            $tag = $append_attr($tag, $is_lcp_candidate ? 'decoding="sync"' : 'decoding="async"');
        }
        if (stripos($tag, 'loading=') === false) {
            $tag = $append_attr($tag, $is_lcp_candidate ? 'loading="eager"' : 'loading="lazy"');
        }
        if (stripos($tag, 'fetchpriority=') === false) {
            $tag = $append_attr($tag, $is_lcp_candidate ? 'fetchpriority="high"' : 'fetchpriority="low"');
        }

        if (preg_match('/\bsrc=(["\'])(.*?)\1/i', $tag, $src_match)) {
            $src_url = (string) $src_match[2];
            $theme_uri = rtrim((string) get_template_directory_uri(), '/');
            if (strpos($src_url, $theme_uri . '/assets/') === 0) {
                $relative_path = substr($src_url, strlen($theme_uri));
                $optimized_src = xtechs_theme_asset_url((string) $relative_path);
                if ($optimized_src !== $src_url) {
                    $tag = str_replace($src_match[0], 'src="' . esc_url($optimized_src) . '"', $tag);
                    $src_url = $optimized_src;
                }
            }
            if (stripos($tag, 'width=') === false || stripos($tag, 'height=') === false) {
                $dims = xtechs_theme_image_dimensions_by_url($src_url);
                if (is_array($dims)) {
                    if (stripos($tag, 'width=') === false) {
                        $tag = $append_attr($tag, 'width="' . (int) $dims[0] . '"');
                    }
                    if (stripos($tag, 'height=') === false) {
                        $tag = $append_attr($tag, 'height="' . (int) $dims[1] . '"');
                    }
                }
            }
        }

        return $tag;
    }, $html) ?: $html;
}

add_action('template_redirect', function (): void {
    if (is_admin() || wp_doing_ajax()) {
        return;
    }
    ob_start('xtechs_optimize_html_img_tags');
}, 0);

/**
 * Force-load chatbot script if optimization/cache plugins skip enqueued script.
 */
add_action('wp_footer', function (): void {
    if (is_admin() || wp_doing_ajax()) {
        return;
    }
    if (!xtechs_should_enqueue_chatbot()) {
        return;
    }
    $chatbot_path = get_template_directory() . '/assets/js/chatbot.js';
    $chatbot_src = get_template_directory_uri() . '/assets/js/chatbot.js';
    $chatbot_ver = file_exists($chatbot_path) ? (string) filemtime($chatbot_path) : XTECHS_THEME_VERSION;
    ?>
    <script>
    (function () {
      if (document.querySelector('.xt-chatbot-shell')) return;
      var existing = document.querySelector('script[src*="assets/js/chatbot.js"]');
      if (existing) return;
      var s = document.createElement('script');
      s.src = "<?php echo esc_url($chatbot_src); ?>?v=<?php echo esc_attr($chatbot_ver); ?>";
      s.defer = true;
      document.body.appendChild(s);
    })();
    </script>
    <?php
}, 100);

/**
 * Fail-safe loader: re-inject chatbot script if it did not initialize.
 */

add_action('widgets_init', 'xtechs_widgets_init');
function xtechs_widgets_init() {
    register_sidebar([
        'name' => __('Footer Widgets', 'xtechs-renewables'),
        'id' => 'footer-widgets',
        'before_widget' => '<div class="footer-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ]);
}

require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/home-data.php';
require_once get_template_directory() . '/inc/pv-segment-config.php';
require_once get_template_directory() . '/inc/pv-landing.php';
require_once get_template_directory() . '/inc/solarfold-page-resolve.php';
require_once get_template_directory() . '/inc/theme-pages-seed.php';
require_once get_template_directory() . '/inc/location-landing-config.php';
require_once get_template_directory() . '/inc/location-process.php';
require_once get_template_directory() . '/inc/xclasses-page-resolve.php';
require_once get_template_directory() . '/inc/amber-electric-page-resolve.php';
require_once get_template_directory() . '/inc/x-vrthing-page-resolve.php';
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/seo-keyword-targets.php';
require_once get_template_directory() . '/inc/onpage-seo.php';

/**
 * URL for a Page: uses real permalink when a published page exists at $path (e.g. pv-battery/residential).
 * Falls back to home_url so links still resolve after you create pages or change permalink structure.
 */
function xtechs_page_link(string $path): string {
    $path = trim($path, '/');
    if ($path === '') {
        return home_url('/');
    }
    if (preg_match('#^pv-battery/(residential|business|off-grid|builders)$#', $path, $m)) {
        $resolved = xtechs_resolve_pv_battery_child_permalink($m[1]);
        if ($resolved !== '') {
            return $resolved;
        }
    }
    if ($path === 'battery') {
        $resolved = xtechs_resolve_battery_page_permalink();
        if ($resolved !== '') {
            return $resolved;
        }
    }
    if ($path === 'ev-chargers') {
        $resolved = xtechs_resolve_ev_chargers_page_permalink();
        if ($resolved !== '') {
            return $resolved;
        }
    }
    $page = get_page_by_path($path);
    if ($page instanceof WP_Post && $page->post_status === 'publish') {
        return get_permalink($page);
    }
    return home_url('/' . $path . '/');
}

require_once get_template_directory() . '/inc/pv-clone-helpers.php';
require_once get_template_directory() . '/inc/pv-clone-icons.php';
require_once get_template_directory() . '/inc/pv-clone-process-data.php';
require_once get_template_directory() . '/inc/pv-clone-faq-data.php';
require_once get_template_directory() . '/inc/pv-clone-cards-data.php';
require_once get_template_directory() . '/inc/solution-clone-data.php';

function xtechs_icon_chevron_down(): string {
    return '<svg class="xt-icon xt-icon-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>';
}

function xtechs_icon_menu(): string {
    return '<svg class="xt-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 5h16M4 12h16M4 19h16"/></svg>';
}

function xtechs_icon_close(): string {
    return '<svg class="xt-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>';
}

function xtechs_icon_mail(): string {
    return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"/><rect x="2" y="4" width="20" height="16" rx="2"/></svg>';
}

function xtechs_icon_phone(): string {
    return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>';
}

function xtechs_icon_instagram(): string {
    return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><path d="M17.5 6.5h.01"/></svg>';
}

function xtechs_icon_linkedin(): string {
    return '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>';
}

function xtechs_icon_youtube(): string {
    return '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>';
}

function xtechs_icon_facebook(): string {
    return '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>';
}

add_action('wp_head', function () {
    $preload_rel = '/assets/media/xlogo.png';
    if (is_page('solarfold') || is_page(['solarfold', 'mobil-grid', 'solar-hybrid-box'])) {
        $preload_rel = '/assets/media/solarfold-hero.jpg';
    } elseif (is_page('x-vrthing')) {
        $preload_rel = '/assets/media/x-vrthing-hero.jpg';
    } elseif (is_page('about')) {
        $preload_rel = '/assets/media/team.png';
    } elseif (is_front_page() || is_home()) {
        $preload_rel = '/assets/media/xlogo.png';
    }

    $preload_url = xtechs_theme_asset_url($preload_rel);
    $mime = 'image/webp';
    if (preg_match('/\.(png)$/i', $preload_url)) {
        $mime = 'image/png';
    } elseif (preg_match('/\.(jpe?g)$/i', $preload_url)) {
        $mime = 'image/jpeg';
    }
    echo '<link rel="preload" as="image" href="' . esc_url($preload_url) . '" type="' . esc_attr($mime) . '" fetchpriority="high" />' . "\n";
}, 1);

/**
 * Return a theme asset URL and prefer sibling .webp files when available.
 */
function xtechs_theme_asset_url(string $relative_path): string {
    $relative_path = '/' . ltrim($relative_path, '/');
    $asset_url = get_template_directory_uri() . $relative_path;

    $ext = strtolower((string) pathinfo($relative_path, PATHINFO_EXTENSION));
    if (!in_array($ext, ['jpg', 'jpeg', 'png'], true)) {
        return $asset_url;
    }

    $webp_relative_path = (string) preg_replace('/\.(jpe?g|png)$/i', '.webp', $relative_path);
    $webp_absolute_path = get_template_directory() . $webp_relative_path;
    if (is_readable($webp_absolute_path)) {
        return get_template_directory_uri() . $webp_relative_path;
    }

    return $asset_url;
}

/**
 * Home / location services grid image: optional WebP source when a sibling .webp file exists.
 *
 * @param string $relative_path Theme-relative path e.g. assets/media/services/residential-1.jpg
 */
function xtechs_theme_service_card_img(string $relative_path, string $alt, string $classes, bool $decorative = false): string {
    $relative_path = ltrim(str_replace('\\', '/', $relative_path), '/');
    $rel_slash = '/' . $relative_path;
    $abs_original = get_template_directory() . $rel_slash;
    $webp_rel_slash = (string) preg_replace('/\.(jpe?g|png)$/i', '.webp', $rel_slash);
    $abs_webp = get_template_directory() . $webp_rel_slash;

    $orig_uri = get_template_directory_uri() . $rel_slash;
    $webp_uri = get_template_directory_uri() . $webp_rel_slash;

    $has_orig = is_readable($abs_original);
    $has_webp = is_readable($abs_webp);

    $alt_attr = $decorative ? ' alt=""' : ' alt="' . esc_attr($alt) . '"';
    $common = ' class="' . esc_attr($classes) . '" loading="lazy" width="176" height="176" decoding="async"';

    if ($has_webp && $has_orig) {
        return '<picture>'
            . '<source type="image/webp" srcset="' . esc_url($webp_uri) . '" />'
            . '<img src="' . esc_url($orig_uri) . '"' . $alt_attr . $common . ' />'
            . '</picture>';
    }

    $src = xtechs_theme_asset_url($rel_slash);
    if (!$has_orig && $has_webp) {
        $src = $webp_uri;
    }

    return '<img src="' . esc_url($src) . '"' . $alt_attr . $common . ' />';
}

/**
 * Resolve theme asset image dimensions from a URL.
 */
function xtechs_theme_image_dimensions_by_url(string $asset_url): ?array {
    static $dims_cache = [];
    if (isset($dims_cache[$asset_url])) {
        return $dims_cache[$asset_url];
    }

    $theme_uri = rtrim((string) get_template_directory_uri(), '/');
    if (strpos($asset_url, $theme_uri . '/assets/') !== 0) {
        $dims_cache[$asset_url] = null;
        return null;
    }

    $relative_path = substr($asset_url, strlen($theme_uri));
    $absolute_path = get_template_directory() . $relative_path;
    if (!is_readable($absolute_path)) {
        $dims_cache[$asset_url] = null;
        return null;
    }

    $size = @getimagesize($absolute_path);
    if (!is_array($size) || empty($size[0]) || empty($size[1])) {
        $dims_cache[$asset_url] = null;
        return null;
    }

    $dims_cache[$asset_url] = [(int) $size[0], (int) $size[1]];
    return $dims_cache[$asset_url];
}

/**
 * Build srcset string from generated width variants (e.g. image-640.webp).
 */
function xtechs_theme_asset_srcset(string $relative_path, array $widths): string {
    $srcset_parts = [];
    $preferred_url = xtechs_theme_asset_url($relative_path);
    $theme_uri = rtrim((string) get_template_directory_uri(), '/');
    $preferred_rel = (strpos($preferred_url, $theme_uri) === 0)
        ? substr($preferred_url, strlen($theme_uri))
        : ('/' . ltrim($relative_path, '/'));
    $ext = strtolower((string) pathinfo($preferred_rel, PATHINFO_EXTENSION));
    $base_rel = (string) preg_replace('/\.[^.]+$/', '', $preferred_rel);

    foreach ($widths as $width) {
        $w = (int) $width;
        if ($w <= 0) {
            continue;
        }
        $variant_rel = $base_rel . '-' . $w . '.' . $ext;
        $variant_abs = get_template_directory() . $variant_rel;
        if (!is_readable($variant_abs)) {
            continue;
        }
        $srcset_parts[] = esc_url(get_template_directory_uri() . $variant_rel) . ' ' . $w . 'w';
    }

    $dims = xtechs_theme_image_dimensions_by_url($preferred_url);
    if (is_array($dims) && isset($dims[0])) {
        $srcset_parts[] = esc_url($preferred_url) . ' ' . (int) $dims[0] . 'w';
    } else {
        $srcset_parts[] = esc_url($preferred_url) . ' 1600w';
    }

    return implode(', ', array_unique($srcset_parts));
}

function xtechs_primary_menu_fallback() {
    echo '<ul>';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/pv-battery')) . '">PV & Battery</a></li>';
    echo '<li><a href="' . esc_url(home_url('/solarfold')) . '">SolarFold</a></li>';
    echo '<li><a href="' . esc_url(home_url('/x-classes')) . '">X-Classes</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '</ul>';
}

/**
 * Contact API endpoint via /api/contact route using rewrite rule.
 */
add_action('init', function (): void {
    // Add rewrite rule for /api/contact endpoint
    add_rewrite_rule(
        '^api/contact/?$',
        'index.php?contact_api=1',
        'top'
    );

    // Add rewrite rule for /api/bookings endpoint
    add_rewrite_rule(
        '^api/bookings/?$',
        'index.php?bookings_api=1',
        'top'
    );

    // Add rewrite rule for /api/chat endpoint
    add_rewrite_rule(
        '^api/chat/?$',
        'index.php?chat_api=1',
        'top'
    );

    // Add rewrite rule for /api/trial endpoint
    add_rewrite_rule(
        '^api/trial/?$',
        'index.php?trial_api=1',
        'top'
    );

    // SolarFold product routes (avoid WP slug clashes / canonical redirects).
    // These map to the SolarFold hub page but set a dedicated query var to render the product template.
    add_rewrite_rule(
        '^solarfold/(solarfold|mobil-grid|solar-hybrid-box)/?$',
        'index.php?pagename=solarfold&xt_solarfold_key=$matches[1]',
        'top'
    );
}, 1);

add_filter('query_vars', function (array $vars): array {
    $vars[] = 'contact_api';
    $vars[] = 'bookings_api';
    $vars[] = 'chat_api';
    $vars[] = 'trial_api';
    $vars[] = 'xt_solarfold_key';
    return $vars;
});

add_filter('redirect_canonical', static function ($redirect_url) {
    $key = (string) get_query_var('xt_solarfold_key', '');
    if (in_array($key, ['solarfold', 'mobil-grid', 'solar-hybrid-box'], true)) {
        return false;
    }
    return $redirect_url;
});

function xtechs_time_to_minutes(string $time): int {
    $parts = explode(':', $time);
    if (count($parts) !== 2) {
        return -1;
    }
    $hours = (int) $parts[0];
    $minutes = (int) $parts[1];
    return ($hours * 60) + $minutes;
}

function xtechs_open_leads_db(): ?wpdb {
    $db_user = defined('DB_USER') ? (string) DB_USER : 'root';
    $db_pass = defined('DB_PASSWORD') ? (string) DB_PASSWORD : '';
    $db_name = defined('DB_NAME') ? (string) DB_NAME : 'wordpress';
    $db_host = defined('DB_HOST') ? (string) DB_HOST : '127.0.0.1';

    $leads_db = new wpdb($db_user, $db_pass, $db_name, $db_host);
    if (!empty($leads_db->error)) {
        return null;
    }
    return $leads_db;
}

function xtechs_open_remote_leads_db(): ?wpdb {
    $host = defined('REMOTE_LEADS_DB_HOST') ? (string) REMOTE_LEADS_DB_HOST : '';
    $name = defined('REMOTE_LEADS_DB_NAME') ? (string) REMOTE_LEADS_DB_NAME : '';
    $user = defined('REMOTE_LEADS_DB_USER') ? (string) REMOTE_LEADS_DB_USER : '';
    $pass = defined('REMOTE_LEADS_DB_PASSWORD') ? (string) REMOTE_LEADS_DB_PASSWORD : '';
    $port = defined('REMOTE_LEADS_DB_PORT') ? (int) REMOTE_LEADS_DB_PORT : 3306;

    if ($host === '' || $name === '' || $user === '' || $pass === '') {
        return null;
    }

    $host_with_port = $host;
    if ($port > 0 && strpos($host, ':') === false) {
        $host_with_port = $host . ':' . $port;
    }

    $remote_db = new wpdb($user, $pass, $name, $host_with_port);
    if (!empty($remote_db->error)) {
        return null;
    }
    return $remote_db;
}

function xtechs_remote_leads_enabled(): bool {
    return defined('REMOTE_LEADS_ENABLED') && (bool) REMOTE_LEADS_ENABLED;
}

function xtechs_write_remote_contact_lead(array $lead, ?string &$error_message = null): bool {
    if (!xtechs_remote_leads_enabled()) {
        return true;
    }

    $remote_db = xtechs_open_remote_leads_db();
    if (!$remote_db) {
        $error_message = 'Remote DB connection failed';
        return false;
    }

    $marketing_payload = wp_json_encode([
        'subject' => (string) ($lead['subject'] ?? ''),
        'message' => (string) ($lead['message'] ?? ''),
        'origin_source' => (string) ($lead['source'] ?? 'contact-form'),
        'lead_type' => (string) ($lead['lead_type'] ?? 'contact_form_submit'),
        'tenant_id' => (string) ($lead['tenant_id'] ?? 'wordpress'),
    ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

    $result = $remote_db->insert(
        'leads',
        [
            'stage' => 'new',
            'customer_name' => (string) ($lead['name'] ?? ''),
            'email' => (string) ($lead['email'] ?? ''),
            'phone' => (string) ($lead['phone'] ?? ''),
            'source' => 'website',
            'external_id' => (string) ($lead['id'] ?? ''),
            'marketing_payload_json' => is_string($marketing_payload) ? $marketing_payload : null,
            'created_at' => current_time('mysql', true),
            'updated_at' => current_time('mysql', true),
        ],
        ['%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s']
    );

    if ($result === false) {
        $error_message = (string) $remote_db->last_error;
    }

    return $result !== false;
}

function xtechs_write_remote_trial_user(string $name, string $email, string $phone = '', ?string &$error_message = null): bool {
    if (!xtechs_remote_leads_enabled()) {
        $error_message = 'Remote leads integration is disabled';
        return false;
    }

    $remote_db = xtechs_open_remote_leads_db();
    if (!$remote_db) {
        $error_message = 'Remote DB connection failed';
        return false;
    }

    $query = $remote_db->prepare(
        "INSERT INTO `trial_users` (`name`, `phone`, `email`, `created_at`, `updated_at`)
         VALUES (%s, %s, %s, NOW(), NOW())
         ON DUPLICATE KEY UPDATE
           `name` = VALUES(`name`),
           `phone` = VALUES(`phone`),
           `updated_at` = NOW()",
        $name,
        $phone,
        $email
    );

    if (!is_string($query) || $query === '') {
        $error_message = 'Failed to prepare remote trial_users query';
        return false;
    }

    $result = $remote_db->query($query);
    if ($result === false) {
        $error_message = (string) $remote_db->last_error;
        return false;
    }
    return true;
}

function xtechs_chatbot_knowledge_base(): array {
    return [
        [
            'title' => 'About xTechs Renewables',
            'content' => 'xTechs Renewables provides solar PV, battery storage, EV charging, off-grid solutions, and electrical services across Victoria. We are based in Rowville, Melbourne.',
            'keywords' => ['about', 'company', 'victoria', 'melbourne', 'rowville'],
        ],
        [
            'title' => 'Residential Solar and Battery',
            'content' => 'We design and install residential solar PV and battery systems with compliant workmanship and support for Solar Victoria rebate pathways.',
            'keywords' => ['residential', 'home', 'solar', 'battery', 'rebate'],
        ],
        [
            'title' => 'Commercial Solar',
            'content' => 'We deliver business and commercial solar systems with monitoring, export-limit considerations, and installation planning aligned to operations.',
            'keywords' => ['commercial', 'business', 'industrial', 'solar'],
        ],
        [
            'title' => 'Battery Storage',
            'content' => 'Battery options include major brands such as Tesla Powerwall, Alpha ESS, BYD, and Sungrow depending on project requirements.',
            'keywords' => ['battery', 'powerwall', 'tesla', 'alpha', 'byd', 'sungrow'],
        ],
        [
            'title' => 'EV Charging',
            'content' => 'We install EV charging systems and can integrate charging with solar generation and smart controls.',
            'keywords' => ['ev', 'charger', 'charging', 'electric vehicle'],
        ],
        [
            'title' => 'Site Visit and Pricing',
            'content' => 'Accurate pricing requires a site visit because system design depends on roof, load profile, electrical infrastructure, and project scope.',
            'keywords' => ['pricing', 'price', 'cost', 'quote', 'site visit', 'assessment'],
        ],
        [
            'title' => 'Contact',
            'content' => 'Customers can call 1300 983 247 or use the contact page to book a site visit.',
            'keywords' => ['contact', 'phone', 'call', 'book', 'site visit'],
        ],
    ];
}

function xtechs_chatbot_context(string $query): string {
    $lower_query = strtolower($query);
    $words = array_values(array_filter(preg_split('/\s+/', $lower_query), static function ($w) {
        return strlen((string) $w) > 2;
    }));

    $scored = [];
    foreach (xtechs_chatbot_knowledge_base() as $chunk) {
        $title = strtolower((string) ($chunk['title'] ?? ''));
        $content = strtolower((string) ($chunk['content'] ?? ''));
        $keywords = strtolower(implode(' ', (array) ($chunk['keywords'] ?? [])));
        $score = 0;
        foreach ($words as $word) {
            if (strpos($keywords, $word) !== false) {
                $score += 4;
            }
            if (strpos($title, $word) !== false) {
                $score += 3;
            }
            if (strpos($content, $word) !== false) {
                $score += 1;
            }
        }
        if ($score > 0) {
            $scored[] = ['score' => $score, 'chunk' => $chunk];
        }
    }

    usort($scored, static function ($a, $b) {
        return ((int) $b['score']) <=> ((int) $a['score']);
    });

    $top = array_slice($scored, 0, 3);
    if (count($top) === 0) {
        return 'xTechs Renewables offers solar, battery, EV charging, off-grid, and electrical services across Victoria.';
    }

    $parts = [];
    foreach ($top as $item) {
        $chunk = (array) $item['chunk'];
        $parts[] = ((string) ($chunk['title'] ?? 'Info')) . ': ' . ((string) ($chunk['content'] ?? ''));
    }

    return implode("\n\n", $parts);
}

function xtechs_chatbot_fallback_response(string $message): string {
    $lower_message = strtolower(trim($message));
    if ($lower_message === '') {
        return "I'm here to help with solar, battery, EV charging, and electrical services across Victoria. What would you like to know?";
    }
    if (preg_match('/\b(price|pricing|cost|quote|how much)\b/', $lower_message)) {
        return "Great question. Pricing depends on site-specific factors, so the best next step is a site visit. We can then provide options from entry-level to premium systems based on your property.";
    }
    if (preg_match('/\b(contact|call|phone|email|reach|talk)\b/', $lower_message)) {
        return "You can reach us on 1300 983 247 or book through the contact page for a site visit.";
    }
    return "Thanks for your message. I can help with solar, batteries, EV charging, off-grid systems, and electrical services across Victoria.";
}

function xtechs_chatbot_openai_response(string $message, array $history, array $customer_info, string $kb_context): ?string {
    $api_key = defined('OPENAI_API_KEY') ? (string) OPENAI_API_KEY : (string) getenv('OPENAI_API_KEY');
    if ($api_key === '') {
        return null;
    }

    $model = defined('OPENAI_CHAT_MODEL') ? (string) OPENAI_CHAT_MODEL : ((string) getenv('OPENAI_CHAT_MODEL') ?: 'gpt-4o-mini');
    $customer_name = trim((string) ($customer_info['fullName'] ?? ''));
    $customer_address = trim((string) ($customer_info['address'] ?? ''));

    $system_prompt = "You are xTechs Renewables assistant for Victoria, Australia.\n"
        . "Use only provided context, be concise and helpful.\n"
        . "Never provide exact pricing. For pricing questions, recommend site visit booking.\n"
        . "When suitable, mention contact number 1300 983 247 and /contact.\n"
        . "Knowledge base context:\n" . $kb_context;

    if ($customer_name !== '') {
        $system_prompt .= "\nCustomer first name: " . explode(' ', $customer_name)[0];
    }
    if ($customer_address !== '') {
        $system_prompt .= "\nCustomer location: " . $customer_address;
    }

    $messages = [
        ['role' => 'system', 'content' => $system_prompt],
    ];

    $recent_history = array_slice($history, -12);
    foreach ($recent_history as $msg) {
        $role = (string) ($msg['role'] ?? '');
        $content = trim((string) ($msg['content'] ?? ''));
        if (($role === 'user' || $role === 'assistant') && $content !== '') {
            $messages[] = ['role' => $role, 'content' => $content];
        }
    }
    $messages[] = ['role' => 'user', 'content' => $message];

    $response = wp_remote_post('https://api.openai.com/v1/chat/completions', [
        'timeout' => 30,
        'headers' => [
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type' => 'application/json',
        ],
        'body' => wp_json_encode([
            'model' => $model,
            'messages' => $messages,
            'temperature' => 0.6,
            'max_tokens' => 700,
        ]),
    ]);

    if (is_wp_error($response)) {
        return null;
    }
    $status = (int) wp_remote_retrieve_response_code($response);
    if ($status < 200 || $status >= 300) {
        return null;
    }
    $body = json_decode((string) wp_remote_retrieve_body($response), true);
    $content = trim((string) ($body['choices'][0]['message']['content'] ?? ''));
    return $content !== '' ? $content : null;
}

function xtechs_chatbot_save_transcript(array $customer_info, string $user_message, string $assistant_message): void {
    $leads_db = xtechs_open_leads_db();
    if (!$leads_db) {
        return;
    }

    $leads_db->query(
        "CREATE TABLE IF NOT EXISTS `chatbot_transcripts` (
            `id` VARCHAR(64) NOT NULL,
            `customer_name` VARCHAR(255) DEFAULT NULL,
            `customer_email` VARCHAR(255) DEFAULT NULL,
            `customer_phone` VARCHAR(50) DEFAULT NULL,
            `customer_address` VARCHAR(500) DEFAULT NULL,
            `user_message` TEXT DEFAULT NULL,
            `assistant_message` TEXT DEFAULT NULL,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            KEY `idx_chatbot_created_at` (`created_at`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
    );

    $leads_db->insert(
        'chatbot_transcripts',
        [
            'id' => wp_generate_uuid4(),
            'customer_name' => sanitize_text_field((string) ($customer_info['fullName'] ?? '')),
            'customer_email' => sanitize_email((string) ($customer_info['email'] ?? '')),
            'customer_phone' => sanitize_text_field((string) ($customer_info['phone'] ?? '')),
            'customer_address' => sanitize_text_field((string) ($customer_info['address'] ?? '')),
            'user_message' => $user_message,
            'assistant_message' => $assistant_message,
        ],
        ['%s', '%s', '%s', '%s', '%s', '%s', '%s']
    );
}

add_action('template_redirect', function (): void {
    $is_contact_api = (bool) get_query_var('contact_api');
    $is_bookings_api = (bool) get_query_var('bookings_api');
    $is_chat_api = (bool) get_query_var('chat_api');
    $is_trial_api = (bool) get_query_var('trial_api');

    if (!$is_contact_api && !$is_bookings_api && !$is_chat_api && !$is_trial_api) {
        return;
    }

    if ($is_chat_api) {
        $method = isset($_SERVER['REQUEST_METHOD']) ? strtoupper((string) $_SERVER['REQUEST_METHOD']) : 'GET';
        if ($method === 'GET') {
            wp_send_json(['success' => true, 'message' => 'Chat API ready. Use POST to chat.'], 200);
        }
        if ($method !== 'POST') {
            wp_send_json(['success' => false, 'message' => 'Method not allowed'], 405);
        }

        $raw = file_get_contents('php://input');
        $payload = json_decode(is_string($raw) ? $raw : '', true);
        if (!is_array($payload)) {
            $payload = $_POST;
        }

        $user_message = sanitize_textarea_field((string) ($payload['message'] ?? ''));
        if ($user_message === '') {
            wp_send_json(['success' => false, 'message' => 'Message is required'], 422);
        }

        $customer_info_raw = isset($payload['customerInfo']) && is_array($payload['customerInfo']) ? $payload['customerInfo'] : [];
        $customer_info = [
            'fullName' => sanitize_text_field((string) ($customer_info_raw['fullName'] ?? '')),
            'email' => sanitize_email((string) ($customer_info_raw['email'] ?? '')),
            'address' => sanitize_text_field((string) ($customer_info_raw['address'] ?? '')),
            'phone' => sanitize_text_field((string) ($customer_info_raw['phone'] ?? '')),
        ];

        // Save customer profile as lead when enough info is provided.
        if ($customer_info['fullName'] !== '' && is_email($customer_info['email']) && $customer_info['address'] !== '') {
            $leads_db = xtechs_open_leads_db();
            if ($leads_db) {
                $leads_db->query(
                    "CREATE TABLE IF NOT EXISTS `leads` (
                        `id` VARCHAR(64) NOT NULL,
                        `name` VARCHAR(255) NOT NULL,
                        `email` VARCHAR(255) NOT NULL,
                        `phone` VARCHAR(50) DEFAULT NULL,
                        `message` TEXT DEFAULT NULL,
                        `source` VARCHAR(120) DEFAULT NULL,
                        `lead_type` VARCHAR(80) DEFAULT 'contact_form_submit',
                        `tenant_id` VARCHAR(120) DEFAULT NULL,
                        `status` VARCHAR(40) NOT NULL DEFAULT 'new',
                        `ip` VARCHAR(64) DEFAULT NULL,
                        `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`),
                        KEY `idx_leads_email` (`email`),
                        KEY `idx_leads_created_at` (`created_at`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
                );
                $lead_type_column = $leads_db->get_var("SHOW COLUMNS FROM `leads` LIKE 'lead_type'");
                if ($lead_type_column === null) {
                    $leads_db->query("ALTER TABLE `leads` ADD COLUMN `lead_type` VARCHAR(80) DEFAULT 'contact_form_submit' AFTER `source`");
                }
                $leads_db->insert(
                    'leads',
                    [
                        'id' => wp_generate_uuid4(),
                        'name' => $customer_info['fullName'],
                        'email' => $customer_info['email'],
                        'phone' => $customer_info['phone'],
                        'message' => 'Chatbot customer profile submitted before chat.',
                        'source' => 'chatbot_widget',
                        'lead_type' => 'chatbot_customer_info',
                        'tenant_id' => 'Sales',
                        'status' => 'new',
                        'ip' => sanitize_text_field((string) ($_SERVER['REMOTE_ADDR'] ?? '')),
                    ],
                    ['%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s']
                );
            }
        }

        $history_raw = isset($payload['conversationHistory']) && is_array($payload['conversationHistory']) ? $payload['conversationHistory'] : [];
        $history = [];
        foreach ($history_raw as $msg) {
            if (!is_array($msg)) {
                continue;
            }
            $history[] = [
                'role' => sanitize_text_field((string) ($msg['role'] ?? '')),
                'content' => sanitize_textarea_field((string) ($msg['content'] ?? '')),
            ];
        }

        $kb_context = xtechs_chatbot_context($user_message);
        $assistant_message = xtechs_chatbot_openai_response($user_message, $history, $customer_info, $kb_context);
        if ($assistant_message === null) {
            $assistant_message = xtechs_chatbot_fallback_response($user_message);
        }

        xtechs_chatbot_save_transcript($customer_info, $user_message, $assistant_message);

        wp_send_json([
            'success' => true,
            'response' => $assistant_message,
            'timestamp' => time() * 1000,
        ], 200);
    }

    if ($is_bookings_api) {
        $method = isset($_SERVER['REQUEST_METHOD']) ? strtoupper((string) $_SERVER['REQUEST_METHOD']) : 'GET';
        $leads_db = xtechs_open_leads_db();
        if (!$leads_db) {
            wp_send_json(['error' => 'Service temporarily unavailable'], 500);
        }

        $leads_db->query(
            "CREATE TABLE IF NOT EXISTS `bookings` (
                `id` VARCHAR(80) NOT NULL,
                `first_name` VARCHAR(120) NOT NULL,
                `last_name` VARCHAR(120) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `phone` VARCHAR(50) NOT NULL,
                `address` VARCHAR(500) NOT NULL,
                `service_type` VARCHAR(160) NOT NULL,
                `selected_date` DATE NOT NULL,
                `selected_time` VARCHAR(5) NOT NULL,
                `type` VARCHAR(80) DEFAULT NULL,
                `notes` TEXT DEFAULT NULL,
                `status` VARCHAR(50) NOT NULL DEFAULT 'payment_pending',
                `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`),
                KEY `idx_bookings_date` (`selected_date`),
                KEY `idx_bookings_time` (`selected_time`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
        );

        if ($method === 'GET') {
            $date = sanitize_text_field((string) ($_GET['date'] ?? ''));
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
                wp_send_json(['error' => 'Invalid date format'], 400);
            }
            [$year, $month, $day] = array_map('intval', explode('-', $date));
            if (!checkdate($month, $day, $year)) {
                wp_send_json(['error' => 'Invalid date'], 400);
            }

            $rows = $leads_db->get_col($leads_db->prepare('SELECT selected_time FROM bookings WHERE selected_date = %s', $date));
            wp_send_json(['date' => $date, 'times' => array_values(array_filter($rows))], 200);
        }

        if ($method !== 'POST') {
            wp_send_json(['error' => 'Method not allowed'], 405);
        }

        $raw = file_get_contents('php://input');
        $payload = json_decode(is_string($raw) ? $raw : '', true);
        if (!is_array($payload)) {
            $payload = $_POST;
        }

        $first_name = sanitize_text_field((string) ($payload['firstName'] ?? ''));
        $last_name = sanitize_text_field((string) ($payload['lastName'] ?? ''));
        $email = sanitize_email((string) ($payload['email'] ?? ''));
        $phone = sanitize_text_field((string) ($payload['phone'] ?? ''));
        $address = sanitize_text_field((string) ($payload['address'] ?? ''));
        $service_type = sanitize_text_field((string) ($payload['serviceType'] ?? ''));
        $selected_date = sanitize_text_field((string) ($payload['selectedDate'] ?? ''));
        $selected_time = sanitize_text_field((string) ($payload['selectedTime'] ?? ''));
        $notes = sanitize_textarea_field((string) ($payload['notes'] ?? ''));
        $type = sanitize_text_field((string) ($payload['type'] ?? 'site-assessment'));
        $captcha_token = sanitize_text_field((string) ($payload['captchaToken'] ?? ''));

        if (
            $first_name === '' || $last_name === '' || !is_email($email) || $phone === ''
            || $address === '' || $service_type === '' || $selected_date === '' || $selected_time === ''
        ) {
            wp_send_json(['error' => 'Missing or invalid required fields'], 400);
        }

        $turnstile_secret = defined('TURNSTILE_SECRET_KEY') ? TURNSTILE_SECRET_KEY : '';
        if ($turnstile_secret !== '') {
            if ($captcha_token === '') {
                wp_send_json(['error' => 'Captcha verification failed'], 400);
            }

            $verify = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
                'timeout' => 10,
                'body' => [
                    'secret' => $turnstile_secret,
                    'response' => $captcha_token,
                    'remoteip' => sanitize_text_field((string) ($_SERVER['REMOTE_ADDR'] ?? '')),
                ],
            ]);

            if (is_wp_error($verify)) {
                wp_send_json(['error' => 'Captcha verification failed'], 500);
            }

            $verify_body = json_decode((string) wp_remote_retrieve_body($verify), true);
            if (!is_array($verify_body) || empty($verify_body['success'])) {
                wp_send_json(['error' => 'Captcha verification failed'], 400);
            }
        }

        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $selected_date)) {
            wp_send_json(['error' => 'Invalid date format'], 400);
        }
        if (!preg_match('/^([01]\d|2[0-3]):[0-5]\d$/', $selected_time)) {
            wp_send_json(['error' => 'Invalid time format'], 400);
        }

        $requested_minutes = xtechs_time_to_minutes($selected_time);
        if ($requested_minutes < 0) {
            wp_send_json(['error' => 'Invalid time'], 400);
        }

        $existing_times = $leads_db->get_col(
            $leads_db->prepare('SELECT selected_time FROM bookings WHERE selected_date = %s', $selected_date)
        );
        foreach ($existing_times as $existing_time) {
            $existing_minutes = xtechs_time_to_minutes((string) $existing_time);
            if ($existing_minutes < 0) {
                continue;
            }
            if (
                $requested_minutes === $existing_minutes
                || $requested_minutes === $existing_minutes + 30
                || $requested_minutes === $existing_minutes + 60
            ) {
                wp_send_json(['error' => 'Time slot unavailable (90-minute rule)'], 409);
            }
        }

        $booking_id = 'booking_' . time() . '_' . wp_generate_password(8, false, false);
        $result = $leads_db->insert(
            'bookings',
            [
                'id' => $booking_id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => strtolower($email),
                'phone' => $phone,
                'address' => $address,
                'service_type' => $service_type,
                'selected_date' => $selected_date,
                'selected_time' => $selected_time,
                'type' => $type,
                'notes' => $notes,
                'status' => 'payment_pending',
            ],
            ['%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s']
        );

        if ($result === false) {
            wp_send_json(['error' => 'Failed to create booking'], 500);
        }

        $booking_email = strtolower($email);
        $payment_url = xtechs_booking_stripe_payment_url($booking_id, $booking_email);
        xtechs_resend_send_booking_notification([
            'bookingId' => $booking_id,
            'firstName' => $first_name,
            'lastName' => $last_name,
            'email' => $booking_email,
            'phone' => $phone,
            'address' => $address,
            'serviceType' => $service_type,
            'selectedDate' => $selected_date,
            'selectedTime' => $selected_time,
            'notes' => $notes,
            'paymentUrl' => $payment_url,
            'paymentStatus' => 'pending',
        ]);

        wp_send_json(['success' => true, 'message' => 'Booking created successfully', 'bookingId' => $booking_id], 201);
    }

    if ($is_trial_api) {
        $method = isset($_SERVER['REQUEST_METHOD']) ? strtoupper((string) $_SERVER['REQUEST_METHOD']) : 'GET';
        if ($method === 'GET') {
            wp_send_json(['success' => true, 'message' => 'Trial API ready. Use POST to submit form.'], 200);
        }
        if ($method !== 'POST') {
            wp_send_json(['success' => false, 'message' => 'Method not allowed'], 405);
        }

        $raw = file_get_contents('php://input');
        $payload = json_decode(is_string($raw) ? $raw : '', true);
        if (!is_array($payload)) {
            $payload = $_POST;
        }

        $name = sanitize_text_field((string) ($payload['name'] ?? ''));
        $email = sanitize_email((string) ($payload['email'] ?? ''));
        $phone = sanitize_text_field((string) ($payload['phone'] ?? ''));

        if ($name === '' || $email === '' || !is_email($email)) {
            wp_send_json(['success' => false, 'message' => 'Invalid input'], 422);
        }

        $remote_error = '';
        $ok = xtechs_write_remote_trial_user($name, $email, $phone, $remote_error);
        if (!$ok) {
            $msg = 'Failed to save trial user to remote database';
            if (xtechs_is_local_runtime_host() && $remote_error !== '') {
                $msg .= ': ' . $remote_error;
            }
            wp_send_json(['success' => false, 'message' => $msg], 502);
        }

        wp_send_json(['success' => true], 201);
    }

    $method = isset($_SERVER['REQUEST_METHOD']) ? strtoupper((string) $_SERVER['REQUEST_METHOD']) : 'GET';
    if ($method === 'GET') {
        wp_send_json(['success' => true, 'message' => 'Contact API ready. Use POST to submit form.'], 200);
    }
    if ($method !== 'POST') {
        status_header(405);
        wp_send_json(['success' => false, 'message' => 'Method not allowed'], 405);
    }

    $raw = file_get_contents('php://input');
    $payload = json_decode(is_string($raw) ? $raw : '', true);
    if (!is_array($payload)) {
        $payload = $_POST;
    }

    $first_name = sanitize_text_field((string) ($payload['firstName'] ?? ''));
    $last_name = sanitize_text_field((string) ($payload['lastName'] ?? ''));
    $name = sanitize_text_field(trim((string) ($payload['name'] ?? ($first_name . ' ' . $last_name))));
    $email = sanitize_email((string) ($payload['email'] ?? ''));
    $phone = sanitize_text_field((string) ($payload['phone'] ?? ''));
    $subject = sanitize_text_field((string) ($payload['subject'] ?? ''));
    $message = sanitize_textarea_field((string) ($payload['message'] ?? ''));
    $source = sanitize_text_field((string) ($payload['source'] ?? 'contact-form'));
    $lead_type = sanitize_text_field((string) ($payload['leadType'] ?? ''));
    $tenant_id = sanitize_text_field((string) ($payload['tenantId'] ?? 'wordpress'));
    $turnstile_token = sanitize_text_field((string) ($payload['turnstileToken'] ?? ''));

    if ($lead_type === '') {
        $lead_type = strpos($source, 'partner_') === 0 ? 'get_your_quote_submit' : 'contact_form_submit';
    }

    if ($name === '' || $email === '' || !is_email($email) || $message === '') {
        wp_send_json(['success' => false, 'message' => 'Invalid input'], 422);
    }

    // Captcha verification disabled for localhost testing
    // $turnstile_secret = defined('TURNSTILE_SECRET_KEY') ? TURNSTILE_SECRET_KEY : '';
    // if ($turnstile_secret !== '') {
    //     if ($turnstile_token === '') {
    //         wp_send_json(['success' => false, 'message' => 'Captcha is required'], 422);
    //     }
    //
    //     $verify = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
    //         'timeout' => 10,
    //         'body' => [
    //             'secret' => $turnstile_secret,
    //             'response' => $turnstile_token,
    //             'remoteip' => sanitize_text_field((string) ($_SERVER['REMOTE_ADDR'] ?? '')),
    //         ],
    //     ]);
    //     if (is_wp_error($verify)) {
    //         wp_send_json(['success' => false, 'message' => 'Captcha verification failed'], 500);
    //     }
    //     $verify_body = json_decode((string) wp_remote_retrieve_body($verify), true);
    //     if (!is_array($verify_body) || empty($verify_body['success'])) {
    //         wp_send_json(['success' => false, 'message' => 'Invalid captcha'], 422);
    //     }
    // }

    // Store leads in XAMPP MySQL (localhost).
    $leads_db = xtechs_open_leads_db();
    if (!$leads_db) {
        $msg = 'Cannot connect XAMPP MySQL';
        wp_send_json(['success' => false, 'message' => $msg], 500);
    }

    $leads_db->query(
        "CREATE TABLE IF NOT EXISTS `leads` (
            `id` VARCHAR(64) NOT NULL,
            `name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(50) DEFAULT NULL,
            `message` TEXT DEFAULT NULL,
            `source` VARCHAR(120) DEFAULT NULL,
            `lead_type` VARCHAR(80) DEFAULT 'contact_form_submit',
            `tenant_id` VARCHAR(120) DEFAULT NULL,
            `status` VARCHAR(40) NOT NULL DEFAULT 'new',
            `ip` VARCHAR(64) DEFAULT NULL,
            `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`),
            KEY `idx_leads_email` (`email`),
            KEY `idx_leads_created_at` (`created_at`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
    );

    // Keep existing databases compatible when the table already exists.
    $lead_type_column = $leads_db->get_var("SHOW COLUMNS FROM `leads` LIKE 'lead_type'");
    if ($lead_type_column === null) {
        $leads_db->query("ALTER TABLE `leads` ADD COLUMN `lead_type` VARCHAR(80) DEFAULT 'contact_form_submit' AFTER `source`");
    }

    $full_message = $subject !== '' ? ("Subject: " . $subject . "\n\n" . $message) : $message;
    $lead_id = wp_generate_uuid4();
    $result = $leads_db->insert(
        'leads',
        [
            'id' => $lead_id,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $full_message,
            'source' => $source,
            'lead_type' => $lead_type,
            'tenant_id' => $tenant_id,
            'status' => 'new',
            'ip' => sanitize_text_field((string) ($_SERVER['REMOTE_ADDR'] ?? '')),
        ],
        ['%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s']
    );

    if ($result === false) {
        $msg = 'Database insert failed';
        if (xtechs_is_local_runtime_host() && !empty($leads_db->last_error)) {
            $msg .= ': ' . $leads_db->last_error;
        }
        wp_send_json(['success' => false, 'message' => $msg], 500);
    }

    // Notify by email as soon as the lead is saved locally (do not block on remote CRM).
    xtechs_resend_notify_contact_lead_success(
        $source,
        $first_name,
        $last_name,
        $name,
        $email,
        $phone,
        $subject,
        $message,
        $lead_id,
        $lead_type,
        $tenant_id
    );

    $remote_error = '';
    $remote_ok = xtechs_write_remote_contact_lead([
        'id' => $lead_id,
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'subject' => $subject,
        'message' => $message,
        'source' => $source,
        'lead_type' => $lead_type,
        'tenant_id' => $tenant_id,
    ], $remote_error);

    if (!$remote_ok) {
        if (defined('WP_DEBUG') && WP_DEBUG) {
            error_log('xtechs_contact_api: remote lead sync failed: ' . $remote_error);
        }
        $payload = [
            'success' => true,
            'remoteSynced' => false,
            'message' => __('Your enquiry was received. We will be in touch shortly.', 'xtechs-renewables'),
        ];
        if (xtechs_is_local_runtime_host() && $remote_error !== '') {
            $payload['debug'] = $remote_error;
        }
        wp_send_json($payload, 200);
    }

    wp_send_json(['success' => true, 'remoteSynced' => true], 200);
});

/**
 * Emergency cleanup: remove accidental critical-error text from page editors.
 */
function xtechs_cleanup_broken_page_content_once(): void {
    if (!is_admin() || wp_doing_ajax()) {
        return;
    }
    if (get_option('xtechs_broken_editor_cleanup_done') === '1') {
        return;
    }

    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'any',
        'numberposts' => -1,
    ]);
    foreach ($pages as $page) {
        if (!$page instanceof WP_Post) {
            continue;
        }
        $content = (string) $page->post_content;
        if (stripos($content, 'There has been a critical error on this website') === false) {
            continue;
        }
        wp_update_post([
            'ID' => $page->ID,
            'post_content' => '',
        ]);
    }

    update_option('xtechs_broken_editor_cleanup_done', '1', false);
}
add_action('admin_init', 'xtechs_cleanup_broken_page_content_once', 20);

/**
 * Slugs backed by hardcoded page templates (page-*.php) in this theme.
 *
 * @return list<string>
 */
function xtechs_hardcoded_page_slugs(): array {
    static $slugs = null;
    if (is_array($slugs)) {
        return $slugs;
    }

    $slugs = [];
    $files = glob(get_template_directory() . '/page-*.php');
    if (!is_array($files)) {
        return $slugs;
    }

    foreach ($files as $file) {
        $base = basename($file);
        if (!preg_match('/^page-(.+)\.php$/', $base, $m)) {
            continue;
        }
        $slug = sanitize_title((string) $m[1]);
        if ($slug !== '') {
            $slugs[] = $slug;
        }
    }

    $slugs = array_values(array_unique($slugs));
    sort($slugs);

    return $slugs;
}

/**
 * Enqueue Yoast helper for hardcoded pages so analysis uses frontend-rendered content.
 * This is read-only and does not write to post_content.
 */
function xtechs_enqueue_yoast_hardcoded_pages_analysis_script(): void {
    if (!function_exists('get_current_screen')) {
        return;
    }
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'page') {
        return;
    }

    $post_id = isset($_GET['post']) ? (int) $_GET['post'] : 0;
    if ($post_id <= 0) {
        return;
    }

    $post = get_post($post_id);
    if (!$post instanceof WP_Post || $post->post_type !== 'page') {
        return;
    }
    if (!in_array((string) $post->post_name, xtechs_hardcoded_page_slugs(), true)) {
        return;
    }

    $permalink = get_permalink($post);
    if (!is_string($permalink) || $permalink === '') {
        return;
    }

    $script_path = get_template_directory() . '/assets/js/yoast-hardcoded-analysis.js';
    if (!file_exists($script_path)) {
        return;
    }

    wp_enqueue_script(
        'xtechs-yoast-hardcoded-analysis',
        get_template_directory_uri() . '/assets/js/yoast-hardcoded-analysis.js',
        [],
        (string) filemtime($script_path),
        true
    );

    wp_localize_script('xtechs-yoast-hardcoded-analysis', 'xtYoastHardcodedAnalysis', [
        'url' => $permalink,
        'slug' => (string) $post->post_name,
    ]);
}
add_action('admin_enqueue_scripts', 'xtechs_enqueue_yoast_hardcoded_pages_analysis_script', 30);
add_action('enqueue_block_editor_assets', 'xtechs_enqueue_yoast_hardcoded_pages_analysis_script', 30);

/**
 * Seed Yoast defaults for Amber Electric hardcoded page (only when empty).
 */
function xtechs_seed_yoast_defaults_for_amber_page(): void {
    if (!is_admin() || wp_doing_ajax()) {
        return;
    }
    if (get_option('xtechs_yoast_amber_defaults_seeded') === '1') {
        return;
    }

    $amber = get_page_by_path('amber-electric', OBJECT, 'page');
    if (!$amber instanceof WP_Post) {
        return;
    }

    $defaults = [
        '_yoast_wpseo_focuskw' => 'Amber Electric',
        '_yoast_wpseo_title' => 'Amber Electric Partnership | xTechs Renewables',
        '_yoast_wpseo_metadesc' => 'Amber Electric partnership with xTechs Renewables: premium solar and battery systems with wholesale energy optimization for higher returns.',
    ];

    foreach ($defaults as $meta_key => $meta_value) {
        $existing = (string) get_post_meta($amber->ID, $meta_key, true);
        if (trim($existing) === '') {
            update_post_meta($amber->ID, $meta_key, $meta_value);
        }
    }

    update_option('xtechs_yoast_amber_defaults_seeded', '1', false);
}
add_action('admin_init', 'xtechs_seed_yoast_defaults_for_amber_page', 40);

/**
 * Serve project robots.txt content from theme asset file at /robots.txt.
 */
add_filter('robots_txt', function (string $output, bool $public): string {
    $path = get_template_directory() . '/assets/media/robots.txt';
    if (!file_exists($path) || !is_readable($path)) {
        return $output;
    }

    $content = (string) file_get_contents($path);
    $content = trim(str_replace("\r\n", "\n", $content));

    return $content !== '' ? $content . "\n" : $output;
}, 20, 2);
