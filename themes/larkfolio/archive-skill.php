<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">Skills</h1>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <?php

    $projectsBySkill = get_posts_indexed_by_skill('project');
    $experiencesBySkill = get_posts_indexed_by_skill('experience');
    $prsBySkill = get_posts_indexed_by_skill('pr');

    while(have_posts()) {
      the_post();
      get_template_part('template-parts/card-skill', NULL, array(
        'projectsBySkill' => $projectsBySkill,
        'experiencesBySkill' => $experiencesBySkill,
        'prsBySkill' => $prsBySkill
      ));
    }
    ?>
  </div>
</div>
<?php
get_footer();
?>
