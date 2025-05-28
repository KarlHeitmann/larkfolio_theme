<div class="card">
  <?php get_template_part('template-parts/header-pr'); ?>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
</div>
