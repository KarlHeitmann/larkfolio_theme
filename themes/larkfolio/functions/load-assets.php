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
  // Detect environment based on server name or a constant
  $is_dev = in_array($_SERVER['SERVER_NAME'], ['localhost', '127.0.0.1', 'karlheitmann.ddev.site']);

  // Choose the appropriate file
  $css_file = $is_dev ? 'style.css' : 'style.min.css';

  // Build full paths
  $file_path = get_template_directory() . "/css/{$css_file}";
  $file_url  = get_template_directory_uri() . "/css/{$css_file}";

  wp_enqueue_style(
    'larkfolio-style',
    $file_url,
    array(),
    filemtime($file_path)
  );
}
add_action('wp_enqueue_scripts', 'larkfolio_enqueue_styles');

?>
