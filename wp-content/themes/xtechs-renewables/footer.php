<?php
if (!defined('ABSPATH')) {
    exit;
}

$logo = get_template_directory_uri() . '/assets/media/xlogo.png';
$year = (int) wp_date('Y');
$careers_url = get_page_by_path('careers') ? home_url('/careers') : home_url('/contact');
$privacy_url = get_page_by_path('privacy') ? home_url('/privacy') : home_url('/contact');
$cookies_url = get_page_by_path('cookies') ? home_url('/cookies') : home_url('/contact');
$terms_url = get_page_by_path('terms') ? home_url('/terms') : home_url('/contact');
$locations_url = get_page_by_path('locations') ? home_url('/locations') : home_url('/contact');
$melbourne_url = get_page_by_path('melbourne-cbd') ? home_url('/melbourne-cbd') : home_url('/contact');
$south_east_melbourne_url = get_page_by_path('south-east-melbourne') ? home_url('/south-east-melbourne') : home_url('/contact');
$geelong_url = get_page_by_path('geelong') ? home_url('/geelong') : home_url('/contact');
$bendigo_url = get_page_by_path('bendigo') ? home_url('/bendigo') : home_url('/contact');
$mornington_url = get_page_by_path('mornington-peninsula') ? home_url('/mornington-peninsula') : home_url('/contact');
$support_url = get_post_type_archive_link('support') ?: home_url('/contact');
$chatbot_script_path = get_template_directory() . '/assets/js/chatbot.js';
$chatbot_script_ver = file_exists($chatbot_script_path) ? (string) filemtime($chatbot_script_path) : '1';
$chatbot_script_url = add_query_arg('v', $chatbot_script_ver, get_template_directory_uri() . '/assets/js/chatbot.js');
?>
</main>

