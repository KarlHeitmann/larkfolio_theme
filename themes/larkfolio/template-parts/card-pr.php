<div class="card">
  <?php get_template_part('template-parts/header-pr', NULL, array(
    'permalink' => $args['permalink'],
    'title' => $args['title']
  )); ?>
  <p class="my-2">
    <?php echo $args['excerpt']; ?>
  </p>
  <div class="flex flex-col-reverse md:flex-row justify-end">
    <a class="btn-link my-1 md:my-0 inline-block" href="<?php echo $args['permalink']; ?>">Read more</a>
    <div class="flex-grow"></div>
    <?php renderRepositoryLink(array('repository_link' => $args['repository_link'])) ?>
    <?php renderPRLink(array('pr_link' => $args['pr_link'])); ?>
  </div>
</div>
