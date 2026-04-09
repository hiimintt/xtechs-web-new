<?php
if (!defined('ABSPATH')) {
    exit;
}

$products = [
    [
        'slug' => 'solarfold',
        'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
        'tagline' => 'Redeployable 130 kWp solar plant in a 20&#8242; ISO High Cube container',
        'points' => [
            'Pre-assembled / pre-wired - plug &amp; play',
            '130 kWp in compact 20&#8242; ISO container',
            'Quick fold / unfold; redeployable',
        ],
        'image' => '/assets/media/products/solarfold/1.jpg',
        'cta' => 'Explore SolarFold',
    ],
    [
        'slug' => 'mobil-grid',
        'title' => 'Mobil-Grid&reg; Solar Container',
        'tagline' => 'Semi-mobile PV plant - fast to deploy, 6 months to 10 years projects',
        'points' => [
            'ISO, CSC-approved container with pre-wired PV',
            'Up to 72 kWp in 20&#8242; on-grid; up to 54 kWp / 91 kWh off-grid',
            'Integrated, insulated technical room',
        ],
        'image' => '/assets/media/products/mobil-grid/1.jpg',
        'cta' => 'Explore Mobil-Grid',
    ],
    [
        'slug' => 'solar-hybrid-box',
        'title' => 'Solar Hybrid Box&reg;',
        'tagline' => 'Energy conversion &amp; storage - from 3.5 to 180 kVA, 14.4 to 520 kWh',
        'points' => [
            'Plug-and-Play hybrid power cabinets &amp; containers',
            'Integrate PV, batteries, grid, and genset',
            'Remote supervision, scalable and mobile',
        ],
        'image' => '/assets/media/products/solar-hybrid-box/1.jpg',
        'cta' => 'Explore Solar Hybrid Box',
    ],
];

$applications = [
    ['title' => 'Mining &amp; Remote Camps', 'blurb' => 'Clean, quiet power for exploration and camps.'],
    ['title' => 'Disaster Relief &amp; Emergency', 'blurb' => 'Rapid deployment where grid is down.'],
    ['title' => 'Defense &amp; Field Ops', 'blurb' => 'Ruggedized systems for mobile operations.'],
    ['title' => 'Construction Sites', 'blurb' => 'Temporary power with lower OPEX than diesel.'],
    ['title' => 'Events &amp; Festivals', 'blurb' => 'Silent power for stages, lighting and vendors.'],
    ['title' => 'Telecom &amp; Off-Grid Assets', 'blurb' => 'Primary/backup power for towers and huts.'],
];
?>
<?php
$hero_img_rel = '/assets/media/solarfold-hero.jpg';
$hero_img_abs = get_template_directory() . $hero_img_rel;
$hero_img_url = get_template_directory_uri() . $hero_img_rel;
$hero_has_image = file_exists($hero_img_abs);
?>
<section class="xt-sf-hero-main">
    <div class="xt-sf-hero-main-grid">
        <div class="xt-sf-hero-media<?php echo $hero_has_image ? '' : ' xt-sf-hero-media-fallback'; ?>">
            <?php if ($hero_has_image) : ?>
                <img src="<?php echo esc_url($hero_img_url); ?>" alt="SolarFold rapid-deploy solar array" />
            <?php endif; ?>
        </div>
        <div class="xt-sf-hero-content">
            <p class="xt-sf-pill">Off-Grid &amp; Rapid-Deploy Power</p>
            <h1 class="xt-sf-h1">SolarFold by xTechs</h1>
            <p class="xt-sf-hsub">Hero 130KW deployed within few hours which usually takes weeks, sometime even months.</p>
            <p class="xt-sf-lead">
                Fold-out solar arrays, portable hybrid grids, and containerized BESS - engineered for remote, emergency, and mobile operations.
                Built for demanding environments where grid power is unavailable, unreliable, or too costly.
            </p>
            <div class="xt-sf-feature-row">
                <div class="xt-sf-feature">
                    <span class="xt-sf-feature-ic" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="M12 7v5l3 2"></path>
                        </svg>
                    </span>
                    <span class="xt-sf-feature-txt">
                        <strong>Rapid Deployment</strong>
                        <span>Set up in minutes, not hours</span>
                    </span>
                </div>
                <div class="xt-sf-feature">
                    <span class="xt-sf-feature-ic" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"></path>
                        </svg>
                    </span>
                    <span class="xt-sf-feature-txt">
                        <strong>Rugged Design</strong>
                        <span>Built for harsh environments</span>
                    </span>
                </div>
                <div class="xt-sf-feature">
                    <span class="xt-sf-feature-ic" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M13 2L4 14h6l-1 8 9-12h-6l1-8z"></path>
                        </svg>
                    </span>
                    <span class="xt-sf-feature-txt">
                        <strong>High Output</strong>
                        <span>Maximum power generation</span>
                    </span>
                </div>
            </div>
            <div class="xt-sf-info-grid">
                <div class="xt-sf-info-box">
                    <h3>What you can deploy</h3>
                    <ul>
                        <li>Fold-out PV arrays from 5 kW to 100+ kW</li>
                        <li>Portable hybrid grids (PV + battery + genset ready)</li>
                        <li>Containerized BESS with smart EMS</li>
                        <li>Plug-and-play AC distribution and protection</li>
                    </ul>
                </div>
                <div class="xt-sf-info-box">
                    <h3>Delivered with our partner</h3>
                    <p>
                        Developed in collaboration with <strong>EcoSun Innovations</strong>. xTechs holds
                        <strong> exclusive installation rights across Australia</strong>, ensuring factory-backed engineering,
                        compliant installation, and national support.
                    </p>
                    <div class="xt-sf-badge-row">
                        <span class="xt-sf-badge">EcoSun Innovations Partner</span>
                        <span class="xt-sf-badge xt-sf-badge-accent">Exclusive AU Installer</span>
                    </div>
                </div>
            </div>
            <div class="xt-sf-btn-row xt-sf-btn-row-left">
                <a class="xt-btn xt-btn-primary" href="#products">Explore Products</a>
                <a class="xt-btn xt-btn-outline" href="#applications">See Applications</a>
            </div>
            <div class="xt-sf-trust-row">
                <span><i class="xt-sf-dot xt-sf-dot-green"></i>Military Grade</span>
                <span><i class="xt-sf-dot xt-sf-dot-blue"></i>Weather Resistant</span>
                <span><i class="xt-sf-dot xt-sf-dot-purple"></i>Modular Design</span>
            </div>
        </div>
    </div>
