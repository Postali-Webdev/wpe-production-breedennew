<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $attorneys_bio_pre_headline = get_field('attorneys_bio_pre_headline');
    $attorneys_bio_headline = get_field('attorneys_bio_headline');
    $attorneys_bio_copy_block = get_field('attorneys_bio_copy_block');
    $attorneys_block_type = get_field('attorneys_block_type');
?>

<?php if($attorneys_block_type == 'bio') { ?>

<section class="attorney-block" id="attorneys-bio">
    <div class="columns">
        <div class="column-75 centered center block">
            <p class="pre-headline"><?php echo $attorneys_bio_pre_headline; ?></p>
            <h2><?php echo $attorneys_bio_headline; ?></h2>
            <div class="spacer-15"></div>
            <?php echo $attorneys_bio_copy_block; ?>
        </div>
        <div class="spacer-30"></div>

        <?php if( have_rows('attorneys_bio_attorneys') ): ?>
        <?php while( have_rows('attorneys_bio_attorneys') ): the_row(); ?>
            <?php 
                global $post;
                $post_object = get_sub_field('attorney'); 

                if( $post_object ): ?>
                <?php // override $post
                $post = $post_object;
                setup_postdata( $post );
                ?>
                <div class="column-33 block">
                    <div class="attorney-img">
                        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                        <img src="<?php echo $image[0]; ?>" alt="" />
                    </div>
                    <div class="attorney-details">
                        <h4><?php the_title(); ?></h4>
                        <p class="title"><?php the_field('position', $post->ID); ?></p>
                        <?php 
                        $content = get_the_content(); ?>
                        <p><?php echo wp_trim_words( $content , '25' ); ?></p>
                    </div>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="btn">Secondary Button <span class="icon-crest-arrow-right"></span></a>
                </div>
                
                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <?php endif; ?>

    </div>
    
</section>

<?php } ?>

<?php if($attorneys_block_type == 'nobio') { ?>

<section class="attorney-block" id="attorneys-nobio">
    <div class="columns">
        <div class="column-75 centered center block">
            <p class="pre-headline"><?php echo $attorneys_bio_pre_headline; ?></p>
            <h2><?php echo $attorneys_bio_headline; ?></h2>
            <div class="spacer-15"></div>
            <?php echo $attorneys_bio_copy_block; ?>
        </div>
        <div class="spacer-30"></div>

        <?php if( have_rows('attorneys_bio_attorneys') ): ?>
            <div class="attorney-wrapper">
            <?php while( have_rows('attorneys_bio_attorneys') ): the_row(); ?>
                <?php 
                    global $post;
                    $post_object = get_sub_field('attorney'); 

                    if( $post_object ): ?>
                    <?php // override $post
                    $post = $post_object;
                    setup_postdata( $post );
                    ?>
                    <a class="attorney" href="<?php the_permalink(); ?>">
                        <div class="attorney-img">
                            <div class="arrow"></div>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                            <img src="<?php echo $image[0]; ?>" alt="" />
                        </div>
                        <div class="attorney-content">
                            <h4><?php the_field('first_name', $post->ID);?> <?php the_field('last_name', $post->ID); ?></h4>
                            <p><?php the_field('position', $post->ID); ?></p>
                            <p class="see-bio"><span class="arrow-icon"></span><?php the_field('first_name', $post->ID); ?>'s Bio</p>
                        </div>
                    </a>
                    
                    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                <?php endif; ?>
            <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php } ?>