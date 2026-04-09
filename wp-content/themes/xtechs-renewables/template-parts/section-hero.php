<section class="section hero">
    <div class="hero-bg"></div>
    <div class="container hero-grid">
        <div>
            <p class="eyebrow">xTechs Renewables</p>
            <h1>Solar, Battery, EV and Off-Grid Systems Built For Australia</h1>
            <p class="lead">We design and install future-ready renewable energy systems for homes, business and builders.</p>
            <div class="cta-row">
                <a class="btn btn-primary" href="<?php echo esc_url(home_url('/contact')); ?>">Book Consultation</a>
                <a class="btn btn-outline" href="<?php echo esc_url(home_url('/about')); ?>">Learn More</a>
            </div>
        </div>
        <div class="hero-media">
            <?php
            $hero_path = get_template_directory() . '/assets/media/coming-soon-hero.jpg';
            if (file_exists($hero_path)) :
            ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/media/coming-soon-hero.jpg'); ?>" alt="Renewable energy solutions" />
            <?php else : ?>
                <div class="placeholder-card">Hero image placeholder</div>
            <?php endif; ?>
        </div>
    </div>
</section>
