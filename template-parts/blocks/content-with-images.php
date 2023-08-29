<?php
$title = get_field('title');
$description = get_field('description');
$half_image_1 = get_field('half_image_1');
$half_image_2 = get_field('half_image_2');
$full_image = get_field('full_image');
$switch_column = get_field('switch_column');
$background_image = get_field('background_image');
$only_one_image = get_field('only_one_image');
$extra_class = get_field('extra_class') ? get_field('extra_class') : '';
?>
<section class="content-with-images <?php echo $extra_class; ?>" style="background-image: url(<?php echo $background_image; ?>);">
    <div class="container">
        <div class="row <?php if ($switch_column) { ?>column-reverse<?php } ?>">
            <div class="content-column">
                <?php if ($title) { ?>
                    <h2><?php echo $title; ?></h2>
                <?php } ?>
                <?php if ($description) { ?>
                    <?php echo $description; ?>
                <?php } ?>
            </div>
            <div class="image-column"> 
                <?php if( !empty( $half_image_1 ) ) { 
                    $half_image_1_srcset = wp_get_attachment_image_srcset($half_image_1['ID'], 'full');
                    ?>
                    <div class="half-image">
                        <img src="<?php echo esc_url($half_image_1['url']); ?>" srcset="<?php echo esc_attr( $half_image_1_srcset ); ?>"  alt="<?php echo esc_attr($half_image_1['alt']); ?>"/>
                    </div>
                <?php } ?>
                <?php if( !empty( $half_image_2 ) ) {
                    $half_image_2_srcset = wp_get_attachment_image_srcset($half_image_2['ID'], 'full'); ?>
                    <div class="half-image">
                        <img src="<?php echo esc_url($half_image_2['url']); ?>" srcset="<?php echo esc_attr( $half_image_2_srcset ); ?>"  alt="<?php echo esc_attr($half_image_2['alt']); ?>" />
                    </div>
                <?php } ?>
                <?php if( !empty( $full_image ) ) {
                    $full_image_srcset = wp_get_attachment_image_srcset($full_image['ID'], 'full'); ?>
                    <div class="full-image">
                        <img src="<?php echo esc_url($full_image['url']); ?>" srcset="<?php echo esc_attr( $full_image_srcset ); ?>" alt="<?php echo esc_attr($full_image['alt']); ?>" />
                    </div>
                <?php } ?>
                <?php if( !empty( $only_one_image ) ) {
                    $only_one_image_srcset = wp_get_attachment_image_srcset($only_one_image['ID'], 'full'); ?>
                    <div class="only-image">
                        <img src="<?php echo esc_url($only_one_image['url']); ?>" srcset="<?php echo esc_attr( $only_one_image_srcset ); ?>" alt="<?php echo esc_attr($only_one_image['alt']); ?>" />
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>