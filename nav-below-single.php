<?php
$args = array(
    'prev_text' => '<span class="meta-nav">&larr;</span> <span class="heading-ff fs-5">%title</span>',
    'next_text' => '<span class="heading-ff fs-5">%title</span> <span class="meta-nav">&rarr;</span>'
);
the_post_navigation( $args );
