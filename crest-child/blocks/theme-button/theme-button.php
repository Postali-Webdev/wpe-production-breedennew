<?php
$link = get_field('theme_button_link');
$alignment = get_field('alignment');
?>

<a target="<?php echo $link['target']; ?>" class="btn btn-<?php echo $alignment; ?>" href="<?php echo $link['url']; ?>" title="<?php echo $link['title']; ?>" class="btn"><?php echo $link['title']; ?></a>