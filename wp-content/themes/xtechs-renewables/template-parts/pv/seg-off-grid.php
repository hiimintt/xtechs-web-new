<?php
if (!defined('ABSPATH')) {
    exit;
}
$contact = xtechs_pv_clone_contact_url();
$cal = xtechs_pv_calendly_url();
?>
<div class="xt-pvclone">
    <section class="xt-pvclone-hero-split xt-pvclone-hero-split--wide">
        <div class="xt-pvclone-hero-split-bg" aria-hidden="true"></div>
        <div class="xt-container xt-pvclone-hero-split-inner">
            <div class="xt-pvclone-hero-split-txt">
                <span class="xt-pvclone-pill">Off-Grid Solutions</span>
                <h1 class="xt-pvclone-hero-title">Reliable power—anywhere you need it</h1>
                <p class="xt-pvclone-hero-lead">We design standalone systems that combine solar, storage and a generator so your essentials run day and night—quietly, efficiently, and with clear monitoring from day one.</p>
                <div class="xt-pvclone-hero-cta-row">
                    <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($contact); ?>">Book Site Assessment <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                    <a class="xt-btn xt-btn-outline xt-btn-lg" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">Book Consultation <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                </div>
            </div>
            <div class="xt-pvclone-hero-split-card">
                <div class="xt-pvclone-split-card-icon"><?php echo xtechs_pv_clone_icon('shield'); ?></div>
                <h3>Complete Off-Grid Solutions</h3>
                <p class="xt-pvclone-muted">Everything you need for reliable power in remote locations</p>
                <ul class="xt-pvclone-split-checks">
                    <?php foreach (['Solar panel arrays', 'Battery storage systems', 'Backup generators', 'Remote monitoring', '24/7 support'] as $li) : ?>
                        <li><?php echo xtechs_pv_clone_icon('check-circle', 'xt-pvclone-svg'); ?> <?php echo esc_html($li); ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="xt-pvclone-split-card-foot">
                    <p class="xt-pvclone-muted xt-pvclone-split-small">Ready to go off-grid?</p>
                    <a class="xt-btn xt-btn-primary xt-btn-sm xt-btn-block" href="<?php echo esc_url($contact); ?>">Get Your Free Design <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <?php
    get_template_part('template-parts/pv/clone-part-icon-cards', null, [
        'heading' => 'Off-Grid Services',
        'sub' => 'Everything you need for reliable off-grid power—from design to ongoing support in remote locations.',
        'cards' => xtechs_pv_clone_offgrid_cards(),
        'mod' => 'teal',
    ]);
    ?>

    <?php get_template_part('template-parts/pv/clone-part-process'); ?>

    <?php
    get_template_part('template-parts/pv/clone-part-benefits', null, [
        'title' => 'Why Choose xTechs for Off-Grid?',
        'subtitle' => "We're committed to delivering reliable off-grid energy solutions that work in the most challenging environments.",
        'circle_mod' => 'teal',
        'items' => [
            ['icon' => 'shield', 'title' => 'Rugged Components', 'text' => 'Hardware designed for harsh conditions and remote environments.'],
            ['icon' => 'award', 'title' => 'Proven Systems', 'text' => 'Battle-tested off-grid solutions with reliable performance.'],
            ['icon' => 'clock', 'title' => '24/7 Monitoring', 'text' => 'Remote monitoring and alerts for system health and performance.'],
            ['icon' => 'users', 'title' => 'Remote Support', 'text' => 'Expert support and troubleshooting for remote locations.'],
        ],
    ]);
    ?>

    <?php
    get_template_part('template-parts/pv/clone-part-cta', null, [
        'title' => 'Ready to Plan Your Off-Grid System?',
        'description' => "Share your address and a recent load summary and we'll return a design sized for your autonomy target and budget.",
        'primary_text' => 'Get Your Free Design',
        'secondary_text' => 'Book Consultation',
        'show_phone' => true,
        'phone' => '1300 983 247',
        'variant' => 'brand-deep',
    ]);
    ?>
</div>
