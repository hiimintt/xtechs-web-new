<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="xt-locations-page xt-location-city">
    <div class="xt-container xt-locations-inner">
        <header class="xt-locations-head">
            <h1><?php esc_html_e('Solar & Battery Solutions for South-East Melbourne', 'xtechs-renewables'); ?></h1>
            <p><?php esc_html_e('Quality PV, battery backup, and EV charging tailored to usage patterns across South-East Melbourne.', 'xtechs-renewables'); ?></p>
        </header>

        <article class="xt-location-detail">
            <h2><?php esc_html_e('Popular Services in the South-East', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Residential and commercial solar PV installation', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Battery integration for backup and savings goals', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('EV charger installation and compliance setup', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('End-to-end approvals, metering, and export configuration', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Why xTechs for the South-East', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Tailored designs with orientation and shading analysis', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('CEC-accredited workmanship and premium component selection', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Neat installs with minimal disruption', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Monitoring setup and support options', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Popular Areas We Cover', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('Rowville, Glen Waverley, Mulgrave, Narre Warren, Berwick, Dandenong, Clayton, and Keysborough.', 'xtechs-renewables'); ?></p>

            <h2><?php esc_html_e('Get a Tailored Quote', 'xtechs-renewables'); ?></h2>
            <p>
                <?php esc_html_e('Book a site assessment or talk to our team for project scoping.', 'xtechs-renewables'); ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Get a Quote', 'xtechs-renewables'); ?></a>.
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
