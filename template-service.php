<?php
    /*
    Template Name: Service Template
    */ 
    get_header();
?>

<header class="hero">
    <div class="text-wrapper">
        <h1 class="hero-title"><?php the_title(); ?></h1>
        <?php edit_post_link(); ?>
        <div class="hero-intro">
            <?php displayFieldIcon(get_the_ID()); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper section-spacer" role="main">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content" itemprop="mainContentOfPage">
                <?php the_content(); ?>
                <div class="entry-links"><?php wp_link_pages(); ?></div>
            </div>
        </article>
    <?php endwhile; endif; ?>

    <hr>

    <blockquote class="blockquote">
        <h4>How we can help</h4>
        <?php echo getFieldByID('how_we_can_help', get_the_ID()); ?>
    </blockquote>

    <footer class="cta-btn-container">
        <?php
            // Page and post category have identical slugs, 
            // this makes it easy to link them
            $current_slug = get_post_field('post_name', get_queried_object_id());
            $blogLink = getSubCategoryLink($current_slug, 'category');
        ?>
        <p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal">
                Schedule an appointment
            </button>
            <a href="<?php echo $blogLink; ?>" class="btn btn-secondary">
                Additional reading
            </a>
        </p>
    </footer>
</main>

<?php get_footer(); ?>