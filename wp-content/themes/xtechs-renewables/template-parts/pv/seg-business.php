<?php
if (!defined('ABSPATH')) {
    exit;
}
$contact = xtechs_pv_clone_contact_url();
$cal = xtechs_pv_calendly_url();
?>
<div class="xt-pvclone">
    <section class="xt-pvclone-hero xt-pvclone-hero--sub xt-pvclone-hero--biz">
        <div class="xt-pvclone-hero-bg" aria-hidden="true"></div>
        <div class="xt-container xt-pvclone-hero-inner">
            <span class="xt-pvclone-pill">Business</span>
            <h1 class="xt-pvclone-hero-title">Cut operating costs with onsite clean energy</h1>
            <p class="xt-pvclone-hero-lead">Professional commercial energy solutions from solar panels and battery storage to EV charging and electrical work. Reduce operating costs, improve power quality, and future-proof your business.</p>
            <div class="xt-pvclone-hero-cta-row">
                <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($contact); ?>">Book Site Assessment <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">Book Consultation <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                <a class="xt-btn xt-btn-outline xt-btn-lg" href="tel:1300983247">Call Now <?php echo xtechs_pv_clone_icon('phone', 'xt-pvclone-svg'); ?></a>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/pv/clone-services-business'); ?>
    <?php get_template_part('template-parts/pv/clone-part-process'); ?>

    <?php
    get_template_part('template-parts/pv/clone-part-benefits', null, [
        'title' => 'Why Choose xTechs for Business?',
        'subtitle' => "We're committed to delivering the highest quality commercial energy solutions with exceptional service and support.",
        'circle_mod' => 'brand',
        'items' => [
            ['icon' => 'shield', 'title' => 'CEC-Accredited Installers', 'text' => 'All our installers are Clean Energy Council accredited and fully licensed.'],
            ['icon' => 'award', 'title' => 'Premium Products', 'text' => 'We only use tier-1 solar panels and proven battery technologies.'],
            ['icon' => 'clock', 'title' => 'Fast Installation', 'text' => 'Most commercial installations completed within 3-5 days.'],
            ['icon' => 'users', 'title' => 'Local Support', 'text' => 'Victorian-based team providing ongoing support and maintenance.'],
        ],
    ]);
    ?>

    <?php
    get_template_part('template-parts/pv/clone-part-cta', null, [
        'title' => 'Ready to Transform Your Business Energy?',
        'description' => 'Join hundreds of businesses already saving on energy costs with our professional solar and battery solutions.',
        'primary_text' => 'Book Site Assessment',
        'secondary_text' => 'Book Consultation',
        'show_phone' => true,
        'phone' => '1300 983 247',
        'variant' => 'brand',
    ]);
    ?>
</div>
