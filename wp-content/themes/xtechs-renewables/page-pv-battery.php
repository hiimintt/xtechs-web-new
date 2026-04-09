<?php
/**
 * Hub: PV & Battery (slug: pv-battery).
 *
 * @package xtechs-renewables
 */

if (!defined('ABSPATH')) {
    exit;
}

add_action(
    'wp_head',
    static function () {
        global $post;
        if (!is_singular('page')) {
            return;
        }
        if (!$post instanceof WP_Post || $post->post_name !== 'pv-battery' || $post->post_parent) {
            return;
        }
        $home = home_url('/');
        $here = get_permalink($post);
        $breadcrumb = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => $home,
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'PV & Battery',
                    'item' => $here,
                ],
            ],
        ];
        $faq_entities = [
            ['Will a battery keep my lights on in a blackout?', 'Yes—when sized and configured for backup, essential circuits can keep running during an outage (lighting, refrigeration, comms). We\'ll confirm your essential loads and design accordingly.'],
            ['Can I add a battery later?', 'Often yes. Many inverters support staged upgrades. We\'ll size your solar and specify hardware that keeps the upgrade path clean.'],
            ['How much backup can I get?', 'Depends on battery capacity, inverter output, and your essential circuits. Typical homes back up lights, fridge, internet, and a few GPOs; heavy loads are optional.'],
            ['How fast is the installation?', 'Residential installs are commonly 1–2 days (site-dependent). Larger business/off-grid projects vary with scope and switchboard works.'],
            ['Do you handle export limits and approvals?', 'Yes—we coordinate with your local distributor, apply export caps where required, and set compliant limits in the inverter.'],
            ['What if my roof is complex?', 'We design around orientation, shading, and roof type (tile/metal/flat). If needed we use optimizers or adjust array layout.'],
            ['What maintenance is required?', 'Minimal. Online monitoring, occasional visual checks, and firmware updates. We provide guidance and can monitor systems under support plans.'],
            ['What happens if my system underperforms?', 'We review monitoring data, check for shading/faults, and perform diagnostics. Warranty processes are handled with manufacturers where applicable.'],
            ['Will firmware updates break anything?', 'Updates improve performance and safety. We schedule them appropriately and validate after major updates.'],
            ['Which brands do you carry?', 'Tier-one panels, reputable inverters, and proven batteries suited for Australian conditions. We\'ll recommend options that match your use-case and budget.'],
            ['How long are the warranties?', 'Panels typically 20–25 yrs product / 25–30 yrs performance, inverters ~10 yrs, batteries ~10 yrs (model-specific).'],
            ['Can I integrate an EV charger or heat pump later?', 'Yes—systems are designed to be compatible with EV charging and efficient hot-water solutions. We\'ll leave room in the design for future add-ons.'],
        ];
        $main_entity = [];
        foreach ($faq_entities as $row) {
            $main_entity[] = [
                '@type' => 'Question',
                'name' => $row[0],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $row[1],
                ],
            ];
        }
        $faq = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $main_entity,
        ];
        echo '<script type="application/ld+json">' . wp_json_encode($breadcrumb, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
        echo '<script type="application/ld+json">' . wp_json_encode($faq, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
    },
    20
);

get_header();
get_template_part('template-parts/pv/clone-hub');
get_footer();
