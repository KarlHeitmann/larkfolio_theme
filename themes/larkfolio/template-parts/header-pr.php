<div class="flex flex-col md:items-center md:flex-row">
  <h3 class="flex-grow">
    <?php
    $permalink = $args['permalink'];
    if ($permalink == NULL) {
      echo $args['title'];
    } else {
      ?> <a class="inline-link" href="<?php echo $permalink; ?>"><?php echo $args['title']; ?></a> <?php
    }
    ?>
  </h3>
  <div class="flex flex-col md:items-center ">
    <span class="font-bold hidden md:inline">Skills</span>
    <div class="flex items-center">
    <?php
      $relatedSkills = get_field('related_skills');
      foreach ($relatedSkills as $skill) {
        $skillTitle = get_the_title($skill);
        // $image = get_field('icon');
        $image = get_field('icon', $skill); // This is important because PHP uses serialization with arrays
        renderSkillBadge(array(
          'title' => $skillTitle,
          // 'excerpt' => get_the_excerpt($skill),
          'link' => get_the_permalink($skill),
          'image' => $image
        ));
      }
    ?>
    </div>
  </div>
</div>
