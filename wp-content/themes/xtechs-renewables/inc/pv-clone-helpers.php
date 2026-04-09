<?php
if (!defined('ABSPATH')) {
    exit;
}

/** Media filenames from Next.js public/services — copy into assets/media/pv-clone/ */
function xtechs_pv_clone_img_url(string $filename): string {
    $filename = ltrim($filename, '/');
    $rel = '/assets/media/pv-clone/' . $filename;
    $path = get_template_directory() . $rel;
    if (is_readable($path)) {
        return get_template_directory_uri() . $rel;
    }
    return '';
}

function xtechs_pv_clone_contact_url(): string {
    return xtechs_page_link('contact');
}

function xtechs_pv_clone_json_name(string $key): string {
    $m = [
        'residential' => 'Residential Solar & Battery Solutions',
        'business' => 'Business Solar & Battery Solutions',
        'off-grid' => 'Off-Grid Solar & Battery Solutions',
        'builders' => 'Solar & Battery for Builders',
    ];
    return $m[$key] ?? $key;
}
