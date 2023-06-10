
<?php
    // Inject helpers (injected on the header)
    // ....
    $template_slug = get_page_template_slug();
    $activePostCat = getCurrentPageSlug();
?>

<aside class="sidebar" id="sidebar" role="complementary">
    <div id="primary" class="widget-area">

    <?php 
        // Don't display sidebar for "Home" and "About" pages
        if (is_front_page() || $template_slug === 'template-about.php') : ?>


    <?php 
        // Service page template
        elseif ($template_slug === 'template-service.php') : ?>
        <?php dynamic_sidebar( 'sidebar-service' ); ?>

        <h3>Additional services</h3>
        <?php displayChildrenPageTitle('services'); ?>

        <hr>

        <h3>More on <?php echo getCurrentPageTitle() ?></h3>
        <?php latestPostTitles($activePostCat); ?>


    <?php 
        // Blog page
        elseif (is_home()) : ?>

        <h3>Categories</h3>
        <?php displayPostCategoryTitles(); ?>

        <hr>

        <h3>Archives</h3>
        <?php dynamic_sidebar( 'sidebar-archives' ); ?>


    <?php 
        // Contact page template
        elseif ($template_slug === 'template-contact.php') : ?>
        <?php dynamic_sidebar( 'sidebar-appointments' ); ?>
        
        
    <?php 
        // Display default sidebar for any other page
        else : ?>
        <?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
            <?php dynamic_sidebar( 'primary-widget-area' ); ?>
        <?php endif; ?>
        
    <?php endif; ?>

    </div>
</aside>

