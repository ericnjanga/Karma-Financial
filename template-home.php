<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>

<header class="header">
    <h1><?php echo getField('title'); ?></h1>
    <p><?php echo getField('introduction'); ?></p>
    <p><a href="#services" class="btn btn-primary">Our services</a></p>

    <div class="header-img-wrapper">
        <?php
            displayHero();
        ?>
    </div>
</header>


<section class="awards">
    <p class="pre-title">Awards</p>
    <blockquote>
        Our professionalism and work ethic is recognized and trusted by Canada’s top financial institutions.
    </blockquote>

    <footer>
        <a href="" class="btn btn-secondary">Learn more</a>
        <a href="" class="btn btn-tertiary">Our partners</a>
    </footer>

    <div class="card">
        <div class="card-body">
            <?php displayAward(3); ?>
        </div>
    </div>
</section>



 


<h2 class="underlined">services we provide</h2>
<div id="services">
<?php
    displayPageExcerpts('services');
?>
</div>


<h2 class="underlined">Partners</h2>
<?php
    displayPartners();
?>



<h2 class="underlined">Testimonials</h2>
<div>
    <?php displayTestimonial(3); ?>
</div>



<h2 class="underlined">News and resources</h2>
<div>
    <?php latestPosts('', 2); ?>
    <?php 
        display_learn_more_box(
            'We have more resources available', 
            'Learn more', 
            '#'); 
    ?>
</div>


 
<?php get_footer(); ?>