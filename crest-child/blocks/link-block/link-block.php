<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $links_block_layout = get_field('links_block_layout');
    $links_block_headline = get_field('links_block_headline');
    $links_block_subheadline = get_field('links_block_subheadline');
?>

<?php if ($links_block_layout == 'slim') { ?>

<div class="link-block" id="links-slim">
    <div class="columns">
        <div class="column-full block">
            <p class="subtitle"><?php echo $links_block_headline; ?></p>
            <?php if( have_rows('links_slim') ): ?>
            <ul class="links">
            <?php while( have_rows('links_slim') ): the_row(); ?>  
            
                <?php if (get_sub_field('link_type') == 'internal') { ?>
                <li><a href="<?php the_sub_field('link_internal'); ?>"><?php the_sub_field('link_text'); ?></a></li>
                <?php } elseif (get_sub_field('link_type') == 'external') { ?>
                <li><a href="<?php the_sub_field('link_external'); ?>" target="blank"><?php the_sub_field('link_text'); ?></a></li>
                <?php } ?>
                
            <?php endwhile; ?>
            </ul>
            <?php endif; ?> 
        </div>
    </div>
</div>

<?php } ?>

<?php if ($links_block_layout == 'full') { ?>

<div class="link-block" id="links-full">
    <div class="columns">
        <div class="column-full block">
            <p class="subtitle"><?php echo $links_block_headline; ?></p>
            <p class="subhead"><?php echo $links_block_subheadline; ?></p>
            <?php if( have_rows('links_full') ): ?>

                <?php $count = count(get_field('links_full')); ?>   
            <div class="links boxes-<?php echo $count; ?>">
            <?php while( have_rows('links_full') ): the_row(); ?>  
                <div class="link-box">
                <?php 
                $image = get_sub_field('link_image');
                if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
                    <div class="spacer-30"></div>
                    <h3><?php the_sub_field('link_headline'); ?></h3>
                    <p><?php the_sub_field('link_copy'); ?></p>

                    <?php if (get_sub_field('link_type') == 'external') { ?>
                    <a class="link-button" href="<?php the_sub_field('link_external'); ?>"  target="blank">
                    <?php } elseif (get_sub_field('link_type') == 'internal') { ?>
                    <a class="link-button" href="<?php the_sub_field('link_internal'); ?>" >
                    <?php } ?>
                        <span class="text"><?php the_sub_field('link_button_text'); ?></span> <span class="icon-crest-arrow-right"></span>
                    </a>
                </div>
                
            <?php endwhile; ?>
            </div>
            <?php endif; ?> 

            <?php if(get_field('links_cta_button_text')) { ?>
            <div class="spacer-60"></div>
            <a href="<?php the_field('links_cta_button_link'); ?>" class="btn"><?php the_field('links_cta_button_text'); ?></a>
            <?php } ?>
        </div>
    </div>
</section>

<?php } ?>