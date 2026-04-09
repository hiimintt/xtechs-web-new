<?php
if (!defined('ABSPATH')) {
    exit;
}

$services_left = [
    [
        'icon' => 'home',
        'title' => 'Residential Solar PV & Batteries',
        'desc' => 'Tailored systems for family homes — neat switchboards, clean cabling, and guidance on Solar Victoria rebates.',
        'href' => xtechs_page_link('pv-battery/residential'),
    ],
    [
        'icon' => 'building',
        'title' => 'Business & Commercial Energy',
        'desc' => 'Data-driven designs for shops, offices and industrial sites. Export-limit approvals and smart monitoring included.',
        'href' => xtechs_page_link('pv-battery/business'),
    ],
    [
        'icon' => 'zap',
        'title' => 'Off-Grid & Hybrid Systems',
        'desc' => 'Robust off-grid and hybrid setups for remote sites and critical operations — sized for your loads and growth.',
        'href' => xtechs_page_link('pv-battery/off-grid'),
    ],
];

$service_mini = [
    'Residential Solar PV & Batteries' => 'sparkles',
    'Business & Commercial Energy' => 'check-circle',
    'Off-Grid & Hybrid Systems' => 'star',
    'Home & Business Batteries' => 'sparkles',
    'EV Charging' => 'check-circle',
    'SolarFold Rapid-Deploy Power' => 'star',
];

$services_right = [
    [
        'icon' => 'battery',
        'title' => 'Home & Business Batteries',
        'desc' => 'BYD, Tesla, Sungrow and more. Safe LFP options, backup power and seamless inverter integration.',
        'href' => xtechs_page_link('battery'),
    ],
    [
        'icon' => 'car',
        'title' => 'EV Charging',
        'desc' => 'Tesla Wall Connector, Zappi, SigEnergy and Wattpilot — smart solar charging and dynamic load management.',
        'href' => xtechs_page_link('ev-chargers'),
    ],
    [
        'icon' => 'zap',
        'title' => 'SolarFold Rapid-Deploy Power',
        'desc' => 'Mobile, fast-deploy arrays for military, mining, events and emergency power — short or long-term projects.',
        'href' => home_url('/solarfold/'),
    ],
];

$stats = [
    ['icon' => 'award', 'value' => 300, 'suffix' => '+', 'label' => 'Systems Delivered'],
    ['icon' => 'trending-up', 'value' => 1000, 'suffix' => '+ kW', 'label' => 'kW Deployed'],
    ['icon' => 'shield', 'value' => 100, 'suffix' => '%', 'label' => 'CEC-Accredited on Jobs'],
    ['icon' => 'users', 'value' => 98, 'suffix' => '%', 'label' => 'Customer Satisfaction'],
];

