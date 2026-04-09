<?php
if (!defined('ABSPATH')) {
    exit;
}

function xtechs_solarfold_required_children(): array {
    return [
        'solarfold' => 'SolarFold (Mobil-Grid 500+)',
        'mobil-grid' => 'Mobil-Grid Solar Container',
        'solar-hybrid-box' => 'Solar Hybrid Box',
        'portable-grid' => 'Portable Grid',
        'bess' => 'BESS Storage System',
        'military' => 'Military & Peacekeeping',
        'mining' => 'Mining & Remote Operations',
        'communities' => 'Communities & Rural Electrification',
        'emergency-power' => 'Emergency & Mobile Worksites',
        'event-power' => 'Events & Temporary Venues',
        'short-term-projects' => 'Short-Term & Crisis Deployments',
        'long-term-projects' => 'Long-Term Base Camps & Facilities',
    ];
}

function xtechs_solarfold_child_slug_to_key(string $slug): ?string {
    return array_key_exists($slug, xtechs_solarfold_required_children()) ? $slug : null;
}

function xtechs_is_solarfold_descendant(int $post_id): bool {
    $ancestors = get_post_ancestors($post_id);
    if (empty($ancestors)) {
        return false;
    }
    foreach ($ancestors as $ancestor_id) {
        $ancestor = get_post($ancestor_id);
        if ($ancestor instanceof WP_Post && $ancestor->post_name === 'solarfold') {
            return true;
        }
    }
    return false;
}

function xtechs_solarfold_landing_complete(): bool {
    $parent = get_page_by_path('solarfold');
    if (!$parent instanceof WP_Post || $parent->post_status !== 'publish') {
        return false;
    }
    foreach (xtechs_solarfold_required_children() as $slug => $_title) {
        $child = get_page_by_path('solarfold/' . $slug);
        if (!$child instanceof WP_Post || $child->post_status !== 'publish') {
            return false;
        }
    }
    return true;
}

function xtechs_seed_solarfold_pages_inner(): void {
    $parent = get_page_by_path('solarfold');
    if ($parent instanceof WP_Post) {
        $parent_id = (int) $parent->ID;
        if ($parent->post_status !== 'publish') {
            wp_update_post([
                'ID' => $parent_id,
                'post_status' => 'publish',
            ]);
        }
    } else {
        $parent_id = wp_insert_post([
            'post_title' => 'SolarFold',
            'post_name' => 'solarfold',
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_content' => '',
        ], true);
        if (is_wp_error($parent_id) || !$parent_id) {
            return;
        }
        $parent_id = (int) $parent_id;
    }

    foreach (xtechs_solarfold_required_children() as $slug => $title) {
        $child = get_page_by_path('solarfold/' . $slug);
        if ($child instanceof WP_Post && $child->post_status === 'publish') {
            continue;
        }
        if (!$child instanceof WP_Post) {
            $fallback = get_page_by_path($slug);
            if ($fallback instanceof WP_Post) {
                $child = $fallback;
            }
        }
        if ($child instanceof WP_Post) {
            wp_update_post([
                'ID' => (int) $child->ID,
                'post_parent' => $parent_id,
                'post_status' => 'publish',
            ]);
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
}

function xtechs_maybe_seed_solarfold_pages(): void {
    if (xtechs_solarfold_landing_complete()) {
        return;
    }
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return;
    }
    xtechs_seed_solarfold_pages_inner();
}
add_action('admin_init', 'xtechs_maybe_seed_solarfold_pages', 1);

add_filter('template_include', static function (string $template): string {
    if (!is_page()) {
        return $template;
    }
    global $post;
    if (!$post instanceof WP_Post) {
        return $template;
    }
    // If the product route is requested, force the child template regardless of WP's slug resolution.
    $key = (string) get_query_var('xt_solarfold_key', '');
    $is_product_key = in_array($key, ['solarfold', 'mobil-grid', 'solar-hybrid-box'], true);

    if ($post->post_name === 'solarfold' && (int) $post->post_parent === 0 && !$is_product_key) {
        $custom = get_template_directory() . '/page-solarfold.php';
        if (file_exists($custom)) {
            return $custom;
        }
        return $template;
    }

    if ($is_product_key) {
        $custom = get_template_directory() . '/page-solarfold-child.php';
        if (file_exists($custom)) {
            return $custom;
        }
        return $template;
    }
    if (!xtechs_is_solarfold_descendant((int) $post->ID)) {
        return $template;
    }
    if (xtechs_solarfold_child_slug_to_key($post->post_name) === null) {
        return $template;
    }
    $custom = get_template_directory() . '/page-solarfold-child.php';
    if (file_exists($custom)) {
        return $custom;
    }
    return $template;
}, 20);
