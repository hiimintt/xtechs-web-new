<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
$last_updated = wp_date('j F Y');
?>
<section class="xt-legal-page">
    <div class="xt-container xt-legal-inner">
        <header class="xt-legal-head">
            <h1><?php esc_html_e('Terms of Service', 'xtechs-renewables'); ?></h1>
            <p><?php echo esc_html(sprintf(__('Last updated: %s', 'xtechs-renewables'), $last_updated)); ?></p>
        </header>

        <div class="xt-legal-card">
            <h2><?php esc_html_e('Important Notice', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('By accessing and using xTechs Renewables website and services, you agree to these Terms of Service.', 'xtechs-renewables'); ?></p>
        </div>

        <article class="xt-legal-content">
            <h2>1. General Agreement</h2>
            <p>These Terms constitute a legally binding agreement between you and xTechs Renewables Pty Ltd (ABN 30 673 983 572) regarding use of our website and services.</p>

            <h2>2. Our Services</h2>
            <p>We provide clean energy solutions including solar PV, battery storage, EV charging, electrical upgrades, and related support services.</p>

            <h2>3. Service Terms</h2>
            <ul>
                <li>Services are subject to site suitability and compliance requirements.</li>
                <li>Project timelines may vary due to weather, approvals, and site conditions.</li>
                <li>Payment and deposit terms are defined in individual service agreements.</li>
            </ul>

            <h2>4. Warranties</h2>
            <p>Workmanship and product warranties apply in line with your service agreement and relevant manufacturer warranty conditions.</p>

            <h2>5. Limitation of Liability</h2>
            <p>To the extent permitted by law, our liability is limited to the value of services provided under the applicable agreement.</p>

            <h2>6. Privacy</h2>
            <p>Your use of our services is also governed by our <a href="<?php echo esc_url(home_url('/privacy')); ?>">Privacy Policy</a>.</p>

            <h2>7. Intellectual Property</h2>
            <p>Website content, branding, and materials are owned by xTechs Renewables and may not be reused without permission.</p>

            <h2>8. Changes to Terms</h2>
            <p>We may update these Terms from time to time. Continued use of our website or services after updates means you accept the revised Terms.</p>

            <h2>9. Governing Law</h2>
            <p>These Terms are governed by the laws of Victoria, Australia, and disputes are subject to Victorian jurisdiction.</p>

            <h2>10. Contact</h2>
            <p>
                Email: <a href="mailto:inquiries@xtechsrenewables.com.au">inquiries@xtechsrenewables.com.au</a><br />
                Phone: <a href="tel:1300983247">1300 983 247</a><br />
                Address: 2 Corporate Ave, Rowville VIC 3178
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
