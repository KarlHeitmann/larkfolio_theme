<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">
    <a
      class="inline-link"
      href="<?php echo site_url('/education'); ?>">
      Education
    </a>
  </h1>
  <?php
  while(have_posts()) {
    the_post(); ?>
    <!--
    <h2 class="text-2xl font-bold my-12"><?php the_title(); ?></h2>
  -->
    <section class="the-content-wrapper">
      <?php the_content(); ?>
    </section>
    <?php
  }
  ?>
</div>
<?php
get_footer();
?>
