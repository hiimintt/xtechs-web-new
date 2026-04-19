<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();

$locations = [
    [
        'title' => 'Melbourne CBD',
        'slug' => 'melbourne-cbd',
        'summary' => 'Urban-fit solar, battery, and EV charging solutions for apartments and commercial rooftops.',
        'highlights' => ['CBD and city-fringe coverage', 'Strata and commercial-ready workflows', 'Compliance-focused delivery'],
    ],
    [
        'title' => 'South-East Melbourne',
        'slug' => 'south-east-melbourne',
        'summary' => 'CEC-accredited systems tailored for homes and businesses across the south-east corridor.',
        'highlights' => ['Strong local suburb coverage', 'Battery-ready designs', 'DNSP and metering support'],
    ],
    [
        'title' => 'Geelong',
        'slug' => 'geelong',
        'summary' => 'Coastal and regional energy systems for homes and businesses.',
        'highlights' => ['Bellarine and Surf Coast support', 'Home + business solar systems', 'Battery and EV charger integration'],
    ],
    [
        'title' => 'Bendigo',
        'slug' => 'bendigo',
        'summary' => 'High-performance systems designed for inland climate conditions.',
        'highlights' => ['Regional property expertise', 'Off-grid and hybrid system options', 'Commercial-ready installations'],
    ],
    [
        'title' => 'Mornington Peninsula',
        'slug' => 'mornington-peninsula',
        'summary' => 'Salt-air ready and holiday-home friendly clean energy solutions.',
        'highlights' => ['Coastal installation best practice', 'Primary + holiday home projects', 'Maintenance-friendly system design'],
    ],
];
?>
<section class="xt-locations-page">
    <div class="xt-container xt-locations-inner">
        <header class="xt-locations-head">
            <h1><?php esc_html_e('Locations We Service', 'xtechs-renewables'); ?></h1>
            <p><?php esc_html_e('xTechs Renewables supports residential and commercial projects across Victoria, with dedicated teams for major service regions.', 'xtechs-renewables'); ?></p>
            <p class="xt-locations-extra">
                <?php esc_html_e('We also travel regularly to high-growth corridors including Frankston, Knox and Boronia, Greater Dandenong, Wyndham and Werribee, Melton, Ballarat, and Sunbury. Request a site visit to confirm timing for your suburb.', 'xtechs-renewables'); ?>
            </p>
        </header>

        <div class="xt-locations-grid">
            <?php foreach ($locations as $location) : ?>
                <article class="xt-location-card">
                    <h2><?php echo esc_html($location['title']); ?></h2>
                    <p><?php echo esc_html($location['summary']); ?></p>
                    <ul>
                        <?php foreach ($location['highlights'] as $highlight) : ?>
                            <li><?php echo esc_html($highlight); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url(home_url('/' . $location['slug'])); ?>">
                        <?php esc_html_e('View location page', 'xtechs-renewables'); ?>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="xt-locations-cta">
            <h2><?php esc_html_e('Need a quote for your area?', 'xtechs-renewables'); ?></h2>
            <p><?php esc_html_e('Book a site assessment and our team will recommend the right system for your property and usage profile.', 'xtechs-renewables'); ?></p>
            <a class="xt-btn xt-btn-primary" href="<?php echo esc_url(home_url('/contact')); ?>">
                <?php esc_html_e('Book Site Assessment', 'xtechs-renewables'); ?>
            </a>
        </div>
    </div>
</section>
<?php
get_footer();
