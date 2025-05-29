<div class="card">
  <?php get_template_part('template-parts/header-pr', NULL, array('permalink' => get_the_permalink())); ?>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <div class="flex flex-row justify-end">
    <a class="btn-link mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
    <div class="flex-grow"></div>
    <?php renderRepositoryLink(array('repository_link' => get_field('repository_link'))) ?>
    <?php renderPRLink(array('pr_link' => get_field('pr_link'))); ?>
  </div>
</div>
