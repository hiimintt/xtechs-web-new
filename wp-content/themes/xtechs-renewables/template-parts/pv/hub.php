<?php
if (!defined('ABSPATH')) {
    exit;
}

$contact = home_url('/contact');
$cal = xtechs_pv_calendly_url();

$tiles = [
    [
        'eyebrow' => __('Residential', 'xtechs-renewables'),
        'title' => __('Smart, quiet power for your home', 'xtechs-renewables'),
        'desc' => __('Enjoy lower bills and peace-of-mind backup when the grid goes down. We design for self-consumption first, then layer the right battery sizing so you capture more of your own solar.', 'xtechs-renewables'),
        'bullets' => [
            __('Self-consumption to cut bills', 'xtechs-renewables'),
            __('Backup for essential circuits', 'xtechs-renewables'),
            __('EV-ready options', 'xtechs-renewables'),
        ],
        'chips' => ['3–10 kW', '5–13.5 kWh', __('Export limit: per distributor', 'xtechs-renewables'), __('Roof: tile / metal / flat', 'xtechs-renewables')],
        'brands' => 'Tesla PW3 · Sungrow · Sigenergy',
        'href' => xtechs_page_link('pv-battery/residential'),
        'cta' => __('Explore residential', 'xtechs-renewables'),
        'layout' => 'left',
        'tone' => 'blue',
    ],
    [
        'eyebrow' => __('Business', 'xtechs-renewables'),
        'title' => __('Cut operating costs with clean power', 'xtechs-renewables'),
        'desc' => __('Generate onsite power to reduce daytime loads and peak charges. We right-size arrays and batteries for your load profile—with room to scale as you grow.', 'xtechs-renewables'),
        'bullets' => [
            __('Lower daytime energy spend', 'xtechs-renewables'),
            __('Peak-shaving and load control', 'xtechs-renewables'),
            __('Monitoring and reporting', 'xtechs-renewables'),
        ],
        'chips' => ['10–200 kW+', '10–200 kWh+', __('Roof / ground mount', 'xtechs-renewables'), __('Power quality focus', 'xtechs-renewables')],
        'brands' => 'Sungrow C&I · GoodWe · Sigenergy',
        'href' => xtechs_page_link('pv-battery/business'),
        'cta' => __('Explore business', 'xtechs-renewables'),
        'layout' => 'right',
        'tone' => 'teal',
    ],
    [
        'eyebrow' => __('Off-grid', 'xtechs-renewables'),
        'title' => __('Reliable power—anywhere you need it', 'xtechs-renewables'),
        'desc' => __('Engineered systems for remote homes, farms, and sites. Hybrid setups with generators and robust storage keep essentials running—day and night.', 'xtechs-renewables'),
        'bullets' => [
            __('Solar + battery + genset hybrids', 'xtechs-renewables'),
            __('Ruggedised components', 'xtechs-renewables'),
            __('Remote monitoring', 'xtechs-renewables'),
        ],
        'chips' => ['5–20 kW', '10–40 kWh+', __('Generator integration', 'xtechs-renewables'), __('Weather-hardening', 'xtechs-renewables')],
        'brands' => 'Sigenergy · Victron · Sungrow hybrid',
        'href' => xtechs_page_link('pv-battery/off-grid'),
        'cta' => __('Explore off-grid', 'xtechs-renewables'),
        'layout' => 'left',
        'tone' => 'green',
    ],
    [
        'eyebrow' => __('Builders', 'xtechs-renewables'),
        'title' => __('Seamless integration during construction', 'xtechs-renewables'),
        'desc' => __('We coordinate pre-wire, rough-in, and install to match your build stages—so handover is clean, compliant, and client-ready.', 'xtechs-renewables'),
        'bullets' => [
            __('Pre-construction rough-in', 'xtechs-renewables'),
            __('Fast staged installs', 'xtechs-renewables'),
            __('Handover documentation', 'xtechs-renewables'),
        ],
        'chips' => [__('Multi-lot rollouts', 'xtechs-renewables'), __('Meter / MSB coordination', 'xtechs-renewables'), __('Export limits handled', 'xtechs-renewables'), __('Compliance packs', 'xtechs-renewables')],
        'brands' => 'Tesla PW3 · Sungrow · GoodWe',
        'href' => xtechs_page_link('pv-battery/builders'),
        'cta' => __('Explore builders', 'xtechs-renewables'),
        'layout' => 'right',
        'tone' => 'slate',
    ],
];

