<section>
  <div class="min-h-48">
    <h1 class="text-3xl font-bold my-12">
      <a
        class="inline-link"
        href="<?php echo site_url('/experience'); ?>">
        My experiences
      </a>
    </h1>
    <p>
      All my working experiences are listed here. (under construction)
    </p>
  </div>
  <?php
  // NOTE: Use this to reset the global $post variable
  wp_reset_postdata();
  $homepageExperiences = new WP_Query(array(
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post_type' => 'experience',
  ));
  while ($homepageExperiences->have_posts()) {
    $homepageExperiences->the_post();
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
  <a
    href="<?php echo site_url('/experience'); ?>"
    class="inline-link text-3xl mt-2 inline-block"
    >
    More experiences...
  </a>
</section>
