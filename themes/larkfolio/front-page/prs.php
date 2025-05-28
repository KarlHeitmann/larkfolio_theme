<section>
  <div class="min-h-48">
    <h1 class="text-3xl font-bold my-12">
      <a
        href="<?php echo site_url('/prs'); ?>">
        My open source contributions
      </a>
    </h1>
    <p class="mb-12">
      I really enjoy contribute to open source projects. When you open the "issues" tab of an open source
      project, you are taking a sneak peek to problems and issues a real world project is facing.
    </p>
  </div>
  <?php
  // NOTE: Use this to reset the global $post variable
  wp_reset_postdata();
  $homepagePrs = new WP_Query(array(
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post_type' => 'pr',
  ));
  while ($homepagePrs->have_posts()) {
    $homepagePrs->the_post();
    ?>
    <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
      <?php get_template_part('template-parts/header-pr'); ?>
      <p class="my-2">
        <?php echo get_the_excerpt(); ?>
      </p>
      <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
    </div>
    <?php
  } ?>
  <a
    href="<?php echo site_url('/prs'); ?>"
    class="link-dark text-3xl mt-2 inline-block"
    >
    See all PRs
  </a>
</section>
