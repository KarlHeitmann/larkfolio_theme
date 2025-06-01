<?php
$args = $args ?? [];
$posts = $args['posts'] ?? [];

if (!$posts) {
  echo '<p class="text-gray-500">No results found.</p>';
  return;
}

foreach ($posts as $post) {
  setup_postdata($post); ?>
  <div class="border-b py-4">
    <h2 class="text-xl font-semibold"><?php the_title(); ?></h2>
    <p><?php the_excerpt(); ?></p>
  </div>
<?php }
wp_reset_postdata();