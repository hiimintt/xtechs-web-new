<?php
get_header();
?>
<div class="xt-home">
    <?php get_template_part('template-parts/home', 'hero'); ?>
    <?php get_template_part('template-parts/home', 'services'); ?>
    <?php get_template_part('template-parts/home', 'process'); ?>
    <?php get_template_part('template-parts/home', 'widgets'); ?>
</div>
<?php
get_footer();
