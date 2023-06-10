<?php
    /*
    Template Name: About Template
    */ 
    get_header();
?>

<header class="hero">
    <h1><?php echo getField('title'); ?></h1>
    <p><?php echo getField('introduction'); ?></p>
    <hr>
</header>

<div class="entry-content" itemprop="mainContentOfPage">
    <?php the_content(); ?>
</div>

<div>
    <?php displayEmployee(1); ?>
</div>



<div class="card">
    <div class="card-body">
        <h2 class="card-title">Awards &amp; recognition</h2>
        <p>Our contribution and achievements have been recognized and celebrated.</p>
        <a class="btn btn-secondary btn-sm" href="#">Start slideshow</a>
        <?php displayAward(3); ?>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Testimonials</h2>
        <?php displayTestimonial(); ?>
    </div>
</div>

<?php get_footer(); ?>