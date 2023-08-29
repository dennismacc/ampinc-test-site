<?php
$switch_column = get_field('switch_column');
$addtional_class = get_field('addtional_class');
?>
<section class="two-column-details <?php if ($switch_column) { ?> two-column-reverse <?php } ?> <?php echo $addtional_class; ?>">
    <div class="container">
        <div class="row">
            <div class="left-column">
                <?php if( have_rows('details') ) { 
                    while( have_rows('details') ) { the_row();
                        $image = get_sub_field('image');
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                    ?>

                        <div class="details">
                                <?php if( !empty( $image ) ) { 
                                    $imagesrcset = wp_get_attachment_image_srcset($image['ID'], 'full');?>
                            <div class="detail-image">
                                    <img src="<?php echo esc_url($image['url']); ?>" srcset="<?php echo esc_attr( $imagesrcset ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                                <?php } ?>
                            <div class="detail-title-description">
                                <?php if ($title) { ?>
                                    <h4><?php echo $title; ?></h4>
                                <?php } ?>
                                <?php if ($description) { ?>
                                    <?php echo $description; ?>
                                <?php } ?>
                            </div>
                        </div>



                    <?php } ?>
                <?php } ?>
                <?php 
                $cta_link_2 = get_field('cta_link_2');
                if( $cta_link_2 ): 
                    $cta_link_2_url = $cta_link_2['url'];
                    $cta_link_2_title = $cta_link_2['title'];
                    $cta_link_2_target = $cta_link_2['target'] ? $cta_link_2['target'] : '_self';
                    ?>
                    <a class="btn" href="<?php echo esc_url( $cta_link_2_url ); ?>" target="<?php echo esc_attr( $cta_link_2_target ); ?>"><?php echo esc_html( $cta_link_2_title ); ?></a>
                <?php endif; ?>
            </div>
            <div class="right-column">
                <?php if( have_rows('details_2') ) { 
                    while( have_rows('details_2') ) { the_row();
                        $image_ = get_sub_field('image_');
                        $title_ = get_sub_field('title_');
                        $description_ = get_sub_field('description_');
                    ?>


                        <div class="details">
                                <?php if( !empty( $image_ ) ) { 
                                   $image_srcset = wp_get_attachment_image_srcset($image_['ID'], 'full'); ?>
                            <div class="detail-image">
                                <img src="<?php echo esc_url($image_['url']); ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" alt="<?php echo esc_attr($image_['alt']); ?>" />
                            </div>
                            <?php } ?>
                            <div class="detail-title-description">
                                <?php if ($title_) { ?>
                                    <h4><?php echo $title_; ?></h4>
                                <?php } ?>
                                <?php if ($description_) { ?>
                                    <?php echo $description_; ?>
                                <?php } ?>
                            </div>
                        </div>


                    <?php } ?>
                <?php } ?>
                <?php 
                $cta_link = get_field('cta_link');
                if( $cta_link ): 
                    $cta_link_url = $cta_link['url'];
                    $cta_link_title = $cta_link['title'];
                    $cta_link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
                    ?>
                    <a class="btn" href="<?php echo esc_url( $cta_link_url ); ?>" target="<?php echo esc_attr( $cta_link_target ); ?>"><?php echo esc_html( $cta_link_title ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>