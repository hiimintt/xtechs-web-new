<?php
get_header();
?>
<section class="section page-shell">
    <div class="container prose">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                echo '<h1>' . esc_html(get_the_title()) . '</h1>';
                the_content();
            }
        }
        ?>
    </div>
</section>
<?php
get_footer();
