<div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
  <div class="flex flex-row items-center">
    <h2 class="flex-grow text-3xl font-bold"><?php the_title(); ?></h2>
    <div class="flex flex-col items-center">
      <span class="font-bold">Skills</span>
      <div class="flex items-center">
        <?php
          $relatedSkills = get_field('related_skills');
          ?>
          <!--<pre class="text-3xl">print_r: <?php // var_dump($relatedSkills); ?></pre>-->
          <?php
          if ($relatedSkills) {
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
          }
        ?>
      </div>
    </div>
  </div>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
</div>
