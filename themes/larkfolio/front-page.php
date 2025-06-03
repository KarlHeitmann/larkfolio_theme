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
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <?php
    get_template_part('front-page/prs');
    get_template_part('front-page/skills');
    get_template_part('front-page/projects');
    get_template_part('front-page/experiences');
    get_template_part('front-page/education');
    ?>
  </div>
</div>
<?php
get_footer();
?>
