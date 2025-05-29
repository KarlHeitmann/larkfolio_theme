<?php
get_header();
?>

<!--
<ul class="border rounded-md border-gray-100 text-gray-100 flex flex-row m-4 p-2 inline-block">
  <li class="hover:bg-gray-700 hover:text-emerald-700 rounded p-2 hover:text-extrabold inline-block"><a href="<?php echo site_url('/prs'); ?>">PRs</a></li>
  <li class="inline-block">-</li>
    <li class="rounded p-2 inline-block"><?php // the_title(); ?></li>
  </ul>
-->
<div class="container mx-auto px-4 rounded-2xl">
  <h1 class="text-3xl font-bold my-12">
    <a
      class="inline-link"
      href="<?php echo site_url('/prs'); ?>">
      All PRs
    </a>
  </h1>
  <?php
  while(have_posts()) {
    the_post(); ?>

    <?php get_template_part('template-parts/header-pr', NULL, array('permalink' => NULL)); ?>
    <p class="m-4">
      <?php the_content(); ?>
    </p>
    <div class="flex flex-row justify-end">
      <?php renderRepositoryLink(array('repository_link' => get_field('repository_link'))) ?>
      <?php renderPRLink(array('pr_link' => get_field('pr_link'))); ?>
    </div>
  <?php } ?>
</div>
<?php
get_footer();
?>
