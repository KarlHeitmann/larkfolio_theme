<?php
get_header();
?>
<div class="container px-16 py-16">
  <?php
  while(have_posts()) {
    the_post();
    the_content();
  }
  echo paginate_links();
  ?>
</div>
<?php
get_footer();
?>
