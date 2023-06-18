<?php
    /**
     * Blog page 
     * --------
     */
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="underlined">Latest news</h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<section class="main-content-wrapper">
    <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'entry' );

        // No need for comments
        // comments_template();
        endwhile; endif;
    ?>

    <?php get_template_part( 'nav', 'below' ); ?>
</section>

<?php
    get_footer();