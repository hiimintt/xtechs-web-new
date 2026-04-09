<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Landing page content aligned with xtechs-website (Next.js) routes.
 *
 * @return array<string, array<string, mixed>>|null
 */
function xtechs_get_pv_landing_config(string $key): ?array {
    $base = [
        'residential' => [
            'hero_class' => 'xt-pv-hero--soft',
            'badge' => __('Residential', 'xtechs-renewables'),
            'title' => __('Smart, quiet power for your home', 'xtechs-renewables'),
            'lead' => __('Complete residential energy solutions from solar panels and battery storage to EV charging, electrical work, and home automation. Enjoy lower bills, backup power, and a sustainable future.', 'xtechs-renewables'),
            'benefits' => [
                [
                    'title' => __('CEC-accredited installers', 'xtechs-renewables'),
                    'text' => __('Clean Energy Council accredited and fully licensed team.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Premium products', 'xtechs-renewables'),
                    'text' => __('Tier-one solar panels and proven battery technologies.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Fast installation', 'xtechs-renewables'),
                    'text' => __('Most residential installs finish within 1–2 days.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Local support', 'xtechs-renewables'),
                    'text' => __('Victorian-based team for ongoing support and maintenance.', 'xtechs-renewables'),
                ],
            ],
            'section_title' => __('Residential services', 'xtechs-renewables'),
            'section_lead' => __('Everything you need for a modern home energy setup—clear specs, neat installs, and support after commissioning.', 'xtechs-renewables'),
            'bullets' => [
                __('Solar installation and supply sized for self-consumption first', 'xtechs-renewables'),
                __('Battery storage and backup for essential circuits', 'xtechs-renewables'),
                __('EV chargers integrated with your switchboard and solar', 'xtechs-renewables'),
                __('Electrical upgrades, switchboards, and compliance documentation', 'xtechs-renewables'),
            ],
            'json_name' => __('Residential Solar & Battery Solutions', 'xtechs-renewables'),
        ],
        'business' => [
            'hero_class' => 'xt-pv-hero--soft',
            'badge' => __('Business', 'xtechs-renewables'),
            'title' => __('Cut operating costs with onsite clean energy', 'xtechs-renewables'),
            'lead' => __('Generate onsite power to reduce daytime loads and peak charges. We right-size arrays and batteries for your load profile—with room to scale as you grow.', 'xtechs-renewables'),
            'benefits' => [
                [
                    'title' => __('CEC-accredited installers', 'xtechs-renewables'),
                    'text' => __('Commercial-grade workmanship and documentation.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Premium products', 'xtechs-renewables'),
                    'text' => __('Tier-one PV and proven C&I battery platforms.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Project delivery', 'xtechs-renewables'),
                    'text' => __('Typical commercial installs in the 3–5 day range (scope-dependent).', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Local support', 'xtechs-renewables'),
                    'text' => __('Monitoring, maintenance, and warranty coordination.', 'xtechs-renewables'),
                ],
            ],
            'section_title' => __('Business services', 'xtechs-renewables'),
            'section_lead' => __('Clear specs, professional installs, and ongoing support for modern business energy.', 'xtechs-renewables'),
            'bullets' => [
                __('Commercial solar arrays—roof or ground mount', 'xtechs-renewables'),
                __('Peak shaving and battery storage for demand management', 'xtechs-renewables'),
                __('Monitoring, reporting, and power quality focus', 'xtechs-renewables'),
                __('EV charging and electrical works coordinated with your facility', 'xtechs-renewables'),
            ],
            'json_name' => __('Business Solar & Battery Solutions', 'xtechs-renewables'),
        ],
        'off-grid' => [
            'hero_class' => 'xt-pv-hero--green',
            'badge' => __('Off-grid solutions', 'xtechs-renewables'),
            'title' => __('Reliable power—anywhere you need it', 'xtechs-renewables'),
            'lead' => __('Standalone systems that combine solar, storage, and a generator so essentials run day and night—quietly, efficiently, and with clear monitoring.', 'xtechs-renewables'),
            'benefits' => [
                [
                    'title' => __('Rugged components', 'xtechs-renewables'),
                    'text' => __('Hardware suited to harsh and remote environments.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Proven systems', 'xtechs-renewables'),
                    'text' => __('Hybrid solar + battery + genset designs with real-world performance.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Monitoring', 'xtechs-renewables'),
                    'text' => __('Remote visibility and alerts for system health.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Expert support', 'xtechs-renewables'),
                    'text' => __('Design and support for remote and regional sites.', 'xtechs-renewables'),
                ],
            ],
            'section_title' => __('Off-grid & hybrid', 'xtechs-renewables'),
            'section_lead' => __('Engineered autonomy for farms, remote homes, and critical loads.', 'xtechs-renewables'),
            'bullets' => [
                __('Solar + battery + generator hybrids', 'xtechs-renewables'),
                __('Load analysis and right-sizing for winter and poor weather', 'xtechs-renewables'),
                __('Robust enclosures and weather-hardening where required', 'xtechs-renewables'),
                __('Commissioning, training, and handover documentation', 'xtechs-renewables'),
            ],
            'json_name' => __('Off-Grid Solar & Battery Solutions', 'xtechs-renewables'),
        ],
        'builders' => [
            'hero_class' => 'xt-pv-hero--mint',
            'badge' => __('Builder solutions', 'xtechs-renewables'),
            'title' => __('Seamless integration during construction', 'xtechs-renewables'),
            'lead' => __('We coordinate pre-wire, rough-in, and install to match your build stages—so handover is clean, compliant, and client-ready.', 'xtechs-renewables'),
            'benefits' => [
                [
                    'title' => __('Construction coordination', 'xtechs-renewables'),
                    'text' => __('Aligned with your programme and other trades.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Standardised packages', 'xtechs-renewables'),
                    'text' => __('Repeatable specs and pricing for multi-lot rollouts.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Fast handover', 'xtechs-renewables'),
                    'text' => __('Compliant systems ready for client handover.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Builder support', 'xtechs-renewables'),
                    'text' => __('Support through defect liability and beyond.', 'xtechs-renewables'),
                ],
            ],
            'section_title' => __('For builders', 'xtechs-renewables'),
            'section_lead' => __('Pre-construction planning through final fit-off.', 'xtechs-renewables'),
            'bullets' => [
                __('Pre-wire and rough-in packages', 'xtechs-renewables'),
                __('Meter and main switchboard coordination', 'xtechs-renewables'),
                __('Export limits and distributor requirements handled', 'xtechs-renewables'),
                __('Compliance packs for handover', 'xtechs-renewables'),
            ],
            'json_name' => __('Solar & Battery for Builders', 'xtechs-renewables'),
        ],
        'battery' => [
            'hero_class' => 'xt-pv-hero--mint',
            'badge' => __('Energy storage', 'xtechs-renewables'),
            'title' => __('Battery storage for homes and businesses', 'xtechs-renewables'),
            'lead' => __('Tesla Powerwall, Alpha ESS, BYD, Sungrow, and other proven systems—with solar integration, backup where required, and smart monitoring.', 'xtechs-renewables'),
            'benefits' => [
                [
                    'title' => __('Energy independence', 'xtechs-renewables'),
                    'text' => __('Store solar by day, use it at night; reduce grid reliance.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Premium technology', 'xtechs-renewables'),
                    'text' => __('Leading brands suited to Australian conditions.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Backup power', 'xtechs-renewables'),
                    'text' => __('Keep essentials online during outages when configured for backup.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Smart management', 'xtechs-renewables'),
                    'text' => __('App control, monitoring, and efficient operation.', 'xtechs-renewables'),
                ],
            ],
            'section_title' => __('What we install', 'xtechs-renewables'),
            'section_lead' => __('AC- and DC-coupled options depending on your existing or new solar system.', 'xtechs-renewables'),
            'bullets' => [
                __('Retrofit batteries to many existing solar systems', 'xtechs-renewables'),
                __('Whole-home or partial backup designs', 'xtechs-renewables'),
                __('Commercial peak shaving and demand management', 'xtechs-renewables'),
                __('Warranty registration and manufacturer support', 'xtechs-renewables'),
            ],
            'json_name' => __('Battery Storage Solutions', 'xtechs-renewables'),
            'faqs' => [
                [
                    'q' => __('How long will my battery last during a blackout?', 'xtechs-renewables'),
                    'a' => __('Backup duration depends on capacity and usage. A Tesla Powerwall 3 can run essential loads for roughly 12–24 hours; larger stacks can extend that significantly.', 'xtechs-renewables'),
                ],
                [
                    'q' => __('Can I add a battery to my existing solar system?', 'xtechs-renewables'),
                    'a' => __('Often yes. We assess your inverter and switchboard, then recommend AC- or DC-coupled options that fit your site.', 'xtechs-renewables'),
                ],
                [
                    'q' => __('What is the difference between AC and DC coupled batteries?', 'xtechs-renewables'),
                    'a' => __('AC-coupled batteries work with most existing systems; DC-coupled can be more efficient but needs compatible hardware. We recommend the best fit for your case.', 'xtechs-renewables'),
                ],
                [
                    'q' => __('How much maintenance do batteries require?', 'xtechs-renewables'),
                    'a' => __('Modern lithium systems need little day-to-day care. We set up monitoring and can include health checks as part of support.', 'xtechs-renewables'),
                ],
            ],
        ],
        'ev-chargers' => [
            'hero_class' => 'xt-pv-hero--ev',
            'badge' => __('Electric vehicle charging', 'xtechs-renewables'),
            'title' => __('EV charger installation across Victoria', 'xtechs-renewables'),
            'lead' => __('Level 2 AC chargers, smart load management, and integration with solar and home energy—installed by licensed electricians.', 'xtechs-renewables'),
            'benefits' => [
                [
                    'title' => __('Fast charging', 'xtechs-renewables'),
                    'text' => __('Level 2 solutions for efficient daily charging at home or work.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Smart integration', 'xtechs-renewables'),
                    'text' => __('Coordinate charging with solar production where possible.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Professional installation', 'xtechs-renewables'),
                    'text' => __('Compliant circuits, RCD protection, and clear labeling.', 'xtechs-renewables'),
                ],
                [
                    'title' => __('Future-proof', 'xtechs-renewables'),
                    'text' => __('Scalable designs for growing EV use.', 'xtechs-renewables'),
                ],
            ],
            'section_title' => __('Services', 'xtechs-renewables'),
            'section_lead' => __('From single wall units to multi-bay workplace charging.', 'xtechs-renewables'),
            'bullets' => [
                __('Home wall connectors and universal chargers', 'xtechs-renewables'),
                __('Electrical upgrades when your switchboard needs more capacity', 'xtechs-renewables'),
                __('Solar-aware and tariff-aware charging strategies', 'xtechs-renewables'),
                __('Commercial and fleet-ready layouts', 'xtechs-renewables'),
            ],
            'json_name' => __('EV Charger Installation', 'xtechs-renewables'),
            'faqs' => [
                [
                    'q' => __('What is the difference between Level 1 and Level 2 chargers?', 'xtechs-renewables'),
                    'a' => __('Level 1 uses a standard outlet and is slow; Level 2 uses a dedicated circuit and is the usual choice for home and workplace daily charging.', 'xtechs-renewables'),
                ],
                [
                    'q' => __('Can I charge my EV with solar power?', 'xtechs-renewables'),
                    'a' => __('Yes. Smart chargers can prioritise solar hours so you use more of your own energy.', 'xtechs-renewables'),
                ],
                [
                    'q' => __('Do I need special electrical work?', 'xtechs-renewables'),
                    'a' => __('Level 2 requires a dedicated circuit; we assess your switchboard and complete any upgrades needed.', 'xtechs-renewables'),
                ],
                [
                    'q' => __('Which EV charger brands do you install?', 'xtechs-renewables'),
                    'a' => __('We work with leading options such as Tesla Wall Connector, myenergi Zappi, Wallbox, and others matched to your vehicle and supply.', 'xtechs-renewables'),
                ],
            ],
        ],
    ];

    return $base[$key] ?? null;
}
