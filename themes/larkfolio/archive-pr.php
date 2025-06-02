<?php
  get_header();
  ?>
  <div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold my-12">PRs</h1>
    <div data-controller="hello">
      Stimulus-powered component
    </div>
    <div class="flex flex-row">
      <?php
      $skills = new WP_Query(array(
        'posts_per_page' => -1,
        // 'orderby' => 'rand',
        'post_type' => 'skill',
      ));

      while($skills->have_posts()) {
        $skills->the_post();
        $image = get_field('icon');
        $skillId = get_the_ID();
        ?>
        <div
          data-controller="skillfilter"
          data-action="click->skillfilter#filter"
          data-skillfilter-id-value="<?php echo $skillId; ?>"
          class="border-3 rounded-2xl mb-12 p-4 bg-gray-700 border-gray-900 cursor-pointer">
          <img
            class="w-12 h-12"
            src="<?php echo $image['url']; ?>"
            alt="<?php echo $image['alt']; ?>"
          >
        </div>
        <?php
      }
      ?>
    </div>
    <button id="load-posts-btn">Load Posts</button>
    <div
      id="prs-container-results"
      class="grid grid-cols-1 md:grid-cols-2 gap-2">
      <?php
      while(have_posts()) {
        the_post();
        get_template_part('template-parts/card-pr', NULL, array(
          'permalink' => get_the_permalink(),
          'title' => get_the_title(),
          'excerpt' => get_the_excerpt(),
          'repository_link' => get_field('repository_link'),
          'pr_link' => get_field('pr_link')
        ));
      }
      ?>
    </div>
  </div>
  <?php get_footer(); ?>