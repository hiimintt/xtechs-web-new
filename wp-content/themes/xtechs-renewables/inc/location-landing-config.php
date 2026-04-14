<?php
if (!defined('ABSPATH')) {
    exit;
}

function xtechs_location_theme_media_path(string $sub): string
{
    return get_template_directory() . '/assets/media/' . ltrim($sub, '/');
}

function xtechs_location_theme_media_url(string $sub): string
{
    return get_template_directory_uri() . '/assets/media/' . ltrim($sub, '/');
}

/**
 * Hero image: same paths as Next.js public/ (e.g. mel-cbd/melcbd.webp). Falls back if file missing.
 */
function xtechs_location_resolve_hero(string $dir, string $file, ?string $fallback_sub = null): string
{
    $rel = 'locations/' . trim($dir, '/') . '/' . $file;
    if (file_exists(xtechs_location_theme_media_path($rel))) {
        return xtechs_location_theme_media_url($rel);
    }
    if ($fallback_sub !== null && file_exists(xtechs_location_theme_media_path($fallback_sub))) {
        return xtechs_location_theme_media_url($fallback_sub);
    }

    return xtechs_location_theme_media_url('xlogo.png');
}

/**
 * Trust row icons (lucide-style paths).
 */
function xtechs_location_trust_svg(string $icon): string
{
    switch ($icon) {
        case 'pin':
            return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>';
        case 'battery':
            return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M15 7h1a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-1"/><path d="M6 7H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h1"/><path d="M11 7v10"/><rect x="2" y="7" width="20" height="10" rx="2"/></svg>';
        case 'sun':
            return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>';
        case 'shield':
        default:
            return '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>';
    }
}

/**
 * @return array<string, mixed>|null
 */
