<?php
/**
 * Theme-level SEO (tasks 1–2, 6, 9, 13–14, 21–22, 29) + JSON-LD @graph. Keyword brief ❽: inc/seo-keyword-targets.php.
 * Skips duplicate tags when a major SEO plugin is active.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Optional wp-config.php overrides:
 *   define('XTECHS_GOOGLE_SITE_VERIFICATION', 'your-token');
 *   define('XTECHS_PUBLIC_SITE_URL', 'https://www.xtechsrenewables.com.au'); // force canonical base if WP URL differs
 */
if (!defined('XTECHS_ORG_LEGAL_NAME')) {
    define('XTECHS_ORG_LEGAL_NAME', 'xTechs Renewables');
}
if (!defined('XTECHS_ORG_STREET')) {
    define('XTECHS_ORG_STREET', '2 Corporate Ave');
}
if (!defined('XTECHS_ORG_LOCALITY')) {
    define('XTECHS_ORG_LOCALITY', 'Rowville');
}
if (!defined('XTECHS_ORG_REGION')) {
    define('XTECHS_ORG_REGION', 'VIC');
}
if (!defined('XTECHS_ORG_POSTAL')) {
    define('XTECHS_ORG_POSTAL', '3178');
}
if (!defined('XTECHS_ORG_LAT')) {
    define('XTECHS_ORG_LAT', '-37.916');
}
if (!defined('XTECHS_ORG_LNG')) {
    define('XTECHS_ORG_LNG', '145.239');
}
if (!defined('XTECHS_ORG_PHONE_E164')) {
    define('XTECHS_ORG_PHONE_E164', '+611300983247');
}
if (!defined('XTECHS_ORG_EMAIL')) {
    define('XTECHS_ORG_EMAIL', 'inquiries@xtechsrenewables.com.au');
}

/**
 * @return bool True if a plugin likely already outputs meta + schema.
 */
function xtechs_seo_plugin_active(): bool {
    static $active = null;
    if ($active !== null) {
        return $active;
    }
    $active = defined('WPSEO_VERSION')
        || defined('RANK_MATH_VERSION')
        || defined('AIOSEO_VERSION')
        || defined('SEOPRESS_VERSION')
        || class_exists('\TheSEOFramework\Load', false);

    return $active;
}

/**
 * Canonical site URL for absolute OG URLs (falls back to home_url).
 */
function xtechs_seo_public_base_url(): string {
    if (defined('XTECHS_PUBLIC_SITE_URL') && is_string(XTECHS_PUBLIC_SITE_URL) && XTECHS_PUBLIC_SITE_URL !== '') {
        return rtrim((string) XTECHS_PUBLIC_SITE_URL, '/');
    }
    return rtrim((string) home_url(), '/');
}

/**
 * Default meta description when the page has no excerpt and no custom field.
 */
function xtechs_seo_default_description(): string {
    return __(
        'Solar PV, batteries, EV chargers, off-grid solutions, and electrical by xTechs Renewables across Victoria. Builder-ready workflows and compliant installations.',
        'xtechs-renewables'
    );
}

/**
 * Hierarchical path for a page (e.g. pv-battery/residential). Used for SEO maps + breadcrumbs.
 */
function xtechs_seo_page_path(WP_Post $post): string {
    if ($post->post_type !== 'page') {
        return $post->post_name;
    }
    $slugs = [];
    $current = $post;
    while ($current instanceof WP_Post) {
        $slugs[] = $current->post_name;
        if ((int) $current->post_parent < 1) {
            break;
        }
        $current = get_post((int) $current->post_parent);
        if (!$current instanceof WP_Post) {
            break;
        }
    }
    $slugs = array_reverse($slugs);

    return implode('/', $slugs);
}

/**
 * Per-path meta descriptions (keyword mapping). Filter: xtechs_seo_description_map.
 *
 * @return array<string, string>
 */
