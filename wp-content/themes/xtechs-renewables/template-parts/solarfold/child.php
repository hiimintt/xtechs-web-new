<?php
if (!defined('ABSPATH')) {
    exit;
}

$key = (string) get_query_var('xt_solarfold_key', '');

$product_pages = [
    'solarfold' => [
        'hero_vh' => '70',
        'hero_image' => '/assets/media/solarfold-hero.jpg',
        'hero_image_alt' => 'SolarFold 130 kWp redeployable solar solution',
        'eyebrow' => 'SolarFold',
        'title' => 'Mobil‑Grid® 500+ — 130 kWp redeployable solar',
        'lead' => 'A pre‑wired, plug‑and‑play solar plant packaged in a 20′ ISO High Cube container. Designed for intermediate projects (1–5 years), fast deployment and rapid redeployment.',
        'buttons' => [
            ['label' => 'View Specifications', 'href' => '#specs', 'variant' => 'primary'],
            ['label' => 'Key Highlights', 'href' => '#highlights', 'variant' => 'outline'],
        ],
        'highlights_heading' => 'Key Highlights',
        'highlights_sub' => 'Engineered for rapid deployment, scalability and reliable operation across demanding environments.',
        'highlights' => [
            [
                'title' => 'Plug‑and‑Play Plant',
                'text' => 'Factory pre‑assembled and pre‑wired for fast site mobilization — crane down the 20′ module, make utility connections and begin generating.',
            ],
            [
                'title' => '130 kWp in 20′ ISO',
                'text' => 'Very high specific capacity packaged in a CSC‑certified High Cube container for easy logistics, shipping and compliance.',
            ],
            [
                'title' => 'Scale to Multi‑MW',
                'text' => 'Interconnectable containers allow you to grow capacity in repeatable blocks and standardize deployment across projects.',
            ],
            [
                'title' => 'Rapid Fold / Unfold',
                'text' => 'Designed for quick set‑up and redeployment; motorized option performs unfolding/refolding in less than one hour.',
            ],
            [
                'title' => 'On‑Grid or Off‑Grid',
                'text' => 'Operate for self‑consumption on‑grid or pair with storage for autonomous hybrid systems at remote sites.',
            ],
            [
                'title' => 'Light‑Touch Permitting',
                'text' => 'Ground‑mounted, temporary installation that typically avoids major construction permits, helping compress project timelines.',
            ],
        ],
        'gallery' => [
            ['/assets/media/products/solarfold/1.jpg', 'SolarFold — container view'],
            ['/assets/media/products/solarfold/2.jpg', 'SolarFold — deployed angle'],
            ['/assets/media/products/solarfold/3.jpg', 'SolarFold — field deployment'],
            ['/assets/media/products/solarfold/4.jpg', 'SolarFold — detail'],
        ],
        'specs' => [
            ['k' => 'Total power', 'v' => '130 kWp'],
            ['k' => 'Container', 'v' => '20′ ISO High Cube (CSC certified)'],
            ['k' => 'Deployed length', 'v' => '125 m'],
            ['k' => 'Deployed width', 'v' => '6 m'],
            ['k' => 'Deployed height', 'v' => '0.5 m'],
            ['k' => 'Weight (incl. PV & inverters)', 'v' => '≈ 13.5 t'],
        ],
        'footprint' => [
            'title' => 'Deployment Footprint',
            'bullets' => [
                'Length ≈ 125 m',
                'Width ≈ 6 m',
                'Height ≈ 0.5 m',
            ],
            'note' => 'Suitable for intermediate project durations (1–5 years) and sites requiring fast installation and potential redeployment.',
        ],
        'cta_title' => 'Ready to scope your SolarFold deployment?',
        'cta_body' => 'Talk to our engineering team about timelines, sites and storage options. We provide design, installation and national support as an exclusive partner.',
    ],
    'mobil-grid' => [
        'hero_vh' => '60',
        'hero_image' => '/assets/media/products/mobil-grid/1.jpg',
        'hero_image_alt' => 'Mobil‑Grid® solar container',
        'eyebrow' => 'Mobil‑Grid®',
        'title' => 'Semi‑mobile solar container',
        'lead' => 'Ideal for 6 months to 10 years projects. Extremely easy to deploy and link, with integrated technical room and optional storage.',
        'buttons' => [
            ['label' => 'Key Highlights', 'href' => '#highlights', 'variant' => 'primary'],
            ['label' => 'Gallery', 'href' => '#gallery', 'variant' => 'outline'],
        ],
        'highlights_heading' => 'Key Highlights',
        'highlights_sub' => 'Deploy quickly, scale easily, and operate reliably with an integrated plant room.',
        'highlights' => [
            [
                'title' => 'ISO/CSC Container',
                'text' => 'Standard maritime container integrating a pre‑wired photovoltaic plant, with insulated and air‑conditioned technical room.',
            ],
            [
                'title' => 'Power Options',
                'text' => 'Up to 72 kWp in 20′ on‑grid; up to 54 kWp / 91 kWh off‑grid (depending on configuration).',
            ],
            [
                'title' => 'Pre‑assembled Wings',
                'text' => 'Modules assembled per set of 8 panels (≈3–3.5 kWp per wing) for rapid deployment and easy maintenance.',
            ],
            [
                'title' => 'Scalable & Linkable',
                'text' => 'Containers can be linked together to build larger plants; transport room serves as pre‑wired plant room.',
            ],
        ],
        'gallery' => [
            ['/assets/media/products/mobil-grid/1.jpg', 'Mobil‑Grid — container'],
            ['/assets/media/products/mobil-grid/2.jpg', 'Mobil‑Grid — deployment'],
            ['/assets/media/products/mobil-grid/3.jpg', 'Mobil‑Grid — site view'],
            ['/assets/media/products/mobil-grid/4.jpg', 'Mobil‑Grid — detail'],
        ],
        'specs' => null,
        'cta_title' => 'Need a semi‑mobile PV plant?',
        'cta_body' => 'We’ll help you size, deploy and link multiple containers, and integrate storage when needed.',
    ],
    'solar-hybrid-box' => [
        'hero_vh' => '60',
        'hero_image' => '/assets/media/products/solar-hybrid-box/1.jpg',
        'hero_image_alt' => 'Solar Hybrid Box®',
        'eyebrow' => 'Solar Hybrid Box®',
        'title' => 'Energy conversion & storage',
        'lead' => 'Electrical cabinets and containers that integrate PV inverters, battery inverters and storage with supervision — a turnkey hybrid power core.',
        'buttons' => [
            ['label' => 'Key Highlights', 'href' => '#highlights', 'variant' => 'primary'],
        ],
        'highlights_heading' => 'Key Highlights',
        'highlights_sub' => 'Flexible hybrid power building blocks that pair perfectly with SolarFold and Mobil‑Grid.',
        'highlights' => [
            [
                'title' => 'Wide Range',
                'text' => 'From electrical boxes (3.5–15 kVA) to 10′/20′ containers up to 180 kVA and 520 kWh.',
            ],
            [
                'title' => 'Plug‑and‑Play Hybrid',
                'text' => 'Pre‑tested units ready to connect; manage PV, batteries, grid and genset to optimize costs.',
            ],
            [
                'title' => 'Mobile / Semi‑mobile / Stationary',
                'text' => 'Can be used in diverse deployment modes with remote supervision.',
            ],
            [
                'title' => 'Control Generators',
                'text' => 'System can control connected diesel gensets for fuel savings and runtime reduction.',
            ],
        ],
        'gallery' => null,
        'specs' => null,
        'cta_title' => 'Integrate with SolarFold or Mobil‑Grid',
        'cta_body' => 'Build a complete hybrid system — PV generation plus storage and intelligent conversion — all factory‑tested and ready to connect.',
    ],
];

