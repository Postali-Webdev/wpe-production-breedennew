<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

?>

<div class="awards-block">
    <div class="columns">
        <?php if( get_field('awards_block_headline') ) : ?>
            <p><?php the_field('awards_block_headline'); ?></p>
        <?php endif; ?>

        <div id="awards" class="slide">
            <?php $n=1 ?>
            <?php if( have_rows('awards','options') ): ?>
            <?php while( have_rows('awards','options') ): the_row(); ?>  
                <div class="award" id="award_<?php echo $n; ?>">
                <?php 
                $image = get_sub_field('award_image');
                $link = get_sub_field('award_link');
                if( !empty( $image ) ): ?>
                    <?php if( $link ) : ?>
                        <a target="_blank" href="<?php echo $link; ?>">
                    <?php endif; ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php if( $link ) : ?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
                <?php $n++; ?>
            <?php endwhile; ?>
            <?php endif; ?> 
        </div>
    </div>
</div>