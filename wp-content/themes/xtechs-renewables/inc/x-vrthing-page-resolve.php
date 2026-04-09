<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/request-path.php';

function xtechs_is_x_vrthing_request(): bool
{
    if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
        return false;
    }
    if (defined('REST_REQUEST') && REST_REQUEST) {
        return false;
    }

    return xtechs_normalize_request_path() === 'x-vrthing';
}

add_filter('template_include', static function (string $template): string {
    if (!is_page()) {
        return $template;
    }
    global $post;
    if (!$post instanceof WP_Post || (int) $post->post_parent !== 0) {
        return $template;
    }
    if ($post->post_name !== 'x-vrthing') {
        return $template;
    }
    $custom = get_template_directory() . '/page-x-vrthing.php';
    if (file_exists($custom)) {
        return $custom;
    }
    return $template;
}, 20);

add_filter('template_include', static function (string $template): string {
    if (!xtechs_is_x_vrthing_request()) {
        return $template;
    }
    if (is_page()) {
        global $post;
        if ($post instanceof WP_Post && $post->post_name === 'x-vrthing') {
            return $template;
        }
    }
    $custom = get_template_directory() . '/page-x-vrthing.php';
    if (!is_readable($custom)) {
        return $template;
    }

    $page = get_page_by_path('x-vrthing');
    if ($page instanceof WP_Post && $page->post_status === 'publish') {
        global $wp_query, $post;
        $post = $page;
        $wp_query->queried_object = $page;
        $wp_query->queried_object_id = (int) $page->ID;
        $wp_query->is_page = true;
        $wp_query->is_singular = true;
        $wp_query->is_home = false;
        $wp_query->is_front_page = false;
        $wp_query->is_archive = false;
        $wp_query->is_404 = false;
        $wp_query->posts = [$page];
        $wp_query->post_count = 1;
        $wp_query->found_posts = 1;
        $wp_query->max_num_pages = 1;
        setup_postdata($post);
    }

    return $custom;
}, 99);

add_filter('document_title_parts', static function (array $title): array {
    if (!xtechs_is_x_vrthing_request()) {
        return $title;
    }
    $page = get_page_by_path('x-vrthing');
    if ($page instanceof WP_Post && $page->post_status === 'publish') {
        $title['title'] = get_the_title($page);
    } else {
        $title['title'] = __('X-vrthing', 'xtechs-renewables');
    }

    return $title;
}, 20);

add_action('wp_head', static function (): void {
    if (!xtechs_is_x_vrthing_request()) {
        return;
    }
    echo '<meta name="robots" content="noindex,nofollow" />' . "\n";
}, 1);
