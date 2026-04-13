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
            <h1><?php esc_html_e('Cookie Policy', 'xtechs-renewables'); ?></h1>
            <p><?php echo esc_html(sprintf(__('Last updated: %s', 'xtechs-renewables'), $last_updated)); ?></p>
        </header>

        <div class="xt-legal-card">
            <h2><?php esc_html_e('Cookie Transparency', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('This Cookie Policy explains how xTechs Renewables Pty Ltd uses cookies and similar technologies and how you can control your preferences.', 'xtechs-renewables'); ?></p>
        </div>

        <article class="xt-legal-content">
            <h2>1. What Are Cookies?</h2>
            <p>Cookies are small text files placed on your device when you visit a website. They help websites remember your preferences and improve functionality.</p>

            <h2>2. Cookies We Use</h2>
            <ul>
                <li><strong>Necessary cookies:</strong> Required for essential website functions and security.</li>
                <li><strong>Analytics cookies:</strong> Help us understand website performance and visitor behavior.</li>
                <li><strong>Marketing cookies:</strong> Help us show relevant content and measure campaign results.</li>
            </ul>

            <h2>3. Managing Your Preferences</h2>
            <p>You can manage cookie consent through our cookie banner and preference modal, or by changing your browser settings at any time.</p>

            <h2>4. Third-Party Services</h2>
            <p>Some cookies are set by third-party services we use, such as analytics and advertising platforms. Their handling of data is governed by their own privacy policies.</p>

            <h2>5. Data Retention</h2>
            <p>Cookie duration depends on type: session cookies expire when your browser closes, while persistent cookies remain for a fixed period unless manually removed.</p>

            <h2>6. Changes to This Policy</h2>
            <p>We may update this Cookie Policy as our practices or legal requirements change. Updated terms will be published on this page.</p>

            <h2>7. Contact Us</h2>
            <p>
                Email: <a href="mailto:inquiries@xtechsrenewables.com.au">inquiries@xtechsrenewables.com.au</a><br />
                Phone: <a href="tel:1300983247">1300 983 247</a><br />
                Address: 2 Corporate Ave, Rowville VIC 3178
            </p>

            <p>For broader data handling details, please see our <a href="<?php echo esc_url(home_url('/privacy')); ?>">Privacy Policy</a>.</p>
        </article>
    </div>
</section>
<?php
get_footer();
