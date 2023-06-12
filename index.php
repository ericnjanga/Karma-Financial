<?php
get_header();
?>
<!-- 
    Blog page 
-->

<header class="hero">
    <div class="text-wrapper">
        <h1 class="underlined"><?php echo getField('title'); ?></h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<!-- <h1>.... index</h1> -->

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
get_template_part( 'entry' );

// No need for comments
// comments_template();
endwhile; endif;
get_template_part( 'nav', 'below' );
get_footer();