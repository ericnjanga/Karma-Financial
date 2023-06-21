<?php
    $categories = get_the_category();
    if (!empty($categories)) {
        echo '<span>';
        foreach ($categories as $category) {
            echo '<a class="km-link-secondary pre-title heading-ff" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
        }
        echo '</span>';
    }
?>