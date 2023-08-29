<?php
    $banner_image = get_field('banner_image'); 
    $banner_title = get_field('banner_title');
    $banner_subtitle = get_field('banner_subtitle');
?>
<div class="page-banner-main woo-banner text-center" style="background-image:url(<?php echo $banner_image['url']; ?>);">
    <div class="container">
        <h1 class="page-title">
            <?php if($banner_title) {
                echo $banner_title;
            } else {the_title();}
            ?>
        </h1>
        <?php if($banner_subtitle) {?>
            <h3><?php echo $banner_subtitle; ?></h3>
        <?php } ?>
    </div>
</div>