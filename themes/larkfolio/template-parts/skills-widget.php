<div class="flex flex-col items-center">
  <span class="font-bold">Skills</span>
  <div class="flex items-center">
    <?php
      $relatedSkills = $args['related_skills'];
      if ($relatedSkills) {
        foreach ($relatedSkills as $skill) {
          $title = get_the_title($skill);
          $image = get_field('icon', $skill);
          renderSkillBadge(array(
            'title' => $title,
            'link' => get_the_permalink($skill),
            'image' => $image
          ));
        }
      }
    ?>
  </div>
</div>
