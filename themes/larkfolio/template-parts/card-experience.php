<div class="card">
  <?php get_template_part('template-parts/widgets/title-experience', NULL, array(
    'title' => get_the_title(),
    'job_title' => get_field('title'),
    'start_date' => get_field('start_date'),
    'end_date' => get_field('end_date'),
    'location' => get_field('location'),
    'remote' => get_field('remote'),
    'related_skills' => get_field('related_skills')
  )); ?>
  <p class="my-2">
    <?php echo $args['excerpt']; ?>
  </p>
  <a class="btn-link mt-2 inline-block" href="<?php echo $args['permalink']; ?>">Read more</a>
</div>
