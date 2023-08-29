<?php
    $title = get_field('title');
    $content = get_field('content');
    $cta_link = get_field('cta_link');   
    $extra_class_for_css = get_field('extra_class_for_css');   
?>
<section class="full-width-content-main <?php echo $extra_class_for_css; ?>">
    <div class="container text-center">
        <?php if($title) : ?>
        <h2 class="sec-ttl white-color center-line"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if($content) : echo  $content; endif; ?>
        <?php 
            if($cta_link) : 
        ?>
        <a class="btn" href="<?php echo $cta_link['url']; ?>"><?php echo $cta_link['title']; ?></a>
        <?php endif; ?>
    </div>
</section>