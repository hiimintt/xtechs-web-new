<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
get_template_part('template-parts/location/location-landing', null, ['location_key' => 'geelong']);
get_footer();
