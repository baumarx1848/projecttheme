<?php
/**
 * Bild links – Text rechts
 * Felder: image (ID), headline (text), text (wysiwyg)
 */
$img_id   = get_sub_field('image');
$summary   = get_sub_field('summary');
?>
<div class="row align-items-center g-2">
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
  </div>
</div>
