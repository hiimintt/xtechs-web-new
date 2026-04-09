<?php
if (!defined('ABSPATH')) {
    exit;
}

$tiles_a = [
    [
        'flip' => false,
        'eyebrow' => 'Residential',
        'title' => 'Smart, quiet power for your home',
        'desc' => 'Enjoy lower bills and peace-of-mind backup when the grid goes down. We design for self-consumption first, then layer the right battery sizing so you capture more of your own solar.',
        'bullets' => ['Self-consumption to cut bills', 'Backup for essential circuits', 'EV-ready options'],
        'chips' => ['System size: 3–10 kW', 'Battery: 5–13.5 kWh', 'Export limit: per distributor', 'Roof types: tile/metal/flat'],
        'brands' => ['Tesla PW3', 'Sungrow', 'Sigenergy'],
        'cta' => 'Explore Residential',
        'href' => xtechs_page_link('pv-battery/residential'),
        'img' => 'residential-hero.jpg',
        'alt' => 'Modern residential home with solar panels on roof',
        'img_bottom' => false,
    ],
    [
        'flip' => true,
        'eyebrow' => 'Business',
        'title' => 'Cut operating costs with clean power',
        'desc' => 'Generate onsite power to reduce daytime loads and peak charges. We right-size arrays and batteries for your load profile—with room to scale as you grow.',
        'bullets' => ['Lower daytime energy spend', 'Peak-shaving & load control', 'Monitoring & reporting'],
        'chips' => ['Array size: 10–200 kW+', 'Battery: 10–200 kWh+', 'Roof/ground mount', 'Power quality focus'],
        'brands' => ['Sungrow C&I', 'GoodWe', 'Sigenergy'],
        'cta' => 'Explore Business',
        'href' => xtechs_page_link('pv-battery/business'),
        'img' => 'commercial-hero.jpg',
        'alt' => 'Commercial building with solar panel installation',
        'img_bottom' => false,
    ],
];

$tiles_b = [
    [
        'flip' => false,
        'eyebrow' => 'Off-Grid',
        'title' => 'Reliable power—anywhere you need it',
        'desc' => 'Engineered systems for remote homes, farms, and sites. Hybrid setups with generators and robust storage keep essentials running—day and night.',
        'bullets' => ['Solar + battery + genset hybrids', 'Ruggedized components', 'Remote monitoring'],
        'chips' => ['Solar: 5–20 kW', 'Storage: 10–40 kWh+', 'Generator integration', 'Weather-hardening'],
        'brands' => ['Sigenergy', 'Victron', 'Sungrow hybrid'],
        'cta' => 'Explore Off-Grid',
        'href' => xtechs_page_link('pv-battery/off-grid'),
        'img' => 'offgrid-hero.jpg',
        'alt' => 'Remote off-grid solar installation in natural setting',
        'img_bottom' => true,
    ],
    [
        'flip' => true,
        'eyebrow' => 'Builders',
        'title' => 'Seamless integration during construction',
        'desc' => 'We coordinate pre-wire, rough-in, and install to match your build stages—so handover is clean, compliant, and client-ready.',
        'bullets' => ['Pre-construction rough-in', 'Fast staged installs', 'Handover documentation'],
        'chips' => ['Multi-lot rollouts', 'Meter/main switchboard coordination', 'Export limits handled', 'Compliance packs'],
        'brands' => ['Tesla PW3', 'Sungrow', 'GoodWe'],
        'cta' => 'Explore Builders',
        'href' => xtechs_page_link('pv-battery/builders'),
        'img' => 'builders-hero.jpg',
        'alt' => 'Construction site with solar panel installation in progress',
        'img_bottom' => true,
    ],
];

$compare = [
    ['title' => 'Residential', 'features' => ['Self-consumption', 'Backup', 'EV-ready'], 'href' => xtechs_page_link('pv-battery/residential'), 'accent' => 'a1'],
    ['title' => 'Business', 'features' => ['Cost reduction', 'Peak-shaving', 'Reports'], 'href' => xtechs_page_link('pv-battery/business'), 'accent' => 'a2'],
    ['title' => 'Off-Grid', 'features' => ['Hybrid genset', 'Rugged', 'Remote'], 'href' => xtechs_page_link('pv-battery/off-grid'), 'accent' => 'a3'],
    ['title' => 'Builders', 'features' => ['Pre-wire', 'Staged install', 'Handover'], 'href' => xtechs_page_link('pv-battery/builders'), 'accent' => 'a4'],
];

$trust = [
    ['label' => 'CEC-Accredited Installers', 'tip' => 'All our installers are Clean Energy Council accredited, ensuring the highest standards of safety and quality.'],
    ['label' => 'Designer-led System Sizing', 'tip' => 'Our experienced designers create custom solutions optimized for your specific energy needs and site conditions.'],
    ['label' => 'After-Sales Support', 'tip' => 'Comprehensive support including monitoring, maintenance, and warranty service to keep your system running optimally.'],
    ['label' => 'Local Warranty Help', 'tip' => 'Local Victorian team providing fast response times and personalized service for all warranty and support needs.'],
];

