<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">
    <a
      class="link-dark"
      href="<?php echo site_url('/projects'); ?>">
      Projects
    </a>
  </h1>
  <?php
  while(have_posts()) {
    the_post(); ?>
    <h2 class="text-2xl font-bold my-12"><?php the_title(); ?></h2>
    <?php the_content(); ?>
    <?php
  }
  ?>
</div>
<?php
get_footer();
?>
