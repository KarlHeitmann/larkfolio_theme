<?php

$start_date = DateTime::createFromFormat('d/m/Y', $args['start_date']);
if ($args['end_date']) {
  $end_date = DateTime::createFromFormat('d/m/Y', $args['end_date']);
  $time_spent = date_diff($start_date, $end_date)->format('%y years %m months %d days');
} else {
  $time_spent = date_diff($start_date, new DateTime('now'))->format('%y years %m months %d days');
}

?>
<div class="flex flex-row items-center">
  <div class="flex-grow">
    <h2><?php $args['title']; ?></h2>
    <h3 class="mx-2"><?php echo $args['job_title']; ?></h3>
    <p class="mx-2 mt-2">
      <?php echo $args['start_date']; ?> - <?php echo $args['end_date']; ?>
      <span class="font-bold mx-2">Time spent:</span><?php echo $time_spent; ?></p>
    <p class="mt-2">
      <span class="font-bold mx-2">Location:</span><?php echo $args['location']; ?>
      <?php if($args['remote']): ?>
        <span class="font-bold text-emerald-600">(REMOTE)</span>
      <?php endif; ?>
    </p>
  </div>
  <?php get_template_part('template-parts/skills-widget', NULL, array(
    'related_skills' => $args['related_skills']
  )); ?>
</div>