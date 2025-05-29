<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">
    <a
      class="inline-link"
      href="<?php echo site_url('/experience'); ?>">
      All Experiences
    </a>
  </h1>
  <?php
  while(have_posts()) {
    the_post();
    ?>
      <div class="flex flex-row items-center">
        <h2 class="flex-grow text-2xl font-bold"><?php the_title(); ?></h2>
        <?php get_template_part('template-parts/skills-widget', NULL, array(
          'related_skills' => get_field('related_skills')
        )); ?>
      </div>
      <p class="my-2">
        <?php the_content(); ?>
      </p>
  <?php
  }
  ?>
</div>
<?php
get_footer();
?>
