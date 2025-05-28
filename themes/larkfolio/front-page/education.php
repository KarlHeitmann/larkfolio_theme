<section>
  <div class="min-h-48">
    <h1 class="text-3xl font-bold my-12">
      <a
        href="<?php echo site_url('/education'); ?>">
        My Education
      </a>
    </h1>
    <p>
      The places where I've learned something.
    </p>
  </div>
  <?php
  // NOTE: Use this to reset the global $post variable
  wp_reset_postdata();
  $homepageEducation = new WP_Query(array(
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post_type' => 'education',
  ));
  while ($homepageEducation->have_posts()) {
    $homepageEducation->the_post();
    get_template_part('template-parts/card-education');
  } ?>

  <a
    href="<?php echo site_url('/education'); ?>"
    class="link-dark text-3xl mt-2 inline-block"
    >
    See all education
  </a>
</section>
