<?php
$title = get_field('title');
$description = get_field('description');
$form_shortcode = get_field('form_shortcode');
$background_image = get_field('background_image');
?>
<section class="form-with-background" style="background-image: url(<?php echo $background_image; ?>);">
    <div class="container">
        <h2><?php echo $title; ?></h2>
        <?php echo $description; ?>
        <div class="contact-us-form">
            <?php echo $form_shortcode; ?> 
        </div>
    </div>
</section>