<?php
if (!defined('ABSPATH')) {
    exit;
}

add_filter('template_include', static function (string $template): string {
    if (!is_page()) {
        return $template;
    }
    global $post;
    if (!$post instanceof WP_Post || (int) $post->post_parent !== 0) {
        return $template;
    }
    if ($post->post_name !== 'x-classes') {
        return $template;
    }
    $custom = get_template_directory() . '/page-x-classes.php';
    if (file_exists($custom)) {
        return $custom;
    }
    return $template;
}, 20);
