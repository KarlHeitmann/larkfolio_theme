<?php
error_log("ARGS: " . json_encode($args));
$args = $args ?? [];
$prs = $args['prs'] ?? [];

if (!$prs) {
  echo '<p class="text-gray-500">No results found.</p>';
  return;
}

foreach ($prs as $pr) {
  setup_postdata($pr); ?>
  <div class="border-b py-4">
    <h2 class="text-xl font-semibold"><?php the_title(); ?></h2>
    <pre><?php print_r($pr->post_title); ?></pre>
    <pre><?php var_dump($pr->post_excerpt); ?></pre>
    <pre><?php print_r($pr->post_content); ?></pre>
    <p><?php the_excerpt(); ?></p>
  </div>
<?php }
wp_reset_postdata();