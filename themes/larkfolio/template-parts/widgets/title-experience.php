<?php

$start_date = DateTime::createFromFormat('d/m/Y', $args['start_date']);
if ($args['end_date']) {
  $end_date = DateTime::createFromFormat('d/m/Y', $args['end_date']);
  $time_spent = date_diff($start_date, $end_date)->format('%y years %m months %d days');
} else {
  $time_spent = date_diff($start_date, new DateTime('now'))->format('%y years %m months %d days');
}

?>
<div class="flex flex-col">
  <h2>
    <?php echo $args['title']; ?>
  </h2>
  <div class="flex flex-row items-stretch">
    <div class="flex flex-col w-1/2">
      <h3 class="p-2 m-2 border-2 rounded-lg border-amber-500/40">
        ROLE: <?php echo $args['job_title']; ?>
      </h3>
      <div class="p-2 m-2 border-2 rounded-lg border-amber-500/40">
        <p>
          <span class="font-bold">Start date: </span><?php echo $args['start_date']; ?>
        </p>
        <?php if ($args['end_date']): ?>
          <p>
            <span class="font-bold">End date: </span><?php echo $args['end_date']; ?>
          </p>
        <?php endif; ?>
        <p>
          <span class="font-bold">Time spent: </span><?php echo $time_spent; ?>
        </p>
      </div>
      <div class="p-2 m-2 border-2 rounded-lg border-amber-500/40">
        <p>
          <span class="font-bold">Location: </span><?php echo $args['location']; ?>
          <?php if($args['remote']): ?>
            <span class="font-bold text-emerald-600"> (REMOTE)</span>
          <?php endif; ?>
        </p>
      </div>
    </div>
    <div class="w-1/2 p-2 m-2 border-2 rounded-lg border-amber-500/40">
      <?php get_template_part('template-parts/skills-widget', NULL, array(
        'related_skills' => $args['related_skills']
      )); ?>
    </div>
  </div>
</div>