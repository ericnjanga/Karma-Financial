<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php generic_schema_type(); ?>>
    <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="<?php if ( is_single() ) { echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); } else { bloginfo( 'description' ); } ?>" />
    <meta name="keywords" content="<?php echo esc_html( implode( ', ', wp_get_post_tags( get_the_ID(), array( 'fields' => 'names' ) ) ) ); ?>" />
    <meta property="og:image" content="<?php if ( is_single() && has_post_thumbnail() ) { the_post_thumbnail_url( 'full' ); } elseif ( has_site_icon() ) { echo esc_url( get_site_icon_url() ); } ?>" />
    <meta name="twitter:card" content="photo" />
    <meta name="twitter:site" content="<?php bloginfo( 'name' ); ?>" />
    <meta name="twitter:title" content="<?php if ( is_single() ) { the_title(); } else { bloginfo( 'name' ); } ?>" />
    <meta name="twitter:description" content="<?php if ( is_single() ) { echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); } else { bloginfo( 'description' ); } ?>" />
    <meta name="twitter:image" content="<?php if ( is_single() && has_post_thumbnail() ) { the_post_thumbnail_url( 'full' ); } elseif ( has_site_icon() ) { echo esc_url( get_site_icon_url() ); } ?>" />
    <meta name="twitter:url" content="<?php if ( is_single() ) { esc_url( the_permalink() ); } else { echo esc_url( home_url() ) . '/'; } ?>" />
    <meta name="twitter:widgets:theme" content="light" />
    <meta name="twitter:widgets:link-color" content="#007acc" />
    <meta name="twitter:widgets:border-color" content="#fff" />
    <link rel="canonical" href="<?php echo esc_url( 'https://' . $_SERVER["HTTP_HOST"] . parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) ); ?>" />
    <script type="application/ld+json">
    {
    "@context": "https://www.schema.org/",
    "@type": "WebSite",
    "name": "<?php bloginfo( 'name' ); ?>",
    "url": "<?php echo esc_url( home_url() ); ?>/"
    }
    </script>
    <script type="application/ld+json">
    {
    "@context": "https://www.schema.org/",
    "@type": "Organization",
    "name": "<?php bloginfo( 'name' ); ?>",
    "url": "<?php echo esc_url( home_url() ); ?>/",
    "logo": "<?php if ( has_custom_logo() ) { $custom_logo_id = get_theme_mod( 'custom_logo' ); $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); echo esc_url( $logo[0] ); } ?>",
    "image": "<?php if ( has_site_icon() ) { echo esc_url( get_site_icon_url() ); } ?>",
    "description": "<?php bloginfo( 'description' ); ?>"
    }
    </script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="wrapper" class="hfeed">
        <header class="main-header" id="header" role="banner">





            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <!-- <a class="navbar-brand" href="#">Website Logo</a> -->



                    <div class="navbar-brand" id="branding">
                        <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                            <?php
                                if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
                                echo '<h1>';
                                }
                                if ( has_custom_logo() ) {
                                $custom_logo_id = get_theme_mod( 'custom_logo' );
                                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                $nologo = '';
                                } elseif ( has_site_icon() ) {
                                $logo = get_site_icon_url();
                                $nologo = '';
                                } else {
                                $logo = '';
                                $nologo = 'no-logo';
                                }
                                echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span class="screen-reader-text" itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span><span id="logo-container" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"><img src="';
                                if ( has_custom_logo() ) {
                                echo esc_url( $logo[0] );
                                } else {
                                echo esc_url( $logo );
                                }
                                echo '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" id="logo" class="' . esc_attr( $nologo ) . '" itemprop="url" /></span></a>';
                                if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
                                    echo '</h1>';
                                }
                            ?>
                        </div>
                        <div id="site-description"<?php if ( !is_single() ) { echo ' itemprop="description"'; } ?>>
                            <?php bloginfo( 'description' ); ?>
                        </div>
                    </div>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">



                        <?php //wp_nav_menu( array( 'theme_location' => 'bootstrap-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>

                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'bootstrap-menu',
                                'menu_class' => 'navbar-nav',
                                'container' => false,
                                'depth' => 2,
                                'walker' => new Bootstrap_Walker_Nav_Menu(),
                            ));
                        ?>



                        <!-- <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">Submenu 1</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Submenu 1.1</a></li>
                                            <li><a class="dropdown-item" href="#">Submenu 1.2</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Another Item</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contact</a>
                            </li>
                        </ul> -->




                        <!-- <ul id="menu-menu-1" class="navbar-nav"><li id="menu-item-7383" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home nav-item dropdown menu-item-7383"><a class="nav-link" href="http://karma-financial.local/">Home</a></li>
                            <li id="menu-item-7385" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7385"><a class="nav-link" href="http://karma-financial.local/about/">About</a></li>
                            <li id="menu-item-7441" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children nav-item dropdown active menu-item-7441">
                                <a class="nav-link" href="/">Services</a>
                            <ul class="dropdown-menu">
                                <li id="menu-item-7388" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7388"><a class="nav-link" href="http://karma-financial.local/services/budgeting/">Budgeting</a></li>
                                <li id="menu-item-7389" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7389"><a class="nav-link" href="http://karma-financial.local/services/estate-planning/">Estate Planning</a></li>
                                <li id="menu-item-7390" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7390"><a class="nav-link" href="http://karma-financial.local/services/group-benefits/">Group Benefits</a></li>
                                <li id="menu-item-7391" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7391"><a class="nav-link" href="http://karma-financial.local/services/insurance-planning/">Insurance Planning</a></li>
                                <li id="menu-item-7392" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-7369 current_page_item nav-item dropdown active menu-item-7392"><a class="nav-link" href="http://karma-financial.local/services/investment-planning/">Investment Planning</a></li>
                                <li id="menu-item-7393" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7393"><a class="nav-link" href="http://karma-financial.local/services/tax-planning/">Tax Planning</a></li>
                            </ul>
                            </li>
                            <li id="menu-item-7384" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7384"><a class="nav-link" href="http://karma-financial.local/blog/">Blog</a></li>
                            <li id="menu-item-7386" class="menu-item menu-item-type-post_type menu-item-object-page nav-item dropdown menu-item-7386"><a class="nav-link" href="http://karma-financial.local/contact/">Contact</a></li>
                        </ul> -->


                        
                    </div>
                </div>
            </nav>





            <!-- 
            <div id="branding">
                <div id="site-title" itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
                    <?php
                        if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
                        echo '<h1>';
                        }
                        if ( has_custom_logo() ) {
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        $nologo = '';
                        } elseif ( has_site_icon() ) {
                        $logo = get_site_icon_url();
                        $nologo = '';
                        } else {
                        $logo = '';
                        $nologo = 'no-logo';
                        }
                        echo '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name' ) ) . '" rel="home" itemprop="url"><span class="screen-reader-text" itemprop="name">' . esc_html( get_bloginfo( 'name' ) ) . '</span><span id="logo-container" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject"><img src="';
                        if ( has_custom_logo() ) {
                        echo esc_url( $logo[0] );
                        } else {
                        echo esc_url( $logo );
                        }
                        echo '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" id="logo" class="' . esc_attr( $nologo ) . '" itemprop="url" /></span></a>';
                        if ( is_front_page() || is_home() || is_front_page() && is_home() ) {
                            echo '</h1>';
                        }
                    ?>
                </div>
                <div id="site-description"<?php if ( !is_single() ) { echo ' itemprop="description"'; } ?>>
                    <?php bloginfo( 'description' ); ?>
                </div>
            </div>

            <nav id="menu" class="main-nav" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                <span class="looper before" tabindex="0"></span>
                <button type="button" class="menu-toggle first">
                    <span class="menu-icon">&#9776;</span>
                    <span class="menu-text screen-reader-text">
                        <?php esc_html_e( ' Menu', 'generic' ); ?>
                    </span>
                </button>
                <?php //wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
                
                    <div id="search">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url() ); ?>/">
                            <label><span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'generic' ); ?></span><input type="search" class="search-field last" placeholder="<?php esc_attr_e( 'Search …', 'generic' ); ?>" value="" name="s"><span></span></label><input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'generic' ); ?>">
                        </form>
                    </div> 
                
                <span class="looper after" tabindex="0"></span>
            </nav>
            -->

        </header>






        <div id="container">
            <main id="content" role="main">

            <?php
                // Inject helpers (needed all over the application)
                include '_fct-helpers.php';
            ?>