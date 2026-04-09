<?php
if (!defined('ABSPATH')) {
    exit;
}
$contact = xtechs_pv_clone_contact_url();
$cal = xtechs_pv_calendly_url();
?>
<div class="xt-pvclone">
    <section class="xt-pvclone-hero xt-pvclone-hero--sub">
        <div class="xt-pvclone-hero-bg" aria-hidden="true"></div>
        <div class="xt-container xt-pvclone-hero-inner">
            <span class="xt-pvclone-pill">Residential</span>
            <h1 class="xt-pvclone-hero-title">Smart, quiet power for your home</h1>
            <p class="xt-pvclone-hero-lead">Complete residential energy solutions from solar panels and battery storage to EV charging, electrical work, and home automation. Enjoy lower bills, backup power, and a sustainable future.</p>
            <div class="xt-pvclone-hero-cta-row">
                <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($contact); ?>">Book Site Assessment <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">Book Consultation <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/pv/clone-services-residential'); ?>
    <?php get_template_part('template-parts/pv/clone-part-process'); ?>

    <?php
    get_template_part('template-parts/pv/clone-part-benefits', null, [
        'title' => 'Why Choose xTechs?',
        'subtitle' => "We're committed to delivering the highest quality residential energy solutions with exceptional service.",
        'circle_mod' => 'brand',
        'items' => [
            ['icon' => 'shield', 'title' => 'CEC-Accredited Installers', 'text' => 'All our installers are Clean Energy Council accredited and fully licensed.'],
            ['icon' => 'award', 'title' => 'Premium Products', 'text' => 'We only use tier-1 solar panels and proven battery technologies.'],
            ['icon' => 'clock', 'title' => 'Fast Installation', 'text' => 'Most residential installations completed within 1-2 days.'],
            ['icon' => 'users', 'title' => 'Local Support', 'text' => 'Victorian-based team providing ongoing support and maintenance.'],
        ],
    ]);
    ?>

    <?php
    get_template_part('template-parts/pv/clone-part-cta', null, [
        'title' => 'Ready to Transform Your Home?',
        'description' => 'Get a free consultation and quote for your residential energy solution. No obligation, just expert advice.',
        'primary_text' => 'Book Site Assessment',
        'secondary_text' => 'Book Consultation',
        'show_phone' => false,
        'variant' => 'brand',
    ]);
    ?>
</div>
