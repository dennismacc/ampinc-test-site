<?php
    $title = get_field('title');
    $content = get_field('content');
    $text_color = get_field('text_color');
    $background_color = get_field('background_color');

    $title_2 = get_field('title_2');
    $content_2 = get_field('content_2');
    $text_color_2 = get_field('text_color_2');
    $background_color_2 = get_field('background_color_2');
?>
<section class="two-column-text-main">
    <div class="two-column-text-block two-column-text-left" style="background-color:<?php echo $background_color; ?>; color:<?php echo $text_color; ?>">
        <?php if($title) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if($content) : echo $content; endif; ?>
    </div>
    <div class="two-column-text-block two-column-text-right" style="background-color:<?php echo $background_color_2; ?>; color:<?php echo $text_color_2; ?>">
        <?php if($title_2) : ?>
            <h2><?php echo $title_2; ?></h2>
        <?php endif; ?>
        <?php if($content_2) : echo $content_2; endif; ?>
    </div>
</section>