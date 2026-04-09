<?php
if (!defined('ABSPATH')) {
    exit;
}

$amber_signup = 'https://app.amber.com.au/signup/?couponCode=XTECHSRENEWAB';
$contact_url = function_exists('xtechs_page_link') ? xtechs_page_link('contact') : home_url('/contact/');

$ic_dollar = '<svg class="xt-amber-card-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>';
$ic_zap = '<svg class="xt-amber-card-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>';
$ic_shield = '<svg class="xt-amber-card-ic" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>';
$ic_clock = '<svg class="xt-amber-card-ic xt-amber-card-ic--sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>';
$ic_trend = '<svg class="xt-amber-card-ic xt-amber-card-ic--sm" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>';
$ic_check = '<svg class="xt-amber-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>';
$ic_arrow = '<svg class="xt-icon-inline" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';
?>

<div class="xt-amber-page">
    <div class="xt-amber-hero">
        <div class="xt-container xt-amber-hero-inner">
            <span class="xt-amber-badge"><?php echo esc_html('🤝 xTechs & Amber Electric Partnership'); ?></span>
            <h1 class="xt-amber-hero-title">
                <span class="xt-amber-text-light">xTechs</span> + <span class="xt-amber-text-light">Amber Electric</span> =
                <br class="xt-amber-br-mobile" /> Maximum Solar ROI
            </h1>
            <p class="xt-amber-hero-lead">
                Get premium residential &amp; commercial solar systems from <strong>xTechs</strong> and maximize earnings with <strong>Amber Electric's</strong>
                wholesale pricing. Perfect for homes and businesses looking to maximize their solar investment.
            </p>
            <div class="xt-amber-hero-btns">
                <a class="xt-btn xt-btn-lg xt-amber-btn-hero-a" href="<?php echo esc_url($amber_signup); ?>" target="_blank" rel="noopener noreferrer">
                    <?php echo esc_html('Start Earning More Today'); ?>
                    <?php echo $ic_arrow; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG ?>
                </a>
                <a class="xt-btn xt-btn-lg xt-amber-btn-hero-b" href="<?php echo esc_url($contact_url); ?>">
                    <?php echo esc_html('Book Site Inspection'); ?>
                </a>
            </div>
        </div>
    </div>

    <div class="xt-amber-partnership">
        <div class="xt-container">
            <div class="xt-amber-narrow xt-amber-center">
                <h2 class="xt-amber-h2">
                    The Perfect Partnership: <span class="xt-amber-text-secondary">xTechs</span> + <span class="xt-amber-text-primary">Amber Electric</span>
                </h2>
                <p class="xt-amber-intro">
                    When Australia's leading residential &amp; commercial solar specialist teams up with the smartest energy retailer,
                    you get unbeatable value and maximum returns for your home or business.
                </p>
                <div class="xt-amber-part-grid">
                    <div class="xt-amber-part-card xt-amber-part-card--xt">
                        <h3 class="xt-amber-h3"><?php echo esc_html('🏠 xTechs Solar Systems'); ?></h3>
                        <ul class="xt-amber-ul">
                            <li>Premium residential &amp; commercial solar</li>
                            <li>Advanced battery storage solutions</li>
                            <li>Industry-leading reliability &amp; warranties</li>
                            <li>Professional installation &amp; ongoing support</li>
                        </ul>
                    </div>
                    <div class="xt-amber-part-card xt-amber-part-card--am">
                        <h3 class="xt-amber-h3"><?php echo esc_html('⚡ Amber Electric'); ?></h3>
                        <ul class="xt-amber-ul">
                            <li>Wholesale energy pricing</li>
                            <li>Smart automation &amp; optimization</li>
                            <li>Up to $19/kWh earnings</li>
                            <li>No lock-in contracts</li>
                        </ul>
                    </div>
                </div>
                <div class="xt-amber-combined">
                    <h3 class="xt-amber-h3 xt-amber-h3--white"><?php echo esc_html('🎯 Combined Benefits for Homes & Businesses'); ?></h3>
                    <p class="xt-amber-combined-p">
                        Get the best residential &amp; commercial solar system AND the best energy rates. Our partnership ensures
                        homeowners and businesses maximize both their upfront investment and their ongoing returns.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="xt-amber-section">
        <div class="xt-container">
            <div class="xt-amber-wide">
                <div class="xt-amber-center xt-amber-mb-lg">
                    <h2 class="xt-amber-h2"><?php echo esc_html('Why Choose Our Partnership?'); ?></h2>
                    <p class="xt-amber-sub"><?php echo esc_html("Get the best of both worlds: premium xTechs solar systems + Amber's wholesale energy pricing"); ?></p>
                </div>
                <div class="xt-amber-benefits-grid">
                    <article class="xt-amber-card xt-amber-card--center">
                        <div class="xt-amber-icon-wrap xt-amber-icon-wrap--green"><?php echo $ic_dollar; // phpcs:ignore ?></div>
                        <h3 class="xt-amber-card-title"><?php echo esc_html('Earn Up to $19/kWh'); ?></h3>
                        <p class="xt-amber-card-text">During price spikes, export your solar energy for massive returns. Real customers earn $58-$166 in single events.</p>
                    </article>
                    <article class="xt-amber-card xt-amber-card--center">
                        <div class="xt-amber-icon-wrap xt-amber-icon-wrap--blue"><?php echo $ic_zap; // phpcs:ignore ?></div>
                        <h3 class="xt-amber-card-title"><?php echo esc_html('Smart Automation'); ?></h3>
                        <p class="xt-amber-card-text">SmartShift automatically optimizes your battery charging and discharging to maximize your earnings.</p>
                    </article>
                    <article class="xt-amber-card xt-amber-card--center">
                        <div class="xt-amber-icon-wrap xt-amber-icon-wrap--purple"><?php echo $ic_shield; // phpcs:ignore ?></div>
                        <h3 class="xt-amber-card-title"><?php echo esc_html('No Lock-in Contracts'); ?></h3>
                        <p class="xt-amber-card-text">Switch anytime with no penalties. We win when you win - simple subscription fee, no hidden margins.</p>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div class="xt-amber-section">
        <div class="xt-container">
            <div class="xt-amber-narrow">
                <div class="xt-amber-center xt-amber-mb-md">
                    <h2 class="xt-amber-h2"><?php echo esc_html('How Amber Works'); ?></h2>
                    <p class="xt-amber-sub"><?php echo esc_html('Simple automation that maximizes your solar and battery ROI'); ?></p>
                </div>
                <div class="xt-amber-how-grid">
                    <article class="xt-amber-card">
                        <div class="xt-amber-how-head">
                            <div class="xt-amber-icon-wrap xt-amber-icon-wrap--yellow xt-amber-icon-wrap--sm"><?php echo $ic_clock; // phpcs:ignore ?></div>
                            <h3 class="xt-amber-card-title xt-amber-card-title--left"><?php echo esc_html('Daytime Charging'); ?></h3>
                        </div>
                        <p class="xt-amber-card-text">Your battery charges when wholesale prices are low and renewables are abundant - maximizing your solar generation value.</p>
                    </article>
                    <article class="xt-amber-card">
                        <div class="xt-amber-how-head">
                            <div class="xt-amber-icon-wrap xt-amber-icon-wrap--mint xt-amber-icon-wrap--sm"><?php echo $ic_trend; // phpcs:ignore ?></div>
                            <h3 class="xt-amber-card-title xt-amber-card-title--left"><?php echo esc_html('Evening Earnings'); ?></h3>
                        </div>
                        <p class="xt-amber-card-text">Your battery discharges during peak demand when wholesale prices spike - earning you premium rates up to $19/kWh.</p>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <div class="xt-amber-stats">
        <div class="xt-container">
            <div class="xt-amber-narrow xt-amber-center">
                <h2 class="xt-amber-h2 xt-amber-h2--white"><?php echo esc_html('Amazing Q1 2024-25 Results'); ?></h2>
                <div class="xt-amber-stats-grid">
                    <div>
                        <div class="xt-amber-stat-num">74%</div>
                        <p class="xt-amber-stat-label">of customers had negative bills</p>
                    </div>
                    <div>
                        <div class="xt-amber-stat-num">$1,283</div>
                        <p class="xt-amber-stat-label">Median NSW customer earnings</p>
                    </div>
                    <div>
                        <div class="xt-amber-stat-num">$3,000+</div>
                        <p class="xt-amber-stat-label">Top 5% customer earnings</p>
                    </div>
                </div>
                <div class="xt-amber-state-box">
                    <h3 class="xt-amber-state-title"><?php echo esc_html('State-by-State Earnings (Q1 2024-25)'); ?></h3>
                    <div class="xt-amber-state-grid">
                        <div class="xt-amber-state-col">
                            <div class="xt-amber-state-code">NSW</div>
                            <div class="xt-amber-state-line">$1,283 avg</div>
                            <div class="xt-amber-state-sub">$2,395 top 10%</div>
                        </div>
                        <div class="xt-amber-state-col">
                            <div class="xt-amber-state-code">QLD</div>
                            <div class="xt-amber-state-line">$537 avg</div>
                            <div class="xt-amber-state-sub">$1,194 top 10%</div>
                        </div>
                        <div class="xt-amber-state-col">
                            <div class="xt-amber-state-code">SA</div>
                            <div class="xt-amber-state-line">$515 avg</div>
                            <div class="xt-amber-state-sub">$1,085 top 10%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="xt-amber-section">
        <div class="xt-container">
            <div class="xt-amber-narrow">
                <div class="xt-amber-center xt-amber-mb-md">
                    <h2 class="xt-amber-h2"><?php echo esc_html('Amber vs Traditional Retailers'); ?></h2>
                    <p class="xt-amber-sub"><?php echo esc_html('See why Amber is the smart choice for solar and battery owners'); ?></p>
                </div>
                <div class="xt-amber-table-card">
                    <div class="xt-amber-table-scroll">
                        <table class="xt-amber-table">
                            <thead>
                                <tr>
                                    <th scope="col">Feature</th>
                                    <th scope="col" class="xt-amber-th-green">Amber SmartShift</th>
                                    <th scope="col" class="xt-amber-th-muted">Other Retailer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $rows = [
                                    ['Variable wholesale feed-in rates up to $19/kWh', true, false],
                                    ["Keep 100% of your energy's value", true, false],
                                    ['Continuous battery optimization', true, false],
                                    ['Automation or manual control options', true, false],
                                    ['Optimized for your benefit, not theirs', true, false],
                                    ['No restrictions on solar system size', true, false],
                                    ['No lock-in contract', true, true],
                                ];
                                foreach ($rows as $i => $row) :
                                    ?>
                                    <tr<?php echo $i % 2 === 1 ? ' class="xt-amber-tr-alt"' : ''; ?>>
                                        <td><?php echo esc_html($row[0]); ?></td>
                                        <td class="xt-amber-td-ic"><?php echo $row[1] ? $ic_check : '<span class="xt-amber-x" aria-hidden="true">✗</span>'; // phpcs:ignore ?></td>
                                        <td class="xt-amber-td-ic"><?php echo $row[2] ? $ic_check : '<span class="xt-amber-x" aria-hidden="true">✗</span>'; // phpcs:ignore ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="xt-amber-cta">
        <div class="xt-container">
            <div class="xt-amber-narrow xt-amber-center">
                <h2 class="xt-amber-h2 xt-amber-h2--white">
                    Ready to Join the <span class="xt-amber-text-light">xTechs</span> + <span class="xt-amber-text-light">Amber</span> Partnership?
                </h2>
                <p class="xt-amber-cta-lead">
                    Get premium residential &amp; commercial solar systems from xTechs AND maximize your earnings with Amber Electric's wholesale pricing.
                    Perfect for homeowners and businesses looking to maximize their solar investment!
                </p>
                <div class="xt-amber-hero-btns">
                    <a class="xt-btn xt-btn-lg xt-amber-btn-cta-a" href="<?php echo esc_url($amber_signup); ?>" target="_blank" rel="noopener noreferrer">
                        <?php echo esc_html('Get xTechs Customer Benefits'); ?>
                        <?php echo $ic_arrow; // phpcs:ignore ?>
                    </a>
                    <a class="xt-btn xt-btn-lg xt-amber-btn-cta-b" href="<?php echo esc_url($contact_url); ?>">
                        <?php echo esc_html('Get xTechs Solar Quote'); ?>
                    </a>
                </div>
                <div class="xt-amber-gift-box">
                    <h3 class="xt-amber-gift-title"><?php echo esc_html('🎁 Exclusive Partnership Benefits'); ?></h3>
                    <p class="xt-amber-gift-text">
                        • Use coupon code <strong>XTECHSRENEWAB</strong> for special pricing<br />
                        • Priority support from both xTechs and Amber teams<br />
                        • Seamless integration between your solar system and energy optimization
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="xt-amber-foot">
        <div class="xt-container">
            <div class="xt-amber-narrow xt-amber-center">
                <div class="xt-amber-disclaimer-card">
                    <h3 class="xt-amber-disclaimer-h"><?php echo esc_html('About Our Partnership'); ?></h3>
                    <p class="xt-amber-disclaimer-p">
                        xTechs and Amber Electric have formed a strategic partnership to provide homeowners and businesses with the best
                        residential &amp; commercial solar systems and energy optimization. While we work together to maximize your benefits, each company
                        operates independently within their expertise.
                    </p>
                    <p class="xt-amber-disclaimer-small">
                        <strong>Disclaimer:</strong> Amber Electric is a separate energy retailer. xTechs provides solar systems and installation services.
                        Earnings depend on market conditions and system performance. Past performance doesn't guarantee future results.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
