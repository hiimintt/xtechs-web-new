<?php
/**
 * X-vrthing (coming soon / invite) landing clone.
 *
 * @package xtechs-renewables
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
get_template_part('template-parts/x-vrthing/page');
wp_reset_postdata();
get_footer();
