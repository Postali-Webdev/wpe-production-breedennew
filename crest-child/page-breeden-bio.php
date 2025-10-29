<?php
/**
 * Template Name: Breeden Bio Page
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

<div id="breadcrumb-banner">
    <div class="columns">
        <div class="column-50 block content-block">
            <div class="container">
                <?php 
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>' );
                    }
                ?>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="columns">
    <div class="column-full block">
        <?php echo $block_content; ?>
    </div>
</div>





<?php get_footer(); ?>