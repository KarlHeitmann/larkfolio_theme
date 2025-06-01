<?php

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

  function renderSkillBadge($args = NULL) {
    $title = $args['title'];
    // $excerpt = $args['excerpt'];
    $link = $args['link'];
    $image = $args['image'];
      // <span class="w-12 h-12"><php echo wp_trim_words($title, 1); ></span>

        // class="link-badge"
    ?>
      <a
        class="rounded-xl
          flex flex-col
          group
          items-center
          w-16 h-19
          mx-1 p-1
          bg-gray-800"
        href="<?php echo $link; ?>">
        <?php if ($image) { ?>
          <img
            class="w-12 h-12"
            src="<?php echo $image['url']; ?>"
            alt="<?php echo $image['alt']; ?>"
          >
        <?php } ?>
        <span
          class="text-sm text-center
            text-amber-300 group-hover:text-amber-500">
          <?php echo $title; ?>
        </span>
      </a>
    <?php
  }
  function renderPRLink($args = NULL) {
    // $pr_number = explode('/', $args['pr_link'])
    // $pr_number = str_split($args['pr_link'])[-1];
    $parts_pr = explode('/', $args['pr_link']);
    $pr_number = end($parts_pr);
    $external_icon = file_get_contents(get_template_directory() . '/icons/external-link-svgrepo-com.svg')
    // <a class="border text-gray-700 bg-white rounded m-2 p-1 hover:bg-gray-100"
    // target="_blank" href="<?php echo $args['pr_link']; ?><!--">PR --><?php // echo $pr_number; ?><!--</a>--> <?php
    ?>
      <a
        class="btn-link"
        target="_blank"
        href="<?php echo $args['pr_link']; ?>">
        PR <?php echo $pr_number; ?>
        <span
          class="w-4 inline-block">
          <?php echo $external_icon; ?>
        </span>
      </a>
    <?php
  }

  function renderRepositoryLink($args = NULL) {
    $parts_repo_link = explode('/', $args['repository_link']);
    $repo_name = end($parts_repo_link);
    $external_icon = file_get_contents(get_template_directory() . '/icons/external-link-svgrepo-com.svg')
    ?>
      <a
        class="btn-link"
        target="_blank"
        href="<?php echo $args['repository_link']; ?>">
        <?php echo $repo_name; ?>
        <span
          class="w-4 inline-block">
          <?php echo $external_icon; ?>
        </span>
      </a>
    <?php
  }

// NOTE: mu-plugins are plugins that must be used. They are loaded on every page load.
function larkfolio_post_types() {
  // Register Custom Post Type: "pr"
  register_post_type('pr', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    // 'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // Manually adds custom fields to the post type
    'rewrite' => array('slug' => 'prs'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-media-code',
    'labels' => array(
      'name' => 'PRs',
      'add_new_item' => 'Add New PR',
      'edit_item' => 'Edit PR',
      'all_items' => 'All PRs',
      'singular_name' => 'PR'
    )
  ));

  // Register Custom Post Type: "experience"
  register_post_type('experience', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    // 'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // Manually adds custom fields to the post type
    'rewrite' => array('slug' => 'experience'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-store',
    'labels' => array(
      'name' => 'Experience',
      'add_new_item' => 'Add New Experience',
      'edit_item' => 'Edit Experience',
      'all_items' => 'All Experience',
      'singular_name' => 'Experience'
    )
  ));

  // Register Custom Post Type: "skills"
  register_post_type('skill', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    // 'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // Manually adds custom fields to the post type
    'rewrite' => array('slug' => 'skills'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-awards',
    'labels' => array(
      'name' => 'Skills',
      'add_new_item' => 'Add New Skill',
      'edit_item' => 'Edit Skill',
      'all_items' => 'All Skills',
      'singular_name' => 'Skill'
    )
  ));

  // Register Custom Post Type: "projects"
  register_post_type('project', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    // 'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // Manually adds custom fields to the post type
    'rewrite' => array('slug' => 'projects'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-portfolio',
    'labels' => array(
      'name' => 'Projects',
      'add_new_item' => 'Add New Project',
      'edit_item' => 'Edit Project',
      'all_items' => 'All Projects',
      'singular_name' => 'Project'
    )
  ));

  // Register Custom Post Type: "education"
  register_post_type('education', array(
    'show_in_rest' => true,
    'supports' => array('title', 'editor', 'excerpt'),
    // 'supports' => array('title', 'editor', 'excerpt', 'custom-fields'), // Manually adds custom fields to the post type
    'rewrite' => array('slug' => 'education'),
    'has_archive' => true,
    'public' => true,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'labels' => array(
      'name' => 'Education',
      'add_new_item' => 'Add New Education',
      'edit_item' => 'Edit Education',
      'all_items' => 'All Education',
      'singular_name' => 'Education'
    )
  ));
}

add_action('init', 'larkfolio_post_types');

function larkfolio_files() {
  // <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  // wp_enqueue_script('tailwindcss-browser', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', array('jquery'), '1.0', true);
  wp_enqueue_script(
    'main-larkfolio-js',
    get_theme_file_uri('/js/index.js'),
    array(),       // No dependencies
    '1.0',         // Version
    true           // ✅ Load in footer
  );

}
add_action('wp_enqueue_scripts', 'larkfolio_files');
  
add_action('rest_api_init', function () {
  register_rest_route('mytheme/v1', '/posts-html', [
    'methods'  => 'POST',
    'callback' => 'mytheme_render_posts_html',
    'permission_callback' => '__return_true', // Adjust for auth if needed
    'args' => [
      'search' => [
        'sanitize_callback' => 'sanitize_text_field',
        'required' => false,
      ],
    ]
  ]);
});

function mytheme_render_posts_html($request) {
  $search = $request->get_param('search');

  $query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 5,
    's' => $search,
  ]);

  $posts = $query->have_posts() ? $query->posts : [];

  ob_start();
  get_template_part('template-parts/ajax/posts-results', null, ['posts' => $posts]);
  $html = ob_get_clean();

  return new WP_REST_Response([
    'html' => $html
  ], 200);
}

function larkfolio_features() {
  add_theme_support('title-tag');
  add_theme_support( 'editor-styles' );
  add_editor_style( 'css/style.css' );
}
add_action('after_setup_theme', 'larkfolio_features');

// TAILWINDCSS
function larkfolio_enqueue_styles() {
    wp_enqueue_style(
        'larkfolio-style',
        get_template_directory_uri() . '/css/style.css',
        array(),
        filemtime(get_template_directory() . '/css/style.css')
    );
}
add_action('wp_enqueue_scripts', 'larkfolio_enqueue_styles');

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
