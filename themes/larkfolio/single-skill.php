<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1
    class="text-3xl font-bold my-12">
    <a
      class="inline-link"
      href="<?php echo site_url('/skills'); ?>">
      All Skills
    </a>
  </h1>
  <h2
    class="text-2xl font-bold">
    <?php 
      $image = get_field('icon');
      if ($image) {
        ?>
        <img
          class="w-12 h-12 inline-block"
          src="<?php echo $image['url']; ?>"
          alt="<?php echo $image['alt']; ?>"
        >
        <?php
      }
    ?>
    <?php the_title(); ?>
  </h2>
  <p class="my-2">
    <?php the_content(); ?>
  </p>
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2">

    <?php
      get_template_part('single-skill/related-prs');
      get_template_part('single-skill/related-experiences');
      get_template_part('single-skill/related-projects');
    ?>
  </div>
</div>
<?php
get_footer();
?>