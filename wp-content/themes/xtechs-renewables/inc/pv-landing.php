<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/pv-page-resolve.php';

function xtechs_pv_calendly_url(): string {
    return 'https://calendly.com/inquiries-xtechsrenewables/30min';
}

function xtechs_pv_landing_complete(): bool {
    if (!get_page_by_path('pv-battery')) {
        return false;
    }
    foreach (['residential', 'business', 'off-grid', 'builders'] as $key) {
        if (xtechs_resolve_pv_battery_child_permalink($key) === '') {
            return false;
        }
    }
    if (xtechs_resolve_battery_page_permalink() === '' || xtechs_resolve_ev_chargers_page_permalink() === '') {
        return false;
    }
    return true;
}

function xtechs_seed_pv_landing_pages_inner(): void {
    $parent = get_page_by_path('pv-battery');
    if (!$parent) {
        $parent_id = wp_insert_post([
            'post_title' => 'PV & Battery',
            'post_name' => 'pv-battery',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ], true);
        if (is_wp_error($parent_id) || !$parent_id) {
            return;
        }
    } else {
        $parent_id = (int) $parent->ID;
    }

    $children = [
        'residential' => 'Residential Solar & Battery',
        'business' => 'Commercial Solar & Battery',
        'off-grid' => 'Off-Grid Solar & Battery',
        'builders' => 'Solar & Battery for Builders',
    ];
    foreach ($children as $slug => $title) {
        if (xtechs_resolve_pv_battery_child_permalink($slug) !== '') {
            continue;
        }
        wp_insert_post([
            'post_title' => $title,
            'post_name' => $slug,
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_parent' => $parent_id,
            'post_content' => '',
        ], true);
    }

    if (xtechs_resolve_battery_page_permalink() === '') {
        wp_insert_post([
            'post_title' => 'Battery Storage',
            'post_name' => 'battery',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ], true);
    }
    if (xtechs_resolve_ev_chargers_page_permalink() === '') {
        wp_insert_post([
            'post_title' => 'EV Charger Installation',
            'post_name' => 'ev-chargers',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ], true);
    }
}

function xtechs_maybe_seed_pv_landing_pages(): void {
    if (xtechs_pv_landing_complete()) {
        return;
    }
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return;
    }
    xtechs_seed_pv_landing_pages_inner();
}

add_action('admin_init', 'xtechs_maybe_seed_pv_landing_pages', 1);

add_filter('template_include', 'xtechs_template_pv_battery_child');
function xtechs_template_pv_battery_child(string $template): string {
    if (!is_page()) {
        return $template;
    }
    global $post;
    if (!$post instanceof WP_Post || (int) $post->post_parent === 0) {
        return $template;
    }
    $parent = get_post((int) $post->post_parent);
    if (!$parent instanceof WP_Post || $parent->post_name !== 'pv-battery') {
        return $template;
    }
    if (xtechs_pv_child_slug_to_key($post->post_name) === null) {
        return $template;
    }
    $custom = locate_template('page-pv-battery-child.php');
    return $custom ?: $template;
}

add_filter('template_include', 'xtechs_template_battery_ev_landings', 20);
function xtechs_template_battery_ev_landings(string $template): string {
    if (!is_page()) {
        return $template;
    }
    global $post;
    if (!$post instanceof WP_Post || (int) $post->post_parent !== 0) {
        return $template;
    }
    $slug = $post->post_name;
    if (in_array($slug, ['battery', 'battery-storage'], true)) {
        $t = locate_template('page-battery.php');
        return $t ?: $template;
    }
    if (in_array($slug, ['ev-chargers', 'ev-charger-installation'], true)) {
        $t = locate_template('page-ev-chargers.php');
        return $t ?: $template;
    }
    return $template;
}
