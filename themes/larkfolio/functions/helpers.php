<?php
function renderPRLink($args = NULL) {
  // $pr_number = explode('/', $args['pr_link'])
  // $pr_number = str_split($args['pr_link'])[-1];
  $parts_pr = explode('/', $args['pr_link']);
  $pr_number = end($parts_pr);
  $external_icon = file_get_contents(get_template_directory() . '/icons/external-link-svgrepo-com.svg')
  // <a class="border text-gray-700 bg-white rounded m-2 p-1 hover:bg-gray-100"
  // target="_blank" href="<?php echo $args['pr_link']; ?><!--">PR --><?php // echo $pr_number; ?><!--</a>--> <?php
  ?>
    <a
      class="btn-link my-1 md:my-0"
      target="_blank"
      href="<?php echo $args['pr_link']; ?>">
      PR <?php echo $pr_number; ?>
      <span
        class="w-4 inline-block">
        <?php echo $external_icon; ?>
      </span>
    </a>
  <?php
}

function renderRepositoryLink($args = NULL) {
  $parts_repo_link = explode('/', $args['repository_link']);
  $repo_name = end($parts_repo_link);
  $external_icon = file_get_contents(get_template_directory() . '/icons/external-link-svgrepo-com.svg')
  ?>
    <a
      class="btn-link my-1 md:my-0"
      target="_blank"
      href="<?php echo $args['repository_link']; ?>">
      <?php echo $repo_name; ?>
      <span
        class="w-4 inline-block">
        <?php echo $external_icon; ?>
      </span>
    </a>
  <?php
}

function renderSkillBadge($args = NULL) {
  $title = $args['title'];
  // $excerpt = $args['excerpt'];
  $link = $args['link'];
  $image = $args['image'];
    // <span class="w-12 h-12"><php echo wp_trim_words($title, 1); ></span>

      // class="link-badge"
  ?>
    <a
      class="rounded-xl
        flex flex-col
        group
        items-center
        w-16 h-19
        mx-1 p-1
        bg-gray-800"
      href="<?php echo $link; ?>">
      <?php if ($image) { ?>
        <img
          class="w-12 h-12"
          src="<?php echo $image['url']; ?>"
          alt="<?php echo $image['alt']; ?>"
        >
      <?php } ?>
      <span
        class="text-sm text-center
          text-amber-300 group-hover:text-amber-500">
        <?php echo $title; ?>
      </span>
    </a>
  <?php
}
?>