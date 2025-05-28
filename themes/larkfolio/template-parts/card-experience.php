<div class="card">
  <div class="flex flex-row items-center">
    <h3 class="flex-grow"><?php the_title(); ?></h3>
    <?php get_template_part('template-parts/skills-widget', NULL, array(
      'related_skills' => get_field('related_skills')
    )); ?>
  </div>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
</div>
