<?php 
    $background_image = get_field('background_image');
    $title = get_field('title');
    $content = get_field('content');
    $cta_link = get_field('cta_link');

    $background_image_2 = get_field('background_image_2');
    $title_2 = get_field('title_2');
    $content_2 = get_field('content_2');
    $cta_link_2 = get_field('cta_link_2');
?>
<div class="two-column-content">
    <div class="tc-left-content">
        <img src="<?php echo $background_image['url']; ?>" alt="">
        <div class="tc-content">
            <?php if($title) : ?>
            <h2 class="sec-ttl color-white"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if($content) : echo $content; endif; ?>
            <?php 
                if($cta_link) : 
                $cta_target = $cta_link['target'] ? $cta_link['target'] : '_self'; 
            ?>
                <a class="btn" href="<?php echo $cta_link['url']; ?>" target="<?php echo $cta_target; ?>"><?php echo $cta_link['title']; ?></a>
            <?php endif; ?> 
        </div>
    </div>
    <div class="tc-right-content">
        <img src="<?php echo $background_image_2['url']; ?>" alt="">
        <div class="tc-content">
            <?php if($title_2) : ?>
            <h2 class="sec-ttl color-white"><?php echo $title_2; ?></h2>
            <?php endif; ?>
            <?php if($content_2) : echo $content_2; endif; ?>
            <?php 
                if($cta_link_2) : 
                $cta_target_2 = $cta_link_2['target'] ? $cta_link_2['target'] : '_self'; 
            ?>
                <a class="btn" href="<?php echo $cta_link_2['url']; ?>" target="<?php echo $cta_target_2; ?>"><?php echo $cta_link_2['title']; ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>