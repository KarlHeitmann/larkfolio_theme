
<?php
$args = $args ?? [];
$prs = $args['prs'] ?? [];

if (!$prs) {
  echo '<p class="text-gray-500">No results found.</p>';
  return;
}

foreach ($prs as $pr) {
  $post = get_post($pr); // Ensure it's a full WP_Post object
  setup_postdata($post);

  get_template_part('template-parts/card-pr', null, array(
    'permalink' => get_permalink($post),
    'title' => get_the_title($post),
    'excerpt' => get_the_excerpt($post),
    'repository_link' => get_field('repository_link', $post->ID),
    'pr_link' => get_field('pr_link', $post->ID)
  ));
}
wp_reset_postdata();