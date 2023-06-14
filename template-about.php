<?php
    /*
    Template Name: About Template
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="underlined"><?php echo getField('title'); ?></h1>
        <?php edit_post_link(); ?>
    </div>
</header>



<p><?php echo getField('introduction'); ?></p>

<div class="entry-content" itemprop="mainContentOfPage">
    <?php the_content(); ?>
</div>

<div>
    <?php displayEmployee(1); ?>
</div>



<section class="section-awards">
    <article>
        <p class="pre-title">Awards &amp; recognition</p>
        <blockquote class="blockquote">
            Our professionalism and work ethic is recognized and trusted by Canada’s top financial institutions.
        </blockquote>
    </article>

    <?php displayAward(5, true); ?>
</section>

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Testimonials</h2>
        <?php displayTestimonial(); ?>
    </div>
</div>

<?php get_footer(); ?>