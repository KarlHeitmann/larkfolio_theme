<?php
get_header();
?>

<div class="container mx-auto px-4">
  <section class="grid grid-cols-4">
    <article class="col-span-3">
      <?php get_template_part('page/main_content'); ?>
    </article>
    <aside>
      <?php
      wp_list_pages(array(
        'title_li' => null, // Removes "Pages" title
        'child_of' => get_the_ID(),
        'sort_column' => 'menu_order' // By default, wp_list_pages will order pages by name. This changes it to order by menu order. This order value can be tweaked by page in "Order" input box in WP dashboard admin of the page, in its "Page Attributes" section
      ));
      ?>
    </aside>
  </section>
</div>
<?php
get_footer();
?>