function xtechs_seo_description_map(): array {
    $map = [
        'about' => __(
            'CEC-minded solar installer in Melbourne & Victoria — credentials, workmanship & how we deliver PV, battery & electrical projects. Meet xTechs Renewables — call 1300 983 247.',
            'xtechs-renewables'
        ),
        'contact' => __(
            'Request a solar, battery or EV charger quote from xTechs Renewables. Fast callbacks, Victorian installs, compliant documentation. Contact us today.',
            'xtechs-renewables'
        ),
        'pv-battery' => __(
            'Solar PV & battery solutions for Victorian homes & businesses — design, install & support by xTechs Renewables. Explore residential, commercial & off-grid.',
            'xtechs-renewables'
        ),
        'pv-battery/residential' => __(
            'Residential solar & battery installation in Melbourne & Victoria — quality gear, neat installs & rebates guidance. Get a tailored quote from xTechs Renewables.',
            'xtechs-renewables'
        ),
        'pv-battery/business' => __(
            'Commercial solar installation Victoria — rooftop & ground-mount PV to cut demand charges & carbon. Book a Melbourne & regional site assessment with xTechs Renewables.',
            'xtechs-renewables'
        ),
        'pv-battery/off-grid' => __(
            'Off-grid & hybrid solar-battery systems for Victoria — reliable power where the grid is weak or absent. Design & install by xTechs Renewables.',
            'xtechs-renewables'
        ),
        'pv-battery/builders' => __(
            'Solar & battery packages for Victorian builders — documentation, timelines & multi-lot workflows. Partner with xTechs Renewables on your next project.',
            'xtechs-renewables'
        ),
        'battery' => __(
            'Solar battery storage Melbourne & Victoria — Tesla Powerwall & tier-one options, safe installs & monitoring. Pair with PV or upgrade existing solar — quote xTechs Renewables.',
            'xtechs-renewables'
        ),
        'ev-chargers' => __(
            'EV charger installation Melbourne & Victoria — wall-mounted & smart chargers for homes & workplaces. Book a consult with xTechs Renewables today.',
            'xtechs-renewables'
        ),
        'solarfold' => __(
            'Portable solar container solutions in Australia — SolarFold rapid-deploy PV for defence, mining, events & communities. Mobile solar power by xTechs Renewables, Victoria.',
            'xtechs-renewables'
        ),
        'x-classes' => __(
            'X-Classes by xTechs Renewables — solar, storage & electrical training plus industry updates for installers & homeowners in Victoria.',
            'xtechs-renewables'
        ),
        'amber-electric' => __(
            'Amber Electric & VPP-ready setups with xTechs Renewables — smart solar & battery installs across Victoria. Learn how we work with Amber.',
            'xtechs-renewables'
        ),
        'local-business-partners' => __(
            'xTechs Local Business Partners — trusted solar & battery offers for Victorian customers via local retailers. See partner benefits & how to join.',
            'xtechs-renewables'
        ),
        'privacy' => __(
            'Privacy policy for xTechs Renewables — how we collect, use & protect your data when you browse or contact us in Victoria, Australia.',
            'xtechs-renewables'
        ),
        'cookies' => __(
            'Cookie policy for xTechs Renewables — which cookies we use, how to manage consent & links to privacy information.',
            'xtechs-renewables'
        ),
        'terms' => __(
            'Terms of service for xTechs Renewables website & enquiries — conditions for using our site and requesting quotes in Victoria.',
            'xtechs-renewables'
        ),
    ];

    return apply_filters('xtechs_seo_description_map', $map);
}

function xtechs_seo_meta_description_for_request(): string {
    if (is_singular()) {
        global $post;
        if ($post instanceof WP_Post) {
            $custom = get_post_meta((int) $post->ID, '_xtechs_meta_description', true);
            if (is_string($custom) && $custom !== '') {
                return wp_strip_all_tags($custom);
            }
            if (has_excerpt($post)) {
                return wp_strip_all_tags(get_the_excerpt($post));
            }
            $map = xtechs_seo_description_map();
            $path = $post->post_type === 'page' ? xtechs_seo_page_path($post) : $post->post_name;
            if (isset($map[$path])) {
                return $map[$path];
            }
            if (isset($map[$post->post_name])) {
                return $map[$post->post_name];
            }
        }
    }
    if (is_front_page()) {
        return __(
            'Melbourne solar installers — solar panel & battery storage, EV chargers & off-grid systems across Victoria. STC & rebate guidance. Get a quote from xTechs Renewables.',
            'xtechs-renewables'
        );
    }
    return xtechs_seo_default_description();
}

function xtechs_seo_og_title_for_request(): string {
    if (is_front_page()) {
        return wp_get_document_title();
    }
    if (is_singular()) {
        return wp_get_document_title();
    }
    if (is_post_type_archive()) {
        return wp_get_document_title();
    }
    return wp_get_document_title();
}

