<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1
    class="text-3xl font-bold my-12">
    <a
      class="link-dark"
      href="<?php echo site_url('/skills'); ?>">
      All Skills
    </a>
  </h1>
  <h2
    class="text-2xl font-bold">
    <?php 
      $image = get_field('icon');
      if ($image) {
        ?>
        <img
          class="w-12 h-12 inline-block"
          src="<?php echo $image['url']; ?>"
          alt="<?php echo $image['alt']; ?>"
        >
        <?php
      }
    ?>
    <?php the_title(); ?>
  </h2>
  <p class="my-2">
    <?php the_content(); ?>
  </p>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

    <?php
      $relatedItemsQuery = array(
        'posts_per_page' => -1,
        'post_type' => 'pr',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'related_skills',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"' // This is important because PHP uses serialization with arrays
          )
        )
      );
      get_template_part('single-skill/related-to-skill', 'pr', array(
        'title' => 'Related PRs',
        'query' => $relatedItemsQuery
      ));
    ?>
    <?php
      wp_reset_postdata();
      $query = array(
        'posts_per_page' => -1,
        'post_type' => 'experience',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'related_skills',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"' // This is important because PHP uses serialization with arrays
          )
        )
      );
      get_template_part('single-skill/related-to-skill', NULL, array(
        'title' => 'Related Experience',
        'query' => $query
      ));
    ?>
    <?php
      wp_reset_postdata();
      $query = array(
        'posts_per_page' => -1,
        'post_type' => 'project',
        'orderby' => 'title',
        'order' => 'ASC',
        'meta_query' => array(
          array(
            'key' => 'related_skills',
            'compare' => 'LIKE',
            'value' => '"' . get_the_ID() . '"' // This is important because PHP uses serialization with arrays
          )
        )
      );
      get_template_part('single-skill/related-to-skill', NULL, array(
        'title' => 'Related Projects',
        'query' => $query
      ));
    ?>
  </div>
</div>
<?php
get_footer();
?>