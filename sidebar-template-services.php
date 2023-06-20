<?php dynamic_sidebar( 'sidebar-service' ); ?>

<h4 class="content-title">Additional services</h4>
<?php displayChildrenPageTitle('', 'services'); ?>

<hr>

<h4 class="content-title">More on <?php echo getCurrentPageTitle() ?></h4>
<?php latestPostTitles($activePostCat); ?>