function xtechs_seo_og_image_url(): string {
    $dir = get_template_directory();
    $uri = get_template_directory_uri();
    if (file_exists($dir . '/assets/media/og.jpg')) {
        return $uri . '/assets/media/og.jpg';
    }
    return $uri . '/assets/media/xlogo.png';
}

/**
 * Absolute URLs for logo / social image used in JSON-LD.
 *
 * @return array{base: string, logo: string, image: string}
 */
function xtechs_seo_schema_brand_urls(): array {
    $base = xtechs_seo_public_base_url();
    $logo = get_template_directory_uri() . '/assets/media/xlogo.png';
    $image = xtechs_seo_og_image_url();
    if (strpos($image, 'http') !== 0) {
        $image = $base . (str_starts_with($image, '/') ? '' : '/') . $image;
    }
    if (strpos($logo, 'http') !== 0) {
        $logo = $base . (str_starts_with($logo, '/') ? '' : '/') . $logo;
    }

    return ['base' => $base, 'logo' => $logo, 'image' => $image];
}

/**
 * @return array<int, string>
 */
function xtechs_seo_schema_same_as(): array {
    return [
        'https://www.instagram.com/xtechsrenewables',
        'https://www.linkedin.com/company/xtechs-renewables',
        'https://www.facebook.com/xtechsrenewables',
        'https://www.youtube.com/@xtechsrenewables',
    ];
}

/**
 * Organization (brand / legal entity reference for Knowledge Graph-style signals).
 *
 * @return array<string, mixed>
 */
function xtechs_seo_schema_organization(array $urls): array {
    return [
        '@type' => 'Organization',
        '@id' => $urls['base'] . '/#organization',
        'name' => XTECHS_ORG_LEGAL_NAME,
        'url' => $urls['base'] . '/',
        'logo' => ['@id' => $urls['base'] . '/#logo'],
        'image' => $urls['image'],
        'email' => XTECHS_ORG_EMAIL,
        'telephone' => XTECHS_ORG_PHONE_E164,
        'sameAs' => xtechs_seo_schema_same_as(),
    ];
}

/**
 * Standalone ImageObject for logo @id reference.
 *
 * @return array<string, mixed>
 */
function xtechs_seo_schema_logo_object(array $urls): array {
    return [
        '@type' => 'ImageObject',
        '@id' => $urls['base'] . '/#logo',
        'url' => $urls['logo'],
        'caption' => XTECHS_ORG_LEGAL_NAME,
    ];
}

/**
 * LocalBusiness (NAP, geo, catalog) linked to Organization.
 *
 * @return array<string, mixed>
 */
function xtechs_seo_schema_local_business(array $urls): array {
    return [
        '@type' => 'LocalBusiness',
        '@id' => $urls['base'] . '/#localbusiness',
        'name' => XTECHS_ORG_LEGAL_NAME,
        'parentOrganization' => ['@id' => $urls['base'] . '/#organization'],
        'url' => $urls['base'] . '/',
        'image' => $urls['image'],
        'description' => xtechs_seo_default_description(),
        'sameAs' => xtechs_seo_schema_same_as(),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => XTECHS_ORG_STREET,
            'addressLocality' => XTECHS_ORG_LOCALITY,
            'addressRegion' => XTECHS_ORG_REGION,
            'postalCode' => XTECHS_ORG_POSTAL,
            'addressCountry' => 'AU',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => (string) XTECHS_ORG_LAT,
            'longitude' => (string) XTECHS_ORG_LNG,
        ],
        'contactPoint' => [
            [
                '@type' => 'ContactPoint',
                'contactType' => 'customer support',
                'email' => XTECHS_ORG_EMAIL,
                'telephone' => XTECHS_ORG_PHONE_E164,
                'areaServed' => 'AU',
                'availableLanguage' => 'English',
            ],
        ],
        'openingHours' => 'Mo-Fr 08:00-17:00',
        'priceRange' => '$$',
        'serviceArea' => [
            '@type' => 'GeoCircle',
            'geoMidpoint' => [
                '@type' => 'GeoCoordinates',
                'latitude' => (string) XTECHS_ORG_LAT,
                'longitude' => (string) XTECHS_ORG_LNG,
            ],
            'geoRadius' => 100000,
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => __('Solar and Battery Services', 'xtechs-renewables'),
            'itemListElement' => [
                [
                    '@type' => 'Offer',
                    'itemOffered' => ['@id' => $urls['base'] . '/#service-residential-solar'],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => ['@id' => $urls['base'] . '/#service-commercial-solar'],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => ['@id' => $urls['base'] . '/#service-battery'],
                ],
                [
                    '@type' => 'Offer',
                    'itemOffered' => ['@id' => $urls['base'] . '/#service-ev-charger'],
                ],
            ],
        ],
    ];
}

