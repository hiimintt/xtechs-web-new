<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="xt-locations-page xt-location-city">
    <div class="xt-container xt-locations-inner">
        <header class="xt-locations-head">
            <h1><?php esc_html_e('Mornington Peninsula', 'xtechs-renewables'); ?></h1>
            <p><?php esc_html_e('Coastal-ready solar and electrical solutions for homes, businesses, and lifestyle properties across the peninsula.', 'xtechs-renewables'); ?></p>
        </header>

        <article class="xt-location-detail">
            <h2><?php esc_html_e('What We Deliver on the Peninsula', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Solar + battery systems suited to coastal operating conditions', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Primary and holiday home clean-energy upgrades', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('EV charging systems for residential and accommodation sites', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Electrical reliability upgrades and maintenance advice', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Service Area Highlights', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('We support projects across bayside and ocean-side suburbs with durable component choices and maintenance-aware system design.', 'xtechs-renewables'); ?></p>

            <h2><?php esc_html_e('Plan Your Upgrade', 'xtechs-renewables'); ?></h2>
            <p>
                <?php esc_html_e('Book a site assessment to receive a location-appropriate recommendation for your property.', 'xtechs-renewables'); ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Get started', 'xtechs-renewables'); ?></a>.
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
