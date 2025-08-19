<?php $theParent = wp_get_post_parent_id(get_the_ID());
$ancestors = [];
while ($theParent) {
  $ancestors[] = $theParent;
  $theParent = wp_get_post_parent_id($theParent);
}
$ancestors = array_reverse($ancestors);
?>
<div class="flex">
<?php foreach ($ancestors as $ancestor) { ?>
  <a
    class="breadcrumb-link"
    href="<?php echo get_permalink($ancestor); ?>"><?php echo get_the_title($ancestor); ?></a>
  <span class="breadcrumb-span">\</span>
<?php } ?>
<span class=""><?php echo get_the_title(); ?></span>
</div>