<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Map a child Page slug (under pv-battery) to our segment key used in templates and config.
 * Covers WordPress auto-slugs from long titles (e.g. residential-solar-battery).
 */
function xtechs_pv_child_slug_to_key(string $slug): ?string {
    $map = [
        'residential' => 'residential',
        'residential-solar-battery' => 'residential',
        'business' => 'business',
        'commercial-solar-battery' => 'business',
        'solar-battery-for-business' => 'business',
        'off-grid' => 'off-grid',
        'off-grid-solar-battery' => 'off-grid',
        'builders' => 'builders',
        'solar-battery-for-builders' => 'builders',
    ];
    return $map[$slug] ?? null;
}

/**
 * Permalink for a PV & Battery segment (menu uses short paths; DB may use longer slugs).
 */
function xtechs_resolve_pv_battery_child_permalink(string $key): string {
    $candidates = [
        'residential' => ['residential', 'residential-solar-battery'],
        'business' => ['business', 'commercial-solar-battery', 'solar-battery-for-business'],
        'off-grid' => ['off-grid', 'off-grid-solar-battery'],
        'builders' => ['builders', 'solar-battery-for-builders'],
    ];
    if (!isset($candidates[$key])) {
        return '';
    }
    foreach ($candidates[$key] as $slug) {
        $page = get_page_by_path('pv-battery/' . $slug);
        if ($page instanceof WP_Post && $page->post_status === 'publish') {
            return get_permalink($page);
        }
    }
    return '';
}

function xtechs_resolve_battery_page_permalink(): string {
    foreach (['battery', 'battery-storage'] as $slug) {
        $page = get_page_by_path($slug);
        if ($page instanceof WP_Post && $page->post_status === 'publish') {
            return get_permalink($page);
        }
    }
    return '';
}

function xtechs_resolve_ev_chargers_page_permalink(): string {
    foreach (['ev-chargers', 'ev-charger-installation'] as $slug) {
        $page = get_page_by_path($slug);
        if ($page instanceof WP_Post && $page->post_status === 'publish') {
            return get_permalink($page);
        }
    }
    return '';
}
