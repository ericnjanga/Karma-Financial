<?php
    /*
    Template Name: Grid Awards
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="underlined"><?php echo getField('title'); ?></h1>
    </div>
</header>

<main class="main-content-wrapper" role="main">
    <div>
        <?php displayAward('grid grid-11222', null, null, null); ?>
    </div>
</main>

<?php get_footer(); ?>