function xtechs_pv_clone_render_tile(array $t): void {
    $u = xtechs_pv_clone_img_url($t['img']);
    $order_img = $t['flip'] ? 'xt-pvclone-tile-img--right' : '';
    $order_txt = $t['flip'] ? 'xt-pvclone-tile-txt--left' : '';
    $img_mod = !empty($t['img_bottom']) ? ' xt-pvclone-tile-img-inner--bottom' : '';
    ?>
    <div class="xt-pvclone-tile">
        <div class="xt-pvclone-tile-img <?php echo esc_attr($order_img); ?>">
            <div class="xt-pvclone-tile-img-inner<?php echo esc_attr($img_mod); ?>">
                <?php if ($u) : ?>
                    <img src="<?php echo esc_url($u); ?>" alt="<?php echo esc_attr($t['alt']); ?>" loading="<?php echo !empty($t['priority']) ? 'eager' : 'lazy'; ?>" decoding="async" />
                <?php else : ?>
                    <div class="xt-pvclone-tile-ph" aria-hidden="true"></div>
                <?php endif; ?>
                <div class="xt-pvclone-tile-img-grad" aria-hidden="true"></div>
            </div>
        </div>
        <div class="xt-pvclone-tile-txt <?php echo esc_attr($order_txt); ?>">
            <div class="xt-pvclone-tile-inner">
                <span class="xt-pvclone-tile-eyebrow"><?php echo esc_html($t['eyebrow']); ?></span>
                <h2 class="xt-pvclone-tile-title"><?php echo esc_html($t['title']); ?></h2>
                <p class="xt-pvclone-tile-desc"><?php echo esc_html($t['desc']); ?></p>
                <ul class="xt-pvclone-tile-bullets">
                    <?php foreach ($t['bullets'] as $b) : ?>
                        <li><span class="xt-pvclone-tile-dot" aria-hidden="true"></span><?php echo esc_html($b); ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="xt-pvclone-tile-chips">
                    <?php foreach ($t['chips'] as $ch) : ?>
                        <span class="xt-pvclone-tile-chip"><?php echo esc_html($ch); ?></span>
                    <?php endforeach; ?>
                </div>
                <?php if (!empty($t['brands'])) : ?>
                    <p class="xt-pvclone-tile-pair-label">Popular pairings:</p>
                    <div class="xt-pvclone-tile-brands">
                        <?php foreach ($t['brands'] as $br) : ?>
                            <span class="xt-pvclone-tile-brand"><?php echo esc_html($br); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <div class="xt-pvclone-tile-cta">
                    <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url($t['href']); ?>">
                        <?php echo esc_html($t['cta']); ?>
                        <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg'); ?>
                    </a>
                    <a class="xt-pvclone-tile-more" href="<?php echo esc_url($t['href']); ?>">Learn more <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg xt-pvclone-svg--sm'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <?php
}

$tiles_a[0]['priority'] = true;
?>
<div class="xt-pvclone">
    <section class="xt-pvclone-hero">
        <div class="xt-pvclone-hero-bg" aria-hidden="true"></div>
        <div class="xt-container xt-pvclone-hero-inner">
            <span class="xt-pvclone-pill">PV & Battery</span>
            <h1 class="xt-pvclone-hero-title">Choose the best path to clean energy</h1>
            <p class="xt-pvclone-hero-lead">Professional solar and battery solutions engineered for performance, reliability, and maximum savings across Victoria.</p>
            <div class="xt-pvclone-hero-chips" data-xt-pv-hub-chips>
                <?php foreach (['High Savings', 'Backup Power', 'Low Maintenance', 'Fastest Install'] as $chip) : ?>
                    <button type="button" class="xt-pvclone-filter-chip" data-xt-pv-chip><?php echo esc_html($chip); ?></button>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="xt-pvclone-trust">
        <div class="xt-container">
            <div class="xt-pvclone-trust-grid">
                <?php foreach ($trust as $it) : ?>
                    <div class="xt-pvclone-trust-card" title="<?php echo esc_attr($it['tip']); ?>">
                        <span class="xt-pvclone-trust-label"><?php echo esc_html($it['label']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="xt-pvclone-tiles-wrap">
        <div class="xt-container">
            <?php foreach ($tiles_a as $tile) {
                xtechs_pv_clone_render_tile($tile);
            } ?>
        </div>
    </div>

    <section class="xt-pvclone-compare" data-xt-pv-compare>
        <div class="xt-container">
            <header class="xt-pvclone-compare-head">
                <h2 class="xt-pvclone-h2">Compare Your Options</h2>
                <p class="xt-pvclone-muted">Quick overview of our four main solution paths to help you find the right fit.</p>
            </header>
            <div class="xt-pvclone-compare-scroll-btns">
                <button type="button" class="xt-pvclone-compare-nav" data-xt-compare-left aria-label="Scroll left">‹</button>
                <button type="button" class="xt-pvclone-compare-nav" data-xt-compare-right aria-label="Scroll right">›</button>
            </div>
            <div class="xt-pvclone-compare-track" data-xt-compare-track>
                <?php foreach ($compare as $c) : ?>
                    <article class="xt-pvclone-compare-card">
                        <h3><?php echo esc_html($c['title']); ?></h3>
                        <div class="xt-pvclone-compare-accent xt-pvclone-compare-accent--<?php echo esc_attr($c['accent']); ?>"></div>
                        <ul>
                            <?php foreach ($c['features'] as $f) : ?>
                                <li><?php echo esc_html($f); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a class="xt-pvclone-compare-link" href="<?php echo esc_url($c['href']); ?>">See details <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-pvclone-svg xt-pvclone-svg--sm'); ?></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="xt-pvclone-tiles-wrap">
        <div class="xt-container">
            <?php foreach ($tiles_b as $tile) {
                xtechs_pv_clone_render_tile($tile);
            } ?>
        </div>
    </div>

    <?php get_template_part('template-parts/pv/clone-part-faq-hub'); ?>
</div>
