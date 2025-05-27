<div class="flex flex-row">
  <h2 class="flex-grow text-xl font-bold"><?php the_title(); ?></h2>
  <div class="flex flex-col items-center">
    <span class="font-bold">Skills</span>
    <div class="flex items-center">
    <?php
      $relatedSkills = get_field('related_skills');
      foreach ($relatedSkills as $skill) {
        $title = get_the_title($skill);
        // $image = get_field('icon');
        $image = get_field('icon', $skill); // This is important because PHP uses serialization with arrays
        renderSkillBadge(array(
          'title' => $title,
          // 'excerpt' => get_the_excerpt($skill),
          'link' => get_the_permalink($skill),
          'image' => $image
        ));
      }
    ?>
    </div>
  </div>
</div>
<div class="flex flex-row justify-end">
  <?php renderRepositoryLink(array('repository_link' => get_field('repository_link'))) ?>
  <?php renderPRLink(array('pr_link' => get_field('pr_link'))); ?>
</div>
