<?php
/**
 * SEO Task List ❽ — recommended keyword targets (Victoria / Melbourne).
 * Used for context-specific meta keywords + internal documentation; tune titles/copy in onpage-seo.php / seo.php.
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Canonical list from the SEO brief (primary phrase → target surfaces, intent).
 *
 * @return list<array{primary: string, targets: string, intent: string}>
 */
function xtechs_seo_recommended_keyword_targets(): array {
    $rows = [
        [
            'primary' => 'solar panel installation Melbourne',
            'targets' => 'Home / Commercial PV',
            'intent' => 'transactional',
        ],
        [
            'primary' => 'commercial solar installation Victoria',
            'targets' => 'Commercial PV',
            'intent' => 'transactional',
        ],
        [
            'primary' => 'solar battery storage Melbourne',
            'targets' => 'Home / Blog',
            'intent' => 'informational',
        ],
        [
            'primary' => 'EV charger installation Melbourne',
            'targets' => 'Home / Blog',
            'intent' => 'transactional',
        ],
        [
            'primary' => 'off-grid solar systems Victoria',
            'targets' => 'Home / Blog',
            'intent' => 'informational',
        ],
        [
            'primary' => 'solar panel cost Melbourne 2026',
            'targets' => 'Blog',
            'intent' => 'informational',
        ],
        [
            'primary' => 'STC rebate solar Victoria',
            'targets' => 'Blog / FAQ',
            'intent' => 'informational',
        ],
        [
            'primary' => 'CEC approved solar installer Melbourne',
            'targets' => 'About / Home',
            'intent' => 'navigational',
        ],
        [
            'primary' => 'portable solar container Australia',
            'targets' => 'SolarFold',
            'intent' => 'transactional',
        ],
        [
            'primary' => 'mobile solar power solutions',
            'targets' => 'Mobil-Grid / SolarFold',
            'intent' => 'informational',
        ],
        [
            'primary' => 'ground mount solar Victoria',
            'targets' => 'Commercial PV / Blog',
            'intent' => 'transactional',
        ],
        [
            'primary' => 'solar installers near me',
            'targets' => 'Home (local SEO)',
            'intent' => 'local',
        ],
    ];

    return apply_filters('xtechs_seo_recommended_keyword_targets', $rows);
}

/**
 * Meta keywords (legacy / internal brief); Google largely ignores — keep concise per URL.
 *
 * @return list<string>
 */
function xtechs_seo_meta_keywords_for_request(): array {
    $path = '';
    $core = [
        'solar panel installation Melbourne',
        'commercial solar installation Victoria',
        'ground mount solar Victoria',
        'solar battery storage Melbourne',
        'EV charger installation Melbourne',
        'off-grid solar systems Victoria',
        'solar installers Melbourne',
        'STC rebate solar Victoria',
        'CEC approved solar installer Melbourne',
    ];

    if (is_front_page()) {
        $extra = [
            'solar installers near me',
            'portable solar container Australia',
            'mobile solar power solutions',
        ];

        $out = array_values(array_unique(array_merge($core, $extra)));

        return apply_filters('xtechs_seo_meta_keywords_for_request', $out, 'front-page');
    }

    if (!is_singular()) {
        return apply_filters('xtechs_seo_meta_keywords_for_request', $core, $path);
    }

    global $post;
    if (!$post instanceof WP_Post) {
        return apply_filters('xtechs_seo_meta_keywords_for_request', $core, $path);
    }

    $path = $post->post_type === 'page' ? xtechs_seo_page_path($post) : $post->post_name;
    $extra = [];

    switch ($path) {
        case 'about':
            $extra = ['CEC approved solar installer Melbourne', 'solar installers Melbourne', 'Rowville solar'];
            break;
        case 'pv-battery/residential':
            $extra = ['solar panel installation Melbourne', 'solar battery storage Melbourne', 'STC rebate solar Victoria'];
            break;
        case 'pv-battery/business':
            $extra = ['commercial solar installation Victoria', 'ground mount solar Victoria', 'solar panel installation Melbourne'];
            break;
        case 'pv-battery/off-grid':
            $extra = ['off-grid solar systems Victoria', 'hybrid solar battery Victoria'];
            break;
        case 'battery':
            $extra = ['solar battery storage Melbourne', 'home battery Victoria', 'STC rebate solar Victoria'];
            break;
        case 'ev-chargers':
            $extra = ['EV charger installation Melbourne', 'workplace EV charging Victoria'];
            break;
        case 'solarfold':
        case 'solarfold/solarfold':
            $extra = ['portable solar container Australia', 'mobile solar power solutions', 'deployable solar Australia'];
            break;
        case 'solarfold/mobil-grid':
            $extra = ['mobile solar power solutions', 'portable solar container Australia', 'Mobil-Grid solar'];
            break;
        default:
            if (strpos($path, 'solarfold/') === 0) {
                $extra = ['portable solar container Australia', 'mobile solar power solutions'];
            }
            break;
    }

    $out = array_values(array_unique(array_merge($extra, $core)));

    return apply_filters('xtechs_seo_meta_keywords_for_request', $out, $path);
}
