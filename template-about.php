<?php
    /*
    Template Name: About Template
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="hero-title"><?php echo getField('title'); ?></h1>
        <?php edit_post_link(); ?>
    </div>
</header>

<main class="main-content-wrapper" role="main">

    <section class="content-grid section-spacer">
        <article>
            <div class="post">
                <p><?php echo getField('introduction'); ?></p>
            </div>

            <div class="entry-content" itemprop="mainContentOfPage">
                <?php the_content(); ?>
            </div>
        </article>

        <aside>
            <?php displayEmployee(1); ?>
        </aside>
    </section>

    <section id="section-awards" class="section-awards transparent-complementary section-spacer">
        <article>
            <p class="pre-title heading-ff">Awards &amp; recognition</p>
            <blockquote class="blockquote">
                Our professionalism and work ethic is recognized and trusted by Canada’s top financial institutions.
            </blockquote>
        </article>

        <?php displayAward('grid grid-22345', 5, true, null); ?>
    </section>

    <section class="section-spacer">
        <h2>Testimonials</h2>
        <?php displayTestimonial('grid grid-11233 testimonial-list', 4, true); ?>
    </section>
</main>

<?php get_footer(); ?>