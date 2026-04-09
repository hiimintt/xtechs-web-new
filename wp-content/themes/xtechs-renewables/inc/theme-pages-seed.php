<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Ensure a top-level published Page exists at $slug (create or publish draft/private).
 */
function xtechs_ensure_publish_page(string $slug, string $title): void
{
    $page = get_page_by_path($slug);
    if ($page instanceof WP_Post) {
        if ($page->post_status !== 'publish') {
            wp_update_post([
                'ID' => (int) $page->ID,
                'post_status' => 'publish',
            ]);
        }
        return;
    }
    wp_insert_post([
        'post_title' => $title,
        'post_name' => $slug,
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_content' => '',
    ], true);
}

/**
 * Auto-create theme marketing pages on first admin visit (manage_options).
 * PV & Battery + SolarFold trees are seeded separately in their own includes.
 */
function xtechs_maybe_seed_theme_pages(): void
{
    if (!is_admin() || !current_user_can('manage_options')) {
        return;
    }
    if (defined('DOING_AJAX') && DOING_AJAX) {
        return;
    }

    $pages = [
        'about' => 'About',
        'contact' => 'Contact',
        'x-classes' => 'X-Classes',
        'amber-electric' => 'Amber Electric',
        'x-vrthing' => 'X-vrthing',
    ];
    foreach ($pages as $slug => $title) {
        xtechs_ensure_publish_page($slug, $title);
    }
}
add_action('admin_init', 'xtechs_maybe_seed_theme_pages', 1);