/**
 * WebSite + sitelinks search box (optional, uses WP core search).
 *
 * @return array<string, mixed>
 */
function xtechs_seo_schema_website(array $urls): array {
    $search = $urls['base'] . '/?s={search_term_string}';

    return [
        '@type' => 'WebSite',
        '@id' => $urls['base'] . '/#website',
        'url' => $urls['base'] . '/',
        'name' => XTECHS_ORG_LEGAL_NAME,
        'description' => xtechs_seo_default_description(),
        'publisher' => ['@id' => $urls['base'] . '/#organization'],
        'inLanguage' => 'en-AU',
        'potentialAction' => [
            '@type' => 'SearchAction',
            'target' => [
                '@type' => 'EntryPoint',
                'urlTemplate' => $search,
            ],
            'query-input' => 'required name=search_term_string',
        ],
    ];
}

/**
 * Explicit Service nodes (task list: Service schema in addition to catalog).
 *
 * @return list<array<string, mixed>>
 */
function xtechs_seo_schema_service_nodes(array $urls): array {
    $area = [
        '@type' => 'AdministrativeArea',
        'name' => 'Victoria',
        'containedInPlace' => [
            '@type' => 'Country',
            'name' => 'Australia',
        ],
    ];
    $provider = ['@id' => $urls['base'] . '/#localbusiness'];

    return [
        [
            '@type' => 'Service',
            '@id' => $urls['base'] . '/#service-residential-solar',
            'name' => __('Residential Solar Installation', 'xtechs-renewables'),
            'description' => __('Solar panel installation for Victorian homes', 'xtechs-renewables'),
            'provider' => $provider,
            'areaServed' => $area,
            'serviceType' => 'Solar energy system installation',
        ],
        [
            '@type' => 'Service',
            '@id' => $urls['base'] . '/#service-commercial-solar',
            'name' => __('Commercial Solar Installation', 'xtechs-renewables'),
            'description' => __('Large-scale solar systems for businesses', 'xtechs-renewables'),
            'provider' => $provider,
            'areaServed' => $area,
            'serviceType' => 'Commercial solar installation',
        ],
        [
            '@type' => 'Service',
            '@id' => $urls['base'] . '/#service-battery',
            'name' => __('Battery Storage Installation', 'xtechs-renewables'),
            'description' => __('Home and business battery storage systems', 'xtechs-renewables'),
            'provider' => $provider,
            'areaServed' => $area,
            'serviceType' => 'Battery storage installation',
        ],
        [
            '@type' => 'Service',
            '@id' => $urls['base'] . '/#service-ev-charger',
            'name' => __('EV Charger Installation', 'xtechs-renewables'),
            'description' => __('Electric vehicle charging station installation', 'xtechs-renewables'),
            'provider' => $provider,
            'areaServed' => $area,
            'serviceType' => 'Electric vehicle charging station installation',
        ],
    ];
}

/**
 * Review nodes matching visible home testimonials (What Our Customers Say).
 *
 * @return list<array<string, mixed>>
 */
function xtechs_seo_schema_review_nodes(array $urls): array {
    if (!is_front_page() || !function_exists('xtechs_home_static_reviews')) {
        return [];
    }
    $reviews = xtechs_home_static_reviews();
    if (!is_array($reviews) || $reviews === []) {
        return [];
    }
    $out = [];
    foreach ($reviews as $i => $r) {
        if (!is_array($r) || !isset($r['text'], $r['author_name'])) {
            continue;
        }
        $text = wp_strip_all_tags((string) $r['text']);
        $author = wp_strip_all_tags((string) $r['author_name']);
        if ($text === '' || $author === '') {
            continue;
        }
        $node = [
            '@type' => 'Review',
            '@id' => $urls['base'] . '/#review-' . (int) $i,
            'itemReviewed' => ['@id' => $urls['base'] . '/#localbusiness'],
            'author' => [
                '@type' => 'Person',
                'name' => $author,
            ],
            'reviewBody' => $text,
            'inLanguage' => 'en-AU',
        ];
        // Home template shows five stars per card; align structured data with visible UI.
        $node['reviewRating'] = [
            '@type' => 'Rating',
            'ratingValue' => 5,
            'bestRating' => 5,
            'worstRating' => 1,
        ];
        $out[] = $node;
    }

    return $out;
}

