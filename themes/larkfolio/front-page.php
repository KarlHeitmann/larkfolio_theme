<?php
get_header();
?>
<div class="container px-16 py-16">
  <?php
  while(have_posts()) {
    the_post();
    the_content();
  }
  echo paginate_links();
  ?>
  <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
    <section>
      <div class="min-h-48">
        <h1 class="text-3xl font-bold my-12">
          <a
            href="<?php echo site_url('/prs'); ?>">
            My open source contributions
          </a>
        </h1>
        <p class="mb-12">
          I really enjoy contribute to open source projects. When you open the "issues" tab of an open source
          project, you are taking a sneak peek to problems and issues a real world project is facing.
        </p>
      </div>
      <?php
      // NOTE: Use this to reset the global $post variable
      wp_reset_postdata();
      $homepagePrs = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'pr',
      ));
      while ($homepagePrs->have_posts()) {
        $homepagePrs->the_post();
        ?>
        <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
          <?php get_template_part('template-parts/header-pr'); ?>
          <p class="my-2">
            <?php echo get_the_excerpt(); ?>
          </p>
          <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
        </div>
        <?php
      } ?>
    </section>
    <section>
      <div class="min-h-48">
        <h1 class="text-3xl font-bold my-12">
          <a
            href="<?php echo site_url('/projects'); ?>">
            My side projects
          </a>
        </h1>
        <p>
          All my side projects are hosted on my
          <a
            class="rounded px-1 text-amber-300 hover:text-lime-500 hover:bg-gray-950"
            target="_blank"
            href="https://github.com/KarlHeitmann">
            GitHub profile
          </a>.
          On this section you can find a selection of my side projects.
        </p>
      </div>
      <?php
      // NOTE: Use this to reset the global $post variable
      wp_reset_postdata();
      $homepageProjects = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'project',
      ));
      while ($homepageProjects->have_posts()) {
        $homepageProjects->the_post();
        ?>
        <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
          <h2><?php the_title(); ?></h2>
          <p class="my-2">
            <?php echo get_the_excerpt(); ?>
          </p>
          <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
        </div>
        <?php
      } ?>
    </section>
    <section>
      <div class="min-h-48">
        <h1 class="text-3xl font-bold my-12 min-h-36">My skills</h1>
      </div>
      <?php
      // NOTE: Use this to reset the global $post variable
      wp_reset_postdata();
      $homepageSkills = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'skill',
      ));
      while ($homepageSkills->have_posts()) {
        $homepageSkills->the_post();
        ?>
        <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
          <h2><?php the_title(); ?></h2>
          <p class="my-2">
            <?php echo get_the_excerpt(); ?>
          </p>
          <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
        </div>
        <?php
      } ?>
    </section>
    <section>
      <div class="min-h-48">
        <h1 class="text-3xl font-bold my-12">My education</h1>
      </div>
      <?php
      // NOTE: Use this to reset the global $post variable
      wp_reset_postdata();
      $homepageEducation = new WP_Query(array(
        'posts_per_page' => 2,
        'post_type' => 'education',
      ));
      while ($homepageEducation->have_posts()) {
        $homepageEducation->the_post();
        ?>
        <div class="border-gray-900 border-3 mb-12 p-4 rounded-2xl">
          <h2><?php the_title(); ?></h2>
          <p class="my-2">
            <?php echo get_the_excerpt(); ?>
          </p>
          <a class="link-dark mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
        </div>
        <?php
      } ?>
    </section>
  </div>
</div>
<?php
get_footer();
?>