$values = [
    ['icon' => 'shield', 'title' => 'Integrity', 'desc' => 'We act with honesty and uphold the highest ethical standards in every decision and installation.'],
    ['icon' => 'check-circle', 'title' => 'Responsibility', 'desc' => 'We take ownership of outcomes and prioritise safety, compliance, and the environment.'],
    ['icon' => 'award', 'title' => 'Accountability', 'desc' => 'We deliver on our promises and stand behind our workmanship and service.'],
    ['icon' => 'star', 'title' => 'Quality', 'desc' => 'We use proven, tier-one products and neat, standards-compliant installs that stand the test of time.'],
    ['icon' => 'users', 'title' => 'Team Work', 'desc' => 'We collaborate closely with clients, suppliers and each other to get great results.'],
    ['icon' => 'zap', 'title' => 'Innovation', 'desc' => 'We embrace modern technologies and smarter ways of working to create better systems.'],
    ['icon' => 'trending-up', 'title' => 'Leadership', 'desc' => 'We set the bar for professionalism and customer care across every project stage.'],
];
?>
<section class="xt-about">
    <div class="xt-container xt-about-inner">
        <header class="xt-about-head xt-reveal" data-reveal-delay="0">
            <p class="xt-about-kicker">
                <span class="xt-about-kicker-ic" aria-hidden="true"><?php echo xtechs_pv_clone_icon('sun', 'xt-about-kicker-svg'); ?></span>
                DISCOVER OUR STORY
            </p>
            <h1>About xTechs Renewables</h1>
            <div class="xt-about-underline" aria-hidden="true"></div>
            <p class="xt-about-intro xt-reveal" data-reveal-delay="150">
                We design and deliver <strong>solar PV, batteries, EV charging and heat pumps</strong> across Victoria (and select interstate). Safety and compliance are non-negotiable — we're CEC-accredited and guide you through Solar Victoria rebates and approvals. Clean installs. Clear paperwork. Strong after-sales.
            </p>
        </header>

        <div class="xt-about-services-grid">
            <div class="xt-about-col">
                <?php foreach ($services_left as $item) : ?>
                    <article class="xt-about-service xt-reveal" data-reveal-delay="0">
                        <div class="xt-about-service-head">
                            <div class="xt-about-service-ic" aria-hidden="true">
                                <?php echo xtechs_pv_clone_icon($item['icon'], 'xt-about-service-svg'); ?>
                                <span class="xt-about-service-ic-mini" aria-hidden="true"><?php echo xtechs_pv_clone_icon($service_mini[$item['title']] ?? 'sparkles', 'xt-about-mini-svg'); ?></span>
                            </div>
                            <h3><?php echo esc_html($item['title']); ?></h3>
                        </div>
                        <p><?php echo esc_html($item['desc']); ?></p>
                        <div class="xt-about-service-more" aria-hidden="true">
                            <span class="xt-about-service-more-txt">Learn more</span>
                            <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-about-more-svg'); ?>
                        </div>
                        <a class="xt-about-service-link" href="<?php echo esc_url($item['href']); ?>" aria-label="<?php echo esc_attr('Learn more: ' . $item['title']); ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>

            <div class="xt-about-team-card xt-reveal" data-reveal-delay="150">
                <button class="xt-about-team-media" type="button" data-xt-about-open aria-label="Preview full team photo">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/media/team.png'); ?>" alt="xTechs Renewables team of accredited installers and electricians" loading="eager" decoding="async" onerror="this.onerror=null;this.src='<?php echo esc_js(get_template_directory_uri() . '/assets/media/coming-soon-hero.jpg'); ?>';" />
                    <span class="xt-about-team-hint">Click to view</span>
                </button>
                <div class="xt-about-team-copy">
                    <h2>Our Equipped &amp; Certified Team</h2>
                    <p>
                        Our team of CEC-accredited installers and licensed electricians is fully qualified to deliver end-to-end energy solutions — from solar PV and batteries to EV charging, off-grid systems, business energy, and rapid-deploy power. Safety, compliance, and quality are at the heart of every project.
                    </p>
                </div>
            </div>

            <div class="xt-about-col">
                <?php foreach ($services_right as $item) : ?>
                    <article class="xt-about-service xt-reveal" data-reveal-delay="0">
                        <div class="xt-about-service-head">
                            <div class="xt-about-service-ic" aria-hidden="true">
                                <?php echo xtechs_pv_clone_icon($item['icon'], 'xt-about-service-svg'); ?>
                                <span class="xt-about-service-ic-mini" aria-hidden="true"><?php echo xtechs_pv_clone_icon($service_mini[$item['title']] ?? 'sparkles', 'xt-about-mini-svg'); ?></span>
                            </div>
                            <h3><?php echo esc_html($item['title']); ?></h3>
                        </div>
                        <p><?php echo esc_html($item['desc']); ?></p>
                        <div class="xt-about-service-more" aria-hidden="true">
                            <span class="xt-about-service-more-txt">Learn more</span>
                            <?php echo xtechs_pv_clone_icon('arrow-right', 'xt-about-more-svg'); ?>
                        </div>
                        <a class="xt-about-service-link" href="<?php echo esc_url($item['href']); ?>" aria-label="<?php echo esc_attr('Learn more: ' . $item['title']); ?>"></a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>

        <section class="xt-about-stats xt-reveal" data-reveal-delay="0" aria-label="Company stats" data-xt-about-stats>
            <?php foreach ($stats as $row) : ?>
                <div class="xt-about-stat">
                    <div class="xt-about-stat-ic" aria-hidden="true"><?php echo xtechs_pv_clone_icon($row['icon'], 'xt-about-stat-svg'); ?></div>
                    <p class="xt-about-stat-value">
                        <span class="xt-about-count" data-xt-about-count="<?php echo esc_attr((string) $row['value']); ?>">0</span>
                        <span class="xt-about-count-suffix"><?php echo esc_html($row['suffix']); ?></span>
                    </p>
                    <p class="xt-about-stat-label"><?php echo esc_html($row['label']); ?></p>
                    <div class="xt-about-stat-rule" aria-hidden="true"></div>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="xt-about-values">
            <h2 class="xt-reveal" data-reveal-delay="0">Our Values</h2>
            <div class="xt-about-values-grid xt-about-values-grid--top">
                <?php foreach (array_slice($values, 0, 4) as $v) : ?>
                    <article class="xt-about-value-card xt-reveal" data-reveal-delay="0">
                        <div class="xt-about-value-ic" aria-hidden="true"><?php echo xtechs_pv_clone_icon($v['icon'], 'xt-about-value-svg'); ?></div>
                        <h3><?php echo esc_html($v['title']); ?></h3>
                        <p><?php echo esc_html($v['desc']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="xt-about-values-grid xt-about-values-grid--bottom">
                <?php foreach (array_slice($values, 4) as $v) : ?>
                    <article class="xt-about-value-card xt-reveal" data-reveal-delay="0">
                        <div class="xt-about-value-ic" aria-hidden="true"><?php echo xtechs_pv_clone_icon($v['icon'], 'xt-about-value-svg'); ?></div>
                        <h3><?php echo esc_html($v['title']); ?></h3>
                        <p><?php echo esc_html($v['desc']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="xt-about-cta xt-reveal" data-reveal-delay="0">
            <div>
                <h2>Ready to plan a compliant, great-looking solar system?</h2>
                <p>Talk to our CEC-accredited team. We'll design, install and support.</p>
            </div>
            <a class="xt-btn xt-btn-primary xt-btn-lg" href="<?php echo esc_url(xtechs_page_link('contact')); ?>">Request a Quote</a>
        </section>
    </div>
</section>

<div class="xt-about-modal" hidden data-xt-about-modal role="dialog" aria-modal="true" aria-label="Full team photo">
    <div class="xt-about-modal-backdrop" data-xt-about-close></div>
    <div class="xt-about-modal-inner" role="document">
        <img class="xt-about-modal-img" src="<?php echo esc_url(get_template_directory_uri() . '/assets/media/team.png'); ?>" alt="xTechs Renewables team of accredited installers and electricians" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='<?php echo esc_js(get_template_directory_uri() . '/assets/media/coming-soon-hero.jpg'); ?>';" />
        <button class="xt-about-modal-close" type="button" data-xt-about-close>Close</button>
    </div>
</div>
