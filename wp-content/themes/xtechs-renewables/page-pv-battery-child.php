<?php
/**
 * Child pages under PV & Battery: residential, business, off-grid, builders.
 *
 * @package xtechs-renewables
 */

if (!defined('ABSPATH')) {
    exit;
}

global $post;

if (!$post instanceof WP_Post) {
    get_header();
    get_footer();
    exit;
}

$xt_pv_key = xtechs_pv_child_slug_to_key($post->post_name);
if ($xt_pv_key === null) {
    wp_safe_redirect(xtechs_page_link('pv-battery'));
    exit;
}

add_action(
    'wp_head',
    static function () use ($xt_pv_key) {
        global $post;
        if (!$post instanceof WP_Post) {
            return;
        }
        $home = home_url('/');
        $pv = xtechs_page_link('pv-battery');
        $here = get_permalink($post);
        $name = xtechs_pv_clone_json_name($xt_pv_key);
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $name,
            'url' => $here,
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $home],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'PV & Battery', 'item' => $pv],
                    ['@type' => 'ListItem', 'position' => 3, 'name' => $name, 'item' => $here],
                ],
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    },
    20
);

get_header();
get_template_part('template-parts/pv/seg', $xt_pv_key);
get_footer();
