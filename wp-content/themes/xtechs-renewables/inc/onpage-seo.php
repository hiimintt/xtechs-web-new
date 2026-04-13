<?php
/**
 * On-page SEO: title tags (≤60 chars), keyword maps, visible breadcrumbs (task 22).
 * Meta descriptions extended in seo.php map; SolarFold child blurbs appended via filter below.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @return string UTF-8 safe length
 */
function xtechs_onpage_strlen(string $s): int {
    return function_exists('mb_strlen') ? (int) mb_strlen($s, 'UTF-8') : strlen($s);
}

/**
 * @return string UTF-8 safe substring
 */
function xtechs_onpage_substr(string $s, int $start, ?int $length = null): string {
    if (function_exists('mb_substr')) {
        return $length === null ? mb_substr($s, $start, null, 'UTF-8') : mb_substr($s, $start, $length, 'UTF-8');
    }

    return $length === null ? substr($s, $start) : substr($s, $start, $length);
}

/**
 * Single <title> when site name is omitted (e.g. front page).
 */
function xtechs_onpage_clamp_full_title(string $title, int $max = 60): string {
    if (xtechs_onpage_strlen($title) <= $max) {
        return $title;
    }

    return xtechs_onpage_substr($title, 0, max(20, $max - 1)) . '…';
}

/**
 * Primary segment before " | xTechs Renewables"; total document title capped at $maxTotal.
 */
function xtechs_onpage_clamp_primary_title(string $primary, int $maxTotal = 60, string $site = 'xTechs Renewables', string $sep = ' | '): string {
    $suffix = $sep . $site;
    $budget = $maxTotal - xtechs_onpage_strlen($suffix);
    if ($budget < 15) {
        $budget = 15;
    }
    if (xtechs_onpage_strlen($primary) <= $budget) {
        return $primary;
    }

    return xtechs_onpage_substr($primary, 0, max(10, $budget - 1)) . '…';
}

/**
 * Keyword-rich primary title segments (task 13, 20). Keys = xtechs_seo_page_path() for pages.
 *
 * @return array<string, string>
 */
function xtechs_onpage_title_primary_map(): array {
    $map = [
        'about' => __('About xTechs — Melbourne Solar & Battery', 'xtechs-renewables'),
        'contact' => __('Contact — Solar Quotes & Callbacks VIC', 'xtechs-renewables'),
        'pv-battery' => __('Solar & Battery Solutions — Victoria', 'xtechs-renewables'),
        'pv-battery/residential' => __('Residential Solar Installation Melbourne', 'xtechs-renewables'),
        'pv-battery/business' => __('Commercial Solar Installation Melbourne', 'xtechs-renewables'),
        'pv-battery/off-grid' => __('Off-Grid Solar Systems Victoria', 'xtechs-renewables'),
        'pv-battery/builders' => __('Solar Packages for Builders — Victoria', 'xtechs-renewables'),
        'battery' => __('Battery Storage Installation Melbourne', 'xtechs-renewables'),
        'ev-chargers' => __('EV Charger Installation Melbourne', 'xtechs-renewables'),
        'solarfold' => __('SolarFold Portable Solar — Victoria', 'xtechs-renewables'),
        'x-classes' => __('X-Classes — Solar & Battery Training', 'xtechs-renewables'),
        'amber-electric' => __('Amber Electric VPP & Smart Solar VIC', 'xtechs-renewables'),
        'local-business-partners' => __('Local Business Solar Partners VIC', 'xtechs-renewables'),
        'privacy' => __('Privacy Policy — xTechs Renewables', 'xtechs-renewables'),
        'cookies' => __('Cookie Policy — xTechs Renewables', 'xtechs-renewables'),
        'terms' => __('Terms of Service — xTechs Renewables', 'xtechs-renewables'),
        'locations' => __('Service Locations — xTechs Renewables', 'xtechs-renewables'),
        'melbourne' => __('Melbourne Solar & Battery Services', 'xtechs-renewables'),
        'melbourne-cbd' => __('Solar & Battery Installation Melbourne CBD', 'xtechs-renewables'),
        'south-east-melbourne' => __('Solar & Battery Installation South-East Melbourne', 'xtechs-renewables'),
        'geelong' => __('Geelong Solar & Battery Services', 'xtechs-renewables'),
        'bendigo' => __('Bendigo Solar & Battery Services', 'xtechs-renewables'),
        'mornington-peninsula' => __('Mornington Peninsula Energy Services', 'xtechs-renewables'),
        'solarfold/solarfold' => __('SolarFold Mobil-Grid 500+ Australia', 'xtechs-renewables'),
        'solarfold/mobil-grid' => __('Mobile Solar & Portable Container AU', 'xtechs-renewables'),
        'solarfold/solar-hybrid-box' => __('Solar Hybrid Box — Hybrid Power VIC', 'xtechs-renewables'),
        'solarfold/portable-grid' => __('Portable Grid Solar — xTechs', 'xtechs-renewables'),
        'solarfold/bess' => __('BESS Storage Systems — Victoria', 'xtechs-renewables'),
        'solarfold/military' => __('Military & Peacekeeping Solar Power', 'xtechs-renewables'),
        'solarfold/mining' => __('Mining & Remote Solar — SolarFold', 'xtechs-renewables'),
        'solarfold/communities' => __('Community & Rural Solar Microgrids', 'xtechs-renewables'),
        'solarfold/emergency-power' => __('Emergency & Mobile Site Solar Power', 'xtechs-renewables'),
        'solarfold/event-power' => __('Event & Festival Temporary Solar Power', 'xtechs-renewables'),
        'solarfold/short-term-projects' => __('Short-Term Deployable Solar Power', 'xtechs-renewables'),
        'solarfold/long-term-projects' => __('Long-Term Base Camp Solar Power', 'xtechs-renewables'),
    ];

    return apply_filters('xtechs_seo_title_primary_map', $map);
}

