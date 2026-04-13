<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="xt-locations-page xt-location-city">
    <div class="xt-container xt-locations-inner">
        <header class="xt-locations-head">
            <h1><?php esc_html_e('Melbourne', 'xtechs-renewables'); ?></h1>
            <p><?php esc_html_e('Solar, battery, EV charging, and electrical services for homes, builders, and businesses across Melbourne.', 'xtechs-renewables'); ?></p>
        </header>

        <article class="xt-location-detail">
            <h2><?php esc_html_e('What We Deliver in Melbourne', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Residential solar and battery system design + installation', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Commercial solar projects with scalable monitoring', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Home and workplace EV charger installations', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Electrical upgrades for switchboards and site readiness', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Service Area Highlights', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('We service inner-city, eastern, south-eastern, northern, and western Melbourne suburbs, including fast-turnaround assessments where scheduling allows.', 'xtechs-renewables'); ?></p>

            <h2><?php esc_html_e('Book a Site Assessment', 'xtechs-renewables'); ?></h2>
            <p>
                <?php esc_html_e('Tell us your address, energy usage goals, and timeline. Our team will inspect your site and provide tailored recommendations.', 'xtechs-renewables'); ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact us', 'xtechs-renewables'); ?></a>.
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
