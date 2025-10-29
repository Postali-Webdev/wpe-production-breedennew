<?php

if( have_rows('columns') ) : $count = 0;?>
    <div class="numbered-columns">
        <?php while( have_rows('columns') ) : the_row();
            $count++;
            $title = get_sub_field('title');
            $copy = get_sub_field('copy');
        ?>
        <div class="numbered-column">
            <div class="content">
                <p class="number"><?php echo $count; ?></p>
                <h3><?php echo $title; ?></h3>
                <?php echo $copy; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>