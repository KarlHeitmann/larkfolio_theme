<?php
get_header();
?>

<ul class="border rounded-md border-gray-100 text-gray-100 flex flex-row m-4 p-2 inline-block">
  <li class="hover:bg-gray-700 hover:text-emerald-700 rounded p-2 hover:text-extrabold inline-block"><a href="<?php echo site_url('/prs'); ?>">PRs</a></li>
  <li class="inline-block">-</li>
  <?php
  while(have_posts()) {
    the_post(); ?>
    <li class="rounded p-2 inline-block"><?php the_title(); ?></li>
  </ul>

  <div class="container mx-auto my-12 p-4 rounded-2xl">
    <?php get_template_part('template-parts/header-pr'); ?>
    <p class="m-4">
      <?php the_content(); ?>
    </p>
  </div>
  <?php
  }
  ?>
</div>
<?php
get_footer();
?>
