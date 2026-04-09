<?php
if (!defined('ABSPATH')) {
    exit;
}

$base = get_template_directory_uri() . '/assets/media/services/';
$services = [
    [
        'title' => __('Residential Solar', 'xtechs-renewables'),
        'image' => $base . 'residential-1.jpg',
        'overlay' => $base . 'residential-2.jpg',
        'href'  => home_url('/pv-battery/residential'),
    ],
    [
        'title' => __('Commercial Solar', 'xtechs-renewables'),
        'image' => $base . 'commercial-1.jpg',
        'overlay' => $base . 'commercial-2.jpg',
        'href'  => home_url('/pv-battery/business'),
    ],
    [
        'title' => __('SolarFold', 'xtechs-renewables'),
        'image' => $base . 'solarfold-1.jpg',
        'overlay' => $base . 'solarfold-2.jpg',
        // Deep-link to the main SolarFold flagship product page.
        'href'  => home_url('/solarfold/solarfold'),
    ],
    [
        'title' => __('Off-grid Systems', 'xtechs-renewables'),
        'image' => $base . 'offgrid-1.jpg',
        'overlay' => $base . 'offgrid-2.jpg',
        'href'  => home_url('/pv-battery/off-grid'),
    ],
    [
        'title' => __('Solar Batteries', 'xtechs-renewables'),
        'image' => $base . 'batteries-1.jpg',
        'overlay' => $base . 'batteries-2.jpg',
        'href'  => home_url('/pv-battery/residential'),
    ],
    [
        'title' => __('EV Chargers', 'xtechs-renewables'),
        'image' => $base . 'ev-chargers-1.jpg',
        'overlay' => $base . 'ev-chargers-2.jpg',
        'href'  => home_url('/pv-battery/residential'),
    ],
];
?>
<section id="services-tile" class="xt-section xt-section-white">
    <div class="xt-container xt-container-narrow xt-services-inner">
        <div class="xt-services-header">
            <h2 class="xt-services-title"><?php esc_html_e('Our Services', 'xtechs-renewables'); ?></h2>
            <p class="xt-services-sub">
                <?php esc_html_e('Grid & Off-Grid Solar, Batteries, EV Charging And Rapid-Deploy SolarFold—Built The xTechs Way.', 'xtechs-renewables'); ?>
            </p>
        </div>
        <div class="xt-services-grid">
            <?php foreach ($services as $svc) : ?>
                <a class="xt-service-card" href="<?php echo esc_url($svc['href']); ?>" aria-label="<?php echo esc_attr($svc['title']); ?>">
                    <div class="xt-service-images">
                        <img class="xt-service-img xt-service-img-back" src="<?php echo esc_url($svc['image']); ?>" alt="" loading="lazy" width="176" height="176" />
                        <img class="xt-service-img xt-service-img-front" src="<?php echo esc_url($svc['overlay']); ?>" alt="" loading="lazy" width="176" height="176" />
                    </div>
                    <h3 class="xt-service-title"><?php echo esc_html($svc['title']); ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
