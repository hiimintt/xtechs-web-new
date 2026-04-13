<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="xt-locations-page xt-location-city">
    <div class="xt-container xt-locations-inner">
        <header class="xt-locations-head">
            <h1><?php esc_html_e('Bendigo', 'xtechs-renewables'); ?></h1>
            <p><?php esc_html_e('Reliable solar, battery, and electrical services for Bendigo and wider central Victoria.', 'xtechs-renewables'); ?></p>
        </header>

        <article class="xt-location-detail">
            <h2><?php esc_html_e('What We Deliver in Bendigo', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Residential solar + battery systems tuned for high summer loads', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Business energy systems with long-term performance in mind', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('EV charger installs integrated with existing switchboard capacity', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Off-grid and hybrid options where network constraints apply', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Service Area Highlights', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('Our team supports metro-adjacent and regional properties across Bendigo with site-specific planning and compliant installation standards.', 'xtechs-renewables'); ?></p>

            <h2><?php esc_html_e('Discuss Your Site', 'xtechs-renewables'); ?></h2>
            <p>
                <?php esc_html_e('Share your property details and goals to receive a practical system pathway and quote.', 'xtechs-renewables'); ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Talk to us', 'xtechs-renewables'); ?></a>.
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
