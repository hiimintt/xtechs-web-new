<?php
if (!defined('ABSPATH')) {
    exit;
}

$uri = get_template_directory_uri();
$logo_url = $uri . '/assets/media/xlogo.png';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class('xt-body'); ?>>
<?php wp_body_open(); ?>

<header class="xt-site-header" id="xt-site-header">
    <div class="xt-container xt-header-row">
        <a class="xt-brand" href="<?php echo esc_url(home_url('/')); ?>">
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('xTechs Logo', 'xtechs-renewables'); ?>" width="120" height="40" class="xt-brand-logo" decoding="async" fetchpriority="high" />
        </a>

        <nav class="xt-nav-desktop" aria-label="<?php esc_attr_e('Primary', 'xtechs-renewables'); ?>">
            <ul class="xt-nav-list">
                <li class="xt-nav-item xt-has-dropdown">
                    <a class="xt-nav-link" href="<?php echo esc_url(xtechs_page_link('pv-battery')); ?>">
                        <?php esc_html_e('PV & Battery', 'xtechs-renewables'); ?>
                        <?php echo xtechs_icon_chevron_down(); ?>
                    </a>
                    <div class="xt-dropdown">
                        <a href="<?php echo esc_url(xtechs_page_link('pv-battery/residential')); ?>"><?php esc_html_e('Residential', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(xtechs_page_link('pv-battery/business')); ?>"><?php esc_html_e('Commercial (For Business)', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(xtechs_page_link('pv-battery/off-grid')); ?>"><?php esc_html_e('Off-Grid', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(xtechs_page_link('pv-battery/builders')); ?>"><?php esc_html_e('Builders', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(xtechs_page_link('battery')); ?>"><?php esc_html_e('Battery Storage', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(xtechs_page_link('ev-chargers')); ?>"><?php esc_html_e('EV Chargers', 'xtechs-renewables'); ?></a>
                    </div>
                </li>
                <li class="xt-nav-item xt-has-dropdown">
                    <a class="xt-nav-link" href="<?php echo esc_url(home_url('/solarfold')); ?>">
                        <?php esc_html_e('SolarFold', 'xtechs-renewables'); ?>
                        <?php echo xtechs_icon_chevron_down(); ?>
                    </a>
                    <div class="xt-dropdown">
                        <a href="<?php echo esc_url(home_url('/solarfold/military')); ?>"><?php esc_html_e('For Military', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(home_url('/solarfold/mining')); ?>"><?php esc_html_e('For Mining', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(home_url('/solarfold/communities')); ?>"><?php esc_html_e('For Communities', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(home_url('/solarfold/emergency-power')); ?>"><?php esc_html_e('For Emergency Power', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(home_url('/solarfold/event-power')); ?>"><?php esc_html_e('For Event Power', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(home_url('/solarfold/short-term-projects')); ?>"><?php esc_html_e('For Short-Term Projects', 'xtechs-renewables'); ?></a>
                        <a href="<?php echo esc_url(home_url('/solarfold/long-term-projects')); ?>"><?php esc_html_e('For Long-Term Projects', 'xtechs-renewables'); ?></a>
                    </div>
                </li>
                <li class="xt-nav-item">
                    <a class="xt-nav-link" href="<?php echo esc_url(home_url('/x-classes')); ?>"><?php esc_html_e('X-Classes', 'xtechs-renewables'); ?></a>
                </li>
                <li class="xt-nav-item">
                    <a class="xt-nav-link" href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('amber-electric') : home_url('/amber-electric/')); ?>"><?php esc_html_e('Amber VPP', 'xtechs-renewables'); ?></a>
                </li>
                <li class="xt-nav-item">
                    <a class="xt-nav-link xt-nav-link-soon" href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('x-vrthing') : home_url('/x-vrthing/')); ?>">
                        <span><?php esc_html_e('X-Vrything Platform', 'xtechs-renewables'); ?></span>
                        <span class="xt-pill-soon"><?php esc_html_e('Coming Soon', 'xtechs-renewables'); ?></span>
                    </a>
                </li>
                <li class="xt-nav-item">
                    <a class="xt-nav-link" href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About', 'xtechs-renewables'); ?></a>
                </li>
                <li class="xt-nav-item">
                    <a class="xt-nav-link" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'xtechs-renewables'); ?></a>
                </li>
            </ul>
        </nav>

        <div class="xt-header-cta">
            <a class="xt-btn xt-btn-outline xt-btn-sm" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Get a quote', 'xtechs-renewables'); ?></a>
            <a class="xt-btn xt-btn-primary xt-btn-sm" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Request call back', 'xtechs-renewables'); ?></a>
        </div>

        <button type="button" class="xt-menu-toggle" aria-expanded="false" aria-controls="xt-mobile-nav" aria-label="<?php esc_attr_e('Menu', 'xtechs-renewables'); ?>">
            <span class="xt-menu-icon xt-menu-icon-open" aria-hidden="true"><?php echo xtechs_icon_menu(); ?></span>
            <span class="xt-menu-icon xt-menu-icon-close" aria-hidden="true"><?php echo xtechs_icon_close(); ?></span>
        </button>
    </div>

    <div class="xt-mobile-nav" id="xt-mobile-nav" hidden="">
        <nav class="xt-container xt-mobile-nav-inner" aria-label="<?php esc_attr_e('Mobile primary', 'xtechs-renewables'); ?>">
            <div class="xt-mobile-block">
                <a class="xt-mobile-parent" href="<?php echo esc_url(xtechs_page_link('pv-battery')); ?>"><?php esc_html_e('PV & Battery', 'xtechs-renewables'); ?></a>
                <div class="xt-mobile-sub">
                    <a href="<?php echo esc_url(xtechs_page_link('pv-battery/residential')); ?>"><?php esc_html_e('Residential', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(xtechs_page_link('pv-battery/business')); ?>"><?php esc_html_e('Commercial (For Business)', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(xtechs_page_link('pv-battery/off-grid')); ?>"><?php esc_html_e('Off-Grid', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(xtechs_page_link('pv-battery/builders')); ?>"><?php esc_html_e('Builders', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(xtechs_page_link('battery')); ?>"><?php esc_html_e('Battery Storage', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(xtechs_page_link('ev-chargers')); ?>"><?php esc_html_e('EV Chargers', 'xtechs-renewables'); ?></a>
                </div>
            </div>
            <div class="xt-mobile-block">
                <a class="xt-mobile-parent" href="<?php echo esc_url(home_url('/solarfold')); ?>"><?php esc_html_e('SolarFold', 'xtechs-renewables'); ?></a>
                <div class="xt-mobile-sub">
                    <a href="<?php echo esc_url(home_url('/solarfold/military')); ?>"><?php esc_html_e('For Military', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(home_url('/solarfold/mining')); ?>"><?php esc_html_e('For Mining', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(home_url('/solarfold/communities')); ?>"><?php esc_html_e('For Communities', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(home_url('/solarfold/emergency-power')); ?>"><?php esc_html_e('For Emergency Power', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(home_url('/solarfold/event-power')); ?>"><?php esc_html_e('For Event Power', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(home_url('/solarfold/short-term-projects')); ?>"><?php esc_html_e('For Short-Term Projects', 'xtechs-renewables'); ?></a>
                    <a href="<?php echo esc_url(home_url('/solarfold/long-term-projects')); ?>"><?php esc_html_e('For Long-Term Projects', 'xtechs-renewables'); ?></a>
                </div>
            </div>
            <a class="xt-mobile-parent" href="<?php echo esc_url(home_url('/x-classes')); ?>"><?php esc_html_e('X-Classes', 'xtechs-renewables'); ?></a>
            <a class="xt-mobile-parent" href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('amber-electric') : home_url('/amber-electric/')); ?>"><?php esc_html_e('Amber VPP', 'xtechs-renewables'); ?></a>
            <a class="xt-mobile-parent xt-mobile-soon" href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('x-vrthing') : home_url('/x-vrthing/')); ?>">
                <?php esc_html_e('X-Vrything Platform', 'xtechs-renewables'); ?>
                <span class="xt-pill-soon"><?php esc_html_e('Coming Soon', 'xtechs-renewables'); ?></span>
            </a>
            <a class="xt-mobile-parent" href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About', 'xtechs-renewables'); ?></a>
            <a class="xt-mobile-parent" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'xtechs-renewables'); ?></a>
            <div class="xt-mobile-cta">
                <a class="xt-btn xt-btn-outline xt-btn-sm xt-btn-block" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Get a quote', 'xtechs-renewables'); ?></a>
                <a class="xt-btn xt-btn-primary xt-btn-sm xt-btn-block" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Request call back', 'xtechs-renewables'); ?></a>
            </div>
        </nav>
    </div>
</header>

<main class="xt-site-main">
<?php
if (function_exists('xtechs_render_breadcrumbs')) {
    xtechs_render_breadcrumbs();
}
?>
