<?php
get_header();
?>

<div class="container mx-auto px-4">
  <?php
  while(have_posts()) {
    the_post();
    ?>
    <!-- <h1><?php the_title(); ?></h1> -->
    <?php the_content(); ?>
    <?php
  }
  ?>
</div>
<?php
get_footer();
?>
