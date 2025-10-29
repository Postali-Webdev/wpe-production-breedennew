<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */
    
?>

<section class="process-slider">
    <div class="columns">
        <div id="process-slider">
        <?php if( have_rows('process_slides') ): 
            $count = 0;
            $total = count(get_field('process_slides')); ?>
            
        <?php while( have_rows('process_slides') ): the_row();  $count++; ?>  
            
                <div class="slide">
                    
                    <div class="column-left">
                        <div class="slide-wrapper">
                            <div class="counter">
                                <p><span><?php echo sprintf('%02d', $count); ?></span> / <span><?php echo sprintf('%02d',$total); ?></span></p>
                            </div>
                        </div>
                        <h3><?php the_sub_field('slide_headline'); ?></h3>
                        <?php the_sub_field('slide_content'); ?>
                        <div class="dots"></div>
                    </div>
                    <div class="column-right">
                        <div class="img-box">
                        <?php 
                        $image = get_sub_field('slide_image');
                        if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            
        <?php endwhile; ?>
        <?php endif; ?> 
        </div>
    </div>
</section>