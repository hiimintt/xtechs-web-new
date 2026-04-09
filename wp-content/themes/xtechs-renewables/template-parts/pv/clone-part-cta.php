<?php
if (!defined('ABSPATH')) {
    exit;
}
$args = isset($args) && is_array($args) ? $args : [];
/** @var string $title */
/** @var string $description */
/** @var string $primary_text */
/** @var string $secondary_text */
/** @var bool $show_phone */
$title = $args['title'] ?? '';
$description = $args['description'] ?? '';
$primary_text = $args['primary_text'] ?? '';
$secondary_text = $args['secondary_text'] ?? '';
$show_phone = !empty($args['show_phone']);
$phone = $args['phone'] ?? '1300 983 247';
$cal = xtechs_pv_calendly_url();
$contact = xtechs_pv_clone_contact_url();
$variant = $args['variant'] ?? 'brand';
$disclaimer = $args['disclaimer'] ?? '';
?>
<section class="xt-pvclone-cta xt-pvclone-cta--<?php echo esc_attr($variant); ?>">
    <div class="xt-container xt-pvclone-cta-inner">
        <h2 class="xt-pvclone-cta-title"><?php echo esc_html($title); ?></h2>
        <p class="xt-pvclone-cta-desc"><?php echo esc_html($description); ?></p>
        <div class="xt-pvclone-cta-btns">
            <a class="xt-btn xt-btn-lg xt-pvclone-cta-primary" href="<?php echo esc_url($contact); ?>">
                <?php echo esc_html($primary_text); ?>
                <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg xt-pvclone-cta-ic'); ?>
            </a>
            <a class="xt-btn xt-btn-lg xt-pvclone-cta-secondary" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer">
                <?php echo esc_html($secondary_text); ?>
                <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg xt-pvclone-cta-ic'); ?>
            </a>
            <?php if ($show_phone) : ?>
                <a class="xt-btn xt-btn-lg xt-pvclone-cta-secondary" href="<?php echo esc_url('tel:' . preg_replace('/\s+/', '', $phone)); ?>">
                    <?php echo xtechs_pv_clone_icon('phone', 'xt-pvclone-svg xt-pvclone-cta-ic'); ?>
                    Call <?php echo esc_html($phone); ?>
                </a>
            <?php endif; ?>
        </div>
        <?php if ($disclaimer !== '') : ?>
            <p class="xt-pvclone-cta-disclaimer"><?php echo esc_html($disclaimer); ?></p>
        <?php endif; ?>
    </div>
</section>
