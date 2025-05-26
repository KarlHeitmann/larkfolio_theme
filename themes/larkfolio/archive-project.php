<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">Projects</h1>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <?php
    while(have_posts()) {
      the_post();
      ?>
      <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
        <h1><?php the_title(); ?></h1>
        <p class="my-2">
          <?php echo get_the_excerpt(); ?>
        </p>
        <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
      </div>
    <?php
    }
    ?>
  </div>
</div>
<?php
get_footer();
?>
