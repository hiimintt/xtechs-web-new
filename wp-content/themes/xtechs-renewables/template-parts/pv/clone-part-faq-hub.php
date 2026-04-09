<?php
if (!defined('ABSPATH')) {
    exit;
}
$xt_cats = xtechs_pv_clone_hub_faq_categories();
$xt_faqs = xtechs_pv_clone_hub_faq_items();
?>
<section class="xt-pvclone-faq" id="faq" data-xt-pv-faq>
    <div class="xt-container xt-pvclone-faq-inner">
        <header class="xt-pvclone-faq-hero">
            <span class="xt-pvclone-pill">FAQ</span>
            <h2 class="xt-pvclone-h2">Frequently Asked Questions</h2>
            <p class="xt-pvclone-muted xt-pvclone-faq-intro">Common questions about our PV & Battery solutions</p>
            <label class="xt-pvclone-faq-search-wrap">
                <span class="screen-reader-text">Search questions</span>
                <input type="search" class="xt-pvclone-faq-search" placeholder="Search questions…" autocomplete="off" data-xt-faq-search />
            </label>
        </header>
        <div class="xt-pvclone-faq-layout">
            <nav class="xt-pvclone-faq-nav" aria-label="FAQ categories">
                <?php foreach ($xt_cats as $c) : ?>
                    <button type="button" class="xt-pvclone-faq-cat<?php echo $c['id'] === 'power-backup' ? ' is-active' : ''; ?>"
                        data-faq-cat="<?php echo esc_attr($c['id']); ?>">
                        <span><?php echo esc_html($c['title']); ?></span>
                        <span class="xt-pvclone-faq-cat-count"><?php echo (int) $c['count']; ?></span>
                    </button>
                <?php endforeach; ?>
            </nav>
            <div class="xt-pvclone-faq-list-wrap">
                <p class="xt-pvclone-faq-empty" hidden data-xt-faq-empty>No questions match your search.</p>
                <div class="xt-pvclone-faq-list">
                    <?php foreach ($xt_faqs as $faq) : ?>
                        <?php
                        $needle = strtolower($faq['question'] . ' ' . $faq['answer']);
                        ?>
                        <details class="xt-pvclone-faq-item" id="<?php echo esc_attr($faq['id']); ?>"
                            data-faq-cat="<?php echo esc_attr($faq['category']); ?>"
                            data-faq-search="<?php echo esc_attr($needle); ?>">
                            <summary><?php echo esc_html($faq['question']); ?></summary>
                            <div class="xt-pvclone-faq-answer">
                                <p><?php echo esc_html($faq['answer']); ?></p>
                                <div class="xt-pvclone-faq-actions">
                                    <button type="button" class="xt-pvclone-faq-copy" data-copy-url="#<?php echo esc_attr($faq['id']); ?>">Copy link</button>
                                </div>
                            </div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="xt-pvclone-faq-cta-bar">
            <p class="xt-pvclone-faq-cta-text">Still have questions?</p>
            <a class="xt-btn xt-btn-primary xt-btn-sm" href="<?php echo esc_url(xtechs_pv_clone_contact_url()); ?>">Get Expert Advice</a>
        </div>
    </div>
</section>
