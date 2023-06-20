<?php
    /**
     * Blog page 
     * --------
     */
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="hero-title">Latest news</h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post();
        get_template_part( 'entry' );

        // No need for comments
        // comments_template();
        endwhile; endif;
    ?>

    <?php get_template_part( 'nav', 'below' ); ?>
</main>

<?php
    get_footer();