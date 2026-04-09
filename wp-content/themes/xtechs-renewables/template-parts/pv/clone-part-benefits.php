<?php
if (!defined('ABSPATH')) {
    exit;
}
$args = isset($args) && is_array($args) ? $args : [];
$title = $args['title'] ?? '';
$subtitle = $args['subtitle'] ?? '';
$items = $args['items'] ?? [];
$circle_mod = $args['circle_mod'] ?? '';
?>
<section class="xt-pvclone-benefits">
    <div class="xt-container">
        <header class="xt-pvclone-benefits-head">
            <h2 class="xt-pvclone-h2"><?php echo esc_html($title); ?></h2>
            <p class="xt-pvclone-muted"><?php echo esc_html($subtitle); ?></p>
        </header>
        <div class="xt-pvclone-benefits-grid">
            <?php foreach ($items as $row) : ?>
                <div class="xt-pvclone-benefit">
                    <div class="xt-pvclone-benefit-icon xt-pvclone-benefit-icon--<?php echo esc_attr($circle_mod); ?>">
                        <?php echo xtechs_pv_clone_icon($row['icon'], 'xt-pvclone-svg'); ?>
                    </div>
                    <h3 class="xt-pvclone-benefit-title"><?php echo esc_html($row['title']); ?></h3>
                    <p class="xt-pvclone-benefit-text"><?php echo esc_html($row['text']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