$compare = [
    ['title' => __('Residential', 'xtechs-renewables'), 'features' => [__('Self-consumption', 'xtechs-renewables'), __('Backup', 'xtechs-renewables'), __('EV-ready', 'xtechs-renewables')], 'href' => xtechs_page_link('pv-battery/residential')],
    ['title' => __('Business', 'xtechs-renewables'), 'features' => [__('Cost reduction', 'xtechs-renewables'), __('Peak-shaving', 'xtechs-renewables'), __('Reports', 'xtechs-renewables')], 'href' => xtechs_page_link('pv-battery/business')],
    ['title' => __('Off-grid', 'xtechs-renewables'), 'features' => [__('Hybrid genset', 'xtechs-renewables'), __('Rugged', 'xtechs-renewables'), __('Remote', 'xtechs-renewables')], 'href' => xtechs_page_link('pv-battery/off-grid')],
    ['title' => __('Builders', 'xtechs-renewables'), 'features' => [__('Pre-wire', 'xtechs-renewables'), __('Staged install', 'xtechs-renewables'), __('Handover', 'xtechs-renewables')], 'href' => xtechs_page_link('pv-battery/builders')],
];

$faqs = [
    [
        'q' => __('Will a battery keep my lights on in a blackout?', 'xtechs-renewables'),
        'a' => __('Yes—when sized and configured for backup, essential circuits can keep running during an outage (lighting, refrigeration, comms). We confirm your essential loads and design accordingly.', 'xtechs-renewables'),
    ],
    [
        'q' => __('Can I add a battery later?', 'xtechs-renewables'),
        'a' => __('Often yes. Many inverters support staged upgrades. We size your solar and specify hardware that keeps the upgrade path clean.', 'xtechs-renewables'),
    ],
    [
        'q' => __('How much backup can I get?', 'xtechs-renewables'),
        'a' => __('Depends on battery capacity, inverter output, and your essential circuits. Typical homes back up lights, fridge, internet, and a few GPOs; heavy loads are optional.', 'xtechs-renewables'),
    ],
    [
        'q' => __('How fast is the installation?', 'xtechs-renewables'),
        'a' => __('Residential installs are commonly 1–2 days (site-dependent). Larger business/off-grid projects vary with scope and switchboard works.', 'xtechs-renewables'),
    ],
    [
        'q' => __('Do you handle export limits and approvals?', 'xtechs-renewables'),
        'a' => __('Yes—we coordinate with your local distributor, apply export caps where required, and set compliant limits in the inverter.', 'xtechs-renewables'),
    ],
    [
        'q' => __('What if my roof is complex?', 'xtechs-renewables'),
        'a' => __('We design around orientation, shading, and roof type (tile/metal/flat). If needed we use optimisers or adjust array layout.', 'xtechs-renewables'),
    ],
];
?>
<div class="xt-pv-page xt-pv-hub">
    <section class="xt-pv-hero xt-pv-hero--soft">
        <div class="xt-container xt-pv-hero-inner">
            <p class="xt-pv-badge"><?php esc_html_e('PV & Battery', 'xtechs-renewables'); ?></p>
            <h1 class="xt-pv-hero-title"><?php esc_html_e('Choose the best path to clean energy', 'xtechs-renewables'); ?></h1>
            <p class="xt-pv-hero-lead"><?php esc_html_e('Professional solar and battery solutions engineered for performance, reliability, and maximum savings across Victoria.', 'xtechs-renewables'); ?></p>
            <div class="xt-pv-filter-chips" role="group" aria-label="<?php esc_attr_e('Highlights', 'xtechs-renewables'); ?>">
                <span class="xt-pv-chip"><?php esc_html_e('High savings', 'xtechs-renewables'); ?></span>
                <span class="xt-pv-chip"><?php esc_html_e('Backup power', 'xtechs-renewables'); ?></span>
                <span class="xt-pv-chip"><?php esc_html_e('Low maintenance', 'xtechs-renewables'); ?></span>
                <span class="xt-pv-chip"><?php esc_html_e('Fast install', 'xtechs-renewables'); ?></span>
            </div>
        </div>
    </section>

    <section class="xt-section xt-section-muted xt-pv-trust">
        <div class="xt-container">
            <div class="xt-pv-trust-grid">
                <div class="xt-pv-trust-item">
                    <strong><?php esc_html_e('CEC-accredited installers', 'xtechs-renewables'); ?></strong>
                    <span><?php esc_html_e('Safety and quality aligned with Clean Energy Council expectations.', 'xtechs-renewables'); ?></span>
                </div>
                <div class="xt-pv-trust-item">
                    <strong><?php esc_html_e('Designer-led sizing', 'xtechs-renewables'); ?></strong>
                    <span><?php esc_html_e('Systems matched to your usage, roof, and future plans.', 'xtechs-renewables'); ?></span>
                </div>
                <div class="xt-pv-trust-item">
                    <strong><?php esc_html_e('After-sales support', 'xtechs-renewables'); ?></strong>
                    <span><?php esc_html_e('Monitoring, maintenance guidance, and warranty coordination.', 'xtechs-renewables'); ?></span>
                </div>
                <div class="xt-pv-trust-item">
                    <strong><?php esc_html_e('Local warranty help', 'xtechs-renewables'); ?></strong>
                    <span><?php esc_html_e('Victorian team for responsive service.', 'xtechs-renewables'); ?></span>
                </div>
            </div>
        </div>
    </section>

    <?php foreach ($tiles as $tile) : ?>
        <?php
        $rev = ($tile['layout'] === 'right');
        $media_class = 'xt-pv-tile-media xt-pv-tile-media--' . sanitize_html_class($tile['tone']);
        ?>
        <section class="xt-section <?php echo $rev ? 'xt-section-white' : 'xt-section-muted'; ?>">
            <div class="xt-container">
                <div class="xt-pv-tile <?php echo $rev ? 'xt-pv-tile--reverse' : ''; ?>">
                    <div class="<?php echo $media_class; ?>" aria-hidden="true"></div>
                    <div class="xt-pv-tile-body">
                        <p class="xt-pv-tile-eyebrow"><?php echo esc_html($tile['eyebrow']); ?></p>
                        <h2 class="xt-pv-tile-title"><?php echo esc_html($tile['title']); ?></h2>
                        <p class="xt-pv-tile-desc"><?php echo esc_html($tile['desc']); ?></p>
                        <ul class="xt-pv-tile-bullets">
                            <?php foreach ($tile['bullets'] as $b) : ?>
                                <li><?php echo esc_html($b); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="xt-pv-chip-row">
                            <?php foreach ($tile['chips'] as $chip) : ?>
                                <span class="xt-pv-mini-chip"><?php echo esc_html($chip); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <p class="xt-pv-tile-brands"><?php echo esc_html($tile['brands']); ?></p>
                        <a class="xt-btn xt-btn-primary xt-btn-sm" href="<?php echo esc_url($tile['href']); ?>"><?php echo esc_html($tile['cta']); ?></a>
                    </div>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

    <section class="xt-section xt-section-white">
        <div class="xt-container">
            <header class="xt-pv-block-header xt-pv-compare-header">
                <h2 class="xt-pv-block-title"><?php esc_html_e('Compare your options', 'xtechs-renewables'); ?></h2>
                <p class="xt-pv-block-lead"><?php esc_html_e('Quick overview of our four main solution paths to help you find the right fit.', 'xtechs-renewables'); ?></p>
            </header>
            <div class="xt-pv-compare-grid">
                <?php foreach ($compare as $c) : ?>
                    <a class="xt-pv-compare-card" href="<?php echo esc_url($c['href']); ?>">
                        <h3 class="xt-pv-compare-title"><?php echo esc_html($c['title']); ?></h3>
                        <ul class="xt-pv-compare-features">
                            <?php foreach ($c['features'] as $f) : ?>
                                <li><?php echo esc_html($f); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <span class="xt-pv-compare-more"><?php esc_html_e('View section', 'xtechs-renewables'); ?> →</span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="xt-section xt-section-muted" id="faq">
        <div class="xt-container xt-container-narrow">
            <h2 class="xt-pv-block-title"><?php esc_html_e('Frequently asked questions', 'xtechs-renewables'); ?></h2>
            <div class="xt-pv-faq">
                <?php foreach ($faqs as $faq) : ?>
                    <details class="xt-pv-faq-item">
                        <summary><?php echo esc_html($faq['q']); ?></summary>
                        <p><?php echo esc_html($faq['a']); ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="xt-pv-cta-band">
        <div class="xt-container xt-pv-cta-band-inner">
            <h2 class="xt-pv-cta-band-title"><?php esc_html_e('Not sure where to start?', 'xtechs-renewables'); ?></h2>
            <p class="xt-pv-cta-band-text"><?php esc_html_e('Book a consultation and we will map the best PV and battery path for your property.', 'xtechs-renewables'); ?></p>
            <div class="xt-pv-cta-row">
                <a class="xt-btn xt-btn-primary xt-btn-sm" href="<?php echo esc_url($contact); ?>"><?php esc_html_e('Get a quote', 'xtechs-renewables'); ?></a>
                <a class="xt-btn xt-btn-outline xt-btn-sm" href="<?php echo esc_url($cal); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e('Book consultation', 'xtechs-renewables'); ?></a>
            </div>
        </div>
    </section>
</div>
