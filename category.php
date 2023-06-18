<?php
    /**
     * Category page 
     * --------
     */
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <span class="fs-7">Category page</span>
        <h1 class="underlined"><?php single_term_title(); ?></h1>
        <div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div>
    </div>
</header>


<section class="main-content-wrapper">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'entry' ); ?>
    <?php endwhile; endif; ?>
    <?php get_template_part( 'nav', 'below' ); ?>
</section>

<?php get_footer(); ?>