
<?php
    // Inject helpers (injected on the header)
    // ....
    $template_slug = get_page_template_slug();
    $activePostCat = getCurrentPageSlug();

    // Sidebar is not needed on:
    // - Front page template
    // - About page templates
    if (!is_front_page() && $template_slug !== 'template-about.php' ) {
?>





<aside class="sidebar" id="sidebar" role="complementary">
    <div id="primary" class="widget-area">
        <button id="karma-btn-sidebar-toggle" class="btn btn-secondary"></button>
        <?php 
            // Services page template ...
            if ($template_slug === 'template-service.php') { ?>
            <div class="yyy rrr">
                <?php include 'sidebar-template-services.php'; ?>
            </div>

        <?php } 
            // Contact page template ...
            elseif ($template_slug === 'template-contact.php') { ?>
            <div class="yyy aaa">
                <?php include 'sidebar-template-contact.php'; ?>
            </div>

        <?php } 
            // Blog and article pages ...
            elseif (is_home() || is_single()) { ?>
            <div class="yyy bbb">
                <?php include 'sidebar-template-blog.php'; ?>
            </div>
            
        <?php } 
            // Any other pages ...
            else { ?>
            <div class="yyy ccc">
                <?php include 'sidebar-template-blog.php'; ?>
                <?php //dynamic_sidebar( 'primary-widget-area' ); ?>
            </div>
        <?php } ?>
    </div>
</aside>












<?php
    }
?>
