<?php
/**
 * Battery storage landing (slug: battery, battery-storage).
 *
 * @package xtechs-renewables
 */

if (!defined('ABSPATH')) {
    exit;
}

global $post, $xtechs_pv_breadcrumb;

$xtechs_pv_breadcrumb = [
    ['label' => __('Home', 'xtechs-renewables'), 'url' => home_url('/')],
    ['label' => __('Battery storage', 'xtechs-renewables'), 'url' => ''],
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
        $name = 'Battery Storage Solutions';
        $web = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $name,
            'url' => $here,
            'breadcrumb' => [
                '@type' => 'BreadcrumbList',
                'itemListElement' => [
                    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $home],
                    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Battery Storage', 'item' => $here],
                ],
            ],
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($web, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
        $faqs = xtechs_solution_battery_faqs();
        $main_entity = [];
        foreach ($faqs as $faq) {
            $main_entity[] = [
                '@type' => 'Question',
                'name' => $faq['q'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['a'],
                ],
            ];
        }
        $faq_schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $main_entity,
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    },
    20
);

get_header();
get_template_part('template-parts/solutions/clone-battery-page');
get_footer();
