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

$benefits = xtechs_solution_ev_benefits();
$services = xtechs_solution_ev_services();
$types = xtechs_solution_ev_charger_types();
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

    <section class="xt-solpage-hero xt-solpage-hero--ev">
        <div class="xt-solpage-hero-grid" aria-hidden="true"></div>
        <div class="xt-container xt-solpage-hero-wrap">
            <div class="xt-solpage-hero-grid2">
                <div class="xt-solpage-hero-copy">
                    <p class="xt-solpage-badge xt-solpage-badge--ev">
                        <?php echo xtechs_pv_clone_icon('car', 'xt-solpage-badge-ic'); ?>
                        <span>Electric Vehicle Charging</span>
                    </p>
                    <h1 class="xt-solpage-h1">
                        EV Charger<br />
                        <span class="xt-solpage-h1-accent xt-solpage-h1-accent--ev">Installation</span>
                    </h1>
                    <p class="xt-solpage-lead">
                        Professional EV charger installation for homes and businesses.
                        Fast, smart, and solar-integrated charging solutions that power your
                        electric vehicle with clean energy.
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
                    <div class="xt-solpage-hero-blob xt-solpage-hero-blob--ev1"></div>
                    <div class="xt-solpage-hero-blob xt-solpage-hero-blob--ev2"></div>
                    <div class="xt-solpage-hero-card">
                        <div class="xt-solpage-hero-card-icon xt-solpage-hero-card-icon--ev">
                            <?php echo xtechs_pv_clone_icon('car', 'xt-solpage-card-svg'); ?>
                        </div>
                        <h3 class="xt-solpage-hero-card-title">Smart EV Charging</h3>
                        <ul class="xt-solpage-checklist">
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Level 2 AC Charging (7kW-22kW)</li>
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Solar Integration</li>
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Smart Scheduling</li>
                            <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-solpage-check-ic'); ?> Mobile App Control</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="xt-solpage-section xt-solpage-section--white">
        <div class="xt-container">
            <header class="xt-solpage-section-head">
                <h2 class="xt-solpage-h2">Why Choose Our EV Charging Solutions?</h2>
                <p class="xt-solpage-muted xt-solpage-sub">
                    Professional installation with smart features that make EV ownership
                    convenient and cost-effective.
                </p>
            </header>
            <div class="xt-solpage-benefits">
                <?php foreach ($benefits as $b) : ?>
                    <article class="xt-solpage-benefit xt-solpage-benefit--ev">
                        <div class="xt-solpage-benefit-ic xt-solpage-benefit-ic--ev">
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
                <h2 class="xt-solpage-h2">EV Charging Solutions</h2>
                <p class="xt-solpage-muted xt-solpage-sub">
                    From home charging to commercial fleet solutions, we provide comprehensive
                    EV charging infrastructure tailored to your needs.
                </p>
            </header>
            <div class="xt-solpage-services">
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
                        <a class="xt-btn xt-btn-outline xt-solpage-learn" href="<?php echo esc_url($contact); ?>">Learn More</a>
                    </article>
                <?php endforeach; ?>
            </div>

            <h3 class="xt-solpage-h3-center">Charger Types &amp; Features</h3>
            <div class="xt-solpage-types">
                <?php foreach ($types as $t) : ?>
                    <article class="xt-solpage-type-card xt-solpage-type-card--ev">
                        <div class="xt-solpage-type-icon xt-solpage-type-icon--ev">
                            <?php echo xtechs_pv_clone_icon($t['icon'], 'xt-solpage-type-svg'); ?>
                        </div>
                        <h4 class="xt-solpage-type-title"><?php echo esc_html($t['title']); ?></h4>
                        <p class="xt-solpage-type-desc"><?php echo esc_html($t['desc']); ?></p>
                        <ul class="xt-solpage-type-specs xt-solpage-type-specs--ev">
                            <?php foreach ($t['specs'] as $sp) : ?>
                                <li><span class="xt-solpage-type-dot xt-solpage-type-dot--ev"></span><?php echo esc_html($sp); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="xt-solpage-type-price"><?php echo esc_html($t['price']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="xt-solpage-mid-cta xt-solpage-mid-cta--blend xt-solpage-mid-cta--ev">
                <h3 class="xt-solpage-mid-cta-title">Charge Your EV with Solar Power</h3>
                <p class="xt-solpage-mid-cta-text">
                    Combine solar panels with EV charging for truly sustainable transportation.
                    Charge during the day with free solar energy and reduce your electricity costs.
                </p>
                <div class="xt-solpage-mid-cta-btns">
                    <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($contact); ?>">Book Site Assessment</a>
                    <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">Book Consultation</a>
                    <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($pv); ?>">View Solar Solutions</a>
                </div>
                <p class="xt-solpage-mid-cta-note"><?php echo esc_html($disc); ?></p>
            </div>
        </div>
    </section>

    <?php
    get_template_part('template-parts/pv/clone-part-cta', null, [
        'title' => 'Ready to Charge Your EV with Clean Energy?',
        'description' => 'Get a free consultation and quote for professional EV charger installation. Start charging your electric vehicle with solar power today.',
        'primary_text' => 'Book Site Assessment',
        'secondary_text' => 'Book Consultation',
        'show_phone' => true,
        'phone' => '1300 983 247',
        'variant' => 'brand',
        'disclaimer' => $disc,
    ]);
    ?>
</div>
