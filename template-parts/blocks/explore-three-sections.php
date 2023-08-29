<section>
    <div class="explore-below-section d-flex">

        <?php if(have_rows('information_three_sections')): while(have_rows('information_three_sections')): the_row();
        $ethreeimg = get_sub_field('section_image');
        $ethreeheading = get_sub_field('heading');
        $ethreecontent = get_sub_field('content');
        $ethreebtn = get_sub_field('learn_more_button');
         ?>
        <div class="inner-section">
            <?php if($ethreeimg):?>
            <div class="explor-three-img">
                <img src="<?php echo $ethreeimg['url']; ?>" alt=""> 
            </div>
            <?php endif;?>

            <div class="service-content">
            <?php if($ethreeheading):?>
                <h2 class="text-center sec-ttl center-line color-white"><?php echo $ethreeheading; ?></h2>
            <?php endif;?>

            <?php if($ethreecontent):?>
            <div class="three-content">
            <?php echo $ethreecontent; ?>
            </div>
            <?php endif;?>

            <?php if($ethreebtn):?>
            <div class="three-learnmore">
                <a href="<?php echo $ethreebtn['url'];?>" class="btn"><?php echo $ethreebtn['title'];?></a>
            </div>
            <?php endif;?>
        </div>
        </div>
        <?php endwhile; endif; ?>
    </div>
</section>