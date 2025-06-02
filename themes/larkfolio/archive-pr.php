<?php
  get_header();
  ?>
  <div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold my-12">PRs</h1>
    <div 
      data-skillfilter-url-value="/wp-json/larkfolio/v1/prs-html"
      data-controller="skillfilter">
      <?php $skills = new WP_Query(array(
        'posts_per_page' => -1,
        // 'orderby' => 'rand',
        'post_type' => 'skill',
      )); ?>
      <div class="flex flex-row justify-between">
        <?php while($skills->have_posts()) {
          $skills->the_post();
          $image = get_field('icon');
          $skillId = get_the_ID(); ?>
          <div
            data-action="click->skillfilter#filter"
            data-skillfilter-item-id-param="<?php echo $skillId; ?>"
            class="border-3 rounded-2xl mb-12 p-4 bg-gray-700 border-gray-900 cursor-pointer">
            <img
              class="w-12 h-12"
              src="<?php echo $image['url']; ?>"
              alt="<?php echo $image['alt']; ?>"
            >
          </div>
        <?php } ?>
      </div>
      <div
        id="prs-container-results"
        data-skillfilter-target="results"
        class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <?php while(have_posts()) {
          the_post();
          get_template_part('template-parts/card-pr', NULL, array(
            'permalink' => get_the_permalink(),
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'repository_link' => get_field('repository_link'),
            'pr_link' => get_field('pr_link')
          ));
        } ?>
      </div>
    </div>
  </div>
  <?php get_footer(); ?>