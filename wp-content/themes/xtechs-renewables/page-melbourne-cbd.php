<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="xt-locations-page xt-location-city">
    <div class="xt-container xt-locations-inner">
        <header class="xt-locations-head">
            <h1><?php esc_html_e('Solar & Battery Solutions for Melbourne CBD', 'xtechs-renewables'); ?></h1>
            <p><?php esc_html_e('CEC-accredited installations for apartments, townhouses, and commercial rooftops in the CBD.', 'xtechs-renewables'); ?></p>
        </header>

        <article class="xt-location-detail">
            <h2><?php esc_html_e('Popular Services in the CBD', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Compact and high-yield solar PV system design', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Battery storage for essential circuit backup', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('EV charging for homes, apartments, and carparks', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Commercial rooftop systems with compliance support', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Why xTechs for Melbourne CBD', 'xtechs-renewables'); ?></h2>
            <ul>
                <li><?php esc_html_e('Urban-fit designs with shading and access considerations', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Export limits, metering, and approvals handled end-to-end', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Premium hardware and clean installation standards', 'xtechs-renewables'); ?></li>
                <li><?php esc_html_e('Monitoring setup with optional support plans', 'xtechs-renewables'); ?></li>
            </ul>

            <h2><?php esc_html_e('Areas We Cover In and Around the CBD', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('Docklands, Southbank, West Melbourne, East Melbourne, Carlton, Fitzroy, Collingwood, and Port Melbourne.', 'xtechs-renewables'); ?></p>

            <h2><?php esc_html_e('Get a Tailored Quote', 'xtechs-renewables'); ?></h2>
            <p>
                <?php esc_html_e('Book a site assessment with our CEC-accredited team.', 'xtechs-renewables'); ?>
                <a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Book Assessment', 'xtechs-renewables'); ?></a>.
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
