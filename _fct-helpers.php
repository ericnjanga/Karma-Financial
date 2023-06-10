
<?php
    function getField($name) {
        global $post;

        // Get the light theme image URL
        $field = get_field($name, $post->ID);
        $value = $field ? $field : 'No '.$name.' found.';

        return $value;
    }
?>

<?php
    function getFieldByID($name, $id) {
        return get_post_meta($id, $name, true);
    }
?>

<?php
    function displayAward($count = -1) {
        $args = array(
            'post_type' => 'award',
            'posts_per_page' => $count,
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                <div class="award-item">
                    <figure>
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail');
                        } ?>
                        <figcaption><?php the_title(); ?></figcaption>
                    </figure>
                </div>
                <?php
            }
        } else {
            echo '<p>No awards found.</p>';
        }
    
        wp_reset_postdata();
    }
?>

<?php
    function displayTestimonial($count = -1) {
        $args = array(
            'post_type' => 'testimonial',
            'posts_per_page' => $count,
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                    <div class="award-item--">
                        <p><?php the_content(); ?></p>
                        <p><b><?php the_title() ?></b></p>
                        <?php
                            $job_title = getFieldByID('job_title', get_the_ID());
                            if (!empty($job_title)) {
                                echo '<p>' . $job_title . '</p>';
                            }
                        ?>
                    </div>
                <?php
            }
        } else {
            echo '<p>No awards found.</p>';
        }
    
        wp_reset_postdata();
    }
?>

<?php
    function displayEmployee($count = -1) {
        $args = array(
            'post_type' => 'employee',
            'posts_per_page' => $count,
        );
    
        $query = new WP_Query($args);
    
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                ?>
                    <figure>
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'full', array( 'itemprop' => 'image', 'class' => 'img-thumbnail' ) );
                            }
                        ?>
                        <figcaption class="text-center">
                            <p><b><?php the_title() ?></b></p>
                            <p><?php the_content(); ?></p>
                        </figcaption>
                    </figure>
                <?php
            }
        } else {
            echo '<p>No employee found.</p>';
        }
    
        wp_reset_postdata();
    }
?>

<?php
    function displayPartners() {
        global $post;

        // Get the light theme logo URLs
        $logo_1_light_theme = get_field('logo_1_light_theme', $post->ID);
        $logo_2_light_theme = get_field('logo_2_light_theme', $post->ID);
        $logo_3_light_theme = get_field('logo_3_light_theme', $post->ID);

        // Get the dark theme logo URLs
        $logo_1_dark_theme = get_field('logo_1_dark_theme', $post->ID);
        $logo_2_dark_theme = get_field('logo_2_dark_theme', $post->ID);
        $logo_3_dark_theme = get_field('logo_3_dark_theme', $post->ID);

        // Display the hero images and logos
        if ($logo_1_light_theme && $logo_2_light_theme && $logo_3_light_theme && 
        $logo_1_dark_theme && $logo_2_dark_theme && $logo_3_dark_theme) {
            ?>
            <div class="img-group">
                <div class="img-theme-light">
                    <img src="<?php echo $logo_1_light_theme; ?>">
                </div>
                <div class="img-theme-light">
                    <img src="<?php echo $logo_2_light_theme; ?>">
                </div>
                <div class="img-theme-light">
                    <img src="<?php echo $logo_3_light_theme; ?>">
                </div>
                
                <div class="img-theme-dark">
                    <img src="<?php echo $logo_1_dark_theme; ?>">
                </div>
                <div class="img-theme-dark">
                    <img src="<?php echo $logo_2_dark_theme; ?>">
                </div>
                <div class="img-theme-dark">
                    <img src="<?php echo $logo_3_dark_theme; ?>">
                </div>
            </div>
            <?php
        } else {
            ?>
            <p>No hero images or logos found.</p>
            <?php
        }
    }
?>