$application_pages = [
    'military' => [
        'title' => 'Military &amp; Peacekeeping',
        'subtitle' => 'Power that moves with the force, sets up fast and runs quietly',
        'image' => '/assets/media/applications/military/military_hero.jpg',
        'image_alt' => 'Military operations with xTechs solar solutions',
        'intro' => 'Missions need power that moves with the force, sets up fast and runs quietly. Our solar-hybrid systems create forward operating energy hubs that cut fuel convoys, shrink the acoustic/IR footprint and keep critical comms and medical loads online.',
        'body' => 'xTechs delivers a cohesive, mobile energy strategy. Use the SolarFold (Mobil-Grid&reg; 500+) to generate high daytime PV near the front line with a low visual and acoustic signature. Establish semi-permanent generation with Mobil-Grid&reg; solar containers that link into reliable camp microgrids and are simple to transport with standard handling. For 24/7 autonomy and intelligent generator control, the Solar Hybrid Box&reg; unifies PV, batteries, grid/shore and diesel under remote supervision.',
        'benefits_title' => 'How our solutions help in military operations',
        'benefits_lead' => 'xTechs, in partnership with <span class="font-semibold">EcoSun Innovations</span>, delivers rapidly deployable solar-hybrid power that reduces fuel convoys, noise and maintenance while improving autonomy and energy security.',
        'cards' => [
            [
                'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
                'link' => '/solarfold/solarfold',
                'bullets' => [
                    'Establishes a 130 kWp array within hours; redeployable between theatres.',
                    'Silent, low-heat signature power improves force protection.',
                    'Pairs with Hybrid Box for night autonomy and load management.',
                    'Cuts diesel burn; fewer resupply missions and lower risk.',
                ],
            ],
            [
                'title' => 'Mobil-Grid&reg; Solar Container',
                'link' => '/solarfold/mobil-grid',
                'bullets' => [
                    'ISO/CSC unit with pre-wired PV and insulated technical room.',
                    'Link containers to scale for camps, radar and telecoms sites.',
                    'Minimal civil works; quick in/out logistics with standard lifting.',
                    'Provides daytime PV power and reduces genset runtime.',
                ],
            ],
            [
                'title' => 'Solar Hybrid Box&reg;',
                'link' => '/solarfold/solar-hybrid-box',
                'bullets' => [
                    'Hybrid conversion + storage core with remote supervision.',
                    'Integrates PV, batteries, grid/shore and diesel backup automatically.',
                    'Supports 24/7 operations with reduced acoustic footprint.',
                    'Orchestrates gensets for optimal fuel use and reliability.',
                ],
            ],
        ],
    ],
    'mining' => [
        'title' => 'Mining &amp; Remote Operations',
        'subtitle' => 'Reliable, clean and fast to deploy power for exploration to production',
        'image' => '/assets/media/applications/mining/hero.jpg',
        'image_alt' => 'Mining operations with xTechs solar solutions',
        'intro' => 'From exploration to production, power must be reliable, clean and fast to deploy. Our modular solar-hybrid plant reduces diesel burn and permits while scaling with pit development and camp growth.',
        'body' => 'For mining and remote extraction, xTechs designs solar-hybrid power systems that lower fuel costs, simplify approvals and scale with your operation. Mobil-Grid&reg; solar containers provide pre-wired 54-72 kWp PV blocks with an insulated technical room that can be linked to form reliable microgrids across camps, workshops and security perimeters. For mid-term pads and satellite pits, the SolarFold (Mobil-Grid&reg; 500+) redeployable array adds 130 kWp of silent generation that can be moved as benches evolve. To deliver 24/7 supply and optimize genset runtime, the Solar Hybrid Box&reg; integrates PV, batteries, grid and diesel with remote supervision, ensuring night autonomy and stable power for crushers, conveyors and camp base loads.',
        'benefits_title' => 'How our solutions help mining operations',
        'benefits_lead' => 'Together with <span class="font-semibold">EcoSun Innovations</span>, we deliver robust solar-hybrid plants that reduce diesel exposure, noise and maintenance, while scaling from prospecting to production.',
        'cards' => [
            [
                'title' => 'Mobil-Grid&reg; Solar Container',
                'link' => '/solarfold/mobil-grid',
                'bullets' => [
                    '54-72 kWp modules form microgrids for camps and workshops.',
                    'Fast setup; minimized ground disturbance, lower approvals.',
                    'Linkable containers scale with pit development.',
                    'Ideal for remote comms, lighting and security power.',
                ],
            ],
            [
                'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
                'link' => '/solarfold/solarfold',
                'bullets' => [
                    '130 kWp quick-deploy array for mid-term projects.',
                    'Relocate rapidly between benches and satellite sites.',
                    'Lower LCOE compared with diesel-only fleets.',
                    'Complements Mobil-Grid and Hybrid Box for 24/7 supply.',
                ],
            ],
            [
                'title' => 'Solar Hybrid Box&reg;',
                'link' => '/solarfold/solar-hybrid-box',
                'bullets' => [
                    'Hybrid conversion and storage (3.5-180 kVA / up to 520 kWh).',
                    'Manages PV + gensets; enables night autonomy.',
                    'Remote supervision reduces call-outs and downtime.',
                    'Supports crushers, conveyors and camp base loads.',
                ],
            ],
        ],
    ],
    'communities' => [
        'title' => 'Communities &amp; Rural Electrification',
        'subtitle' => 'Dependable power delivered quickly and grown over time',
        'image' => '/assets/media/applications/communities/hero.jpg',
        'image_alt' => 'Communities with xTechs solar solutions',
        'intro' => 'Communities need dependable power that can be delivered quickly and grown over time. Our modular microgrids enable clinics, schools and commerce to operate with low running costs and minimal disruption.',
        'body' => 'xTechs builds affordable, expandable microgrids for villages and growing towns. Start with Mobil-Grid&reg; solar containers to form 54-72 kWp PV blocks that link into a resilient local grid with minimal civil works. Add deployable daytime capacity with the SolarFold (Mobil-Grid&reg; 500+) for clinics, water pumps and schools during roll-out. For night supply and cost optimization, the Solar Hybrid Box&reg; manages PV, batteries, grid and diesel under remote supervision.',
        'benefits_title' => 'How our solutions help communities',
        'benefits_lead' => 'In partnership with <span class="font-semibold">EcoSun Innovations</span>, we create reliable microgrids with low ownership costs and rapid delivery, ideal for rural electrification.',
        'cards' => [
            [
                'title' => 'Mobil-Grid&reg; Solar Container',
                'link' => '/solarfold/mobil-grid',
                'bullets' => [
                    '54-72 kWp PV blocks; linkable for village microgrids.',
                    'Minimal civil works; fast commissioning.',
                    'Feeds pumps, clinics, schools and public lighting.',
                    'Expandable with additional containers as demand grows.',
                ],
            ],
            [
                'title' => 'Solar Hybrid Box&reg;',
                'link' => '/solarfold/solar-hybrid-box',
                'bullets' => [
                    'Hybrid conversion & storage for night supply and resiliency.',
                    'Remote supervision; efficient genset control where needed.',
                    'Optimized tariff structures for community operators.',
                    'Integrates seamlessly with Mobil-Grid and SolarFold arrays.',
                ],
            ],
            [
                'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
                'link' => '/solarfold/solarfold',
                'bullets' => [
                    '130 kWp deployable PV to accelerate initial electrification.',
                    'Move or expand as new villages connect.',
                    'Low noise and clean operation for populated areas.',
                    'Pairs with Hybrid Box for full day/night availability.',
                ],
            ],
        ],
    ],
    'emergency-power' => [
        'title' => 'Emergency &amp; Mobile Worksites',
        'subtitle' => 'Power when needed now - fast setup, reliable and safe',
        'image' => '/assets/media/applications/emergency-power/hero.jpg',
        'image_alt' => 'Emergency power with xTechs solar solutions',
        'intro' => 'When power is needed now, setup speed, reliability and safety matter most. Our systems energize field hospitals, command posts and mobile bases without the noise and delays of diesel-only fleets.',
        'body' => 'xTechs equips relief teams and mobile worksites with dependable power on day one. Deploy the SolarFold (Mobil-Grid&reg; 500+) to energize triage tents and logistics zones within hours, then relocate as priorities shift. Build larger temporary grids using Mobil-Grid&reg; containers, pre-wired with PV and an integrated technical room for fast setup. Maintain night autonomy and safe, supervised operation with the Solar Hybrid Box&reg;, orchestrating PV, batteries and backup gensets.',
        'benefits_title' => 'How our solutions support emergency power',
        'benefits_lead' => 'With <span class="font-semibold">EcoSun Innovations</span>, we deliver fast, silent and efficient power for relief agencies and temporary operations.',
        'cards' => [
            [
                'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
                'link' => '/solarfold/solarfold',
                'bullets' => [
                    'Rapidly energize field hospitals and command posts.',
                    'Move assets as needs shift between zones.',
                    'Low noise facilitates medical and coordination work.',
                    'Reduces diesel reliance and logistics burden.',
                ],
            ],
            [
                'title' => 'Mobil-Grid&reg; Solar Container',
                'link' => '/solarfold/mobil-grid',
                'bullets' => [
                    'Plug-and-play PV with integrated plant room for quick setup.',
                    'Link containers for larger camps and work fronts.',
                    'Suitable for telecoms, lighting and water treatment loads.',
                    'Minimal ground works; deploy on rough surfaces.',
                ],
            ],
            [
                'title' => 'Solar Hybrid Box&reg;',
                'link' => '/solarfold/solar-hybrid-box',
                'bullets' => [
                    'Hybrid conversion + storage keeps critical loads on 24/7.',
                    'Remote supervision; safe automated operation.',
                    'Integrates PV with backup genset for resilience.',
                    'Enables night autonomy where grid is unavailable.',
                ],
            ],
        ],
    ],
    'event-power' => [
        'title' => 'Events &amp; Temporary Venues',
        'subtitle' => 'Silent solar-hybrid systems for clean, comfortable experiences',
        'image' => '/assets/media/applications/event-power/hero.jpg',
        'image_alt' => 'Event power with xTechs solar solutions',
        'intro' => 'Audiences expect a clean, comfortable experience. Our silent solar-hybrid systems power stages, vendors and lighting while cutting fuel costs and emissions.',
        'body' => 'For festivals and temporary venues, our solar-hybrid stack delivers a premium audience experience. Scale daytime generation with Mobil-Grid&reg; containers and add silent, portable PV using the SolarFold (Mobil-Grid&reg; 500+) for build and rehearsal windows. The Solar Hybrid Box&reg; provides battery buffering and smart generator control for reliable night shows, lower fuel costs and minimal noise.',
        'benefits_title' => 'How our solutions power events',
        'benefits_lead' => 'xTechs and <span class="font-semibold">EcoSun Innovations</span> provide quiet, clean and scalable power for events without diesel nuisances.',
        'cards' => [
            [
                'title' => 'Mobil-Grid&reg; Solar Container',
                'link' => '/solarfold/mobil-grid',
                'bullets' => [
                    'Rapid to set up; use multiple for main + side stages.',
                    'Power vendor alleys, back-of-house and lighting rigs.',
                    'Lower rental fuel costs and site emissions.',
                    'Minimal footprint and clean audience experience.',
                ],
            ],
            [
                'title' => 'Solar Hybrid Box&reg;',
                'link' => '/solarfold/solar-hybrid-box',
                'bullets' => [
                    'Battery buffer for peaks and night shows.',
                    'Smart control of PV + genset for assured supply.',
                    'Remote supervision for safety and uptime.',
                    'Great for noise-sensitive venues.',
                ],
            ],
            [
                'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
                'link' => '/solarfold/solarfold',
                'bullets' => [
                    'High daytime PV to offset rigging and sound loads.',
                    'Redeploy quickly between venues/festivals.',
                    'Clean, quiet power improving visitor comfort.',
                    'Complements Hybrid Box for full day/night solutions.',
                ],
            ],
        ],
    ],
    'short-term-projects' => [
        'title' => 'Short-Term &amp; Crisis Deployments',
        'subtitle' => 'Speed and flexibility for temporary missions',
        'image' => '/assets/media/applications/short-term-projects/hero.jpg',
        'image_alt' => 'Short-term projects with xTechs solar solutions',
        'intro' => 'Temporary missions demand speed and flexibility. Our solar-hybrid kits energize operations immediately and can be redeployed as objectives change.',
        'body' => 'For short-term missions and crisis response, speed and redeployment are essential. The SolarFold (Mobil-Grid&reg; 500+) delivers 130 kWp of clean power within hours and packs down to move with the mission. Build larger temporary networks using Mobil-Grid&reg; containers - pre-wired PV with minimal site works - and secure night autonomy with the Solar Hybrid Box&reg; to manage PV, batteries and backup gensets under remote supervision.',
        'benefits_title' => 'How our solutions help short-term deployments',
        'benefits_lead' => 'With <span class="font-semibold">EcoSun Innovations</span>, we deliver rapid power with easy redeployment and hybrid autonomy to match mission timelines.',
        'cards' => [
            [
                'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
                'link' => '/solarfold/solarfold',
                'bullets' => [
                    'Deploys within hours; motorized fold option.',
                    'Shift power assets as priorities change.',
                    'Low noise for clinics, shelters and command.',
                    'Pairs with Hybrid Box for night coverage.',
                ],
            ],
            [
                'title' => 'Mobil-Grid&reg; Solar Container',
                'link' => '/solarfold/mobil-grid',
                'bullets' => [
                    'Pre-wired PV for 6-24 month windows.',
                    'Minimal ground works; operate on rough pads.',
                    'Linkable for camp growth at short notice.',
                    'Supports lighting, telecoms and water systems.',
                ],
            ],
            [
                'title' => 'Solar Hybrid Box&reg;',
                'link' => '/solarfold/solar-hybrid-box',
                'bullets' => [
                    'Hybrid conversion + storage with remote supervision.',
                    'Manages genset use; extends fuel and runtime.',
                    'Delivers safe, stable power for critical loads.',
                    'Integrates seamlessly with Mobil-Grid/SolarFold.',
                ],
            ],
        ],
    ],
    'long-term-projects' => [
        'title' => 'Long-Term Base Camps &amp; Facilities',
        'subtitle' => 'Stability and low operating costs for multi-year projects',
        'image' => '/assets/media/applications/long-term-projects/hero.jpg',
        'image_alt' => 'Long-term projects with xTechs solar solutions',
        'intro' => 'For multi-year projects, stability and operating cost matter most. Our solar-hybrid architecture creates dependable plants with remote supervision and storage, expandable as needs grow.',
        'body' => 'For multi-year bases and site facilities, build a dependable, low-OPEX plant. Start with Mobil-Grid&reg; containers as semi-mobile PV blocks that can be linked and expanded. Use the Solar Hybrid Box&reg; as the hybrid heart of the system - integrating PV, batteries, grid and diesel under remote supervision for night autonomy and peak shaving. Add daytime capacity rapidly with the SolarFold (Mobil-Grid&reg; 500+) to support expansions or new production lines.',
        'benefits_title' => 'How our solutions serve long-term facilities',
        'benefits_lead' => 'xTechs and <span class="font-semibold">EcoSun Innovations</span> deliver durable, low-OPEX plants that scale with your base camp or site facility.',
        'cards' => [
            [
                'title' => 'Mobil-Grid&reg; Solar Container',
                'link' => '/solarfold/mobil-grid',
                'bullets' => [
                    'Semi-mobile PV with integrated technical room.',
                    'Link containers to increase capacity over time.',
                    'Low maintenance; compatible with utility tie-in.',
                    'Supports production, accommodation and services.',
                ],
            ],
            [
                'title' => 'Solar Hybrid Box&reg;',
                'link' => '/solarfold/solar-hybrid-box',
                'bullets' => [
                    'Central hybrid core (3.5-180 kVA / up to 520 kWh).',
                    'Remote monitoring; EMS for cost-optimal operation.',
                    'Ensures night supply and peak shaving.',
                    'Integrates grid and diesel with PV for resilience.',
                ],
            ],
            [
                'title' => 'SolarFold (Mobil-Grid&reg; 500+)',
                'link' => '/solarfold/solarfold',
                'bullets' => [
                    'Add daytime PV capacity quickly for expansions.',
                    'Redeploy modules to new facilities as projects evolve.',
                    'Quiet, clean generation improves working environment.',
                    'Complements Hybrid Box for 24/7 reliability.',
                ],
            ],
        ],
    ],
];

