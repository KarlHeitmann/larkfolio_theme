<?php
  $programming_language = get_field('main_language');
  $framework = get_field('framework');
  $icon_image = "";
  $framework_icon_image = "";
  if ($programming_language == "Ruby") {
    $icon_image = "ruby_logo.svg";
  } else if ($programming_language == "go lang") {
    $icon_image = "go_logo_aqua.svg";
  } else if ($programming_language == "Rust") {
    $icon_image = "rust_logo_white.svg";
  } else if ($programming_language == "Node.js") {
    $icon_image = "node_js_white.svg";
  } else {
    print_r($programming_language);
  }    
  if ($framework == "Ruby on Rails") {
    $framework_icon_image = "ruby_on_rails_logo.svg";
  } else if ($framework == "React") {
    $framework_icon_image = "react_logo_aqua.svg";
  }
?>
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
