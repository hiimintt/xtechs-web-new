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
            <h1><?php esc_html_e('Privacy Policy', 'xtechs-renewables'); ?></h1>
            <p><?php echo esc_html(sprintf(__('Last updated: %s', 'xtechs-renewables'), $last_updated)); ?></p>
        </header>

        <div class="xt-legal-card">
            <h2><?php esc_html_e('Your Privacy Matters', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('xTechs Renewables Pty Ltd (ABN 30 673 983 572) is committed to protecting your privacy and personal information. We comply with the Australian Privacy Act 1988 (Cth) and the Australian Privacy Principles (APPs).', 'xtechs-renewables'); ?></p>
        </div>

        <article class="xt-legal-content">
            <h2>1. Information We Collect</h2>
            <p>We collect personal information when you contact us, request quotes, book services, or use our website. This may include your name, email, phone number, property details, and service requirements.</p>

            <h2>2. How We Use Your Information</h2>
            <ul>
                <li>Provide quotes, installation, maintenance, and support services</li>
                <li>Respond to inquiries and communicate service updates</li>
                <li>Improve our website and customer experience</li>
                <li>Comply with legal and regulatory obligations</li>
            </ul>

            <h2>3. Information Sharing</h2>
            <p>We do not sell or rent your personal information. We may share limited data with trusted contractors, technology partners, payment providers, or government bodies when required for service delivery or legal compliance.</p>

            <h2>4. Data Security</h2>
            <p>We use reasonable technical and administrative safeguards to protect personal information against unauthorized access, misuse, or loss.</p>

            <h2>5. Cookies and Tracking</h2>
            <p>We use cookies to maintain core website functionality and, where consent is provided, to support analytics and marketing. Please review our <a href="<?php echo esc_url(home_url('/cookies')); ?>">Cookie Policy</a>.</p>

            <h2>6. Your Rights</h2>
            <p>You can request access to, correction of, or deletion of your personal information, and opt out of direct marketing communications where applicable.</p>

            <h2>7. Changes to This Policy</h2>
            <p>We may update this Privacy Policy from time to time. The latest version will always be available on this page.</p>

            <h2>8. Contact Us</h2>
            <p>
                Privacy Officer, xTechs Renewables Pty Ltd<br />
                Email: <a href="mailto:inquiries@xtechsrenewables.com.au">inquiries@xtechsrenewables.com.au</a><br />
                Phone: <a href="tel:1300983247">1300 983 247</a><br />
                Address: 2 Corporate Ave, Rowville VIC 3178
            </p>
        </article>
    </div>
</section>
<?php
get_footer();
