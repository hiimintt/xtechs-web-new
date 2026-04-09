<?php
/*
Template Name: Contact + Booking
*/

get_header();
?>
<section class="section page-shell">
    <div class="container">
        <div class="prose">
            <h1><?php the_title(); ?></h1>
            <p>This page is ready for your booking and contact integrations.</p>
            <div class="cards-grid">
                <article class="card">
                    <h3>Booking Calendar</h3>
                    <p>Embed Calendly or your preferred booking plugin shortcode here.</p>
                    <p><strong>Example:</strong> [calendly url="https://calendly.com/your-team"]</p>
                </article>
                <article class="card">
                    <h3>Contact Form</h3>
                    <p>Use WPForms, Gravity Forms, or Contact Form 7 shortcode here.</p>
                    <p><strong>Example:</strong> [wpforms id="123"]</p>
                </article>
                <article class="card">
                    <h3>Project Details</h3>
                    <p>Capture service type, address, and estimated usage requirements.</p>
                </article>
            </div>
            <div style="margin-top:1rem;">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        the_content();
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
