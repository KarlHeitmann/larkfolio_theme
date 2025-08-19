<?php
$word = NULL;
if ($args['count'] > 1) { 
$word = 'these links';
} else {
$word = 'this link';
}
?>
<h3>Go deeper by following <?php echo $word; ?></h3>
<?php
wp_list_pages(array(
  'title_li' => null, // Removes "Pages" title
  'child_of' => get_the_ID(),
  'sort_column' => 'menu_order' // By default, wp_list_pages will order pages by name. This changes it to order by menu order. This order value can be tweaked by page in "Order" input box in WP dashboard admin of the page, in its "Page Attributes" section
));
?>
