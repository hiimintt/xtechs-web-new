<?php
if (!defined('ABSPATH')) {
    exit;
}

function xtechs_pv_clone_offgrid_cards(): array {
    return [
        [
            'icon' => 'map-pin',
            'title' => 'Site & load assessment',
            'points' => [
                'Model actual consumption and local solar yield',
                'Size array and storage for practical autonomy',
                'Account for daily spikes and seasonal swings',
            ],
            'hint' => 'Comprehensive analysis for optimal system sizing',
        ],
        [
            'icon' => 'settings',
            'title' => 'System architecture & design',
            'points' => [
                'Specify proven DC- or AC-coupled hybrids',
                'Right inverter power and MPPT capacity',
                'Proper protections for smooth operation',
            ],
            'hint' => 'Proven hybrid system architecture',
        ],
        [
            'icon' => 'zap',
            'title' => 'Generator integration & fuel strategy',
            'points' => [
                'Correctly sized generator integration',
                'Smart start windows and charge thresholds',
                'Minimise fuel use while protecting battery health',
            ],
            'hint' => 'Smart generator integration for fuel efficiency',
        ],
        [
            'icon' => 'monitor',
            'title' => 'Controls, monitoring & alerts',
            'points' => [
                'Live visibility of production and usage',
                'State of charge monitoring and alerts',
                'Remote support when you need help',
            ],
            'hint' => 'Live monitoring with remote support',
        ],
        [
            'icon' => 'wrench',
            'title' => 'Installation, commissioning & handover',
            'points' => [
                'Hardware installed to spec with firmware updates',
                'Settings commissioned to your design',
                'Complete handover pack with diagrams and guidance',
            ],
            'hint' => 'Complete installation with comprehensive handover',
        ],
        [
            'icon' => 'battery',
            'title' => 'Storage choices that fit',
            'points' => [
                'Batteries sized to cycle efficiently',
                'Realistic depth-of-discharge considerations',
                'Climate-appropriate enclosures and thermal management',
            ],
            'hint' => 'Climate-appropriate battery solutions',
        ],
        [
            'icon' => 'plus',
            'title' => 'Expansion & future-proofing',
            'points' => [
                'Room to grow with extra PV strings',
                'Additional battery cabinets or higher inverter capacity',
                'Scalable design for new appliances or site changes',
            ],
            'hint' => 'Scalable design for future growth',
        ],
        [
            'icon' => 'users',
            'title' => 'Operations & support',
            'points' => [
                'Scheduled check-ins and performance reviews',
                'Tuning for seasons or load changes',
                'Ongoing support for reliable operation',
            ],
            'hint' => 'Ongoing support for reliable operation',
        ],
    ];
}

function xtechs_pv_clone_builders_cards(): array {
    return [
        [
            'icon' => 'settings',
            'title' => 'Design & specification',
            'points' => [
                'Standardised packages by home typology',
                'Single‑line diagrams and switchboard allowances',
                'Clear roof, inverter and battery placements',
            ],
            'hint' => 'Standardised packages for consistent results',
        ],
        [
            'icon' => 'wrench',
            'title' => 'Pre‑wire & rough‑in',
            'points' => [
                'Conduits and cable routes at framing',
                'Neat, weather‑tight penetrations',
                'Ready for array and battery install',
            ],
            'hint' => 'Clean penetrations and weather‑tight installation',
        ],
        [
            'icon' => 'check-circle',
            'title' => 'Approvals, export limits & metering',
            'points' => [
                'Distributor approvals and export caps',
                'Commission inverter settings to limit',
                'Metering coordination with retailer',
            ],
            'hint' => 'Complete approvals and metering coordination',
        ],
        [
            'icon' => 'calendar',
            'title' => 'Staging & scheduling',
            'points' => [
                'Sequenced around other trades',
                'Site‑ready checks before attendance',
                'Multi‑lot roll‑outs to keep programmes moving',
            ],
            'hint' => 'Coordinated scheduling with other trades',
        ],
        [
            'icon' => 'file-text',
            'title' => 'Compliance & homeowner handover',
            'points' => [
                'CEC standards and test results',
                'Photo records and warranties bundled',
                'Simple homeowner pack for monitoring',
            ],
            'hint' => 'Complete documentation and homeowner guidance',
        ],
        [
            'icon' => 'plus',
            'title' => 'Client options & upgrades',
            'points' => [
                'Capacity for EV chargers and backup circuits',
                'Heat‑pump hot water ready',
                'Future‑ready infrastructure without rework',
            ],
            'hint' => 'Future‑ready infrastructure for easy upgrades',
        ],
        [
            'icon' => 'shield',
            'title' => 'Aftercare & warranty support',
            'points' => [
                'Defect‑liability period assistance',
                'Early performance monitoring help',
                'Brand warranty liaison as required',
            ],
            'hint' => 'Comprehensive support after handover',
        ],
    ];
}
