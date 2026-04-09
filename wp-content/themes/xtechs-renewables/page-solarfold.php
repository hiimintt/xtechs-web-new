<?php
/**
 * SolarFold hub page (slug: solarfold).
 *
 * @package xtechs-renewables
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action(
    'wp_head',
    static function () {
        global $post;
        if (!$post instanceof WP_Post || $post->post_name !== 'solarfold' || (int) $post->post_parent !== 0) {
            return;
        }
        $home = home_url('/');
        $here = get_permalink($post);
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'SolarFold',
            'url' => $here,
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $home],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'SolarFold', 'item' => $here],
                ],
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    },
    20
);

get_header();
get_template_part('template-parts/solarfold/hub');
get_footer();
