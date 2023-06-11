<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>

<header class="header">
    <h1><?php echo getField('title'); ?></h1>
    <p><?php echo getField('introduction'); ?></p>

    <div class="header-img-wrapper">
        <?php
            displayHero();
        ?>
    </div>
</header>


 


<h2>services we provide</h2>
<?php
    displayPageExcerpts('services');
?>


<h2>In partnership with</h2>
<?php
    displayPartners();
?>


<div class="card">
    <div class="card-body">
        <h2 class="card-title">Awards &amp; recognition</h2>
        <p>Our contribution and achievements have been recognized and celebrated.</p>
        <a class="btn btn-secondary btn-sm" href="#">Start slideshow</a>
        <?php displayAward(1); ?>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h2 class="card-title">Testimonials</h2>
        <?php displayTestimonial(1); ?>
        <hr>
        <a class="btn btn-secondary btn-sm" href="/about">More testimonials</a>
    </div>
</div>


 
<?php get_footer(); ?>