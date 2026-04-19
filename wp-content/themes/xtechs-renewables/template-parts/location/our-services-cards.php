<?php
/**
 * Service cards grid (mirrors ServicesSection inner block from xtechs-website).
 * Expects same image paths as home-services.php.
 */
if (!defined('ABSPATH')) {
    exit;
}

$services = [
    [
        'title' => __('Residential Solar', 'xtechs-renewables'),
        'image' => 'assets/media/services/residential-1.jpg',
        'overlay' => 'assets/media/services/residential-2.jpg',
        'href'  => home_url('/pv-battery/residential'),
    ],
    [
        'title' => __('Commercial Solar', 'xtechs-renewables'),
        'image' => 'assets/media/services/commercial-1.jpg',
        'overlay' => 'assets/media/services/commercial-2.jpg',
        'href'  => home_url('/pv-battery/business'),
    ],
    [
        'title' => __('SolarFold', 'xtechs-renewables'),
        'image' => 'assets/media/services/solarfold-1.jpg',
        'overlay' => 'assets/media/services/solarfold-2.jpg',
        'href'  => home_url('/solarfold/solarfold'),
    ],
    [
        'title' => __('Off-grid Systems', 'xtechs-renewables'),
        'image' => 'assets/media/services/offgrid-1.jpg',
        'overlay' => 'assets/media/services/offgrid-2.jpg',
        'href'  => home_url('/pv-battery/off-grid'),
    ],
    [
        'title' => __('Solar Batteries', 'xtechs-renewables'),
        'image' => 'assets/media/services/batteries-1.jpg',
        'overlay' => 'assets/media/services/batteries-2.jpg',
        'href'  => function_exists('xtechs_page_link') ? xtechs_page_link('battery') : home_url('/battery/'),
    ],
    [
        'title' => __('EV Chargers', 'xtechs-renewables'),
        'image' => 'assets/media/services/ev-chargers-1.jpg',
        'overlay' => 'assets/media/services/ev-chargers-2.jpg',
        'href'  => function_exists('xtechs_page_link') ? xtechs_page_link('ev-chargers') : home_url('/ev-chargers/'),
    ],
];
?>
<div class="xt-location-services-inner">
    <div class="xt-services-header">
        <h2 class="xt-services-title"><?php esc_html_e('Solar, Battery & EV Charging Services — Victoria', 'xtechs-renewables'); ?></h2>
        <p class="xt-services-sub">
            <?php esc_html_e('Grid & Off-Grid Solar, Batteries, EV Charging And Rapid-Deploy SolarFold—Built The xTechs Way.', 'xtechs-renewables'); ?>
        </p>
    </div>
    <div class="xt-services-grid">
        <?php foreach ($services as $svc) : ?>
            <?php
            $img_alt = sprintf(
                /* translators: %s: service name */
                __('%s — solar & energy services by xTechs Renewables, Victoria', 'xtechs-renewables'),
                $svc['title']
            );
            ?>
            <a class="xt-service-card" href="<?php echo esc_url($svc['href']); ?>" aria-label="<?php echo esc_attr($svc['title']); ?>">
                <div class="xt-service-images">
                    <?php
                    echo xtechs_theme_service_card_img((string) $svc['image'], '', 'xt-service-img xt-service-img-back', true);
                    echo xtechs_theme_service_card_img((string) $svc['overlay'], $img_alt, 'xt-service-img xt-service-img-front', false);
                    ?>
                </div>
                <h3 class="xt-service-title"><?php echo esc_html($svc['title']); ?></h3>
            </a>
        <?php endforeach; ?>
    </div>
</div>
