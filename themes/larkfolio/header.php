<!DOCTYPE html>
<!-- language_attributes() sets language defined by WP -->
<html <?php language_attributes(); ?>>
  <head>
    <!-- bloginfo('charset') returns charset defined by WP -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <!-- XXX: Use this meta tag to enable responsive CSS -->
    <meta name="viewport" content="width=device-width initial-scale=1">
    <?php wp_head(); ?>
  </head>
<!--
  body_class() sets classes defined by WP that depends on which page is being displayed, it is similar to Ruby on Rails yield :content_for or yield :body_classes or params[:controller], params[:action]
  this way, I can add CSS classes to the body tag based on the page being displayed
  -->
  <body <?php body_class(array('bg-gray-800 text-white')); ?>>
    <!--<header class="bg-white shadow-md py-2 fixed top-0 left-0 w-full">-->
    <header class="bg-gray-900 shadow-md py-2 w-full">
      <div class="container mx-auto px-4 flex items-center justify-between">
        <div class="logo text-xl font-bold text-gray-200"><a class="menu-item" href="<?php echo site_url('/'); ?>"><?php bloginfo('name'); ?></a></div>
        <ul class="menu flex items-center">
          <li class="menu-item"><a href="<?php echo site_url('/'); ?>">Home</a></li>
          <li class="menu-item"><a href="<?php echo site_url('/prs'); ?>">PRs</a></li>
          <li class="menu-item"><a href="<?php echo site_url('/skills'); ?>">Skills</a></li>
          <li class="menu-item"><a href="<?php echo site_url('/projects'); ?>">Projects</a></li>
          <li class="menu-item"><a href="<?php echo site_url('/experience'); ?>">Experience</a></li>
          <li class="menu-item"><a href="<?php echo site_url('/education'); ?>">Education</a></li>
          <li class="menu-item"><a href="<?php echo site_url('/about'); ?>">About</a></li>
        </ul>
      </div>
    </header>
    <main class="min-h-screen">