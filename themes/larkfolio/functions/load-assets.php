<?php
function larkfolio_files() {
  // <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  // wp_enqueue_script('tailwindcss-browser', 'https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4', array('jquery'), '1.0', true);
  wp_enqueue_script(
    'stimulus-app',
    get_template_directory_uri() . '/js/stimulus-app.js',
    [],
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'larkfolio_files');

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

?>