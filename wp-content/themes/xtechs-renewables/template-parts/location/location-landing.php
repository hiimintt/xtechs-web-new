<?php
/**
 * Full location landing (mirrors Next.js src/app/locations/{slug}/page.tsx + shared sections).
 *
 * @var array $args { location_key: string }
 */
if (!defined('ABSPATH')) {
    exit;
}

$location_key = isset($args['location_key']) ? (string) $args['location_key'] : '';
$cfg = function_exists('xtechs_location_landing_config') ? xtechs_location_landing_config($location_key) : null;
if (!is_array($cfg)) {
    return;
}

$logo_url = xtechs_location_theme_media_url('xlogo.png');
$contact_url = home_url('/contact/');
$pv_url = function_exists('xtechs_page_link') ? xtechs_page_link('pv-battery') : home_url('/pv-battery/');

$process = function_exists('xtechs_location_process_data') ? xtechs_location_process_data() : ['steps' => [], 'content' => []];
$steps = $process['steps'] ?? [];
$content = $process['content'] ?? [];
$first_step_id = isset($steps[0]['id']) ? (string) $steps[0]['id'] : '';

$hero_url = (string) ($cfg['hero_url'] ?? '');
$json_ld = function_exists('xtechs_location_landing_json_ld') ? xtechs_location_landing_json_ld($cfg) : [];

