<?php
    $title = get_field('title');
    $content = get_field('content');
?>
<section class="">
    <div class="container">
        <?php if($title) : ?>
        <h2 class="sec-ttl white-color center-line"><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if($content) : echo  $content; endif; ?>
    </div>
</section>