</section>

<section class="xt-sf-section xt-sf-section-muted" id="products">
    <div class="xt-container xt-sf-shell">
        <div class="xt-sf-head">
            <h2>Flagship Systems</h2>
            <p>Three hero products to cover rapid deployment, hybrid portability, and utility storage.</p>
        </div>
        <div class="xt-sf-grid-3">
            <?php foreach ($products as $index => $product) : ?>
                <article class="xt-sf-card">
                    <p class="xt-sf-card-type"><?php echo esc_html($index === 0 ? 'Flagship' : 'Variant'); ?></p>
                    <h3><?php echo esc_html($product['title']); ?></h3>
                    <p class="xt-sf-card-tagline"><?php echo esc_html($product['tagline']); ?></p>
                    <?php
                    $image_rel = (string) $product['image'];
                    $image_abs = get_template_directory() . $image_rel;
                    $image_url = get_template_directory_uri() . $image_rel;
                    ?>
                    <div class="xt-sf-card-image">
                        <?php if (file_exists($image_abs)) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(wp_strip_all_tags($product['title'])); ?>" />
                        <?php else : ?>
                            <div class="xt-sf-card-image-ph"></div>
                        <?php endif; ?>
                    </div>
                    <ul>
                        <?php foreach ($product['points'] as $point) : ?>
                            <li><?php echo wp_kses_post($point); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="xt-btn xt-btn-primary xt-btn-block" href="<?php echo esc_url(home_url('/solarfold/' . $product['slug'])); ?>">
                        <?php echo esc_html($product['cta']); ?>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="xt-sf-section" id="applications">
    <div class="xt-container xt-sf-shell">
        <div class="xt-sf-head">
            <h2>Applications</h2>
            <p>Built for demanding environments where grid power is unavailable, unreliable, or too costly.</p>
        </div>
        <div class="xt-sf-grid-3">
            <?php foreach ($applications as $item) : ?>
                <article class="xt-sf-mini-card">
                    <h3><?php echo wp_kses_post($item['title']); ?></h3>
                    <p><?php echo esc_html($item['blurb']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="xt-sf-center">
            <a class="xt-btn xt-btn-primary xt-btn-lg" href="https://calendly.com/inquiries-xtechsrenewables/30min" target="_blank" rel="noopener noreferrer">
                Book Consultation &#8594;
            </a>
        </div>
    </div>
</section>
