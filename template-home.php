<?php
    /*
    Template Name: Home Template
    */ 
    get_header();
?>

<div class="bx-container">
    <header class="hero">
        <div class="text-wrapper">
            <h1 class="underlined"><?php echo getField('title'); ?></h1>
            <?php edit_post_link(); ?>
            <p><?php echo getField('introduction'); ?></p>
            <p><a href="#services" class="btn btn-primary btn-icon btn-arrow-down">Our services</a></p>
        </div>

        <div class="hero-img-wrapper">
            <?php
                displayHero();
            ?>
        </div>
    </header>



    <section class="section-awards">
        <article>
            <p class="pre-title">Awards</p>
            <blockquote class="blockquote">
                Our professionalism and work ethic is recognized and trusted by Canada’s top financial institutions.
            </blockquote>

            <footer class="section-awards__footer">
                <a href="" class="btn btn-secondary">Learn more</a>
                <a href="" class="btn btn-tertiary">Our partners</a>
            </footer>
        </article>

        <div class="complementary">
            <?php displayAward(5, false, 'transparent-complementary'); ?>
        </div>
    </section>

</div>






 


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
    <?php displayTestimonial(2, true); ?>
</div>



<h2 class="underlined">News and resources</h2>
<div>
    <?php latestPosts('', 2, true); ?>
</div>


 
<?php get_footer(); ?>