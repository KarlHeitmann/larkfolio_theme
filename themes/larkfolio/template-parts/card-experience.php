<div class="card">
  <?php get_template_part('template-parts/widgets/title-experience', NULL, array(
    'company_website' => $args['company_website'],
    'title' => $args['title'],
    'job_title' => $args['job_title'],
    'start_date' => $args['start_date'],
    'end_date' => $args['end_date'],
    'location' => $args['location'],
    'remote' => $args['remote'],
    'related_skills' => $args['related_skills']
  )); ?>
  <p class="my-2">
    <?php echo $args['excerpt']; ?>
  </p>
  <a class="btn-link mt-2 inline-block" href="<?php echo $args['permalink']; ?>">Read more</a>
</div>
