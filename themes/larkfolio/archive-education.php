<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">Education</h1>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <?php while(have_posts()) {
      the_post();
      get_template_part('template-parts/card-education');
    } ?>
  </div>
</div>
<?php
get_footer();
?>
