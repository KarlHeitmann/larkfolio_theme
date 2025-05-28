<?php
/*
$relatedProjects = new WP_Query(array(
  'post_type' => 'project',
  'posts_per_page' => -1,
  'meta_query' => array(
    array(
      'key' => 'related_skills',
      'compare' => 'LIKE',
      'value' => '"' . $args['skill_id'] . '"'
    )
  )
));
$relatedExperiences = new WP_Query(array(
  'post_type' => 'experience',
  'posts_per_page' => -1,
  'meta_query' => array(
    array(
      'key' => 'related_skills',
      'compare' => 'LIKE',
      'value' => '"' . $args['skill_id'] . '"'
    )
  )
));
$relatedPRs = new WP_Query(array(
  'post_type' => 'pr',
  'posts_per_page' => -1,
  'meta_query' => array(
    array(
      'key' => 'related_skills',
      'compare' => 'LIKE',
      'value' => '"' . $args['skill_id'] . '"'
    )
  )
));
*/
?>
<!--
<p>
  Projects: <?php echo $relatedProjects->post_count; ?>
</p>
<p>
  Experience: <?php echo $relatedExperiences->post_count; ?>
</p>
<p>
  PRs: <?php echo $relatedPRs->post_count; ?>
</p>
-->
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
      <td><?php echo $prsBySkill[$args['skill_id']]; ?></td>
      <td><?php echo $experiencesBySkill[$args['skill_id']]; ?></td>
      <td><?php echo $projectsBySkill[$args['skill_id']]; ?></td>
    </tr>
  </tbody>
</table>