<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<section class="xt-pvclone-services">
    <div class="xt-container xt-pvclone-services-inner">
        <header class="xt-pvclone-services-head">
            <h2 class="xt-pvclone-h2 xt-pvclone-h2--lg">Residential services</h2>
            <p class="xt-pvclone-muted xt-pvclone-services-lead">Everything you need for a modern home energy setup—clear specs, neat installs, and support after commissioning.</p>
        </header>

        <div class="xt-pvclone-svc-rows">
            <div class="xt-pvclone-svc-row">
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--left">
                    <?php
                    $u = xtechs_pv_clone_img_url('residential-solar-install-and-supply.jpeg');
                    if ($u) :
                        ?>
                        <img src="<?php echo esc_url($u); ?>" alt="<?php esc_attr_e('Solar panels on residential roof', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" />
                    <?php else : ?>
                        <div class="xt-pvclone-svc-ph" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('sun'); ?>
                        <h3>Solar installation & supply</h3>
                    </div>
                    <p>We design a home array for high self-consumption so more of your daytime use is powered by your own roof. Panels and mounting are specified for your roof type and shading, and commissioning includes monitoring so you can see production from day one. Export-limit approvals are handled with your distributor.</p>
                    <p class="xt-pvclone-svc-note">Typical system range: 5–10 kW solar</p>
                </div>
            </div>

            <div class="xt-pvclone-svc-row xt-pvclone-svc-row--flip">
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('battery'); ?>
                        <h3>Battery installation & supply</h3>
                    </div>
                    <p>Storage is sized to your usage pattern so it actually cycles and pays off. When configured for backup, essential circuits like lighting, refrigeration and internet can keep running during an outage. We commission charge and discharge windows and leave room for future upgrades such as EVs or hot-water.</p>
                    <p class="xt-pvclone-svc-note">Typical range: 5–13.5 kWh battery</p>
                </div>
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--contain">
                    <?php
                    $u2 = xtechs_pv_clone_img_url('residential-battery-install-and-supply.jpeg');
                    if ($u2) :
                        ?>
                        <span class="xt-pvclone-svc-blur" style="background-image:url(<?php echo esc_url($u2); ?>)" aria-hidden="true"></span>
                        <img src="<?php echo esc_url($u2); ?>" alt="<?php esc_attr_e('Home battery storage system', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" class="xt-pvclone-svc-img-fit" />
                    <?php else : ?>
                        <div class="xt-pvclone-svc-ph" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="xt-pvclone-svc-row">
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--contain">
                    <?php
                    $u3 = xtechs_pv_clone_img_url('ev-charger-installation-and-supply.jpeg');
                    if ($u3) :
                        ?>
                        <span class="xt-pvclone-svc-blur" style="background-image:url(<?php echo esc_url($u3); ?>)" aria-hidden="true"></span>
                        <img src="<?php echo esc_url($u3); ?>" alt="<?php esc_attr_e('EV charger installation', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" class="xt-pvclone-svc-img-fit" />
                    <?php else : ?>
                        <div class="xt-pvclone-svc-ph" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('zap'); ?>
                        <h3>EV-charger installation & supply</h3>
                    </div>
                    <p>We match the charger to your switchboard capacity and cable run, set up load management so it doesn't trip the main, and enable solar-aware charging modes where supported. Wallbox location and cable routing are planned for daily convenience and safe clearances.</p>
                    <p class="xt-pvclone-svc-note">Load management & solar-aware charging</p>
                </div>
            </div>

            <div class="xt-pvclone-svc-row xt-pvclone-svc-row--flip">
                <div class="xt-pvclone-svc-body">
                    <div class="xt-pvclone-svc-h">
                        <?php echo xtechs_pv_clone_icon('wrench'); ?>
                        <h3>House electrical work</h3>
                    </div>
                    <p>From switchboard upgrades and safety switches to lighting, earthing and rewires, our licensed team delivers neat, compliant work with clear documentation. We coordinate metering visits when needed so you're not left waiting.</p>
                    <p class="xt-pvclone-svc-note">Licensed electricians & compliance documentation</p>
                </div>
                <div class="xt-pvclone-svc-img xt-pvclone-svc-img--left">
                    <?php
                    $u4 = xtechs_pv_clone_img_url('residential-electrical.jpg');
                    if ($u4) :
                        ?>
                        <img src="<?php echo esc_url($u4); ?>" alt="<?php esc_attr_e('Electrical work and switchboard', 'xtechs-renewables'); ?>" loading="lazy" decoding="async" />
                    <?php else : ?>
                        <div class="xt-pvclone-svc-ph" aria-hidden="true"></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
