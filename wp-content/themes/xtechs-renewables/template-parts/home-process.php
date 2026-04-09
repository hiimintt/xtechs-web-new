<?php
if (!defined('ABSPATH')) {
    exit;
}

$steps = [
    ['id' => 'consultation', 'label' => __('Initial Consultation', 'xtechs-renewables')],
    ['id' => 'inspection', 'label' => __('Site Inspection', 'xtechs-renewables')],
    ['id' => 'design', 'label' => __('Design & Quote', 'xtechs-renewables')],
    ['id' => 'installation', 'label' => __('Installation', 'xtechs-renewables')],
    ['id' => 'compliance', 'label' => __('Safety Compliance', 'xtechs-renewables')],
    ['id' => 'handover', 'label' => __('System Handover', 'xtechs-renewables')],
];

$content = xtechs_home_process_content();
$order   = array_keys($content);
$total   = count($order);
?>
<section id="process-tile" class="xt-section xt-section-muted">
    <div class="xt-container xt-process-wrap" id="xt-process">
        <header class="xt-process-header">
            <h2 class="xt-process-h2"><?php esc_html_e('Our Process', 'xtechs-renewables'); ?></h2>
            <p class="xt-process-intro"><?php esc_html_e('From first chat to clean energy on your roof — here\'s how we deliver.', 'xtechs-renewables'); ?></p>
        </header>

        <div class="xt-process-grid">
            <aside class="xt-process-aside">
                <div class="xt-process-stepper-card">
                    <h3 class="xt-process-stepper-title"><?php esc_html_e('Process Steps', 'xtechs-renewables'); ?></h3>
                    <div class="xt-stepper" role="tablist" aria-label="<?php esc_attr_e('Process steps', 'xtechs-renewables'); ?>">
                        <?php foreach ($steps as $i => $s) : ?>
                            <button
                                type="button"
                                class="xt-step-btn<?php echo $i === 0 ? ' is-active' : ''; ?>"
                                role="tab"
                                aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
                                data-step="<?php echo esc_attr($s['id']); ?>"
                            >
                                <span class="xt-step-num"><?php echo esc_html((string) ($i + 1)); ?></span>
                                <span class="xt-step-label"><?php echo esc_html($s['label']); ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </aside>

            <section class="xt-process-panel-outer">
                <div class="xt-process-panel-inner">
                    <?php foreach ($order as $idx => $key) : ?>
                        <?php
                        $block = $content[ $key ];
                        $phase = $idx + 1;
                        ?>
                        <article class="xt-step-panel<?php echo $idx === 0 ? ' is-active' : ''; ?>" data-step-panel="<?php echo esc_attr($key); ?>" role="tabpanel" <?php echo $idx !== 0 ? 'hidden' : ''; ?>>
                            <div class="xt-step-panel-scroll">
                                <h3 class="xt-step-panel-title"><?php echo esc_html($block['title']); ?></h3>
                                <p class="xt-step-panel-desc"><?php echo esc_html($block['description']); ?></p>
                                <div class="xt-step-panel-body">
                                    <?php echo nl2br(esc_html($block['body'])); ?>
                                </div>
                            </div>
                            <div class="xt-step-panel-footer">
                                <div class="xt-step-phase">
                                    <span class="xt-step-dot"></span>
                                    <span><?php printf(esc_html__('Phase %1$d of %2$d', 'xtechs-renewables'), (int) $phase, (int) $total); ?></span>
                                </div>
                                <div class="xt-step-dots" aria-hidden="true">
                                    <?php for ($d = 0; $d < $total; $d++) : ?>
                                        <span class="xt-step-dot-sm<?php echo $d === $idx ? ' is-on' : ''; ?>"></span>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</section>