if (isset($product_pages[$key])) :
    $page = $product_pages[$key];
    $tpl_uri = get_template_directory_uri();
    $tpl_dir = get_template_directory();
    $hero_rel = (string) $page['hero_image'];
    $hero_abs = $tpl_dir . $hero_rel;
    $hero_url = $tpl_uri . $hero_rel;
    $hero_vh = (string) $page['hero_vh'];
    $vh_class = $hero_vh === '70' ? 'xt-sf-prod-hero--vh70' : 'xt-sf-prod-hero--vh60';
    $gallery = isset($page['gallery']) && is_array($page['gallery']) ? $page['gallery'] : [];
    $has_gallery = $gallery !== [];
    $specs = isset($page['specs']) && is_array($page['specs']) ? $page['specs'] : null;
    ?>
    <div class="xt-sf-prod">
        <section class="xt-sf-prod-hero <?php echo esc_attr($vh_class); ?>" aria-label="<?php esc_attr_e('Product introduction', 'xtechs-renewables'); ?>">
            <div class="xt-sf-prod-hero-grid">
                <div class="xt-sf-prod-hero-media">
                    <?php if (is_readable($hero_abs)) : ?>
                        <img class="xt-sf-prod-hero-img" src="<?php echo esc_url($hero_url); ?>" alt="<?php echo esc_attr($page['hero_image_alt']); ?>" width="1600" height="900" decoding="async" fetchpriority="high" />
                    <?php else : ?>
                        <div class="xt-sf-prod-hero-ph" role="img" aria-label="<?php echo esc_attr($page['hero_image_alt']); ?>"></div>
                    <?php endif; ?>
                    <div class="xt-sf-prod-hero-gradient" aria-hidden="true"></div>
                </div>
                <div class="xt-sf-prod-hero-copy">
                    <p class="xt-sf-prod-eyebrow"><?php echo esc_html($page['eyebrow']); ?></p>
                    <h1 class="xt-sf-prod-h1"><?php echo esc_html($page['title']); ?></h1>
                    <p class="xt-sf-prod-lead"><?php echo esc_html($page['lead']); ?></p>
                    <div class="xt-sf-prod-hero-btns">
                        <?php foreach ($page['buttons'] as $btn) : ?>
                            <?php
                            $href = (string) $btn['href'];
                            $btn_href = ($href !== '' && $href[0] === '#') ? esc_attr($href) : esc_url($href);
                            $btn_class = (isset($btn['variant']) && $btn['variant'] === 'outline') ? 'xt-btn xt-btn-outline' : 'xt-btn xt-btn-primary';
                            ?>
                            <a class="<?php echo esc_attr($btn_class); ?>" href="<?php echo $btn_href; ?>"><?php echo esc_html($btn['label']); ?></a>
                        <?php endforeach; ?>
                    </div>
                    <p class="xt-sf-prod-collab"><?php echo wp_kses('In collaboration with <span class="xt-sf-prod-collab-strong">EcoSun Innovations</span>.', ['span' => ['class' => []]]); ?></p>
                </div>
            </div>
        </section>

        <section id="highlights" class="xt-sf-prod-section">
            <div class="xt-container">
                <div class="xt-sf-prod-section-head">
                    <h2 class="xt-sf-prod-h2"><?php echo esc_html($page['highlights_heading']); ?></h2>
                    <p class="xt-sf-prod-section-sub"><?php echo esc_html($page['highlights_sub']); ?></p>
                </div>
                <div class="xt-sf-grid-2 xt-sf-prod-hl-grid">
                    <?php foreach ($page['highlights'] as $hl) : ?>
                        <article class="xt-sf-hl-card">
                            <h3 class="xt-sf-hl-card-title"><?php echo esc_html($hl['title']); ?></h3>
                            <p class="xt-sf-hl-card-text"><?php echo esc_html($hl['text']); ?></p>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <?php if ($has_gallery) : ?>
            <section class="xt-sf-prod-section xt-sf-section-muted"<?php echo $key === 'mobil-grid' ? ' id="gallery"' : ''; ?>>
                <div class="xt-container">
                    <h2 class="xt-sf-prod-h2 xt-sf-prod-gallery-title"><?php esc_html_e('Gallery', 'xtechs-renewables'); ?></h2>
                    <div class="xt-sf-prod-gallery-shell">
                        <?php
                        $track = array_merge($gallery, $gallery);
                        $ias_id = 'xt-ias-' . preg_replace('/[^a-z0-9\-]/', '', $key);
                        ?>
                        <div id="<?php echo esc_attr($ias_id); ?>" class="xt-ias xt-ias-mask" style="--xt-ias-dur: 22s;" data-direction="left" role="region" aria-label="<?php esc_attr_e('Product image slider', 'xtechs-renewables'); ?>">
                            <div class="xt-ias-fade xt-ias-fade--top" aria-hidden="true"></div>
                            <div class="xt-ias-inner">
                                <div class="xt-ias-track">
                                    <?php foreach ($track as $idx => $img) : ?>
                                        <?php
                                        $rel = (string) $img[0];
                                        $alt = (string) $img[1];
                                        $full = $tpl_uri . $rel;
                                        ?>
                                        <button type="button" class="xt-ias-item" data-full-src="<?php echo esc_url($full); ?>" data-full-alt="<?php echo esc_attr($alt); ?>" aria-label="<?php echo esc_attr(sprintf(__('View full size image: %s', 'xtechs-renewables'), $alt)); ?>">
                                            <img src="<?php echo esc_url($full); ?>" alt="<?php echo esc_attr($alt); ?>" loading="<?php echo $idx < 2 ? 'eager' : 'lazy'; ?>" decoding="async" width="400" height="400" />
                                            <span class="xt-ias-item-hint"><?php esc_html_e('Click to view', 'xtechs-renewables'); ?></span>
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="xt-ias-fade xt-ias-fade--bottom" aria-hidden="true"></div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($specs !== null && isset($page['footprint'])) : ?>
            <section id="specs" class="xt-sf-prod-section xt-sf-section-muted">
                <div class="xt-container">
                    <h2 class="xt-sf-prod-h2 xt-sf-prod-specs-title"><?php esc_html_e('Core Specifications', 'xtechs-renewables'); ?></h2>
                    <div class="xt-sf-prod-spec-grid">
                        <div class="xt-sf-prod-spec-panel">
                            <dl class="xt-sf-prod-spec-dl">
                                <?php foreach ($specs as $row) : ?>
                                    <div class="xt-sf-spec-row">
                                        <dt><?php echo esc_html($row['k']); ?></dt>
                                        <dd><?php echo esc_html($row['v']); ?></dd>
                                    </div>
                                <?php endforeach; ?>
                            </dl>
                        </div>
                        <div class="xt-sf-prod-spec-panel">
                            <h3 class="xt-sf-prod-footprint-title"><?php echo esc_html($page['footprint']['title']); ?></h3>
                            <ul class="xt-sf-prod-footprint-list">
                                <?php foreach ($page['footprint']['bullets'] as $b) : ?>
                                    <li><?php echo esc_html($b); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <p class="xt-sf-prod-footprint-note"><?php echo esc_html($page['footprint']['note']); ?></p>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="xt-sf-prod-section xt-sf-prod-cta">
            <div class="xt-container xt-sf-center">
                <h2 class="xt-sf-prod-h2"><?php echo esc_html($page['cta_title']); ?></h2>
                <p class="xt-sf-prod-cta-body"><?php echo esc_html($page['cta_body']); ?></p>
                <div class="xt-sf-btn-row">
                    <a class="xt-btn xt-btn-primary" href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Request a proposal', 'xtechs-renewables'); ?></a>
                    <a class="xt-btn xt-btn-outline" href="<?php echo esc_url(home_url('/solarfold')); ?>"><?php esc_html_e('Back to SolarFold overview', 'xtechs-renewables'); ?></a>
                </div>
            </div>
        </section>
    </div>

    <?php if ($has_gallery) : ?>
        <div id="xt-sf-ias-modal" class="xt-sf-ias-modal" hidden role="dialog" aria-modal="true" aria-label="<?php esc_attr_e('Full-size product image', 'xtechs-renewables'); ?>">
            <div class="xt-sf-ias-modal__inner">
                <img class="xt-sf-ias-modal__img" src="" alt="" width="1200" height="800" decoding="async" />
                <button type="button" class="xt-sf-ias-modal__close"><?php esc_html_e('Close', 'xtechs-renewables'); ?></button>
            </div>
        </div>
    <?php endif; ?>
