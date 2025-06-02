<?php
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
?>