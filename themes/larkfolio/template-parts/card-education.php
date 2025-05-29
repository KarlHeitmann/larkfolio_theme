<div class="card">
  <h3>
    <a href="<?php the_permalink(); ?>" class="inline-link">
      <?php the_title(); ?>
    </a>
  </h3>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <a class="btn-link mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
</div>
