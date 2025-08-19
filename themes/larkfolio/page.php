<?php
get_header();
?>

<div class="container mx-auto px-4">
  <?php
  $hasChildren = get_pages(array(
    'child_of' => get_the_ID()
  ));
  if ($hasChildren) { ?>
    <section class="grid grid-cols-4">
      <article class="col-span-3">
        <?php get_template_part('page/main_content'); ?>
      </article>
      <aside>
        <?php get_template_part('page/sidebar_children_pages'); ?>
      </aside>
    </section>
  <?php } else { ?>
    <section>
      <?php get_template_part('page/main_content'); ?>
    </section>
  <?php } ?>
</div>
<?php
get_footer();
?>
