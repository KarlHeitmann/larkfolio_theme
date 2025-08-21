<?php
get_header();
?>

<div class="container mx-auto px-4">
  <?php
  get_template_part('template-parts/widgets/breadcrumbs');
  $hasChildren = get_pages(array(
    'child_of' => get_the_ID()
  ));
  if ($hasChildren) { ?>
    <section class="grid grid-cols-4">
      <article class="col-span-3 the-content-wrapper">
        <?php get_template_part('page/main_content'); ?>
      </article>
      <!--<aside class="justify-self-center self-center">-->
      <aside class="justify-self-center pt-24">
        <?php get_template_part('page/sidebar_children_pages', NULL, array('count' => count($hasChildren))); ?>
      </aside>
    </section>
  <?php } else { ?>
    <section class="the-content-wrapper">
      <?php get_template_part('page/main_content'); ?>
      
    </section>
  <?php } ?>
</div>
<?php
get_footer();
?>
