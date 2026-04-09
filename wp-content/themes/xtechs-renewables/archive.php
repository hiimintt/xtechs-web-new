<?php
get_header();
?>
<section class="section page-shell">
    <div class="container prose">
        <h1><?php the_archive_title(); ?></h1>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post-card">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p>No items found.</p>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