function xtechs_location_landing_config(string $key): ?array
{
    $map_embed = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3143.058486054349!2d145.11353587619786!3d-38.02241597192406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad66db36c6b8917%3A0x81ad2dc996edb760!2sxTechs%20Renewables!5e0!3m2!1sen!2s!4v1770078343341!5m2!1sen!2s';

    switch ($key) {
        case 'melbourne-cbd':
            $cfg = [
                'slug' => 'melbourne-cbd',
                'hero_dir' => 'mel-cbd',
                'hero_file' => 'melcbd.webp',
                'hero_fallback' => 'locations/melbourne-cbd-hero.png',
                'badge' => 'Melbourne CBD',
                'h1_accent' => 'for Melbourne CBD',
                'hero_lead' => 'CEC‑accredited installations for apartments, townhouses, and commercial rooftops in the CBD. High‑performance PV, battery storage, and EV charging—engineered for urban efficiency and savings.',
                'trust' => [
                    ['icon' => 'shield', 'text' => 'CEC‑accredited'],
                    ['icon' => 'battery', 'text' => '10‑yr battery warranty*'],
                    ['icon' => 'sun', 'text' => '25‑yr panel performance'],
                ],
                'hero_note' => '*Warranty depends on model. Ask us for model‑specific terms.',
                'hero_img_alt' => 'Solar in Melbourne CBD',
                'popular_h2' => 'Popular Services in the CBD',
                'popular_p' => 'From compact PV arrays to battery backup and EV charging in carparks.',
                'why_title' => 'Why xTechs for Melbourne CBD',
                'why_items' => [
                    ['title' => 'Urban‑fit Designs', 'desc' => 'Shading analysis, inverter placement & strata‑friendly proposals.'],
                    ['title' => 'Battery‑Ready', 'desc' => 'Load calculations for backup of lifts, comms, and essential circuits.'],
                    ['title' => 'Compliance Handled', 'desc' => 'Export limits, metering, DNSP approvals & safety certificates.'],
                    ['title' => 'Monitoring & Support', 'desc' => 'We set up monitoring and offer optional support plans.'],
                    ['title' => 'Premium Hardware', 'desc' => 'Tier‑one panels, reputable inverters, proven batteries.'],
                    ['title' => 'Clean, Quiet Installs', 'desc' => 'Tidy works & scheduled for minimal disruption in high‑rise sites.'],
                ],
                'areas_h2' => 'Areas We Cover in & around the CBD',
                'areas_lead' => 'We service Melbourne CBD and nearby suburbs.',
                'areas' => ['Docklands', 'Southbank', 'West Melbourne', 'East Melbourne', 'Carlton', 'Fitzroy', 'Collingwood', 'Port Melbourne'],
                'map_iframe_title' => 'xTechs Renewables Melbourne',
                'cta_h2' => 'Get a tailored quote for Melbourne CBD',
                'cta_sub' => 'Book a site assessment or speak with our CEC‑accredited team today.',
                'faq' => null,
                'json' => [
                    'name' => 'xTechs Renewables — Melbourne CBD',
                    'geo' => ['lat' => -37.8126, 'lng' => 144.9623],
                    'area' => 'Melbourne CBD',
                    'opening' => 'Mo-Fr 08:00-17:00',
                ],
            ];
            break;

        case 'bendigo':
            $cfg = [
                'slug' => 'bendigo',
                'hero_dir' => 'bendigo',
                'hero_file' => 'bendigo.webp',
                'hero_fallback' => null,
                'badge' => 'Bendigo',
                'h1_accent' => 'for Bendigo',
                'hero_lead' => 'Reliable PV, battery backup, and EV charging for homes, new builds, and commercial sites across Bendigo and nearby areas.',
                'trust' => [
                    ['icon' => 'shield', 'text' => 'CEC-accredited'],
                    ['icon' => 'battery', 'text' => 'Backup-ready systems'],
                    ['icon' => 'sun', 'text' => 'Tier-one panels'],
                ],
                'hero_note' => '*Ask us about builder-ready workflows for new developments.',
                'hero_img_alt' => 'Bendigo rooftops',
                'popular_h2' => 'Popular Services in Bendigo',
                'popular_p' => 'PV arrays, battery storage, EV charging, and commercial solutions.',
                'why_title' => 'Why xTechs for Bendigo',
                'why_items' => [
                    ['title' => 'Design to Targets', 'desc' => 'Yield models aligned with your savings goals.'],
                    ['title' => 'Battery Backup', 'desc' => 'Essential circuits stay on during outages.'],
                    ['title' => 'Compliance', 'desc' => 'Approvals, metering, and export limits handled.'],
                    ['title' => 'Monitoring', 'desc' => 'Remote monitoring and support plans offered.'],
                    ['title' => 'Premium Hardware', 'desc' => 'Panels, inverters, and batteries we trust.'],
                    ['title' => 'Neat Installs', 'desc' => 'Clean workmanship and tidy cabling.'],
                ],
                'areas_h2' => 'Areas We Cover',
                'areas_lead' => 'Common Bendigo areas we service.',
                'areas' => ['Bendigo', 'Epsom', 'White Hills', 'Golden Square', 'Strathdale', 'Kennington', 'Golden Gully', 'Marong'],
                'map_iframe_title' => 'xTechs Renewables — Bendigo',
                'cta_h2' => 'Get a tailored quote for Bendigo',
                'cta_sub' => 'Book a site assessment or speak with our CEC-accredited team today.',
                'faq' => null,
                'json' => [
                    'name' => 'xTechs Renewables — Bendigo',
                    'geo' => ['lat' => -36.757, 'lng' => 144.279],
                    'area' => 'Bendigo',
                    'opening' => 'Mo-Fr 08:00-17:00',
                ],
            ];
            break;

        case 'geelong':
            $cfg = [
                'slug' => 'geelong',
                'hero_dir' => 'geelong',
                'hero_file' => 'geelong.webp',
                'hero_fallback' => null,
                'badge' => 'Geelong',
                'h1_accent' => 'for Geelong',
                'hero_lead' => 'Reliable PV, battery backup and EV charging for homes, new builds and commercial sites throughout Geelong and surrounds.',
                'trust' => [
                    ['icon' => 'shield', 'text' => 'CEC‑accredited'],
                    ['icon' => 'battery', 'text' => 'Backup‑ready systems'],
                    ['icon' => 'sun', 'text' => 'Tier‑one panels'],
                ],
                'hero_note' => '*Ask us about builder‑ready workflows for new developments.',
                'hero_img_alt' => 'Geelong rooftops',
                'popular_h2' => 'Popular Services in Geelong',
                'popular_p' => 'PV arrays, battery storage, EV charging & commercial solutions.',
                'why_title' => 'Why xTechs for Geelong',
                'why_items' => [
                    ['title' => 'Design to Targets', 'desc' => 'Yield models aligned with your savings goals.'],
                    ['title' => 'Battery Backup', 'desc' => 'Essential circuits on during outages.'],
                    ['title' => 'Compliance', 'desc' => 'Approvals, metering & export limits handled.'],
                    ['title' => 'Monitoring', 'desc' => 'Remote monitoring & support plans offered.'],
                    ['title' => 'Premium Hardware', 'desc' => 'Panels, inverters & batteries we trust.'],
                    ['title' => 'Neat Installs', 'desc' => 'Clean workmanship & tidy cabling.'],
                ],
                'areas_h2' => 'Areas We Cover',
                'areas_lead' => 'Common Geelong areas we service.',
                'areas' => ['Geelong', 'Belmont', 'Highton', 'Newtown', 'Waurn Ponds', 'Grovedale', 'Lara', 'Torquay'],
                'map_iframe_title' => 'xTechs Renewables — Geelong',
                'cta_h2' => 'Get a tailored quote for Geelong',
                'cta_sub' => 'Book a site assessment or speak with our CEC‑accredited team today.',
                'faq' => [
                    'title' => 'FAQ — Geelong',
                    'items' => [
                        ['q' => 'How long does installation take?', 'a' => 'Typically 1–2 days for homes; commercial projects depend on the site size.'],
                        ['q' => 'Do you support export limit setup?', 'a' => 'Yes, we handle DNSP requirements and full inverter configuration.'],
                        ['q' => 'What hardware warranty coverage do you offer?', 'a' => 'Panels usually carry 25–30 year performance warranties; inverters around 10 years; batteries around 10 years, depending on the model.'],
                        ['q' => 'Do you offer monitoring and maintenance?', 'a' => 'Yes, we can set up monitoring and provide support plans.'],
                    ],
                ],
                'json' => [
                    'name' => 'xTechs Renewables — Geelong',
                    'geo' => ['lat' => -38.172, 'lng' => 144.384],
                    'area' => 'Geelong',
                    'opening' => 'Mo-Fr 08:00-17:00',
                ],
            ];
            break;

        case 'mornington-peninsula':
            $cfg = [
                'slug' => 'mornington-peninsula',
                'hero_dir' => 'mornington',
                'hero_file' => 'mornington.webp',
                'hero_fallback' => null,
                'badge' => 'Mornington Peninsula',
                'h1_accent' => 'for the Peninsula',
                'hero_lead' => 'Coastal‑grade designs for salt‑air environments, battery backup for outages, and EV charging for home & holiday homes.',
                'trust' => [
                    ['icon' => 'shield', 'text' => 'CEC‑accredited'],
                    ['icon' => 'battery', 'text' => 'Backup‑ready solutions'],
                    ['icon' => 'sun', 'text' => '25‑yr panel performance'],
                ],
                'hero_note' => '*We specify corrosion‑resistant hardware for coastal installs.',
                'hero_img_alt' => 'Mornington Peninsula rooftops',
                'popular_h2' => 'Popular Services on the Peninsula',
                'popular_p' => 'PV + battery, coastal‑grade components, compliant EV charging.',
                'why_title' => 'Why xTechs for the Peninsula',
                'why_items' => [
                    ['title' => 'Coastal Durability', 'desc' => 'Hardware & fixings specified for salt‑air conditions.'],
                    ['title' => 'Battery Backup', 'desc' => 'Keep essentials on during storms & outages.'],
                    ['title' => 'Grid & Compliance', 'desc' => 'DNSP applications, metering & export limits.'],
                    ['title' => 'Monitoring', 'desc' => 'Remote monitoring & optional support plans.'],
                    ['title' => 'Premium Components', 'desc' => 'Panels, inverters, batteries we trust.'],
                    ['title' => 'Neat Installs', 'desc' => 'Careful roof work & tidy cable runs.'],
                ],
                'areas_h2' => 'Areas We Cover',
                'areas_lead' => 'We service the broader Mornington Peninsula—here are common areas.',
                'areas' => ['Mornington', 'Mount Martha', 'Mount Eliza', 'Frankston', 'Dromana', 'Rosebud', 'Rye', 'Sorrento'],
                'map_iframe_title' => 'xTechs Renewables — Mornington Peninsula',
                'cta_h2' => 'Get a tailored quote for Mornington Peninsula',
                'cta_sub' => 'Book a site assessment or speak with our CEC‑accredited team today.',
                'faq' => null,
                'json' => [
                    'name' => 'xTechs Renewables — Mornington Peninsula',
                    'geo' => ['lat' => -38.34, 'lng' => 145.0],
                    'area' => 'Mornington Peninsula',
                    'opening' => 'Mo-Fr 08:00-17:00',
                ],
            ];
            break;

        case 'south-east-melbourne':
            $cfg = [
                'slug' => 'south-east-melbourne',
                'hero_dir' => 'south-melb',
                'hero_file' => 'south-melb.webp',
                'hero_fallback' => null,
                'badge' => 'South‑East Melbourne',
                'h1_accent' => 'for South‑East Melbourne',
                'hero_lead' => 'CEC‑accredited installations for homes & businesses in the South‑East—quality PV arrays, battery backup, and EV charging tailored to your usage and roof type.',
                'trust' => [
                    ['icon' => 'shield', 'text' => 'CEC‑accredited'],
                    ['icon' => 'battery', 'text' => 'Battery‑ready designs'],
                    ['icon' => 'sun', 'text' => 'Tier‑one panels'],
                ],
                'hero_note' => '*Hardware & warranty vary by model—ask our team for details.',
                'hero_img_alt' => 'South-East Melbourne rooftops',
                'popular_h2' => 'Popular Services in the South‑East',
                'popular_p' => 'PV + battery combos, export limit setup, and compliant EV charging.',
                'why_title' => 'Why xTechs for South‑East',
                'why_items' => [
                    ['title' => 'Tailored Designs', 'desc' => 'Orientation & shading analysis to maximise yield.'],
                    ['title' => 'Battery Integration', 'desc' => 'Backup essential loads & meet household goals.'],
                    ['title' => 'Compliance & Approvals', 'desc' => 'DNSP, export limits & metering handled for you.'],
                    ['title' => 'Monitoring', 'desc' => 'We set up monitoring & optional maintenance plans.'],
                    ['title' => 'Premium Hardware', 'desc' => 'Panels, inverters & batteries we trust.'],
                    ['title' => 'Neat Installs', 'desc' => 'Tidy works with minimal disruption.'],
                ],
                'areas_h2' => 'Areas We Cover',
                'areas_lead' => 'Popular South‑East suburbs we frequently service.',
                'areas' => ['Rowville', 'Glen Waverley', 'Mulgrave', 'Narre Warren', 'Berwick', 'Dandenong', 'Clayton', 'Keysborough'],
                'map_iframe_title' => 'xTechs Renewables — South-East Melbourne',
                'cta_h2' => 'Get a tailored quote for South‑East Melbourne',
                'cta_sub' => 'Book a site assessment or speak with our CEC‑accredited team today.',
                'faq' => null,
                'json' => [
                    'name' => 'xTechs Renewables — South‑East Melbourne',
                    'geo' => ['lat' => -38.1373, 'lng' => 145.1878],
                    'area' => 'South‑East Melbourne',
                    'opening' => [
                        '@type' => 'OpeningHoursSpecification',
                        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                        'opens' => '08:00',
                        'closes' => '17:00',
                    ],
                ],
            ];
            break;

        default:
            return null;
    }

    $cfg['map_embed'] = $map_embed;
    $cfg['hero_url'] = xtechs_location_resolve_hero(
        (string) $cfg['hero_dir'],
        (string) $cfg['hero_file'],
        isset($cfg['hero_fallback']) ? (string) $cfg['hero_fallback'] : null
    );

    return $cfg;
}

