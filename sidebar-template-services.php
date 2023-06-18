<?php dynamic_sidebar( 'sidebar-service' ); ?>

<h3>Additional services</h3>
<?php displayChildrenPageTitle('', 'services'); ?>

<hr>

<h3>More on <?php echo getCurrentPageTitle() ?></h3>
<?php latestPostTitles($activePostCat); ?>