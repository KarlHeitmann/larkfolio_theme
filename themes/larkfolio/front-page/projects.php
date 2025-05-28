<section>
  <div class="min-h-48">
    <h1 class="text-3xl font-bold my-12">
      <a
        href="<?php echo site_url('/projects'); ?>">
        My side projects
      </a>
    </h1>
    <p>
      All my side projects are hosted on my
      <a
        class="rounded px-1 text-amber-300 hover:text-lime-500 hover:bg-gray-950"
        target="_blank"
        href="https://github.com/KarlHeitmann">
        GitHub profile
      </a>.
      On this section you can find a selection of my side projects.
    </p>
  </div>
  <?php
  // NOTE: Use this to reset the global $post variable
  wp_reset_postdata();
  $homepageProjects = new WP_Query(array(
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post_type' => 'project',
  ));
  while ($homepageProjects->have_posts()) {
    $homepageProjects->the_post();
    ?>
    <?php get_template_part('template-parts/card-project'); ?>
    <?php
  } ?>
  <a
    href="<?php echo site_url('/projects'); ?>"
    class="link-dark text-3xl mt-2 inline-block"
    >
    See all projects
  </a>
</section>
