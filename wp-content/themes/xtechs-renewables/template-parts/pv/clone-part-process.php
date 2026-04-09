<?php
if (!defined('ABSPATH')) {
    exit;
}
$xt_steps = xtechs_pv_clone_process_steps();
$xt_content = xtechs_pv_clone_process_content();
$xt_first = $xt_steps[0]['id'] ?? 'consultation';
?>
<section id="process" class="xt-pvclone-process xt-container" data-xt-pv-process>
    <header class="xt-pvclone-process-head">
        <h2 class="xt-pvclone-h2">Our Process</h2>
        <p class="xt-pvclone-muted">From first chat to clean energy on your roof — here's how we deliver.</p>
    </header>
    <div class="xt-pvclone-process-grid">
        <aside class="xt-pvclone-process-aside">
            <div class="xt-pvclone-process-card">
                <h3 class="xt-pvclone-process-card-title">Process Steps</h3>
                <ol class="xt-pvclone-stepper" role="tablist" aria-label="Process steps">
                    <?php foreach ($xt_steps as $i => $st) : ?>
                        <li>
                            <button type="button" class="xt-pvclone-step-btn<?php echo $st['id'] === $xt_first ? ' is-active' : ''; ?>"
                                role="tab"
                                aria-selected="<?php echo $st['id'] === $xt_first ? 'true' : 'false'; ?>"
                                data-step="<?php echo esc_attr($st['id']); ?>"
                                id="tab-<?php echo esc_attr($st['id']); ?>">
                                <span class="xt-pvclone-step-num"><?php echo (int) ($i + 1); ?></span>
                                <span><?php echo esc_html($st['label']); ?></span>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </aside>
        <div class="xt-pvclone-process-panel-wrap">
            <?php foreach ($xt_content as $kid => $block) : ?>
                <article class="xt-pvclone-process-panel<?php echo $kid === $xt_first ? ' is-active' : ''; ?>"
                    role="tabpanel"
                    aria-labelledby="tab-<?php echo esc_attr($kid); ?>"
                    data-panel="<?php echo esc_attr($kid); ?>"
                    <?php echo $kid === $xt_first ? '' : 'hidden'; ?>>
                    <div class="xt-pvclone-process-panel-inner">
                        <h3 class="xt-pvclone-process-panel-title"><?php echo esc_html($block['title']); ?></h3>
                        <p class="xt-pvclone-process-panel-desc"><?php echo esc_html($block['description']); ?></p>
                        <div class="xt-pvclone-process-body">
                            <?php echo wp_kses_post(wpautop($block['body'])); ?>
                        </div>
                        <div class="xt-pvclone-process-foot">
                            <span class="xt-pvclone-process-phase-dot" aria-hidden="true"></span>
                            <span class="xt-pvclone-muted xt-pvclone-process-phase-label">
                                Phase <?php echo (int) (array_search($kid, array_keys($xt_content), true) + 1); ?> of <?php echo count($xt_content); ?>
                            </span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
