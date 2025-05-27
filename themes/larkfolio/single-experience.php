<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">
    <a
      class="link-dark"
      href="<?php echo site_url('/experience'); ?>">
      Experience
    </a>
  </h1>
  <?php
  while(have_posts()) {
    the_post();
    ?>
      <h2 class="text-2xl font-bold"><?php the_title(); ?></h2>
      <p class="my-2">
        <?php the_content(); ?>
      </p>
  <?php
  }
  ?>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <?php get_template_part('template-parts/related-skills'); ?>
  </div>
</div>
<?php
get_footer();
?>
