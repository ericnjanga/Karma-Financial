
<?php
    // Inject helpers (injected on the header)
    // ....
    $template_slug = get_page_template_slug();
    $activePostCat = getCurrentPageSlug();

    // Sidebar is not needed on:
    
    
    if (!is_front_page()                        // - Front page template
    && $template_slug !== 'template-about.php' // - About page templates
    && $template_slug !== 'template-grid-testimonials.php'  // - Testimonials page templates
    && $template_slug !== 'template-grid-awards.php' ) {    // - Awards page templates
?>

    <aside class="sidebar" id="sidebar" role="complementary">
        <div id="primary" class="widget-area">
            <button id="karma-btn-sidebar-toggle" class="btn btn-secondary btn-sidebar-trigger"></button>
            <?php 
                // Services page template ...
                if ($template_slug === 'template-service.php') { ?>
                <div class="content-wrapper rrr">
                    <?php include 'sidebar-template-services.php'; ?>
                </div>

            <?php } 
                // Contact page template ...
                elseif ($template_slug === 'template-contact.php') { ?>
                <div class="content-wrapper aaa">
                    <?php include 'sidebar-template-contact.php'; ?>
                </div>

            <?php } 
                // Blog and article pages ...
                elseif (is_home() || is_single()) { ?>
                <div class="content-wrapper bbb">
                    <?php include 'sidebar-template-blog.php'; ?>
                </div>
                
            <?php } 
                // Any other pages ...
                else { ?>
                <div class="content-wrapper ccc">
                    <?php include 'sidebar-template-blog.php'; ?>
                    <?php //dynamic_sidebar( 'primary-widget-area' ); ?>
                </div>
            <?php } ?>
        </div>
    </aside>

<?php
    }
?>