add_filter('document_title_parts', static function (array $title): array {
    if (xtechs_seo_plugin_active()) {
        return $title;
    }
    if (is_front_page()) {
        $full = __('Melbourne Solar Installers | xTechs Renewables', 'xtechs-renewables');
        $title['title'] = xtechs_onpage_clamp_full_title($full, 60);
        $title['site'] = '';
        unset($title['tagline']);

        return $title;
    }

    $title['site'] = 'xTechs Renewables';
    if (!is_singular()) {
        return $title;
    }

    $obj = get_queried_object();
    if (!$obj instanceof WP_Post) {
        return $title;
    }

    $path = $obj->post_type === 'page' ? xtechs_seo_page_path($obj) : $obj->post_name;
    $map = xtechs_onpage_title_primary_map();
    $primary = $map[$path] ?? $map[$obj->post_name] ?? null;
    if ($primary !== null) {
        $title['title'] = xtechs_onpage_clamp_primary_title($primary, 60, 'xTechs Renewables', ' | ');
    }

    return $title;
}, 8);

/**
 * Extra meta descriptions for SolarFold & product slugs (task 14).
 *
 * @param array<string, string> $map
 * @return array<string, string>
 */
add_filter('xtechs_seo_description_map', static function (array $map): array {
    $extra = [
        'solarfold/solarfold' => __(
            'SolarFold Mobil-Grid 500+ — rapid-deploy solar power for defence, mining & events. Engineered in Victoria by xTechs Renewables. Request technical specs.',
            'xtechs-renewables'
        ),
        'solarfold/mobil-grid' => __(
            'Mobile solar power solutions & portable solar container systems — Mobil-Grid pre-wired PV blocks for fast deployment across Australia. Engineer with xTechs Renewables, Victoria.',
            'xtechs-renewables'
        ),
        'solarfold/solar-hybrid-box' => __(
            'Solar Hybrid Box — orchestrate PV, batteries, grid & backup for night autonomy. Hybrid control for Victorian projects by xTechs Renewables.',
            'xtechs-renewables'
        ),
        'solarfold/portable-grid' => __(
            'Portable grid & movable solar capacity for temporary or shifting loads. Plan deployable power with xTechs Renewables SolarFold range.',
            'xtechs-renewables'
        ),
        'solarfold/bess' => __(
            'Containerised BESS storage for commercial & utility-scale sites — integration with solar & hybrid controls. Consult xTechs Renewables in Victoria.',
            'xtechs-renewables'
        ),
        'solarfold/military' => __(
            'Solar & hybrid power for military & peacekeeping — reduce fuel logistics with deployable PV from xTechs SolarFold, Victoria-based engineering.',
            'xtechs-renewables'
        ),
        'solarfold/mining' => __(
            'Mining & remote operations solar — durable SolarFold & Mobil-Grid solutions for camps & processing. Talk to xTechs Renewables about your site.',
            'xtechs-renewables'
        ),
        'solarfold/communities' => __(
            'Community & rural electrification with expandable solar microgrids — SolarFold & Mobil-Grid by xTechs Renewables, built for Victorian conditions.',
            'xtechs-renewables'
        ),
        'solarfold/emergency-power' => __(
            'Emergency & mobile worksite power — deployable solar for relief and temporary sites. Plan resilience with xTechs Renewables SolarFold systems.',
            'xtechs-renewables'
        ),
        'solarfold/event-power' => __(
            'Temporary solar power for events & venues — quiet, fast-setup SolarFold units. Hire & deploy options via xTechs Renewables in Victoria.',
            'xtechs-renewables'
        ),
        'solarfold/short-term-projects' => __(
            'Short-term & crisis solar deployments — movable PV capacity when timelines are tight. xTechs Renewables SolarFold & containerised PV.',
            'xtechs-renewables'
        ),
        'solarfold/long-term-projects' => __(
            'Long-term base camp & facility solar — stable hybrid plants with remote supervision. Design with xTechs Renewables SolarFold ecosystem.',
            'xtechs-renewables'
        ),
    ];

    return array_merge($map, $extra);
}, 20);

/**
 * Visible breadcrumb trail (task 22). Mirrors JSON-LD when ≥2 items.
 */
function xtechs_render_breadcrumbs(): void {
    if (is_front_page()) {
        return;
    }
    $trail = xtechs_seo_breadcrumb_trail();
    if (count($trail) < 2) {
        return;
    }
    get_template_part('template-parts/breadcrumbs', null, ['trail' => $trail]);
}
