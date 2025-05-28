<div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
  <h2><?php the_title(); ?></h2>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
</div>
