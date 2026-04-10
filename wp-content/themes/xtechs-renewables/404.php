<?php
if (!defined('ABSPATH')) {
    exit;
}

status_header(404);
nocache_headers();

get_header();
?>
<section class="xt-404 xt-section" aria-labelledby="xt-404-title">
    <div class="xt-container xt-container-narrow">
        <p class="xt-404-kicker"><?php esc_html_e('404', 'xtechs-renewables'); ?></p>
        <h1 id="xt-404-title"><?php esc_html_e('Page not found', 'xtechs-renewables'); ?></h1>
        <p class="xt-404-lead">
            <?php esc_html_e('The page you requested is missing or the link may be outdated. Try one of the options below.', 'xtechs-renewables'); ?>
        </p>
        <div class="xt-404-actions">
            <a class="xt-btn xt-btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to home', 'xtechs-renewables'); ?></a>
            <a class="xt-btn xt-btn-outline" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact us', 'xtechs-renewables'); ?></a>
        </div>
        <?php if (function_exists('get_search_form')) { ?>
            <div class="xt-404-search">
                <h2 class="xt-404-search-title"><?php esc_html_e('Search the site', 'xtechs-renewables'); ?></h2>
                <?php get_search_form(); ?>
            </div>
        <?php } ?>
    </div>
</section>
<?php
get_footer();
