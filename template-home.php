<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>

<header class="hero" role="region">
    <div class="text-wrapper">
        <h1 class="hero-title"><?php echo getField('title'); ?></h1>
        <?php edit_post_link(); ?>
        <p class="hero-intro"><?php echo getField('introduction'); ?></p>
        <footer class="hero-footer">
            <a href="#section-services" class="btn btn-primary btn-icon btn-arrow-down">Our services</a>
        </footer>
    </div>
</header>

<?php
    displayBanner('section-spacer');
?>

<main class="main-content-wrapper" role="main">
    <section class="section-awards section-spacer">
        <article>
            <p class="pre-title heading-ff">Awards</p>
            <blockquote class="blockquote">
                Our professionalism and work ethic is recognized and trusted by Canada’s top financial institutions.
            </blockquote>

            <footer class="section-awards__footer">
                <?php
                    $link_whoAreWe = getPagePermalink('who are we');
                ?>
                <a href="<?php echo $link_whoAreWe .'#section-awards'; ?>" class="btn btn-secondary">Learn more</a>
                <a href="#section-partners" class="btn btn-tertiary">Our partners</a>
            </footer>
        </article>

        <div class="complementary">
            <?php displayAward(null, 5, false, 'transparent-complementary'); ?>
        </div>
    </section>

    <section id="section-services" class="section-spacer">
        <h2 class="h-underlined">Services we provide</h2>
        <div id="services">
            <?php
                displayServicesExcerpts('grid grid-11233');
            ?>
        </div>
    </section>

    <section id="section-partners" class="section-spacer">
        <h2 class="h-underlined">Partners</h2>
        <?php
            displayClientLogos();
        ?>
    </section>

    <section class="section-spacer">
        <h2 class="h-underlined">Testimonials</h2>
        <div>
            <?php displayTestimonial('grid grid-11233 testimonial-list', 2, true); ?>
        </div>
    </section>

    <section class="section-spacer">
        <h2 class="h-underlined">News and resources</h2>
        <div>
            <?php latestPosts('grid grid-11233 posts-list', '', 2, true); ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>