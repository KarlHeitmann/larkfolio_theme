<section>
  <div class="min-h-48">
    <h1 class="text-3xl font-bold my-12">
      <a
        href="<?php echo site_url('/skills'); ?>">
        My Skills
      </a>
    </h1>
    <p>
      The skills listed below are some of the skills I needed to have in order to 
      submit the PRs described on this website, and to build the projects mentioned here.
    </p>
  </div>
  <?php
  // NOTE: Use this to reset the global $post variable
  wp_reset_postdata();
  $homepageSkills = new WP_Query(array(
    'posts_per_page' => 2,
    'orderby' => 'rand',
    'post_type' => 'skill',
  ));

  $projectsBySkill = get_posts_indexed_by_skill('project');
  $experiencesBySkill = get_posts_indexed_by_skill('experience');
  $prsBySkill = get_posts_indexed_by_skill('pr');

  while ($homepageSkills->have_posts()) {
    $homepageSkills->the_post();
    get_template_part('template-parts/card-skill', NULL, array(
      'projectsBySkill' => $projectsBySkill,
      'experiencesBySkill' => $experiencesBySkill,
      'prsBySkill' => $prsBySkill
    ));
  } ?>
  <a
    href="<?php echo site_url('/skills'); ?>"
    class="link-dark text-3xl mt-2 inline-block"
    >
    See all skills
  </a>
</section>
