<?php
get_header();
echo '<h1 class="m-8">My Index Page</h1>';

while(have_posts()) {
  the_post(); ?>
  <div class="container mx-auto px-4">
    <h2 class="text-xl font-bold"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="text-gray-400 text-sm">
      <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('j F, Y'); ?> in <?php echo get_the_category_list(', ');?></p>
    </div>
    <div>
      <?php the_excerpt(); ?>
    </div>
    <p><a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a></p>
    </div>
  </div>
  <?php
}
echo paginate_links();
get_footer();
?>
