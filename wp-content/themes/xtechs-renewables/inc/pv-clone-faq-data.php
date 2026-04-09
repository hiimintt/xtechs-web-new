<?php
if (!defined('ABSPATH')) {
    exit;
}

/** Mirrors FaqSection faqData + categories from PV hub */
function xtechs_pv_clone_hub_faq_categories(): array {
    return [
        ['id' => 'power-backup', 'title' => 'Power & Backup', 'count' => 3],
        ['id' => 'install-approvals', 'title' => 'Install & Approvals', 'count' => 3],
        ['id' => 'maintenance-monitoring', 'title' => 'Maintenance & Monitoring', 'count' => 3],
        ['id' => 'products-warranty', 'title' => 'Products & Warranty', 'count' => 3],
    ];
}

function xtechs_pv_clone_hub_faq_items(): array {
    return [
        [
            'id' => 'faq-battery-blackout',
            'question' => 'Will a battery keep my lights on in a blackout?',
            'answer' => "Yes—when sized and configured for backup, essential circuits can keep running during an outage (lighting, refrigeration, comms). We'll confirm your essential loads and design accordingly.",
            'category' => 'power-backup',
        ],
        [
            'id' => 'faq-add-battery-later',
            'question' => 'Can I add a battery later?',
            'answer' => "Often yes. Many inverters support staged upgrades. We'll size your solar and specify hardware that keeps the upgrade path clean.",
            'category' => 'power-backup',
        ],
        [
            'id' => 'faq-backup-capacity',
            'question' => 'How much backup can I get?',
            'answer' => 'Depends on battery capacity, inverter output, and your essential circuits. Typical homes back up lights, fridge, internet, and a few GPOs; heavy loads are optional.',
            'category' => 'power-backup',
        ],
        [
            'id' => 'faq-installation-time',
            'question' => 'How fast is the installation?',
            'answer' => 'Residential installs are commonly 1–2 days (site-dependent). Larger business/off-grid projects vary with scope and switchboard works.',
            'category' => 'install-approvals',
        ],
        [
            'id' => 'faq-export-limits',
            'question' => 'Do you handle export limits and approvals?',
            'answer' => 'Yes—we coordinate with your local distributor, apply export caps where required, and set compliant limits in the inverter.',
            'category' => 'install-approvals',
        ],
        [
            'id' => 'faq-complex-roof',
            'question' => 'What if my roof is complex?',
            'answer' => 'We design around orientation, shading, and roof type (tile/metal/flat). If needed we use optimizers or adjust array layout.',
            'category' => 'install-approvals',
        ],
        [
            'id' => 'faq-maintenance-required',
            'question' => 'What maintenance is required?',
            'answer' => 'Minimal. Online monitoring, occasional visual checks, and firmware updates. We provide guidance and can monitor systems under support plans.',
            'category' => 'maintenance-monitoring',
        ],
        [
            'id' => 'faq-system-underperforms',
            'question' => 'What happens if my system underperforms?',
            'answer' => 'We review monitoring data, check for shading/faults, and perform diagnostics. Warranty processes are handled with manufacturers where applicable.',
            'category' => 'maintenance-monitoring',
        ],
        [
            'id' => 'faq-firmware-updates',
            'question' => 'Will firmware updates break anything?',
            'answer' => 'Updates improve performance and safety. We schedule them appropriately and validate after major updates.',
            'category' => 'maintenance-monitoring',
        ],
        [
            'id' => 'faq-brands-carried',
            'question' => 'Which brands do you carry?',
            'answer' => "Tier-one panels, reputable inverters, and proven batteries suited for Australian conditions. We'll recommend options that match your use-case and budget.",
            'category' => 'products-warranty',
        ],
        [
            'id' => 'faq-warranty-length',
            'question' => 'How long are the warranties?',
            'answer' => 'Panels typically 20–25 yrs product / 25–30 yrs performance, inverters ~10 yrs, batteries ~10 yrs (model-specific).',
            'category' => 'products-warranty',
        ],
        [
            'id' => 'faq-ev-heat-pump-integration',
            'question' => 'Can I integrate an EV charger or heat pump later?',
            'answer' => "Yes—systems are designed to be compatible with EV charging and efficient hot-water solutions. We'll leave room in the design for future add-ons.",
            'category' => 'products-warranty',
        ],
    ];
}
