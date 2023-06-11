                </main>
            <?php get_sidebar('sidebar-contact'); ?>
            </div>
            <footer class="main-footer" id="footer" role="contentinfo">
                <div class="pages">
                    <h3>Pages</h3>
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu',
                            'container' => 'nav',
                            'container_class' => 'footer-menu',
                        ));
                    ?>

                </div>
                <div class="services">
                    <h3>Services</h3>
                    <?php displayChildrenPageTitle('services'); ?>
                </div>
                <div class="articles">
                    <h3>Articles</h3>
                    <?php latestPostTitles(); ?> 
                </div>
                <div class="contact">
                    <h3>Contact</h3>
                    <?php dynamic_sidebar('sidebar-quick-contact'); ?>
                    <?php dynamic_sidebar('sidebar-social-media'); ?>
                </div>
                <div class="appointment">
                    <h3>Book an appointment</h3>
                    <?php dynamic_sidebar('sidebar-appointments'); ?>
                </div>
                <div id="copyright">
                    &copy; <?php echo esc_html( date_i18n( __( 'Y', 'generic' ) ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
                </div>
                <img 
                    src="<?php echo get_template_directory_uri() .'/images/Karma Financial Logo.png' ?>" 
                    alt="<?php echo esc_html( get_bloginfo( 'name' ) ) ?>" 
                    class="logo"
                >
            </footer>
        </div>

        <?php
            // Place modals here for global access
            getAppointmentModal();
        ?>

        <?php wp_footer(); ?>
    </body>
</html>


