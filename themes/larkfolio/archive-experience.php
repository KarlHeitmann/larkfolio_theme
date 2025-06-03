<?php get_header(); ?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">Experience</h1>
  <div 
    data-controller="experience-filter">
    <?php $skills = new WP_Query(array(
      'posts_per_page' => -1,
      'post_type' => 'skill',
    )); ?>
      <div class="flex flex-row flex-wrap justify-between">
        <?php while($skills->have_posts()) {
          $skills->the_post();
          $image = get_field('icon');
          $skillId = get_the_ID(); ?>
          <div
            data-action="click->experience-filter#filter"
            data-experience-filter-item-id-param="<?php echo $skillId; ?>"
            class="border-3 rounded-2xl mb-12 p-4 bg-gray-700 border-gray-900 cursor-pointer">
            <img
              class="w-12 h-12"
              src="<?php echo $image['url']; ?>"
              alt="<?php echo $image['alt']; ?>">
          </div>
        <?php } ?>
      </div>
      <div
        id="experience-container-results"
        data-experience-filter-target="results"
        class="grid grid-cols-1 md:grid-cols-2 gap-2">
        <?php
        while(have_posts()) {
          the_post();
          get_template_part('template-parts/card-experience', NULL, array(
            'related_skills' => get_field('related_skills'),
            'permalink' => get_the_permalink(),
            'excerpt' => get_the_excerpt(),
            'title' => get_the_title(),
            'job_title' => get_field('title'),
            'start_date' => get_field('start_date'),
            'end_date' => get_field('end_date'),
            'location' => get_field('location'),
            'remote' => get_field('remote'),
          ));
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
