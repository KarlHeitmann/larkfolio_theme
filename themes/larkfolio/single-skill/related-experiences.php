<section>
  <?php
    wp_reset_postdata();
    $query = array(
      'posts_per_page' => -1,
      'post_type' => 'experience',
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
  <h2 class="my-12">Related Experience</h2>
  <h3>Count of Related Experience: <?php echo $relatedItems->post_count; ?></h3>
  <?php while ($relatedItems->have_posts()) {
    $relatedItems->the_post();
    get_template_part('template-parts/card-experience', NULL, array(
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
  } ?>
</section>