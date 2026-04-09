<?php
if (!defined('ABSPATH')) {
    exit;
}

function xtechs_solution_site_disclaimer(): string {
    return 'Site inspection fees apply. xTechs Renewables will provide a detailed quote & site inspection report after assessing your property.';
}

/**
 * @return array<int, array{icon:string,title:string,text:string}>
 */
function xtechs_solution_battery_benefits(): array {
    return [
        ['icon' => 'battery', 'title' => 'Energy Independence', 'text' => 'Store solar energy during the day and use it at night, reducing reliance on the grid.'],
        ['icon' => 'award', 'title' => 'Premium Technology', 'text' => 'Tesla Powerwall, Alpha ESS, and other leading battery storage systems.'],
        ['icon' => 'clock', 'title' => '24/7 Backup Power', 'text' => 'Keep your home powered during blackouts and grid outages.'],
        ['icon' => 'shield', 'title' => 'Smart Management', 'text' => 'Intelligent energy management with mobile app control and monitoring.'],
    ];
}

/**
 * @return array<int, array{icon:string,title:string,desc:string,features:array<int,string>,badge:string,badge_mod:string}>
 */
function xtechs_solution_battery_services(): array {
    return [
        [
            'icon' => 'home',
            'title' => 'Residential Battery Storage',
            'desc' => 'Home battery systems that store solar energy and provide backup power during outages.',
            'features' => [
                'Tesla Powerwall 2 & 3',
                'Alpha ESS battery systems',
                'Smart energy management',
                'Backup power circuits',
                'Mobile app monitoring',
                'Warranty & support',
            ],
            'badge' => 'Most Popular',
            'badge_mod' => 'primary',
        ],
        [
            'icon' => 'building',
            'title' => 'Commercial Battery Storage',
            'desc' => 'Large-scale battery storage solutions for businesses and commercial properties.',
            'features' => [
                'Commercial-grade batteries',
                'Peak demand management',
                'Energy arbitrage systems',
                'Grid services integration',
                'Remote monitoring',
                'Maintenance programs',
            ],
            'badge' => 'Business',
            'badge_mod' => 'secondary',
        ],
        [
            'icon' => 'zap',
            'title' => 'Solar + Battery Packages',
            'desc' => 'Complete solar and battery storage systems for maximum energy independence.',
            'features' => [
                'Integrated system design',
                'Optimized energy storage',
                'Smart load management',
                'Backup power circuits',
                'Single warranty coverage',
                'Comprehensive monitoring',
            ],
            'badge' => 'Complete Solution',
            'badge_mod' => 'accent',
        ],
    ];
}

/**
 * @return array<int, array{icon:string,title:string,desc:string,specs:array<int,string>}>
 */
function xtechs_solution_battery_types(): array {
    return [
        [
            'icon' => 'battery',
            'title' => 'Tesla Powerwall',
            'desc' => 'Premium residential battery storage',
            'specs' => ['13.5kWh capacity', '5kW continuous power', '10-year warranty', 'Smart app control'],
        ],
        [
            'icon' => 'shield',
            'title' => 'Alpha ESS',
            'desc' => 'Reliable commercial-grade systems',
            'specs' => ['5-20kWh capacity', 'High efficiency', 'Modular design', 'Advanced monitoring'],
        ],
        [
            'icon' => 'smartphone',
            'title' => 'Smart Management',
            'desc' => 'Intelligent energy control',
            'specs' => ['Mobile app control', 'Load management', 'Grid services', 'Real-time monitoring'],
        ],
    ];
}

/**
 * @return array<int, array{q:string,a:string}>
 */
