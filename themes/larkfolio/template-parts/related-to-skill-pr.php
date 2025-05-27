<section>
  <?php $relatedItems = new WP_Query($args['query']); ?>
  <h2 class="text-xl font-bold my-12"><?php echo $args['title']; ?></h2>
  <h3>Count of PRs: <?php echo $relatedItems->post_count; ?></h3>
  <?php
  while ($relatedItems->have_posts()) {
    $relatedItems->the_post();
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