/**
 * Single JSON-LD @graph: Organization, LocalBusiness, WebSite, Service[], Review[] (home only).
 *
 * @return array<string, mixed>
 */
function xtechs_seo_main_schema_graph(): array {
    $urls = xtechs_seo_schema_brand_urls();
    $graph = [
        xtechs_seo_schema_logo_object($urls),
        xtechs_seo_schema_organization($urls),
        xtechs_seo_schema_local_business($urls),
        xtechs_seo_schema_website($urls),
    ];
    foreach (xtechs_seo_schema_service_nodes($urls) as $svc) {
        $graph[] = $svc;
    }
    foreach (xtechs_seo_schema_review_nodes($urls) as $rev) {
        $graph[] = $rev;
    }

    $filtered = apply_filters('xtechs_schema_graph', $graph, $urls);
    if (is_array($filtered)) {
        $graph = $filtered;
    }

    return [
        '@context' => 'https://schema.org',
        '@graph' => array_values($graph),
    ];
}

/**
 * @return list<array{0: string, 1: string}> Pairs of name, absolute URL.
 */
function xtechs_seo_breadcrumb_trail(): array {
    if (is_front_page()) {
        return [];
    }
    $base = xtechs_seo_public_base_url();
    $trail = [];
    $trail[] = [__('Home', 'xtechs-renewables'), $base . '/'];

    if (is_singular()) {
        global $post;
        if (!$post instanceof WP_Post) {
            return $trail;
        }
        if ($post->post_type === 'page' && $post->post_parent) {
            $ancestors = array_reverse(get_post_ancestors($post));
            foreach ($ancestors as $aid) {
                $ap = get_post($aid);
                if ($ap instanceof WP_Post) {
                    $trail[] = [wp_strip_all_tags(get_the_title($ap)), get_permalink($ap)];
                }
            }
        }
        $trail[] = [wp_strip_all_tags(get_the_title($post)), get_permalink($post)];

        return $trail;
    }

    if (is_post_type_archive()) {
        $pto = get_queried_object();
        if ($pto instanceof WP_Post_Type) {
            $url = get_post_type_archive_link($pto->name);
            if (is_string($url) && $url !== '') {
                $trail[] = [wp_strip_all_tags($pto->labels->name), $url];
            }
        }

        return $trail;
    }

    if (is_category() || is_tag() || is_tax()) {
        $term = get_queried_object();
        if ($term instanceof WP_Term) {
            $trail[] = [wp_strip_all_tags($term->name), get_term_link($term)];
        }

        return $trail;
    }

    return [];
}

function xtechs_seo_print_breadcrumb_jsonld(): void {
    if (is_front_page()) {
        return;
    }
    $trail = xtechs_seo_breadcrumb_trail();
    if ($trail === [] || count($trail) < 2) {
        return;
    }
    $elements = [];
    $pos = 1;
    foreach ($trail as $pair) {
        $elements[] = [
            '@type' => 'ListItem',
            'position' => $pos,
            'name' => $pair[0],
            'item' => $pair[1],
        ];
        $pos++;
    }
    $data = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $elements,
    ];
    echo '<script type="application/ld+json">' . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}

add_filter('document_title_separator', static function (string $sep): string {
    if (xtechs_seo_plugin_active()) {
        return $sep;
    }

    return '|';
});

