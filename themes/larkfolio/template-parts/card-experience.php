<div class="card">
  <div class="flex flex-col md:flex-row md:items-center">
    <h3 class="flex-grow">
      <a href="<?php the_permalink(); ?>" class="inline-link">
        <?php the_title(); ?>
      </a>
    </h3>
    <?php get_template_part('template-parts/skills-widget', NULL, array(
      'related_skills' => get_field('related_skills')
    )); ?>
  </div>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <a class="btn-link mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
</div>
