<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1
    class="text-3xl font-bold my-12">
    <a
      class="link-dark"
      href="<?php echo site_url('/skills'); ?>">
      Skills
    </a>
  </h1>
  <h2
    class="text-2xl font-bold">
    <?php the_title(); ?>
  </h2>
  <p class="my-2">
    <?php the_content(); ?>
  </p>
</div>
<?php
get_footer();
?>