<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>


<header class="hero" role="region">
    <div class="text-wrapper">
        <h1 class="underlined"><?php echo getField('title'); ?></h1>
        <?php edit_post_link(); ?>
        <p><?php echo getField('introduction'); ?></p>
        <p><a href="#section-services" class="btn btn-primary btn-icon btn-arrow-down">Our services</a></p>
    </div>

    <div class="hero-img-wrapper">
        <?php
            displayHero();
        ?>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <section class="section-awards pt-5 pb-5">
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

    <section id="section-services" class="pt-5 pb-5">
        <h2 class="underlined">services we provide</h2>
        <div id="services">
            <?php
                displayServicesExcerpts('grid grid-11233');
            ?>
        </div>
    </section>

    <section id="section-partners" class="pt-5 pb-5">
        <h2 class="underlined">Partners</h2>
        <?php
            displayClientLogos();
        ?>
    </section>

    <section class="pt-5 pb-5">
        <h2 class="underlined">Testimonials</h2>
        <div>
            <?php displayTestimonial('grid grid-11233 testimonial-list', 2, true); ?>
        </div>
    </section>

    <section class="pt-5 pb-5">
        <h2 class="underlined">News and resources</h2>
        <div>
            <?php latestPosts('grid grid-11233 posts-list', '', 2, true); ?>
        </div>
    </section>
</main>


<?php get_footer(); ?>