<?php
    /*
    Template Name: Contact Template
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="underlined">??++??<?php echo getField('title'); ?></h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content" itemprop="mainContentOfPage">
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); } ?>
            <?php the_content(); ?>
            <div class="entry-links"><?php wp_link_pages(); ?></div>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>