
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
    'permalink' => get_permalink($post),
    'title' => get_the_title($post),
    'excerpt' => get_the_excerpt($post),
    'repository_link' => get_field('repository_link', $post->ID),
    'pr_link' => get_field('pr_link', $post->ID)
  ));
}
wp_reset_postdata();
