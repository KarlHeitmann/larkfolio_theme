<?php
require_once get_template_directory() . '/functions/rest-api.php';
require_once get_template_directory() . '/functions/custom-post-types.php';
require_once get_template_directory() . '/functions/helpers.php';
require_once get_template_directory() . '/functions/load-assets.php';

function get_posts_indexed_by_skill($post_type) {
  $query = new WP_Query(array(
    'post_type' => $post_type,
    'posts_per_page' => -1,
    'fields' => 'ids', // just get IDs for performance
  ));

  $index = [];

  foreach ($query->posts as $post_id) {
    $related_skills = get_field('related_skills', $post_id, false); // returns array of skill IDs
    if (!$related_skills) continue;

    foreach ($related_skills as $skill_id) {
      if (!isset($index[$skill_id])) {
        $index[$skill_id] = 0;
      }
      $index[$skill_id]++;
    }
  }

  return $index;
}

function larkfolio_add_module_type($tag, $handle, $src) {
if ($handle === 'stimulus-app') {
  return "<script type='module' src='" . esc_url($src) . "'></script>";
}
return $tag;
}
add_filter('script_loader_tag', 'larkfolio_add_module_type', 10, 3);

function larkfolio_features() {
  add_theme_support('title-tag');
  add_theme_support( 'editor-styles' );
  add_editor_style( 'css/style.css' );
}
add_action('after_setup_theme', 'larkfolio_features');

function larkfolio_enqueue_block_editor_assets() {
    wp_enqueue_style(
        'larkfolio-editor-style',
        get_template_directory_uri() . '/css/style.css',
        array(),
        filemtime(get_template_directory() . '/css/style.css')
    );
}
add_action('enqueue_block_editor_assets', 'larkfolio_enqueue_block_editor_assets');

?>