/**
 * @param array<string, mixed> $cfg
 * @return array<string, mixed>
 */
function xtechs_location_landing_json_ld(array $cfg): array
{
    $slug = (string) ($cfg['slug'] ?? '');
    $logo_url = xtechs_location_theme_media_url('xlogo.png');
    $j = (array) ($cfg['json'] ?? []);
    $opening = $j['opening'] ?? 'Mo-Fr 08:00-17:00';
    if (is_array($opening) && (($opening['@type'] ?? '') === 'OpeningHoursSpecification')) {
        $opening_hours = [$opening];
    } else {
        $opening_hours = $opening;
    }

    $out = [
        '@context' => 'https://schema.org',
        '@type' => 'LocalBusiness',
        '@id' => trailingslashit(home_url('/' . $slug)) . '#localbusiness',
        'name' => (string) ($j['name'] ?? 'xTechs Renewables'),
        'url' => home_url('/' . $slug . '/'),
        'image' => (string) ($cfg['hero_url'] ?? $logo_url),
        'logo' => $logo_url,
        'telephone' => '+611300983247',
        'priceRange' => '$$',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => '2 Corporate Ave',
            'addressLocality' => 'Rowville',
            'addressRegion' => 'VIC',
            'postalCode' => '3178',
            'addressCountry' => 'AU',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => (float) ($j['geo']['lat'] ?? -37.9),
            'longitude' => (float) ($j['geo']['lng'] ?? 145.1),
        ],
        'areaServed' => [['@type' => 'AdministrativeArea', 'name' => (string) ($j['area'] ?? '')]],
        'openingHoursSpecification' => $opening_hours,
    ];

    return $out;
}
