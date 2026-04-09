<?php
if (!defined('ABSPATH')) {
    exit;
}
$args = isset($args) && is_array($args) ? $args : [];
$heading = $args['heading'] ?? '';
$sub = $args['sub'] ?? '';
$cards = $args['cards'] ?? [];
$mod = $args['mod'] ?? 'teal';
?>
<section class="xt-pvclone-icon-cards xt-pvclone-icon-cards--<?php echo esc_attr($mod); ?>">
    <div class="xt-container xt-pvclone-icon-cards-inner">
        <header class="xt-pvclone-icon-cards-head">
            <h2 class="xt-pvclone-h2"><?php echo esc_html($heading); ?></h2>
            <p class="xt-pvclone-muted xt-pvclone-icon-cards-sub"><?php echo esc_html($sub); ?></p>
        </header>
        <div class="xt-pvclone-icon-cards-grid">
            <?php foreach ($cards as $c) : ?>
                <article class="xt-pvclone-icard">
                    <div class="xt-pvclone-icard-icon">
                        <?php echo xtechs_pv_clone_icon($c['icon'], 'xt-pvclone-svg'); ?>
                    </div>
                    <h3 class="xt-pvclone-icard-title"><?php echo esc_html($c['title']); ?></h3>
                    <ul class="xt-pvclone-icard-list">
                        <?php foreach ($c['points'] as $p) : ?>
                            <li><?php echo esc_html($p); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="xt-pvclone-icard-hint"><?php echo esc_html($c['hint']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
