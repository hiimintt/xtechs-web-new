<?php
if (!defined('ABSPATH')) {
    exit;
}

global $xtechs_pv_landing_config, $post;
$config = $xtechs_pv_landing_config ?? null;
if (!is_array($config)) {
    return;
}

$contact = home_url('/contact');
$cal = xtechs_pv_calendly_url();
$pv_hub = home_url('/pv-battery/');

global $xtechs_pv_breadcrumb;
$crumbs = [];
if (!empty($xtechs_pv_breadcrumb) && is_array($xtechs_pv_breadcrumb)) {
    $crumbs = $xtechs_pv_breadcrumb;
} elseif ($post instanceof WP_Post && (int) $post->post_parent) {
    $crumbs[] = ['label' => __('Home', 'xtechs-renewables'), 'url' => home_url('/')];
    $crumbs[] = ['label' => __('PV & Battery', 'xtechs-renewables'), 'url' => $pv_hub];
    $crumbs[] = ['label' => get_the_title($post), 'url' => ''];
}
?>
<div class="xt-pv-page">
    <?php if ($crumbs) : ?>
        <nav class="xt-pv-breadcrumb xt-container" aria-label="<?php esc_attr_e('Breadcrumb', 'xtechs-renewables'); ?>">
            <ol class="xt-pv-breadcrumb-list">
                <?php foreach ($crumbs as $i => $c) : ?>
                    <li>
                        <?php if ($c['url'] !== '') : ?>
                            <a href="<?php echo esc_url($c['url']); ?>"><?php echo esc_html($c['label']); ?></a>
                        <?php else : ?>
                            <span aria-current="page"><?php echo esc_html($c['label']); ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
    <?php endif; ?>

    <section class="xt-pv-hero <?php echo esc_attr($config['hero_class']); ?>">
        <div class="xt-container xt-pv-hero-inner">
            <p class="xt-pv-badge"><?php echo esc_html($config['badge']); ?></p>
            <h1 class="xt-pv-hero-title"><?php echo esc_html($config['title']); ?></h1>
            <p class="xt-pv-hero-lead"><?php echo esc_html($config['lead']); ?></p>
            <div class="xt-pv-cta-row">
                <a class="xt-btn xt-btn-primary xt-btn-sm" href="<?php echo esc_url($contact); ?>"><?php esc_html_e('Book site assessment', 'xtechs-renewables'); ?></a>
                <a class="xt-btn xt-btn-outline xt-btn-sm" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Book consultation', 'xtechs-renewables'); ?></a>
            </div>
        </div>
    </section>

    <section class="xt-section xt-section-muted">
        <div class="xt-container">
            <div class="xt-pv-benefits">
                <?php foreach ($config['benefits'] as $b) : ?>
                    <article class="xt-pv-benefit-card">
                        <h3 class="xt-pv-benefit-title"><?php echo esc_html($b['title']); ?></h3>
                        <p class="xt-pv-benefit-text"><?php echo esc_html($b['text']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="xt-section xt-section-white">
        <div class="xt-container xt-container-narrow">
            <header class="xt-pv-block-header">
                <h2 class="xt-pv-block-title"><?php echo esc_html($config['section_title']); ?></h2>
                <p class="xt-pv-block-lead"><?php echo esc_html($config['section_lead']); ?></p>
            </header>
            <ul class="xt-pv-bullet-list">
                <?php foreach ($config['bullets'] as $item) : ?>
                    <li><?php echo esc_html($item); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <?php if (!empty($config['faqs']) && is_array($config['faqs'])) : ?>
        <section class="xt-section xt-section-muted" aria-labelledby="xt-pv-faq-title">
            <div class="xt-container xt-container-narrow">
                <h2 id="xt-pv-faq-title" class="xt-pv-block-title"><?php esc_html_e('Frequently asked questions', 'xtechs-renewables'); ?></h2>
                <div class="xt-pv-faq">
                    <?php foreach ($config['faqs'] as $faq) : ?>
                        <details class="xt-pv-faq-item">
                            <summary><?php echo esc_html($faq['q']); ?></summary>
                            <p><?php echo esc_html($faq['a']); ?></p>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="xt-pv-cta-band">
        <div class="xt-container xt-pv-cta-band-inner">
            <h2 class="xt-pv-cta-band-title"><?php esc_html_e('Ready to talk through your project?', 'xtechs-renewables'); ?></h2>
            <p class="xt-pv-cta-band-text"><?php esc_html_e('Tell us about your site and goals—we will come back with clear next steps.', 'xtechs-renewables'); ?></p>
            <div class="xt-pv-cta-row">
                <a class="xt-btn xt-btn-primary xt-btn-sm" href="<?php echo esc_url($contact); ?>"><?php esc_html_e('Get a quote', 'xtechs-renewables'); ?></a>
                <a class="xt-btn xt-btn-outline xt-btn-sm" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Schedule a call', 'xtechs-renewables'); ?></a>
            </div>
        </div>
    </section>
</div>
