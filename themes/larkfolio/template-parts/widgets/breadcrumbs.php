<?php
$theParent = wp_get_post_parent_id(get_the_ID());
?><div><?php
while ($theParent) { ?>
  <a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a> \
  <?php $theParent = wp_get_post_parent_id($theParent); ?>
<?php }
?>
<span><?php echo get_the_title(); ?></span>
</div> <?php