$why_items = (array) ($cfg['why_items'] ?? []);
$areas = (array) ($cfg['areas'] ?? []);
$trust = (array) ($cfg['trust'] ?? []);
$faq = $cfg['faq'] ?? null;
$map_embed = (string) ($cfg['map_embed'] ?? '');
?>
<div class="xt-loc-melb">
    <section class="xt-loc-hero">
        <div class="xt-loc-hero-bg" aria-hidden="true">
            <div class="xt-loc-hero-bg__grid"></div>
            <div class="xt-loc-hero-bg__glow"></div>
            <div class="xt-loc-hero-bg__corner xt-loc-hero-bg__corner--tl" aria-hidden="true"></div>
            <div class="xt-loc-hero-bg__corner xt-loc-hero-bg__corner--br" aria-hidden="true"></div>
            <div class="xt-loc-hero-bg__rings">
                <div class="xt-loc-hero-bg__ring xt-loc-hero-bg__ring--a"></div>
                <div class="xt-loc-hero-bg__ring xt-loc-hero-bg__ring--b"></div>
                <div class="xt-loc-hero-bg__ring xt-loc-hero-bg__ring--c"></div>
                <div class="xt-loc-hero-bg__logo">
                    <?php
                    $loc_logo_alt = sprintf(
                        /* translators: %s: region name (e.g. Melbourne CBD) */
                        __('xTechs Renewables — solar & battery installers (%s)', 'xtechs-renewables'),
                        (string) ($cfg['badge'] ?? 'Victoria')
                    );
                    ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($loc_logo_alt); ?>" width="320" height="320" decoding="async" fetchpriority="high" loading="eager" />
                </div>
            </div>
        </div>
        <div class="xt-loc-hero-inner">
            <div class="xt-loc-hero-grid">
                <div>
                    <span class="xt-loc-badge">
                        <?php echo xtechs_location_trust_svg('pin'); ?>
                        <?php echo esc_html((string) ($cfg['badge'] ?? '')); ?>
                    </span>
                    <h1>
                        Solar &amp; Battery Solutions <span class="xt-loc-hero-accent"><?php echo esc_html((string) ($cfg['h1_accent'] ?? '')); ?></span>
                    </h1>
                    <p class="xt-loc-hero-lead"><?php echo esc_html((string) ($cfg['hero_lead'] ?? '')); ?></p>
                    <div class="xt-loc-hero-actions">
                        <a class="xt-loc-btn xt-loc-btn--primary" href="<?php echo esc_url($contact_url); ?>">Get a Quote</a>
                        <a class="xt-loc-btn xt-loc-btn--outline" href="<?php echo esc_url($pv_url); ?>">Explore PV &amp; Battery</a>
                    </div>
                    <ul class="xt-loc-trust">
                        <?php foreach ($trust as $row) : ?>
                            <li>
                                <?php echo xtechs_location_trust_svg((string) ($row['icon'] ?? 'shield')); ?>
                                <?php echo esc_html((string) ($row['text'] ?? '')); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="xt-loc-hero-media">
                    <div class="xt-loc-hero-media__frame">
                        <img src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr((string) ($cfg['hero_img_alt'] ?? '')); ?>" loading="lazy" width="800" height="600" />
                    </div>
                    <p class="xt-loc-hero-media__note"><?php echo esc_html((string) ($cfg['hero_note'] ?? '')); ?></p>
                </div>
            </div>
        </div>
    </section>

    <?php
    $seo_paras = isset($cfg['local_seo_paragraphs']) && is_array($cfg['local_seo_paragraphs']) ? $cfg['local_seo_paragraphs'] : [];
    ?>
    <?php if ($seo_paras !== []) : ?>
    <section class="xt-loc-section xt-loc-section--white xt-loc-seo-intro" aria-labelledby="xt-loc-seo-intro-title-<?php echo esc_attr($location_key); ?>">
        <div class="xt-loc-section-inner xt-loc-prose">
            <?php
            $seo_intro_h2 = isset($cfg['local_seo_heading']) ? trim((string) $cfg['local_seo_heading']) : '';
            if ($seo_intro_h2 === '') {
                $seo_intro_h2 = sprintf(
                    /* translators: %s: region label */
                    __('Solar, battery & electrical projects in %s', 'xtechs-renewables'),
                    (string) ($cfg['badge'] ?? '')
                );
            }
            ?>
            <h2 id="xt-loc-seo-intro-title-<?php echo esc_attr($location_key); ?>" class="xt-loc-seo-intro-title"><?php echo esc_html($seo_intro_h2); ?></h2>
            <?php foreach ($seo_paras as $para) : ?>
                <p><?php echo esc_html((string) $para); ?></p>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <section id="services-tile" class="xt-loc-section xt-loc-section--white xt-loc-services-wrap">
        <div class="xt-loc-section-inner">
            <header class="xt-loc-popular-head">
                <h2><?php echo esc_html((string) ($cfg['popular_h2'] ?? '')); ?></h2>
                <p><?php echo esc_html((string) ($cfg['popular_p'] ?? '')); ?></p>
            </header>
            <?php get_template_part('template-parts/location/our-services-cards'); ?>
        </div>
    </section>

    <section class="xt-loc-section xt-loc-section--muted">
        <div class="xt-loc-section-inner">
            <h2 class="xt-loc-why-title"><?php echo esc_html((string) ($cfg['why_title'] ?? '')); ?></h2>
            <div class="xt-loc-why-grid">
                <?php foreach ($why_items as $item) : ?>
                    <div class="xt-loc-why-card">
                        <div class="xt-loc-why-card__row">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
                            <div>
                                <h3><?php echo esc_html((string) ($item['title'] ?? '')); ?></h3>
                                <p><?php echo esc_html((string) ($item['desc'] ?? '')); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="process-tile" class="xt-loc-melb-process-section">
        <div class="xt-loc-process" data-xt-loc-process>
            <header class="xt-loc-process-head">
                <h2>Our Process</h2>
                <p>From first chat to clean energy on your roof — here's how we deliver.</p>
            </header>
            <div class="xt-loc-process-grid">
                <aside class="xt-loc-process-aside">
                    <h3>Process Steps</h3>
                    <div class="xt-loc-process-step-list" role="tablist" aria-label="<?php esc_attr_e('Process steps', 'xtechs-renewables'); ?>">
                        <?php foreach ($steps as $i => $step) : ?>
                            <?php
                            $sid = (string) ($step['id'] ?? '');
                            $active = $sid === $first_step_id;
                            ?>
                            <button
                                type="button"
                                class="xt-loc-process-step<?php echo $active ? ' is-active' : ''; ?>"
                                data-xt-process-step="<?php echo esc_attr($sid); ?>"
                                role="tab"
                                aria-selected="<?php echo $active ? 'true' : 'false'; ?>"
                                id="xt-process-tab-<?php echo esc_attr($sid); ?>-<?php echo esc_attr($location_key); ?>"
                            >
                                <span class="xt-loc-process-step-num"><?php echo (int) ($i + 1); ?></span>
                                <span class="xt-loc-process-step-label"><?php echo esc_html((string) ($step['label'] ?? '')); ?></span>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </aside>
                <div class="xt-loc-process-panel-wrap">
                    <?php foreach ($steps as $i => $step) : ?>
                        <?php
                        $sid = (string) ($step['id'] ?? '');
                        $panel = $content[$sid] ?? null;
                        if (!is_array($panel)) {
                            continue;
                        }
                        $hidden = $sid !== $first_step_id;
                        $phase_num = (int) ($i + 1);
                        $total = count($steps);
                        ?>
                        <div
                            class="xt-loc-process-panel"
                            data-xt-process-panel="<?php echo esc_attr($sid); ?>"
                            role="tabpanel"
                            <?php echo $hidden ? 'hidden' : ''; ?>
                            aria-labelledby="xt-process-tab-<?php echo esc_attr($sid); ?>-<?php echo esc_attr($location_key); ?>"
                        >
                            <article class="xt-loc-process-article">
                                <div class="xt-loc-process-scroll">
                                    <h3><?php echo esc_html((string) ($panel['title'] ?? '')); ?></h3>
                                    <p class="xt-loc-process-desc"><?php echo esc_html((string) ($panel['description'] ?? '')); ?></p>
                                    <div class="xt-loc-process-body"><?php echo esc_html((string) ($panel['body'] ?? '')); ?></div>
                                </div>
                                <div class="xt-loc-process-footer">
                                    <div class="xt-loc-process-phase">
                                        <span class="xt-loc-process-dot" aria-hidden="true"></span>
                                        <span>Phase <?php echo (int) $phase_num; ?> of <?php echo (int) $total; ?></span>
                                    </div>
                                    <div class="xt-loc-process-dots" aria-hidden="true">
                                        <?php for ($d = 1; $d <= $total; $d++) : ?>
                                            <span class="<?php echo $d === $phase_num ? 'is-on' : ''; ?>"></span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="xt-loc-section xt-loc-section--muted">
        <div class="xt-loc-section-inner">
            <h2 class="xt-loc-areas-title"><?php echo esc_html((string) ($cfg['areas_h2'] ?? '')); ?></h2>
            <p class="xt-loc-areas-lead"><?php echo esc_html((string) ($cfg['areas_lead'] ?? '')); ?></p>
            <ul class="xt-loc-areas-grid">
                <?php foreach ($areas as $name) : ?>
                    <li><?php echo esc_html((string) $name); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="xt-loc-section xt-loc-section--white">
        <div class="xt-loc-section-inner">
            <h2 class="xt-loc-map-title">Find Us</h2>
            <div class="xt-loc-map-frame">
                <div class="xt-loc-map-aspect">
                    <iframe
                        src="<?php echo esc_url($map_embed); ?>"
                        title="<?php echo esc_attr((string) ($cfg['map_iframe_title'] ?? 'xTechs Renewables')); ?>"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </section>

    <?php if (is_array($faq) && !empty($faq['items'])) : ?>
        <section class="xt-loc-section xt-loc-section--muted">
            <div class="xt-loc-section-inner">
                <h2 class="xt-loc-why-title"><?php echo esc_html((string) ($faq['title'] ?? 'FAQ')); ?></h2>
                <div class="xt-loc-faq-grid">
                    <?php foreach ((array) ($faq['items'] ?? []) as $item) : ?>
                        <div class="xt-loc-why-card">
                            <h3 class="xt-loc-faq-q"><?php echo esc_html((string) ($item['q'] ?? '')); ?></h3>
                            <p class="xt-loc-faq-a"><?php echo esc_html((string) ($item['a'] ?? '')); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <section class="xt-loc-section xt-loc-section--white">
        <div class="xt-loc-final">
            <h2><?php echo esc_html((string) ($cfg['cta_h2'] ?? '')); ?></h2>
            <p><?php echo esc_html((string) ($cfg['cta_sub'] ?? '')); ?></p>
            <div class="xt-loc-final-actions">
                <a class="xt-loc-btn xt-loc-btn--primary" href="<?php echo esc_url($contact_url); ?>">Book Assessment</a>
                <a class="xt-loc-btn xt-loc-btn--outline" href="<?php echo esc_url($pv_url); ?>">View PV &amp; Battery</a>
            </div>
        </div>
    </section>

    <?php
    if (is_array($faq) && !empty($faq['items'])) {
        $faq_entities = [];
        foreach ((array) $faq['items'] as $item) {
            if (!is_array($item)) {
                continue;
            }
            $q = trim((string) ($item['q'] ?? ''));
            $a = trim((string) ($item['a'] ?? ''));
            if ($q === '' || $a === '') {
                continue;
            }
            $faq_entities[] = [
                '@type' => 'Question',
                'name' => $q,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $a,
                ],
            ];
        }
        if ($faq_entities !== []) {
            $faq_ld = [
                '@context' => 'https://schema.org',
                '@type' => 'FAQPage',
                'mainEntity' => $faq_entities,
            ];
            echo '<script type="application/ld+json" id="xtechs-loc-faq">' . wp_json_encode($faq_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
        }
    }
    ?>
    <script type="application/ld+json" id="xtechs-loc-localbusiness"><?php echo wp_json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?></script>
</div>
