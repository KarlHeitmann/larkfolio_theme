<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1
    class="text-3xl font-bold my-12">
    <a
      class="link-dark"
      href="<?php echo site_url('/skills'); ?>">
      Skills
    </a>
  </h1>
  <h2
    class="text-2xl font-bold">
    <?php the_title(); ?>
  </h2>
  <p class="my-2">
    <?php the_content(); ?>
  </p>
  <?php 
    $image = get_field('icon');
    if ($image) {
      ?>
      <img
        src="<?php echo $image['url']; ?>"
        alt="<?php echo $image['alt']; ?>"
      >
      <?php
    }
  ?>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
    <section>
      <?php
        $relatedPRs = new WP_Query(array(
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


        ));
      ?>
      <h2 class="text-xl font-bold my-12">Related PRs</h2>
      <h3>Count of PRs: <?php echo $relatedPRs->post_count; ?></h3>
      <?php
      while ($relatedPRs->have_posts()) {
        $relatedPRs->the_post();
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
    </section>
    <section>
      <h2 class="text-xl font-bold my-12">Related Experience</h2>
      <?php
        wp_reset_postdata();
        $relatedExperience = new WP_Query(array(
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


        ));
      ?>
      <h3>Count of Experience: <?php echo $relatedExperience->post_count; ?></h3>
      <?php
      while ($relatedExperience->have_posts()) {
        $relatedExperience->the_post();
        ?>
        <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
          <h2><?php the_title(); ?></h2>
          <p class="my-2">
            <?php echo get_the_excerpt(); ?>
          </p>
          <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
        </div>
        <?php
      } ?>
    </section>
    <section>
      <h2 class="text-xl font-bold my-12">Related Projects</h2>
      <?php
        wp_reset_postdata();
        $relatedProjects = new WP_Query(array(
          'posts_per_page' => -1,
          'post_type' => 'project',
          'orderby' => 'title',
          'order' => 'ASC',
          'meta_query' => array(
            array(
              'key' => 'related_skills',
              'compare' => 'LIKE',
              'value' => '"' . get_the_ID() . '"' // This is important because PHP uses serialization with arrays
            )
          )


        ));
      ?>
      <h3>Count of Projects: <?php echo $relatedProjects->post_count; ?></h3>
      <?php
      while ($relatedProjects->have_posts()) {
        $relatedProjects->the_post();
        ?>
        <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
          <h2><?php the_title(); ?></h2>
          <p class="my-2">
            <?php echo get_the_excerpt(); ?>
          </p>
          <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
        </div>
        <?php
      } ?>

    </section>
  </div>
</div>
<?php
get_footer();
?>