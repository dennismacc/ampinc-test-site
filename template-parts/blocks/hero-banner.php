<?php
    $hero_banner = get_field('hero_banner');

    $hero_slide = get_field('hero_slide');
    
    $hero_image = get_field('hero_image');
    $primary_title = get_field('primary_title');
    $secondary_title = get_field('secondary_title');
    $cta_link = get_field('cta_link');
    if($hero_slide) :
?>
<section class="hero-banner-slider">
    <?php foreach($hero_slide as $slide): ?>
    <div class="hero-banner-slider" style="background-image: url(<?php echo $slide['hero_image']['url']; ?>)">
        <div class="container text-center">
            <h1>
                <?php echo $slide['primary_title']; ?>
            </h1>
            <h2>
                <?php echo $slide['secondary_title']; ?>
            </h2>
            <?php
                $cta_link = $slide['cta_link'];
                if($cta_link) :
            ?>
            <a class="btn" href="<?php echo $cta_link['url']; ?>"><?php echo $cta_link['title']; ?></a>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>
</section>
<?php endif; ?>

