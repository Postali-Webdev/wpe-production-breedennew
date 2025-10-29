<?php 

/**
 * Banner Block template.
 *
 * @param array $block The block settings and attributes.
 */

    $section_headline = get_field('accordions_section_headline');
    $accordion_block_layout = get_field('accordion_block_layout');
    $accordion_columns = get_field('accordion_columns');
?>

<?php if ($accordion_block_layout == 'vertical') { ?>

<section class="accordions-block">
    <div class="columns">
        <div class="column-full center">
            <h2><?php echo $section_headline; ?></h2>
            <div class="spacer-30"></div>
            <?php if( have_rows('accordions') ): ?>
                <div class="accordion-wrapper accordion-<?php echo $accordion_columns; ?>">
                    <?php while( have_rows('accordions') ): the_row(); ?>  
                    <div class="accordion">
                        <div class="accordion_title">
                            <p class="accordion-title"><?php the_sub_field('accordion_title'); ?></p>
                            <span class="arrow-icon"></span>
                        </div>
                        <div class="accordion_content">
                            <?php the_sub_field('accordion_content'); ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?> 
        </div>
    </div>
</section>

<script>
    // script to make accordions function
	jQuery(".accordion").on("click", ".accordion_title", function() {
        // will (slide) toggle the related panel.
        jQuery(this).toggleClass("active").next().slideToggle();
        jQuery(this).parent().toggleClass("active");
    });
</script>

<?php } ?>

<?php if ($accordion_block_layout == 'horizontal') { ?>

<section class="accordions-block" id="accordions-horizontal">
    <div class="columns pa-desktop">
        <h2><?php echo $section_headline; ?></h2>
        <div class="spacer-30"></div>

        <div class="column-50 left">
            <ul class="acc_horiz">
                <?php $n = 1; ?>
                <?php if( have_rows('accordions') ): ?>
                <?php while( have_rows('accordions') ): the_row(); ?>  
                    <li rel="acc_horiz<?php echo $n; ?>" <?php if ($n == 1) { ?> class="active"<?php } ?>><h3><?php the_sub_field('accordion_title'); ?></h3></li>
                    <?php $n++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
            </ul>
        </div>
        <div class="column-50 right">
            <div class="acc_horiz_container">
                <?php $i = 1; ?>
                <?php if( have_rows('accordions') ): ?>
                <?php while( have_rows('accordions') ): the_row(); ?>
                    <div id="acc_horiz<?php echo $i; ?>" class="acc_horiz_content acc_horiz<?php echo $i; ?>">
                        <h3><?php the_sub_field('accordion_title'); ?></h3>
                        <?php the_sub_field('accordion_content'); ?>
                        <?php if(get_sub_field('add_button')) { ?>
                        <a href="<?php the_sub_field('button_link'); ?>" class="btn"><?php the_sub_field('button_text'); ?> <span class="icon-crest-arrow-right"></span></a>
                        <?php } ?>
                    </div>
                    <?php $i++; ?>
                <?php endwhile; ?>
                <?php endif; ?> 
            </div>
        </div>
    </div>

    <div class="columns pa-mobile">
        <?php if( have_rows('accordions') ): ?>
        <?php while( have_rows('accordions') ): the_row(); ?>  
        <div class="accordion-mobile">
            <div class="accordion_title">
                <h3><?php the_sub_field('accordion_title'); ?></h3><span></span>
            </div>
            <div class="accordion_content">
                <?php the_sub_field('accordion_content'); ?>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?> 
    </div>
</section>

<script>
    // script to make accordions function
	jQuery(".accordion-mobile").on("click", ".accordion_title", function() {
        // will (slide) toggle the related panel.
        jQuery(this).toggleClass("active").next().slideToggle();
        jQuery(this).parent().toggleClass("active");
    });
</script>

<script>
    jQuery(".acc_horiz_content").hide();
    jQuery(".acc_horiz1").show();

    /* if in tab mode */
    jQuery("ul.acc_horiz li").click(function() {
        jQuery(".acc_horiz_content").hide();
        var activeTab = jQuery(this).attr("rel"); 
        jQuery("."+activeTab).fadeIn();		
            
        jQuery("ul.acc_horiz li").removeClass("active");
        jQuery(this).addClass("active");
    });

</script>

<?php } ?>