<?php elseif (isset($application_pages[$key])) :
    $page = $application_pages[$key];
    ?>
    <section class="xt-sf-app-hero">
        <div class="xt-container xt-sf-app-hero-inner">
            <h1 class="xt-sf-app-h1"><?php echo wp_kses_post($page['title']); ?></h1>
            <p class="xt-sf-app-sub"><?php echo esc_html($page['subtitle']); ?></p>
        </div>
    </section>

    <section class="xt-sf-app-main">
        <div class="xt-container xt-sf-app-shell">
            <div class="xt-sf-app-grid">
                <?php
                $app_img_rel = (string) $page['image'];
                $app_img_abs = get_template_directory() . $app_img_rel;
                $app_img_url = get_template_directory_uri() . $app_img_rel;
                ?>
                <div class="xt-sf-app-media">
                    <?php if (file_exists($app_img_abs)) : ?>
                        <img src="<?php echo esc_url($app_img_url); ?>" alt="<?php echo esc_attr($page['image_alt']); ?>" />
                    <?php else : ?>
                        <div class="xt-sf-app-media-ph"></div>
                    <?php endif; ?>
                </div>
                <div class="xt-sf-app-copy">
                    <p class="xt-sf-app-p"><?php echo esc_html($page['intro']); ?></p>
                    <p class="xt-sf-app-p">
                        <?php
                        $body = str_replace(
                            ['SolarFold (Mobil-Grid&reg; 500+)', 'Mobil-Grid&reg; solar containers', 'Mobil-Grid&reg; containers', 'Mobil-Grid&reg;', 'Solar Hybrid Box&reg;'],
                            [
                                '<a href="' . esc_url(home_url('/solarfold/solarfold')) . '" class="xt-sf-app-link">SolarFold (Mobil-Grid&reg; 500+)</a>',
                                '<a href="' . esc_url(home_url('/solarfold/mobil-grid')) . '" class="xt-sf-app-link">Mobil-Grid&reg; solar containers</a>',
                                '<a href="' . esc_url(home_url('/solarfold/mobil-grid')) . '" class="xt-sf-app-link">Mobil-Grid&reg; containers</a>',
                                '<a href="' . esc_url(home_url('/solarfold/mobil-grid')) . '" class="xt-sf-app-link">Mobil-Grid&reg;</a>',
                                '<a href="' . esc_url(home_url('/solarfold/solar-hybrid-box')) . '" class="xt-sf-app-link">Solar Hybrid Box&reg;</a>',
                            ],
                            $page['body']
                        );
                        echo wp_kses($body, ['a' => ['href' => [], 'class' => []], 'br' => [], 'span' => ['class' => []]]);
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="xt-sf-app-benefits">
        <div class="xt-container xt-sf-app-shell">
            <div class="xt-sf-app-head">
                <h2><?php echo esc_html($page['benefits_title']); ?></h2>
                <p><?php echo wp_kses_post($page['benefits_lead']); ?></p>
            </div>
            <div class="xt-sf-app-cards">
                <?php foreach ($page['cards'] as $card) : ?>
                    <article class="xt-sf-app-card">
                        <h3><a href="<?php echo esc_url(home_url($card['link'])); ?>" class="xt-sf-app-link"><?php echo wp_kses_post($card['title']); ?></a></h3>
                        <ul>
                            <?php foreach ($card['bullets'] as $bullet) : ?>
                                <li><?php echo esc_html($bullet); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="xt-sf-section">
        <div class="xt-container xt-sf-center">
            <h1 class="xt-sf-h1">Coming soon</h1>
            <p class="xt-sf-lead xt-sf-lead-center">This SolarFold page is being prepared.</p>
            <a class="xt-btn xt-btn-primary" href="<?php echo esc_url(home_url('/solarfold')); ?>">Back to SolarFold overview</a>
        </div>
    </section>
<?php endif; ?>
