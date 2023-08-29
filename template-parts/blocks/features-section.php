<?php 
    $title = get_field('title');
    $features = get_field('features');
    $additional_class = get_field('additional_class');
    $additional_class = $additional_class ? $additional_class : '';

    if($features) :
?>
<section class="amp-features-section <?php echo $additional_class; ?>">
    <div class="container">
        <?php if($title) : ?>
        <h2 class="text-center"><?php echo $title; ?></h2>
        <?php endif; ?>
        <div class="amp-feature-main">
            <?php foreach($features as $row) : ?>
                <div class="feature-block">
                    <div class="af-icon">
                        <img src="<?php echo $row['image']['url']; ?>" alt="" />
                    </div>
                    <h5><?php echo $row['title']; ?></h5>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>