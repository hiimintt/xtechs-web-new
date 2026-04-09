<?php
/**
 * Amber Electric (VPP partnership) page clone.
 *
 * @package xtechs-renewables
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
get_template_part('template-parts/amber-electric/page');
wp_reset_postdata();
get_footer();
