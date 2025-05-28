<section>
  <?php
  wp_reset_postdata();
    $relatedSkills = get_field('related_skills');
    if ($relatedSkills) {
      ?>
      <h2 class="my-12">Related Skills</h2>
      <div class="flex">
      <?php
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
      ?> </div> <?php
    }
  ?>
</section>