<footer class="xt-site-footer">
    <div class="xt-container xt-footer-inner">
        <div class="xt-footer-brand">
            <div class="xt-footer-logo-wrap">
                <img src="<?php echo esc_url($logo); ?>" alt="<?php esc_attr_e('xTechs Renewables logo', 'xtechs-renewables'); ?>" width="120" height="30" class="xt-footer-logo" loading="lazy" />
            </div>
            <p class="xt-footer-tagline">
                <?php esc_html_e('Clean energy systems, smart storage, and reliable electrical — for homes, builders, and businesses across Victoria.', 'xtechs-renewables'); ?>
            </p>
            <div class="xt-footer-legal-lines">
                <p><?php esc_html_e('ABN: 30 673 983 572', 'xtechs-renewables'); ?></p>
                <p><?php esc_html_e('ACN: 673 983 572', 'xtechs-renewables'); ?></p>
                <p><?php esc_html_e('REC: 36065', 'xtechs-renewables'); ?></p>
            </div>
        </div>

        <div class="xt-footer-columns-wrap">
            <div class="xt-footer-columns">
                <div class="xt-footer-col">
                    <h3 class="xt-footer-col-title"><?php esc_html_e('Company', 'xtechs-renewables'); ?></h3>
                    <ul class="xt-footer-links">
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About Us', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/local-business-partners')); ?>"><?php esc_html_e('xTechs Local Business Partners', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($careers_url); ?>"><?php esc_html_e('Careers', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'xtechs-renewables'); ?></a></li>
                    </ul>
                </div>
                <div class="xt-footer-col">
                    <h3 class="xt-footer-col-title"><?php esc_html_e('Solutions', 'xtechs-renewables'); ?></h3>
                    <ul class="xt-footer-links">
                        <li><a href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('pv-battery') : home_url('/pv-battery/')); ?>"><?php esc_html_e('Solar & Battery', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('battery') : home_url('/battery/')); ?>"><?php esc_html_e('Battery Storage', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('pv-battery/builders') : home_url('/pv-battery/builders/')); ?>"><?php esc_html_e('For Builders', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('pv-battery/off-grid') : home_url('/pv-battery/off-grid/')); ?>"><?php esc_html_e('Off-Grid', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('ev-chargers') : home_url('/ev-chargers/')); ?>"><?php esc_html_e('EV Chargers', 'xtechs-renewables'); ?></a></li>
                    </ul>
                </div>
                <div class="xt-footer-col">
                    <h3 class="xt-footer-col-title"><?php esc_html_e('Resources', 'xtechs-renewables'); ?></h3>
                    <ul class="xt-footer-links">
                        <li><a href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('x-classes') : home_url('/x-classes/')); ?>"><?php esc_html_e('X-Classes', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($support_url); ?>"><?php esc_html_e('Help / Support', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(function_exists('xtechs_page_link') ? xtechs_page_link('x-vrthing') : home_url('/x-vrthing/')); ?>"><?php esc_html_e('X-vrthing Platform', 'xtechs-renewables'); ?></a></li>
                    </ul>
                </div>
                <div class="xt-footer-col">
                    <h3 class="xt-footer-col-title"><?php esc_html_e('Locations', 'xtechs-renewables'); ?></h3>
                    <ul class="xt-footer-links">
                        <li><a href="<?php echo esc_url($locations_url); ?>"><?php esc_html_e('All Locations', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($melbourne_url); ?>"><?php esc_html_e('Melbourne CBD', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($south_east_melbourne_url); ?>"><?php esc_html_e('South-East Melbourne', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($geelong_url); ?>"><?php esc_html_e('Geelong', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($bendigo_url); ?>"><?php esc_html_e('Bendigo', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($mornington_url); ?>"><?php esc_html_e('Mornington Peninsula', 'xtechs-renewables'); ?></a></li>
                    </ul>
                </div>
                <div class="xt-footer-col">
                    <h3 class="xt-footer-col-title"><?php esc_html_e('Legal', 'xtechs-renewables'); ?></h3>
                    <ul class="xt-footer-links">
                        <li><a href="<?php echo esc_url($privacy_url); ?>"><?php esc_html_e('Privacy Policy', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($cookies_url); ?>"><?php esc_html_e('Cookie Policy', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url($terms_url); ?>"><?php esc_html_e('Terms of Service', 'xtechs-renewables'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/wp-sitemap.xml')); ?>"><?php esc_html_e('Sitemap', 'xtechs-renewables'); ?></a></li>
                    </ul>
                </div>
            </div>

            <aside class="xt-footer-card">
                <p class="xt-footer-card-title"><?php esc_html_e('Get in touch', 'xtechs-renewables'); ?></p>
                <div class="xt-footer-contact-lines">
                    <p class="xt-footer-contact-row">
                        <span class="xt-footer-contact-icon" aria-hidden="true"><?php echo xtechs_icon_mail(); ?></span>
                        <a href="mailto:inquiries@xtechsrenewables.com.au">inquiries@xtechsrenewables.com.au</a>
                    </p>
                    <p class="xt-footer-contact-row">
                        <span class="xt-footer-contact-icon" aria-hidden="true"><?php echo xtechs_icon_phone(); ?></span>
                        <a href="tel:1300983247">1300 983 247</a>
                    </p>
                </div>
                <div class="xt-footer-card-actions">
                    <a class="xt-btn xt-btn-primary xt-btn-block" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact Us', 'xtechs-renewables'); ?></a>
                </div>
                <div class="xt-footer-follow">
                    <p class="xt-footer-follow-title"><?php esc_html_e('Follow us', 'xtechs-renewables'); ?></p>
                    <div class="xt-footer-socials">
                        <a href="https://www.instagram.com/xtechsrenewables" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><?php echo xtechs_icon_instagram(); ?></a>
                        <a href="https://www.linkedin.com/company/xtechs-renewables" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><?php echo xtechs_icon_linkedin(); ?></a>
                        <a href="https://www.youtube.com/@xtechsrenewables" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><?php echo xtechs_icon_youtube(); ?></a>
                        <a href="https://www.facebook.com/xtechsrenewables" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><?php echo xtechs_icon_facebook(); ?></a>
                    </div>
                </div>
            </aside>
        </div>

        <div class="xt-footer-bottom">
            <p class="xt-footer-copy">© <?php echo esc_html((string) $year); ?> <?php esc_html_e('xTechs Renewables. All rights reserved.', 'xtechs-renewables'); ?></p>
            <div class="xt-footer-bottom-links">
                <a href="<?php echo esc_url($privacy_url); ?>"><?php esc_html_e('Privacy', 'xtechs-renewables'); ?></a>
                <a href="<?php echo esc_url($terms_url); ?>"><?php esc_html_e('Terms', 'xtechs-renewables'); ?></a>
                <a href="<?php echo esc_url($cookies_url); ?>"><?php esc_html_e('Cookies', 'xtechs-renewables'); ?></a>
            </div>
        </div>
    </div>
</footer>
<div class="xt-cookie-banner" id="xt-cookie-banner" hidden>
    <div class="xt-cookie-banner__inner">
        <p class="xt-cookie-banner__text">
            <?php esc_html_e('We use cookies for essential site functions and, with your consent, for analytics and marketing. See our', 'xtechs-renewables'); ?>
            <a href="<?php echo esc_url($privacy_url); ?>"><?php esc_html_e('Privacy', 'xtechs-renewables'); ?></a>
            <?php esc_html_e('and', 'xtechs-renewables'); ?>
            <a href="<?php echo esc_url($cookies_url); ?>"><?php esc_html_e('Cookie Policy', 'xtechs-renewables'); ?></a>.
        </p>
        <div class="xt-cookie-banner__actions">
            <button type="button" class="xt-btn xt-btn-primary xt-cookie-btn" data-xt-cookie-action="accept-all"><?php esc_html_e('Accept all', 'xtechs-renewables'); ?></button>
            <button type="button" class="xt-btn xt-btn-outline xt-cookie-btn" data-xt-cookie-action="reject"><?php esc_html_e('Reject non-essential', 'xtechs-renewables'); ?></button>
            <button type="button" class="xt-btn xt-cookie-btn xt-cookie-btn-ghost" data-xt-cookie-action="preferences"><?php esc_html_e('Preferences', 'xtechs-renewables'); ?></button>
        </div>
    </div>
</div>

<div class="xt-cookie-modal" id="xt-cookie-modal" hidden>
    <div class="xt-cookie-modal__card">
        <h3><?php esc_html_e('Cookie Preferences', 'xtechs-renewables'); ?></h3>
        <p><?php esc_html_e('Choose which cookies you want to allow. Essential cookies are always enabled.', 'xtechs-renewables'); ?></p>
        <label class="xt-cookie-pref">
            <input type="checkbox" checked disabled />
            <span><?php esc_html_e('Essential', 'xtechs-renewables'); ?></span>
        </label>
        <label class="xt-cookie-pref">
            <input type="checkbox" id="xt-cookie-analytics" />
            <span><?php esc_html_e('Analytics', 'xtechs-renewables'); ?></span>
        </label>
        <label class="xt-cookie-pref">
            <input type="checkbox" id="xt-cookie-marketing" />
            <span><?php esc_html_e('Marketing', 'xtechs-renewables'); ?></span>
        </label>
        <div class="xt-cookie-modal__actions">
            <button type="button" class="xt-btn xt-btn-outline" data-xt-cookie-action="close-preferences"><?php esc_html_e('Cancel', 'xtechs-renewables'); ?></button>
            <button type="button" class="xt-btn xt-btn-primary" data-xt-cookie-action="save-preferences"><?php esc_html_e('Save preferences', 'xtechs-renewables'); ?></button>
        </div>
    </div>
</div>
<?php if (function_exists('xtechs_should_enqueue_chatbot') && xtechs_should_enqueue_chatbot()) : ?>
<button
    type="button"
    id="xt-chatbot-fallback-fab"
    class="xt-chatbot-fallback-fab"
    aria-label="<?php esc_attr_e('Open chat', 'xtechs-renewables'); ?>"
    data-chatbot-src="<?php echo esc_url($chatbot_script_url); ?>"
>
    <span aria-hidden="true">💬</span>
</button>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
