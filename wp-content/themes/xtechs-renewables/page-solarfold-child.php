<?php
/**
 * SolarFold child page template.
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

$xt_solarfold_key = xtechs_solarfold_child_slug_to_key($post->post_name);
if ($xt_solarfold_key === null) {
    wp_safe_redirect(home_url('/solarfold/'));
    exit;
}

$xt_solarfold_product_slugs = ['solarfold', 'mobil-grid', 'solar-hybrid-box'];
if (in_array($xt_solarfold_key, $xt_solarfold_product_slugs, true)) {
    wp_enqueue_script(
        'xtechs-solarfold-product',
        get_template_directory_uri() . '/assets/js/solarfold-product.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
}

get_header();
set_query_var('xt_solarfold_key', $xt_solarfold_key);
get_template_part('template-parts/solarfold/child');
get_footer();
