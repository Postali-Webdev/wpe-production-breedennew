<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $related_block_headline = get_field('related_block_headline');

?>

<div class="related-resources">
    <div class="columns">
        <div class="column-full block">
            <p class="subtitle"><?php echo $related_block_headline; ?></p>
            <?php if( have_rows('resources') ): ?>
            <?php $count = count(get_field('resources')); ?>   
            <div class="resources boxes-<?php echo $count; ?>">
            <?php while( have_rows('resources') ): the_row(); ?>  


            <?php $post_object = get_sub_field('resource'); ?>
            <?php if( $post_object ): ?>
                <?php // override $post
                $post = $post_object;
                setup_postdata( $post );
                ?>

                <div class="resource">
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <?php endif; ?>
                    <div class="resource-copy">
                        <p class="resource-title"><?php echo get_the_title($post->ID); ?></p>
                    </div>
                    <span class="arrow-icon"></span>
                    <a class="resource-link" title="<?php echo get_the_title($post->ID); ?>" href="<?php the_permalink($post->ID); ?>"></a>
                </div>

                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
            <?php endwhile; ?>
            </div>
            <?php endif; ?> 

            <?php if(get_field('resources_button_text')) { ?>
            <div class="spacer-60"></div>
            <a href="<?php the_field('resources_button_link'); ?>" class="btn"><?php the_field('resources_button_text'); ?></a>
            <?php } ?>
        </div>
    </div>
</div>
