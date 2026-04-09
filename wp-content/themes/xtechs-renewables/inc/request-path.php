<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Public request path after the WordPress home path (no leading/trailing slashes).
 */
function xtechs_normalize_request_path(): string
{
    $raw = isset($_SERVER['REQUEST_URI']) ? wp_unslash($_SERVER['REQUEST_URI']) : '';
    $path = wp_parse_url($raw, PHP_URL_PATH);
    if (!is_string($path)) {
        $path = '';
    }
    $path = trim($path, '/');
    $home = wp_parse_url(home_url('/'), PHP_URL_PATH);
    $home = is_string($home) ? trim($home, '/') : '';
    if ($home !== '') {
        if ($path === $home) {
            $path = '';
        } elseif (strncmp($path, $home . '/', strlen($home) + 1) === 0) {
            $path = substr($path, strlen($home) + 1);
        }
    }

    return $path;
}
