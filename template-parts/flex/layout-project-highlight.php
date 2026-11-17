<?php
/**
 * Bild links – Text rechts
 * Felder: image (ID), headline (text), text (wysiwyg)
 * name "col-md-2" is actually a sizing rule of a grid, change to something smaller for less spacing 
 */
$summary   = get_sub_field('summary');
$img_id   = get_sub_field('image');
$title = get_sub_field('title');
$text     = get_sub_field('text');

?>
<div class="row align-items-center g-5">
  <div class="col-md-6"> 
    <?php
    if ($img_id) {
      echo wp_get_attachment_image($img_id, 'large', false, [
        'class'    => 'img-fluid rounded',
        'loading'  => 'lazy',
        'decoding' => 'async',
      ]);
    }
    ?>
  </div>
  <div class="col-md-5">
    <?php if ($summary): ?><h7 class="lead"><?php echo esc_html($summary); ?></h7><?php endif; ?>
    <?php if ($title): ?><h4 class="mb-3"><?php echo esc_html($title); ?></h4><?php endif; ?>
      <?php if ($text): ?><p class="rte"><?php echo wp_kses_post($text); ?></p><?php endif; ?>
  </div>
</div>
