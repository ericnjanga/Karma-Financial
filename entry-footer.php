
<footer class="entry-footer">
    <span class="cat-links">
        <?php esc_html_e( 'Categories: ', 'generic' ); ?>
    </span>
    <?php
        $categories = get_the_category();
        if (!empty($categories)) {
            echo '<span class="heading-ff fs-6">';
            foreach ($categories as $category) {
                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
            }
            echo '</span>';
        }
    ?>


<span class="tag-links"><?php the_tags(); ?></span>
<?php //if ( comments_open() ) { echo '<span class="meta-sep">|</span> <span class="comments-link"><a href="' . esc_url( get_comments_link() ) . '">' . sprintf( esc_html__( 'Comments', 'generic' ) ) . '</a></span>'; } ?>
</footer>