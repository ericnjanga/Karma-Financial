<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
        // Don't display header on article page (it's al ready handled)
        if (!is_single()) { 
    ?>
        <header>

            <div class="entry-meta">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item entry-category heading-ff">
                        <?php
                            include '_category-link.php';
                        ?>
                    </li>
                    <li class="list-inline-item meta-sep">
                        |
                    </li>
                    <li class="list-inline-item fs-8">
                        <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_date() ); ?>" <?php if ( is_single() ) { echo 'itemprop="datePublished" pubdate'; } ?>><?php the_time( get_option( 'date_format' ) ); ?></time>
                    </li>
                </ul>

                <!-- <?php if ( is_single() ) { echo '<meta itemprop="dateModified" content="' . esc_attr( get_the_modified_date() ) . '" />'; } ?> -->
            </div>


            <?php if ( is_singular() ) { echo '<h1 class="entry-title" itemprop="headline">'; } else { echo '<h2 class="entry-title">'; } ?>
            
            <a class="km-link-primary" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
            
            <?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
            
            <?php edit_post_link(); ?>
     
            <?php //if ( !is_search() ) { get_template_part( 'entry', 'meta' ); } ?>
        </header>
    <?php } ?>



    <?php get_template_part( 'entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
    <?php if ( is_singular() ) { get_template_part( 'entry-footer' ); } ?>
</article>