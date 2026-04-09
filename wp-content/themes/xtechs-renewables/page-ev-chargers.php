<?php
/**
 * EV chargers landing (slug: ev-chargers, ev-charger-installation).
 *
 * @package xtechs-renewables
 */

if (!defined('ABSPATH')) {
    exit;
}

global $post, $xtechs_pv_breadcrumb;

$xtechs_pv_breadcrumb = [
    ['label' => __('Home', 'xtechs-renewables'), 'url' => home_url('/')],
    ['label' => __('EV charger installation', 'xtechs-renewables'), 'url' => ''],
];

add_action(
    'wp_head',
    static function () {
        global $post;
        if (!$post instanceof WP_Post) {
            return;
        }
        $home = home_url('/');
        $here = get_permalink($post);
        $name = 'EV Charger Installation';
        $web = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $name,
            'url' => $here,
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $home],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'EV Chargers', 'item' => $here],
                ],
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($web, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    },
    20
);

get_header();
get_template_part('template-parts/solutions/clone-ev-chargers-page');
get_footer();
