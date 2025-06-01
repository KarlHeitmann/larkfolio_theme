<?php
  get_header();
  ?>
  <div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold my-12">PRs</h1>
    <section class="container-results">
    </section>
    <button id="load-posts-btn">Load Posts</button>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
      <?php
      while(have_posts()) {
        the_post();
        get_template_part('template-parts/card-pr');
      }
      ?>
    </div>
  </div>
  <?php get_footer(); ?>