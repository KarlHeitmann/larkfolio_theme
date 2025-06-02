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
      <div class="container mx-auto px-4 flex items-center justify-between relative">
        <div class="logo text-xl font-bold text-gray-200">
          <a class="menu-item" href="<?php echo site_url('/'); ?>"><?php bloginfo('name'); ?></a>
        </div>

        <!-- Hidden checkbox toggle -->
        <input type="checkbox" id="menu-toggle" class="peer hidden" />

        <!-- Hamburger icon -->
        <label for="menu-toggle" class="md:hidden cursor-pointer text-gray-200">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </label>

        <!-- Menu -->
        <ul class="absolute top-full left-0 w-full bg-gray-900 text-gray-200 flex-col hidden peer-checked:flex md:flex md:static md:flex-row md:space-x-6 md:w-auto md:bg-transparent">
          <li class="mx-2 my-2 md:my-0"><a class="menu-item" href="<?php echo site_url('/'); ?>">Home</a></li>
          <li class="mx-2 my-2 md:my-0"><a class="menu-item" href="<?php echo site_url('/prs'); ?>">PRs</a></li>
          <li class="mx-2 my-2 md:my-0"><a class="menu-item" href="<?php echo site_url('/skills'); ?>">Skills</a></li>
          <li class="mx-2 my-2 md:my-0"><a class="menu-item" href="<?php echo site_url('/projects'); ?>">Projects</a></li>
          <li class="mx-2 my-2 md:my-0"><a class="menu-item" href="<?php echo site_url('/experience'); ?>">Experience</a></li>
          <li class="mx-2 my-2 md:my-0"><a class="menu-item" href="<?php echo site_url('/education'); ?>">Education</a></li>
          <li class="mx-2 my-2 md:my-0"><a class="menu-item" href="<?php echo site_url('/about'); ?>">About</a></li>
        </ul>
      </div>
    </header>
    <main class="min-h-screen">