<section>
  <?php
  $query = array(
    'posts_per_page' => -1,
    'post_type' => 'pr',
    'orderby' => 'title',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'related_skills',
        'compare' => 'LIKE',
        'value' => '"' . get_the_ID() . '"' // This is important because PHP uses serialization with arrays
      )
    )
  );
  $relatedItems = new WP_Query($query);
  ?>
  <h2 class="my-12">Related PRs</h2>
  <h3>Count of PRs: <?php echo $relatedItems->post_count; ?></h3>
  <?php
  while ($relatedItems->have_posts()) {
    $relatedItems->the_post();
    get_template_part('template-parts/card-pr');
  } ?>
</section>