<?php
get_header();
?>
<div class="container mx-auto px-4">
  <h1 class="text-3xl font-bold my-12">
    <a
      class="link-dark"
      href="<?php echo site_url('/experience'); ?>">
      Experience
    </a>
  </h1>
  <?php
  while(have_posts()) {
    the_post();
    ?>
      <h2 class="text-2xl font-bold"><?php the_title(); ?></h2>
      <p class="my-2">
        <?php the_content(); ?>
      </p>
  <?php
  }
  ?>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <section>
      <?php
      wp_reset_postdata();
        $relatedSkills = get_field('related_skills');
        if ($relatedSkills) {
          ?>
          <h2 class="text-xl font-bold my-12">Related Skills</h2>
          <div class="flex">
          <?php
            foreach ($relatedSkills as $skill) {
              $title = get_the_title($skill);
              // $image = get_field('icon');
              $image = get_field('icon', $skill); // This is important because PHP uses serialization with arrays
              renderSkillBadge(array(
                'title' => $title,
                // 'excerpt' => get_the_excerpt($skill),
                'link' => get_the_permalink($skill),
                'image' => $image
              ));
            }
          ?> </div> <?php
        }
      ?>
    </section>
    <section>
      
    </section>
  </div>
</div>
<?php
get_footer();
?>
