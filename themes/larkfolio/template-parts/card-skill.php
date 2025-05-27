<div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
  <header class="flex items-center">
    <?php
      $image = get_field('icon');
      if ($image) {
        ?>
        <img
          class="w-12 h-12 inline-block"
          src="<?php echo $image['url']; ?>"
          alt="<?php echo $image['alt']; ?>"
        >
        <?php
      }
    ?>
    <h1 class="ml-3"><?php the_title(); ?></h1>
  </header>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
</div>
