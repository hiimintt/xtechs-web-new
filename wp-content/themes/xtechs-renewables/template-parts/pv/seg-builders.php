<?php
if (!defined('ABSPATH')) {
    exit;
}
$contact = xtechs_pv_clone_contact_url();
$cal = xtechs_pv_calendly_url();
?>
<div class="xt-pvclone">
    <section class="xt-pvclone-hero-builders">
        <div class="xt-pvclone-hero-builders-bg" aria-hidden="true"></div>
        <div class="xt-container xt-pvclone-hero-builders-inner">
            <div class="xt-pvclone-hero-builders-grid">
                <div>
                    <span class="xt-pvclone-pill xt-pvclone-pill--solid">Builder Solutions</span>
                    <h1 class="xt-pvclone-hero-title xt-pvclone-builders-h1">Builder <span class="xt-pvclone-accent-text">Packages</span></h1>
                    <p class="xt-pvclone-hero-lead">Seamless solar and battery integration during construction. We align pre‑wire, rough‑in and final fit‑off to your programme so handover is clean, compliant and client‑ready.</p>
                    <div class="xt-pvclone-hero-cta-row">
                        <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($contact); ?>">Book Site Assessment <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                        <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">Book Consultation <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                    </div>
                </div>
                <div class="xt-pvclone-builders-card-wrap">
                    <div class="xt-pvclone-builders-card">
                        <h3>Builder Integration</h3>
                        <ul class="xt-pvclone-split-checks">
                            <?php foreach (['Pre‑wire and rough‑in', 'Approvals, export limits & metering', 'Staging & scheduling with trades', 'Compliance & homeowner handover'] as $li) : ?>
                                <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-pvclone-svg'); ?> <?php echo esc_html($li); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <span class="xt-pvclone-builders-blob xt-pvclone-builders-blob--1" aria-hidden="true"></span>
                    <span class="xt-pvclone-builders-blob xt-pvclone-builders-blob--2" aria-hidden="true"></span>
                </div>
            </div>
        </div>
    </section>

    <?php
    get_template_part('template-parts/pv/clone-part-icon-cards', null, [
        'heading' => 'Builder Services',
        'sub' => 'Everything you need for seamless solar integration during construction — from design to handover.',
        'cards' => xtechs_pv_clone_builders_cards(),
        'mod' => 'builders',
    ]);
    ?>

    <?php get_template_part('template-parts/pv/clone-part-process'); ?>

    <?php
    get_template_part('template-parts/pv/clone-part-benefits', null, [
        'title' => 'Why Choose xTechs for Builders?',
        'subtitle' => "We're committed to delivering seamless solar integration that keeps your builds on schedule and your clients happy.",
        'circle_mod' => 'warm',
        'items' => [
            ['icon' => 'shield', 'title' => 'Construction Coordination', 'text' => 'Seamless integration with your build timeline and other trades.'],
            ['icon' => 'award', 'title' => 'Standardized Packages', 'text' => 'Repeatable specs and pricing models for consistent results.'],
            ['icon' => 'clock', 'title' => 'Fast Handover', 'text' => 'Clean, compliant, and client-ready systems on day one.'],
            ['icon' => 'users', 'title' => 'Builder Support', 'text' => 'Dedicated support during defect-liability period and beyond.'],
        ],
    ]);
    ?>

    <?php
    get_template_part('template-parts/pv/clone-part-cta', null, [
        'title' => 'Ready to Integrate Solar into Your Builds?',
        'description' => "Send plans and a lot schedule and we'll return a repeatable spec, programme and pricing model tailored to your builds.",
        'primary_text' => 'Get Your Builder Package',
        'secondary_text' => 'Book Consultation',
        'show_phone' => true,
        'phone' => '1300 983 247',
        'variant' => 'warm',
    ]);
    ?>
</div>
