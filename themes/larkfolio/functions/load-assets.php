<?php
function larkfolio_files() {
  // $is_dev = in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1', 'karlheitmann.ddev.site']);
  // $js_file = $is_dev ? 'js/app.js' : 'js/bundle.min.js'; // app.js is your dev entry point if needed
  $js_file = 'js/bundle.min.js/stimulus-app.js';

  wp_enqueue_script(
    'larkfolio-js',
    get_template_directory_uri() . '/' . $js_file,
    array(),
    filemtime(get_template_directory() . '/' . $js_file),
    true
  );
}

add_filter('script_loader_tag', function ($tag, $handle) {
  if ($handle === 'larkfolio-js') {
    return str_replace('<script ', '<script defer ', $tag);
  }
  return $tag;
}, 10, 2);

add_action('wp_enqueue_scripts', 'larkfolio_files');

// TAILWINDCSS
function larkfolio_enqueue_styles() {
  $file_path = get_template_directory() . "/css/style.css";
  $file_url  = get_template_directory_uri() . "/css/style.css";

  wp_enqueue_style(
    'larkfolio-style',
    $file_url,
    array(),
    filemtime($file_path)
  );
}
add_action('wp_enqueue_scripts', 'larkfolio_enqueue_styles');

?>
