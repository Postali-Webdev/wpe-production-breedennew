<?php
/**
 * Template Name: Interior - No Banner
 * @package Postali Crest Controller Theme
 * @author Postali LLC
 */

get_header();

$block_content = do_blocks( '
<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
<!-- wp:post-content /-->
</div>
<!-- /wp:group -->'
);
?>


<div class="columns no-banner">
    <div class="column-full block">
        <?php echo $block_content; ?>
    </div>
</div>

<?php get_footer(); ?>