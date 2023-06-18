<?php
    /**
     * Artile page
     * --------
     */
    get_header();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="underlined"><?php the_title(); ?></h1>
        <div>
            <?php get_template_part( 'entry', 'meta' ); ?>
        </div>
        <?php edit_post_link(); ?>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <?php get_template_part( 'entry' ); ?>
    <hr>
    <footer class="footer">
        <?php get_template_part( 'nav', 'below-single' ); ?>
    </footer>
</main>

<?php endwhile; endif; ?>

<?php get_footer(); ?>