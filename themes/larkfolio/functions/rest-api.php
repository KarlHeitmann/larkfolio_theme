<?php
add_action('rest_api_init', function () {
  register_rest_route('larkfolio/v1', '/prs-html', [
    'methods'  => 'POST',
    'callback' => 'larkfolio_render_prs_html',
    'permission_callback' => '__return_true', // Adjust for auth if needed
    'args' => [
      'search' => [
        'sanitize_callback' => 'sanitize_text_field',
        'required' => false,
      ],
    ]
  ]);
});

function larkfolio_render_prs_html($request) {
  $search = $request->get_param('search');
  // error_log("Search: " . var_dump($search));
  $skill_ids = array_filter(array_map('absint', explode(',', $search)));
  $query_args = [
    'post_type'      => 'pr',
    'posts_per_page' => -1,
  ];

  if (!empty($skill_ids)) {
    $meta_query = ['relation' => 'OR'];
    foreach ($skill_ids as $id) {
      $meta_query[] = [
        'key'     => 'related_skills',
        'compare' => 'LIKE',
        'value'   => '"' . $id . '"',
      ];
    }
    $query_args['meta_query'] = $meta_query;
  }

  $query = new WP_Query($query_args);

  $prs = $query->have_posts() ? $query->posts : [];

  ob_start();
  get_template_part('template-parts/ajax/prs-results', null, ['prs' => $prs]);
  $html = ob_get_clean();

  return new WP_REST_Response([
    'html' => $html
  ], 200);
}

?>
