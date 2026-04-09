<?php
if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'xtechs_register_custom_post_types');
function xtechs_register_custom_post_types() {
    register_post_type('support', [
        'labels' => [
            'name' => __('Support Articles', 'xtechs-renewables'),
            'singular_name' => __('Support Article', 'xtechs-renewables'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-sos',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'rewrite' => ['slug' => 'support'],
        'show_in_rest' => true,
    ]);

    register_post_type('partner', [
        'labels' => [
            'name' => __('Partners', 'xtechs-renewables'),
            'singular_name' => __('Partner', 'xtechs-renewables'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-groups',
        'supports' => ['title', 'editor', 'thumbnail'],
        'rewrite' => ['slug' => 'local-business-partners'],
        'show_in_rest' => true,
    ]);

    register_post_type('course', [
        'labels' => [
            'name' => __('Courses', 'xtechs-renewables'),
            'singular_name' => __('Course', 'xtechs-renewables'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'rewrite' => ['slug' => 'learn/courses'],
        'show_in_rest' => true,
    ]);

    register_post_type('service', [
        'labels' => [
            'name' => __('Services', 'xtechs-renewables'),
            'singular_name' => __('Service', 'xtechs-renewables'),
        ],
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'rewrite' => ['slug' => 'services'],
        'show_in_rest' => true,
    ]);
}
