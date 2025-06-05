
<?php
$args = $args ?? [];
$experiences = $args['experiences'] ?? [];

if (!$experiences) {
  echo '<p class="text-gray-500">No results found.</p>';
  return;
}

foreach ($experiences as $experience) {
  $post = get_post($experience); // Ensure it's a full WP_Post object
  setup_postdata($post);
  get_template_part('template-parts/card-experience', null, array(
    'company_website' => get_field('company_website'),
    'related_skills' => get_field('related_skills'),
    'permalink' => get_the_permalink(),
    'excerpt' => get_the_excerpt(),
    'title' => get_the_title(),
    'job_title' => get_field('job_title'),
    'start_date' => get_field('start_date'),
    'end_date' => get_field('end_date'),
    'location' => get_field('location'),
    'remote' => get_field('remote'),
  ));
}
wp_reset_postdata();
