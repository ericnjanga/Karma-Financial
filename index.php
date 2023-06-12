<?php
get_header();
?>
<!-- 
    Blog page 
-->

<h1>.... index</h1>

<?php
if ( have_posts() ) : while ( have_posts() ) : the_post();
get_template_part( 'entry' );

// No need for comments
// comments_template();
endwhile; endif;
get_template_part( 'nav', 'below' );
get_footer();