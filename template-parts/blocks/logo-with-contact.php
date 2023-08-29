<section class="logo-with-contact">
    <div class="container">
        <div class="contacts-flex">
            
                <?php if( have_rows('contacts') ) { ?>
                    <?php while( have_rows('contacts') ) { the_row(); 
                     $add_text = get_sub_field('add_text');
                      $add_link = get_sub_field('add_link');
                      $add_image =  get_sub_field('add_image');
                      $add_imagesrcset = wp_get_attachment_image_srcset($add_image['ID'], 'full');
                    ?>
                        <div class="contacts">
                            <?php if ($add_link || $add_image) { ?>
                                <div class="contact-link">
                                <?php 
                                if( $add_link ): 
                                    $add_link_url = $add_link['url'];
                                    $add_link_title = $add_link['title'];
                                    $add_link_target = $add_link['target'] ? $add_link['target'] : '_self';
                                    ?>
                                    <a class="button" href="<?php echo esc_url( $add_link_url ); ?>" target="<?php echo esc_attr( $add_link_target ); ?>">
                                    <img src="<?php echo $add_image['url']; ?>" srcset="<?php echo esc_attr( $add_imagesrcset ); ?>" alt="<?php echo esc_attr($add_image['alt']); ?>" usemap="#image-map"/>
                                </a>
                                <?php endif; ?>
                                </div>
                            <?php } ?>  
                            <?php if ($add_text) { ?>
                                <div class="contact-text">
                                    <?php echo $add_text; ?>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                <?php } ?>
         
        </div>
    </div>
</section>