<?php 
    $content = get_field('content');

    if(get_field('background_image')) {
        $background = get_field('background_image')['url'];
        $background = 'background-image:url('.$background.')';
    } elseif(get_field('background_color')){
        $background = get_field('background_color');
        $background = 'background-color:'.$background;
    } else {
        $background = '';
    }

    $text_color = get_field('text_color');
    $text_color = $text_color ? $text_color : '';
  
    $additional_class = get_field('additional_class');
    $additional_class = $additional_class ? $additional_class : '';

    if($content) : 
?>
<section class="boxed-width-content <?php echo $additional_class; ?>" style="<?php echo $background; ?>">
    <div class="container" style="color: <?php echo $text_color; ?>">
        <div><?php echo $content; ?></div>
        <div class="clear"></div>
    </div>
</section>
<?php endif; ?>