<?php
$page_title = get_field('page_title');
$description = get_field('description');
$banner_image = get_field('banner_image');
$remove_bottom_margin = get_field('remove_bottom_margin') ? 'mb-0' : '';

?>
<section class="normal-text-banner <?php echo $remove_bottom_margin; ?>" style="background-image: url(<?php echo $banner_image; ?>);">
    <div class="container">
        <h2><?php echo $page_title; ?></h2>
        <?php echo $description; ?>
    </div>
</section>