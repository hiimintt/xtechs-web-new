<?php
if (!defined('ABSPATH')) {
    exit;
}

global $xtechs_pv_breadcrumb;
$crumbs = (!empty($xtechs_pv_breadcrumb) && is_array($xtechs_pv_breadcrumb)) ? $xtechs_pv_breadcrumb : [];

$contact = xtechs_pv_clone_contact_url();
$cal = xtechs_pv_calendly_url();
$pv = xtechs_page_link('pv-battery');
$disc = xtechs_solution_site_disclaimer();

$benefits = xtechs_solution_battery_benefits();
$services = xtechs_solution_battery_services();
$types = xtechs_solution_battery_types();
$faqs = xtechs_solution_battery_faqs();
?>
<div class="xt-solpage">
    <?php if ($crumbs) : ?>
        <nav class="xt-solpage-bc xt-container" aria-label="<?php esc_attr_e('Breadcrumb', 'xtechs-renewables'); ?>">
            <ol class="xt-solpage-bc-list">
                <?php foreach ($crumbs as $c) : ?>
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

    <section class="xt-solpage-hero xt-solpage-hero--battery">
        <div class="xt-solpage-hero-grid" aria-hidden="true"></div>
        <div class="xt-container xt-solpage-hero-wrap">
            <div class="xt-solpage-hero-grid2">
                <div class="xt-solpage-hero-copy">
                    <p class="xt-solpage-badge xt-solpage-badge--battery">
                        <?php echo xtechs_pv_clone_icon('battery', 'xt-solpage-badge-ic'); ?>
                        <span>Energy Storage Solutions</span>
                    </p>
                    <h1 class="xt-solpage-h1">
                        Battery<br />
                        <span class="xt-solpage-h1-accent">Storage</span>
                    </h1>
                    <p class="xt-solpage-lead">
                        Professional battery storage installation for homes and businesses.
                        Store solar energy, reduce electricity costs, and ensure backup power
                        with premium battery systems like Tesla Powerwall and Alpha ESS.
                    </p>
                    <div class="xt-solpage-hero-btns">
                        <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($contact); ?>">
                            Book Site Assessment <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?>
                        </a>
                        <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">
                            Book Consultation <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?>
                        </a>
                    </div>
                    <p class="xt-solpage-hero-note"><?php echo esc_html($disc); ?></p>
                </div>
                <div class="xt-solpage-hero-aside">
                    <div class="xt-solpage-hero-blob xt-solpage-hero-blob--1"></div>
                    <div class="xt-solpage-hero-blob xt-solpage-hero-blob--2"></div>
                    <div class="xt-solpage-hero-card">
                        <div class="xt-solpage-hero-card-icon">
                            <?php echo xtechs_pv_clone_icon('battery', 'xt-solpage-card-svg'); ?>
                        </div>
                        <h3 class="xt-solpage-hero-card-title">Smart Energy Storage</h3>
                        <ul class="xt-solpage-checklist">
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Tesla Powerwall</li>
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Alpha ESS Systems</li>
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Smart Energy Management</li>
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Backup Power Protection</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xt-solpage-section xt-solpage-section--white">
        <div class="xt-container">
            <header class="xt-solpage-section-head">
                <h2 class="xt-solpage-h2">Why Choose Battery Storage?</h2>
                <p class="xt-solpage-muted xt-solpage-sub">
                    Professional battery storage solutions that maximize your solar investment
                    and provide reliable backup power when you need it most.
                </p>
            </header>
            <div class="xt-solpage-benefits">
                <?php foreach ($benefits as $b) : ?>
                    <article class="xt-solpage-benefit">
                        <div class="xt-solpage-benefit-ic">
                            <?php echo xtechs_pv_clone_icon($b['icon'], 'xt-solpage-benefit-svg'); ?>
                        </div>
                        <h3 class="xt-solpage-benefit-title"><?php echo esc_html($b['title']); ?></h3>
                        <p class="xt-solpage-benefit-text"><?php echo esc_html($b['text']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="xt-pvclone">
        <?php get_template_part('template-parts/pv/clone-part-process'); ?>
    </div>

    <section class="xt-solpage-section xt-solpage-section--muted">
        <div class="xt-container">
            <header class="xt-solpage-section-head">
                <h2 class="xt-solpage-h2">Battery Storage Solutions</h2>
                <p class="xt-solpage-muted xt-solpage-sub">
                    Professional battery storage systems for homes and businesses. From Tesla Powerwall
                    to commercial-grade solutions, we provide the right battery system for your needs.
                </p>
            </header>
            <div class="xt-solpage-services xt-solpage-services--battery">
                <?php foreach ($services as $svc) : ?>
                    <article class="xt-solpage-svc-card">
                        <div class="xt-solpage-svc-top">
                            <div class="xt-solpage-svc-icon xt-solpage-svc-icon--<?php echo esc_attr($svc['badge_mod']); ?>">
                                <?php echo xtechs_pv_clone_icon($svc['icon'], 'xt-solpage-svc-svg'); ?>
                            </div>
                            <span class="xt-solpage-svc-badge xt-solpage-svc-badge--<?php echo esc_attr($svc['badge_mod']); ?>"><?php echo esc_html($svc['badge']); ?></span>
                        </div>
                        <h3 class="xt-solpage-svc-title"><?php echo esc_html($svc['title']); ?></h3>
                        <p class="xt-solpage-svc-desc"><?php echo esc_html($svc['desc']); ?></p>
                        <ul class="xt-solpage-svc-features">
                            <?php foreach ($svc['features'] as $f) : ?>
                                <li>
                                    <?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?>
                                    <span><?php echo esc_html($f); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>

            <h3 class="xt-solpage-h3-center">Battery Types &amp; Features</h3>
            <div class="xt-solpage-types">
                <?php foreach ($types as $t) : ?>
                    <article class="xt-solpage-type-card xt-solpage-type-card--battery">
                        <div class="xt-solpage-type-icon">
                            <?php echo xtechs_pv_clone_icon($t['icon'], 'xt-solpage-type-svg'); ?>
                        </div>
                        <h4 class="xt-solpage-type-title"><?php echo esc_html($t['title']); ?></h4>
                        <p class="xt-solpage-type-desc"><?php echo esc_html($t['desc']); ?></p>
                        <ul class="xt-solpage-type-specs">
                            <?php foreach ($t['specs'] as $sp) : ?>
                                <li><span class="xt-solpage-type-dot"></span><?php echo esc_html($sp); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="xt-solpage-mid-cta xt-solpage-mid-cta--blend">
                <h3 class="xt-solpage-mid-cta-title">Maximize Your Solar Investment</h3>
                <p class="xt-solpage-mid-cta-text">
                    Combine solar panels with battery storage for complete energy independence.
                    Store excess solar energy during the day and use it at night or during outages.
                </p>
                <div class="xt-solpage-mid-cta-btns">
                    <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($contact); ?>">Book Site Assessment</a>
                    <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">Book Consultation</a>
                    <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($pv); ?>">View Solar Solutions</a>
                </div>
                <p class="xt-solpage-mid-cta-note"><?php echo esc_html($disc); ?></p>
            </div>

            <div class="xt-solpage-highlight xt-solpage-highlight--battery">
                <div class="xt-solpage-highlight-icon">
                    <?php echo xtechs_pv_clone_icon('shield', 'xt-solpage-highlight-svg'); ?>
                </div>
                <div class="xt-solpage-highlight-body">
                    <h3 class="xt-solpage-highlight-title">24/7 Backup Power Protection</h3>
                    <p class="xt-solpage-highlight-text">
                        Battery storage systems provide automatic backup power during blackouts and grid outages.
                        Keep your essential appliances running and your home comfortable when the power goes out.
                    </p>
                </div>
                <div class="xt-solpage-highlight-stat">
                    <div class="xt-solpage-highlight-big">Instant</div>
                    <p class="xt-solpage-highlight-small">Automatic switching</p>
                </div>
            </div>
        </div>
    </section>

    <section class="xt-solpage-section xt-solpage-section--white xt-solpage-faq-block" aria-labelledby="xt-battery-faq-title">
        <div class="xt-container xt-container-narrow">
            <header class="xt-solpage-section-head">
                <h2 id="xt-battery-faq-title" class="xt-solpage-h2">Battery Storage FAQs</h2>
                <p class="xt-solpage-muted xt-solpage-sub">Common questions about battery storage systems and installation</p>
            </header>
            <div class="xt-solpage-faq-list">
                <?php foreach ($faqs as $faq) : ?>
                    <details class="xt-pvclone-faq-item xt-solpage-faq-item">
                        <summary><?php echo esc_html($faq['q']); ?></summary>
                        <div class="xt-pvclone-faq-answer">
                            <p><?php echo esc_html($faq['a']); ?></p>
                        </div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    get_template_part('template-parts/pv/clone-part-cta', null, [
        'title' => 'Ready to Store Your Solar Energy?',
        'description' => 'Get a free consultation and quote for professional battery storage installation. Maximize your solar investment and ensure backup power for your home.',
        'primary_text' => 'Book Site Assessment',
        'secondary_text' => 'Book Consultation',
        'show_phone' => true,
        'phone' => '1300 983 247',
        'variant' => 'warm',
        'disclaimer' => $disc,
    ]);
    ?>
</div>
