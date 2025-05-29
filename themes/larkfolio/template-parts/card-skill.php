<div class="card">
  <a class="inline-link" href="<?php the_permalink(); ?>">
    <header class="flex items-center">
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
      <h3 class="ml-3"><?php the_title(); ?></h3>
    </header>
  </a>
  <p class="my-2">
    <?php echo get_the_excerpt(); ?>
  </p>
  <div class="flex items-center">

    <a class="btn-link mt-2 inline-block" href="<?php the_permalink(); ?>">Read more</a>
    <div class="flex-grow"></div>
    <?php $skillId = get_the_ID(); ?>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>PRs</th>
          <th>Experience</th>
          <th>Projects</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Count</td>
          <td><?php echo $args['prsBySkill'][$skillId] ?? 0; ?></td>
          <td><?php echo $args['experiencesBySkill'][$skillId] ?? 0; ?></td>
          <td><?php echo $args['projectsBySkill'][$skillId] ?? 0; ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
