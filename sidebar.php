
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

    <aside class="sidebar bx-container section-spacer" id="sidebar" role="complementary">
        <div id="primary" class="widget-area">
            <button id="karma-btn-sidebar-toggle" class="btn btn-secondary btn-sidebar-trigger"></button>
            <div class="content-wrapper">
                <?php 
                    // Services page template ...
                    if ($template_slug === 'template-service.php') { ?>
                        <?php include 'sidebar-template-services.php'; ?>
                <?php } 
                    // Contact page template ...
                    elseif ($template_slug === 'template-contact.php') { ?>
                        <?php include 'sidebar-template-contact.php'; ?>
                <?php } 
                    // Blog and article pages ...
                    elseif (is_home() || is_single()) { ?>
                        <?php include 'sidebar-template-blog.php'; ?>
                <?php } 
                    // Any other pages ...
                    else { ?>
                        <?php include 'sidebar-template-blog.php'; ?>
                        <?php //dynamic_sidebar( 'primary-widget-area' ); ?>
                <?php } ?>
            </div>
        </div>
    </aside>

<?php
    }
?>
