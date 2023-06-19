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

<main class="main-content-wrapper" role="main">
    <section class="card">
        <?php displayTestimonial('grid grid-11222'); ?>
    </section>
</main>

<?php get_footer(); ?>