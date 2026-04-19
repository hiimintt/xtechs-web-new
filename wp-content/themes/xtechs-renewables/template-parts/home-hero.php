<?php
if (!defined('ABSPATH')) {
    exit;
}

$logo = get_template_directory_uri() . '/assets/media/xlogo.png';
$titles = [
    'Solar Alone Isn’t Enough.',
    'Storage Changes Everything.',
    'This Is What’s Next.',
];
?>
<div class="xt-min-h-screen xt-home-hero">
    <div class="xt-hero-bg-layer" aria-hidden="true">
        <div class="xt-bg-circles">
            <div class="xt-bg-grid"></div>
            <div class="xt-bg-radial"></div>
            <div class="xt-bg-rings">
                <span class="xt-ring xt-ring-a"></span>
                <span class="xt-ring xt-ring-b"></span>
                <span class="xt-ring xt-ring-c"></span>
                <span class="xt-bg-logo-wrap">
                    <img src="<?php echo esc_url($logo); ?>" alt="<?php esc_attr_e('xTechs Renewables — solar and battery installer, Victoria', 'xtechs-renewables'); ?>" class="xt-bg-logo" width="320" height="320" decoding="sync" fetchpriority="high" />
                </span>
            </div>
            <span class="xt-bg-blob xt-bg-blob-tl"></span>
            <span class="xt-bg-blob xt-bg-blob-br"></span>
        </div>
    </div>

    <div class="xt-hero-front">
        <div class="xt-container xt-hero-inner">
            <div class="xt-hero-copy">
                <h1 class="xt-hero-h1 xt-hero-line-deep"><?php esc_html_e('Solar panel & battery installation — Melbourne & Victoria', 'xtechs-renewables'); ?></h1>
                <p class="xt-hero-brand xt-text-gradient-logo"><?php esc_html_e('Designed & installed by xTechs Renewables', 'xtechs-renewables'); ?></p>

                <div class="xt-hero-rotate-wrap" aria-live="polite" aria-atomic="true">
                    <div class="xt-hero-rotate-track" id="xt-hero-rotate" data-titles="<?php echo esc_attr(wp_json_encode($titles)); ?>">
                        <?php foreach ($titles as $i => $t) : ?>
                            <p class="xt-hero-rotate-line<?php echo $i === 0 ? ' is-active' : ''; ?>"<?php echo $i === 0 ? ' aria-hidden="false"' : ' aria-hidden="true"'; ?>><?php echo esc_html($t); ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>

                <p class="xt-hero-lead">
                    <?php esc_html_e('Clean energy systems, smart storage, and reliable electrical — for homes, builders, and businesses across Victoria. Solar panel installation Melbourne and solar battery storage — plus EV chargers and off-grid options. xTechs Renewables designs and installs compliant PV and battery systems with neat workmanship and clear documentation.', 'xtechs-renewables'); ?>
                </p>

                <div class="xt-hero-cta-row">
                    <a class="xt-btn xt-btn-outline xt-btn-lg" href="tel:1300983247">
                        <?php esc_html_e('Call 1300 983 247', 'xtechs-renewables'); ?>
                        <svg class="xt-icon-inline" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </a>
                    <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url(home_url('/contact')); ?>">
                        <?php esc_html_e('Book Site Inspection', 'xtechs-renewables'); ?>
                        <svg class="xt-icon-inline" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                    </a>
                </div>

                <p class="xt-hero-footnote">
                    <?php esc_html_e('Site inspection fees apply. xTechs Renewables will provide a detailed quote & site inspection report after assessing your property.', 'xtechs-renewables'); ?>
                </p>
            </div>
        </div>
    </div>
</div>