function xtechs_solution_battery_faqs(): array {
    return [
        [
            'q' => 'How long will my battery last during a blackout?',
            'a' => 'Battery backup duration depends on capacity and usage. A Tesla Powerwall 3 can power essential loads for 12-24 hours, while larger systems can provide 2-3 days of backup power.',
        ],
        [
            'q' => 'Can I add a battery to my existing solar system?',
            'a' => 'Yes, most solar systems can be retrofitted with battery storage. We assess your current setup and recommend compatible battery solutions for optimal performance.',
        ],
        [
            'q' => "What's the difference between AC and DC coupled batteries?",
            'a' => 'AC coupled batteries work with any inverter, while DC coupled batteries are more efficient but require compatible inverters. We recommend the best option based on your system.',
        ],
        [
            'q' => 'How much maintenance do batteries require?',
            'a' => 'Modern lithium batteries require minimal maintenance. We provide monitoring systems and annual health checks to ensure optimal performance and longevity.',
        ],
    ];
}

/**
 * @return array<int, array{icon:string,title:string,text:string}>
 */
function xtechs_solution_ev_benefits(): array {
    return [
        ['icon' => 'zap', 'title' => 'Fast Charging', 'text' => 'High-speed Level 2 and DC fast charging solutions for efficient EV charging.'],
        ['icon' => 'award', 'title' => 'Smart Integration', 'text' => 'Intelligent charging systems that integrate with solar and home energy management.'],
        ['icon' => 'clock', 'title' => 'Professional Installation', 'text' => 'Certified electricians ensure safe, compliant, and reliable installations.'],
        ['icon' => 'shield', 'title' => 'Future-Proof', 'text' => 'Modern charging standards and scalable solutions for growing EV fleets.'],
    ];
}

/**
 * @return array<int, array{icon:string,title:string,desc:string,features:array<int,string>,badge:string,badge_mod:string}>
 */
function xtechs_solution_ev_services(): array {
    return [
        [
            'icon' => 'home',
            'title' => 'Residential EV Charging',
            'desc' => 'Home EV charger installation with smart features and solar integration.',
            'features' => [
                'Level 2 AC Chargers (7kW-22kW)',
                'Smart scheduling and mobile app control',
                'Solar power integration',
                'Load balancing and energy monitoring',
                'Weatherproof outdoor installation',
            ],
            'badge' => 'Most Popular',
            'badge_mod' => 'primary',
        ],
        [
            'icon' => 'building',
            'title' => 'Commercial EV Charging',
            'desc' => 'Business and fleet charging solutions with management and billing systems.',
            'features' => [
                'DC Fast Chargers (50kW-150kW)',
                'Multiple charging standards (CCS, CHAdeMO)',
                'Payment and access control systems',
                'Fleet management integration',
                '24/7 monitoring and support',
            ],
            'badge' => 'Business',
            'badge_mod' => 'secondary',
        ],
        [
            'icon' => 'zap',
            'title' => 'Smart Charging Solutions',
            'desc' => 'Advanced charging systems with energy management and grid integration.',
            'features' => [
                'Bidirectional charging (V2G/V2H)',
                'Dynamic load management',
                'Time-of-use optimization',
                'Grid services integration',
                'Advanced analytics and reporting',
            ],
            'badge' => 'Advanced',
            'badge_mod' => 'accent',
        ],
    ];
}

/**
 * @return array<int, array{icon:string,title:string,desc:string,specs:array<int,string>,price:string}>
 */
function xtechs_solution_ev_charger_types(): array {
    return [
        [
            'icon' => 'car',
            'title' => 'Level 2 AC Chargers',
            'desc' => 'Fast home and workplace charging',
            'specs' => ['7kW - 22kW power', '3-8 hours charge time', 'Smart features', 'Solar integration'],
            'price' => 'From $2,500',
        ],
        [
            'icon' => 'battery',
            'title' => 'DC Fast Chargers',
            'desc' => 'High-speed commercial charging',
            'specs' => ['50kW - 150kW power', '30-60 minutes charge time', 'Multiple standards', 'Payment systems'],
            'price' => 'From $25,000',
        ],
        [
            'icon' => 'smartphone',
            'title' => 'Smart Features',
            'desc' => 'Intelligent charging management',
            'specs' => ['Mobile app control', 'Scheduling & optimization', 'Energy monitoring', 'Remote diagnostics'],
            'price' => 'Included',
        ],
    ];
}
