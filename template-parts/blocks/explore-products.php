<?php 
    $section_title = get_field('section_title');
    
    $background_image = get_field('background_image');
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $cta_link = get_field('cta_link');


    $background_image_2 = get_field('background_image_2');
    $title_2 = get_field('title_2');
    $subtitle_2 = get_field('subtitle_2');
    $cta_link_2 = get_field('cta_link_2');

    $background_image_3 = get_field('background_image_3');
    $title_3 = get_field('title_3');
    $subtitle_3 = get_field('subtitle_3');
    $cta_link_3 = get_field('cta_link_3');
?>
<section class="amp-explore-products">
    <?php if($section_title) : ?>
    <h2 class="sec-ttl white-color center-line"><div class="container text-center"><?php echo $section_title; ?></div></h2>
    <?php endif; ?>

    <div class="amp-explore-row">
        <div class="amp-explore-block">
            <img src="<?php echo $background_image['url']; ?>" alt="" />
            <div class="amp-explore-content">
                <?php if($title): ?>
                    <h3><?php echo $title; ?></h3>
                <?php endif; ?>
                <?php if($subtitle) : ?>
                <div class="explore-subttl">
                    <?php echo $subtitle; ?>
                </div>
                <?php endif; ?>
                <?php if($cta_link) : ?>
                <a class="btn" href="<?php echo $cta_link['url']; ?>"><?php echo $cta_link['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="amp-explore-block">
        <img src="<?php echo $background_image_2['url']; ?>" alt="" />
            <div class="amp-explore-content">
                <?php if($title_2): ?>
                    <h3><?php echo $title_2; ?></h3>
                <?php endif; ?>
                <?php if($subtitle_2) : ?>
                <div class="explore-subttl">
                    <?php echo $subtitle_2; ?>
                </div>
                <?php endif; ?>
                <?php if($cta_link_2) : ?>
                <a class="btn" href="<?php echo $cta_link_2['url']; ?>"><?php echo $cta_link_2['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>

        <?php 
            $show = get_field('full_width_content');
            if($show == 1):
        ?>
        <div class="amp-explore-block full-block">
            <img src="<?php echo $background_image_3['url']; ?>" alt="" />
            <div class="amp-explore-content">
                <?php if($title_3): ?>
                    <h3><?php echo $title_3; ?></h3>
                <?php endif; ?>
                <?php if($subtitle_3) : ?>
                <div class="explore-subttl">
                    <?php echo $subtitle_3; ?>
                </div>
                <?php endif; ?>
                <?php if($cta_link_3) : ?>
                <a class="btn" href="<?php echo $cta_link_3['url']; ?>"><?php echo $cta_link_3['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>

</section>