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
    // $time_spent = get_field('start_date') . ' - ' . get_field('end_date');
    // calculates time difference between start_date and end_date and formats it as years, months, days
    // $time_spent = get_field('start_date') . ' - ' . get_field('end_date');


    get_template_part('template-parts/widgets/title-experience', NULL, array(
      'title' => get_the_title(),
      'job_title' => get_field('title'),
      'start_date' => get_field('start_date'),
      'end_date' => get_field('end_date'),
      'location' => get_field('location'),
      'remote' => get_field('remote'),
      'related_skills' => get_field('related_skills')
    )); ?>
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
