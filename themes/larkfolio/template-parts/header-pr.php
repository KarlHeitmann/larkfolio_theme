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
  } else {
    print_r($programming_language);
  }    
  if ($framework == "Ruby on Rails") {
    $framework_icon_image = "ruby_on_rails_logo.svg";
  }
?>
<div class="flex flex-row">
  <h2 class="flex-grow text-xl font-bold"><?php the_title(); ?></h2>
  <?php if ($framework_icon_image != "") { ?>
    <img class="w-12 h-12"
      src="<?php echo get_template_directory_uri() . '/icons/' . $framework_icon_image; ?>"
      alt="Framework: <?php echo $framework; ?>"
      >
  <?php } ?>
  <img class="w-12 h-12"
    src="<?php echo get_template_directory_uri() . '/icons/' . $icon_image; ?>"
    alt="Programming language: <?php echo $programming_language; ?>"
    >
</div>
<div class="flex flex-row justify-end">
  <?php renderRepositoryLink(array('repository_link' => get_field('repository_link'))) ?>
  <?php renderPRLink(array('pr_link' => get_field('pr_link'))); ?>
</div>