<?php
    function displayHero() {
        global $post;

        // Get the light theme image URL
        $light_theme_image = get_field('image_light_theme', $post->ID);
        $light_text_theme_image = get_field('image_text_light_theme', $post->ID);

        // Get the dark theme image URL
        $dark_theme_image = get_field('image_dark_theme', $post->ID);
        $dark_text_theme_image = get_field('image_text_dark_theme', $post->ID);

        // Display the hero images
        if ($light_theme_image && $dark_theme_image) {
            ?>
            <div class="hero">
                <img class="img-theme-light" src="<?php echo $light_theme_image; ?>" alt="<?php echo $light_text_theme_image; ?>">
                <img class="img-theme-dark" src="<?php echo $dark_theme_image; ?>" alt="<?php echo $dark_text_theme_image; ?>">
            </div>
            <?php
        } else {
            ?>
            <p>No hero images found.</p>
            <?php
        }
    }
?>



<?php
    function displayPageExcerpts($parent = '') {
        global $post;

        // Get the parent page ID
        $parent_page = get_page_by_path($parent);
        $parent_page_id = $parent_page->ID;

        // Retrieve the child pages of the parent page
        $child_pages = get_pages(array(
            'child_of' => $parent_page_id,
            'sort_column' => 'menu_order',
        ));

        // Display the titles and excerpts of the child pages
        if ($child_pages) {
            ?>
                <ul>
                    <?php foreach ($child_pages as $child_page) { ?>
                        <li class="card">
                            <div class="card-body">
                                <?php 
                                    $child_page_url = get_permalink($child_page->ID); 
                                    // In case there is an icon associated
                                    $icon = get_field('icon', $child_page->ID);
                                ?>
                                <?php if ($icon) { ?>
                                <div>
                                    <img src="<?php echo $icon; ?>">
                                </div>
                                <?php } ?>
                                <h3 class="card-title">
                                    <a href="<?php echo $child_page_url; ?>">
                                        <?php echo $child_page->post_title; ?>
                                    </a>
                                </h3>
                                <?php 
                                    // Retrieve and display the excerpt custom field
                                    $excerpt = get_field('excerpt', $child_page->ID);
                                    if ($excerpt) {
                                        echo '<p class="card-text">' . $excerpt . '</p>';
                                    }
                                ?>
                                <a href="<?php echo $child_page_url; ?>" class="btn btn-secondary btn-sm">Learn more</a>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            <?php 
        } else { 
            ?>
                <p>No child pages found.</p>
            <?php 
        }
    }
?>



<?php
    function latestPostTitles($category_slug = '', $count = 5) {

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $count,
            'category_name' => $category_slug,
        );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            ?>
            <ul>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
            <?php
            wp_reset_postdata();
        else :
            echo 'No posts found.';
        endif;
    }
?>

<?php
    function displayChildrenPageTitle($parent = '') {
        global $post;

        // Get the parent page ID
        $parent_page = get_page_by_path($parent);
        $parent_page_id = $parent_page->ID;

        // Retrieve the child pages of the parent page
        $child_pages = get_pages(array(
            'child_of' => $parent_page_id,
            'sort_column' => 'menu_order',
        ));

        // Display the titles of the child pages
        if ($child_pages) {
            ?>
                <ul>
                    <?php foreach ($child_pages as $child_page) { ?>
                        <?php
                            // Check if the child page is not the same as the current page
                            if ($child_page->ID !== $post->ID) {
                                $child_page_url = get_permalink($child_page->ID);
                            ?>
                                <li><a href="<?php echo $child_page_url; ?>"><?php echo $child_page->post_title; ?></a></li>
                            <?php
                            } else {
                            ?>
                                <li><?php echo $child_page->post_title; ?></li>
                            <?php
                            }
                        ?>
                    <?php } ?>
                </ul>
            <?php 
        } else { 
            ?>
                <p>No child pages found.</p>
            <?php 
        }
    }
?>


<?php
    function getCurrentPageSlug() {
        global $post;
        $page_slug = '';

        if ($post) {
            $page_slug = $post->post_name;
        }

        return $page_slug;
    }
?>


<?php
    function getCurrentPageTitle() {
        global $post;
        $page_title = '';

        if ($post) {
            $page_title = get_the_title($post);
        }

        return $page_title;
    }
?>



<?php
    function displayPostCategoryTitles() {
        $categories = get_categories(); // Retrieve all post categories

        if ($categories) {
            echo '<ul>';
            foreach ($categories as $category) {
                $category_title = $category->name;
                $category_url = get_category_link($category->term_id);
                echo '<li><a href="' . $category_url . '">' . $category_title . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo 'No post categories found.';
        }
    }
?>