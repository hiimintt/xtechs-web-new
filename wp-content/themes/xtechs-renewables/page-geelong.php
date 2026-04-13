<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="xt-locations-page xt-location-city">
    <div class="xt-container xt-locations-inner">
        <header class="xt-locations-head">
            <h1><?php esc_html_e('Geelong', 'xtechs-renewables'); ?></h1>
            <p><?php esc_html_e('End-to-end clean energy solutions for Geelong, Bellarine Peninsula, and surrounding growth areas.', 'xtechs-renewables'); ?></p>
        </header>

        <article class="xt-location-detail">
            <h2><?php esc_html_e('What We Deliver in Geelong', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Solar and battery systems for existing homes and new builds', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Commercial and light-industrial energy upgrades', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('EV charging setups with solar optimization', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Maintenance support and system performance checks', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Service Area Highlights', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('We work across Geelong and nearby coastal communities, delivering practical systems designed for local weather and usage patterns.', 'xtechs-renewables'); ?></p>

            <h2><?php esc_html_e('Start Your Project', 'xtechs-renewables'); ?></h2>
            <p>
                <?php esc_html_e('Get in touch for a tailored recommendation and site-first quoting process for your property.', 'xtechs-renewables'); ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Book now', 'xtechs-renewables'); ?></a>.
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
