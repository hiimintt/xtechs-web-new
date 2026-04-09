<?php
get_header();
?>
<div class="xt-page-blog xt-section xt-section-muted">
    <div class="xt-container xt-container-narrow">
        <h1 class="xt-page-title"><?php esc_html_e('Updates', 'xtechs-renewables'); ?></h1>
        <p class="xt-page-lead"><?php bloginfo('description'); ?></p>
        <div class="xt-post-list">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <article <?php post_class('xt-post-card'); ?>>
                        <h2 class="xt-post-card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                    </article>
                    <?php
                }
            } else {
                echo '<p>' . esc_html__('No content found.', 'xtechs-renewables') . '</p>';
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