add_action('wp_head', static function (): void {
    if (is_feed() || is_embed() || is_customize_preview()) {
        return;
    }
    if (xtechs_seo_plugin_active()) {
        return;
    }
    if (function_exists('xtechs_is_x_vrthing_request') && xtechs_is_x_vrthing_request()) {
        return;
    }

    $desc = xtechs_seo_meta_description_for_request();
    if (strlen($desc) > 160) {
        $desc = function_exists('mb_substr') ? mb_substr($desc, 0, 157) . '…' : substr($desc, 0, 157) . '…';
    }
    echo '<meta name="description" content="' . esc_attr($desc) . '" />' . "\n";

    if (function_exists('xtechs_seo_meta_keywords_for_request')) {
        $keywords = xtechs_seo_meta_keywords_for_request();
        $keywords = array_slice($keywords, 0, 16);
        echo '<meta name="keywords" content="' . esc_attr(implode(', ', $keywords)) . '" />' . "\n";
    }

    if (defined('XTECHS_GOOGLE_SITE_VERIFICATION') && is_string(XTECHS_GOOGLE_SITE_VERIFICATION) && XTECHS_GOOGLE_SITE_VERIFICATION !== '') {
        echo '<meta name="google-site-verification" content="' . esc_attr(XTECHS_GOOGLE_SITE_VERIFICATION) . '" />' . "\n";
    }

    $canonical = wp_get_canonical_url();
    $og_title = xtechs_seo_og_title_for_request();
    $og_desc = $desc;
    $og_url = is_string($canonical) && $canonical !== '' ? $canonical : xtechs_seo_public_base_url() . '/';
    $og_image = xtechs_seo_og_image_url();
    if (strpos($og_image, 'http') !== 0) {
        $og_image = xtechs_seo_public_base_url() . (str_starts_with($og_image, '/') ? '' : '/') . $og_image;
    }

    echo '<meta property="og:type" content="website" />' . "\n";
    echo '<meta property="og:site_name" content="xTechs Renewables" />' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($og_title) . '" />' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og_desc) . '" />' . "\n";
    echo '<meta property="og:url" content="' . esc_url($og_url) . '" />' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '" />' . "\n";
    echo '<meta property="og:locale" content="en_AU" />' . "\n";

    echo '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    echo '<meta name="twitter:creator" content="@xtechsrenewables" />' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($og_title) . '" />' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($og_desc) . '" />' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($og_image) . '" />' . "\n";
}, 6);

add_action('wp_head', static function (): void {
    if (is_feed() || is_embed() || is_customize_preview()) {
        return;
    }
    if (xtechs_seo_plugin_active()) {
        return;
    }
    $data = xtechs_seo_main_schema_graph();
    echo '<script type="application/ld+json" id="xtechs-schema-graph">' . wp_json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    xtechs_seo_print_breadcrumb_jsonld();
}, 12);

/**
 * x-vrthing: always noindex (runs late so SEO plugins cannot override).
 */
add_filter('wp_robots', static function (array $robots): array {
    if (function_exists('xtechs_is_x_vrthing_request') && xtechs_is_x_vrthing_request()) {
        return [
            'noindex' => true,
            'nofollow' => true,
        ];
    }

    return $robots;
}, 9999);

/**
 * Default robots for public pages when nothing else sets noindex.
 */
add_filter('wp_robots', static function (array $robots): array {
    if (function_exists('xtechs_is_x_vrthing_request') && xtechs_is_x_vrthing_request()) {
        return $robots;
    }
    if (isset($robots['noindex']) && $robots['noindex']) {
        return $robots;
    }
    $robots['index'] = true;
    $robots['follow'] = true;
    $robots['max-image-preview'] = 'large';

    return $robots;
}, 20);

/**
 * robots.txt: ensure sitemap URL is present (WordPress core usually adds wp-sitemap.xml).
 */
add_filter('robots_txt', static function (string $output, bool $public): string {
    if (!$public) {
        return $output;
    }
    $sitemap = esc_url_raw(home_url('/wp-sitemap.xml'));
    if (strpos($output, 'Sitemap:') === false) {
        $output .= "\nSitemap: {$sitemap}\n";
    }

    return $output;
}, 10, 2);

/**
 * Omit author/user URLs from the core XML sitemap (privacy + little SEO value for this site).
 *
 * @param \WP_Sitemaps_Provider|false $provider Core provider instance.
 * @param string                      $name     Provider key: posts, taxonomies, users.
 * @return \WP_Sitemaps_Provider|false
 */
add_filter('wp_sitemaps_add_provider', static function ($provider, string $name) {
    if ($name === 'users') {
        return false;
    }

    return $provider;
}, 10, 2);
