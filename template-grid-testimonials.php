<?php
    /*
    Template Name: Grid Testimonials
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="underlined"><?php echo getField('title'); ?></h1>
    </div>
</header>


<section class="card">
    <?php displayTestimonial(); ?>
</section>