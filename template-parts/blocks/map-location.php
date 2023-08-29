<section class="google-map">
<?php 
$map = get_field('map');
if( $map ): ?>
    <div>
        <?php echo $map; ?>
    </div>
<?php endif; ?>
</section>