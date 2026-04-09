<?php
if (!defined('ABSPATH')) {
    exit;
}
$unsplash_elec = 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop';
?>
<section class="xt-pvclone-services">
    <div class="xt-container xt-pvclone-services-inner">
        <header class="xt-pvclone-services-head">
            <h2 class="xt-pvclone-h2 xt-pvclone-h2--lg">Business services</h2>
            <p class="xt-pvclone-muted xt-pvclone-services-lead">Everything you need for a modern business energy setup—clear specs, professional installs, and ongoing support.</p>
        </header>

        <div class="xt-pvclone-svc-rows">
            <div class="xt-pvclone-svc-row">
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--left">
                    <?php
                    $u = xtechs_pv_clone_img_url('commercial-solar.jpg');
                    if ($u) :
                        ?>
                        <img src="<?php echo esc_url($u); ?>" alt="<?php esc_attr_e('Commercial solar installation on business building', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" />
                    <?php else : ?>
                        <div class="xt-pvclone-svc-ph" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('sun'); ?>
                        <h3>Solar installation & supply</h3>
                    </div>
                    <p>We design commercial arrays for maximum daytime load offset and peak demand reduction. Panels and mounting are specified for your roof type, load capacity, and shading conditions, with commissioning including comprehensive monitoring so you can track production and savings from day one. All export-limit approvals are handled with your distributor.</p>
                    <p class="xt-pvclone-svc-note">Typical system range: 15–200 kW solar</p>
                </div>
            </div>

            <div class="xt-pvclone-svc-row xt-pvclone-svc-row--flip">
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('battery'); ?>
                        <h3>Battery installation & supply</h3>
                    </div>
                    <p>Storage is sized to your load profile and peak demand patterns so it effectively cycles and delivers ROI. When configured for backup, essential circuits like lighting, refrigeration, and critical systems can keep running during outages. We commission charge and discharge windows optimized for your tariff structure and leave room for future upgrades such as additional capacity or EV charging.</p>
                    <p class="xt-pvclone-svc-note">Typical range: 10–200 kWh battery</p>
                </div>
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--left">
                    <?php
                    $u2 = xtechs_pv_clone_img_url('commercial-battery.jpg');
                    if ($u2) :
                        ?>
                        <img src="<?php echo esc_url($u2); ?>" alt="<?php esc_attr_e('Commercial battery storage system', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" />
                    <?php else : ?>
                        <div class="xt-pvclone-svc-ph" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="xt-pvclone-svc-row">
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--left">
                    <?php
                    $u3 = xtechs_pv_clone_img_url('commercial-ev-charger.jpg');
                    if ($u3) :
                        ?>
                        <img src="<?php echo esc_url($u3); ?>" alt="<?php esc_attr_e('Commercial EV charger installation', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" />
                    <?php else : ?>
                        <div class="xt-pvclone-svc-ph" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('zap'); ?>
                        <h3>EV-charger installation & supply</h3>
                    </div>
                    <p>We match the charger to your switchboard capacity and cable run, set up load management so it doesn't trip the main, and enable solar-aware charging modes where supported. Wallbox location and cable routing are planned for daily convenience, safe clearances, and future fleet expansion. Commercial-grade equipment ensures reliability and performance.</p>
                    <p class="xt-pvclone-svc-note">Load management & solar-aware charging</p>
                </div>
            </div>

            <div class="xt-pvclone-svc-row xt-pvclone-svc-row--flip">
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('wrench'); ?>
                        <h3>Commercial electrical work</h3>
                    </div>
                    <p>From switchboard upgrades and safety switches to lighting, earthing, and rewires, our licensed team delivers neat, compliant work with clear documentation. We coordinate metering visits when needed so you're not left waiting, and handle all necessary permits and approvals for commercial installations.</p>
                    <p class="xt-pvclone-svc-note">Licensed electricians & compliance documentation</p>
                </div>
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--left">
                    <img src="<?php echo esc_url($unsplash_elec); ?>" alt="<?php esc_attr_e('Commercial electrical work and switchboard', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" />
                </div>
            </div>
        </div>
    </div>
</section>
