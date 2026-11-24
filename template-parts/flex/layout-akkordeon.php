<?php
/**
 * Akkordeon (Bootstrap Accordion)
 * Felder: items (repeater: title, body), first_open (bool)
 */
$items      = get_sub_field('items') ?: [];
$first_open = (bool) get_sub_field('first_open');
if (empty($items)) return;

$acc_id = 'acc-' . wp_unique_id();
$read_aloud_icon = get_template_directory_uri() . '/assets/images/Read_Aloud.svg';
?>
<div class="accordion" id="<?php echo esc_attr($acc_id); ?>">
  <?php foreach ($items as $i => $it): 
    $heading_id = $acc_id . '-h-' . $i;
    $collapse_id = $acc_id . '-c-' . $i;
    $is_open = $first_open && $i === 0;
    $cover_id = (int) ($it['cover_image'] ?? 0);
    $gallery_ids = $it['gallery'] ?? [];
    $gallery_ids = is_array($gallery_ids) ? array_filter(array_map('intval', $gallery_ids)) : [];
  ?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="<?php echo esc_attr($heading_id); ?>">
      <button class="accordion-button <?php echo $is_open ? '' : 'collapsed'; ?>"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#<?php echo esc_attr($collapse_id); ?>"
              aria-expanded="<?php echo $is_open ? 'true' : 'false'; ?>"
              aria-controls="<?php echo esc_attr($collapse_id); ?>">
        <?php echo esc_html($it['title'] ?? sprintf(__('Eintrag %d','projecttheme'), $i+1)); ?>
        <img class="accordion-read-aloud" src="<?php echo esc_url($read_aloud_icon); ?>" alt="" aria-hidden="true">
      </button>
    </h2>
    <div id="<?php echo esc_attr($collapse_id); ?>"
         class="accordion-collapse collapse <?php echo $is_open ? 'show' : ''; ?>"
         aria-labelledby="<?php echo esc_attr($heading_id); ?>"
         data-bs-parent="#<?php echo esc_attr($acc_id); ?>">
      <div class="accordion-body">
        <div class="accordion-article">
          <div class="accordion-article-main <?php echo $cover_id ? 'has-cover' : ''; ?>">
            <div class="accordion-article-copy">
              <div class="rte"><?php echo wp_kses_post($it['body'] ?? ''); ?></div>
            </div>
            <?php if ($cover_id): ?>
              <?php $cover_caption = wp_get_attachment_caption($cover_id); ?>
              <figure class="accordion-cover">
                <?php echo wp_get_attachment_image($cover_id, 'large', false, ['class' => 'accordion-article-image', 'loading' => 'lazy', 'decoding' => 'async']); ?>
                <?php if ($cover_caption): ?>
                  <figcaption><?php echo esc_html($cover_caption); ?></figcaption>
                <?php endif; ?>
              </figure>
            <?php endif; ?>
          </div>
          <?php if ($gallery_ids): ?>
            <div class="accordion-gallery" role="group" aria-label="<?php esc_attr_e('Artikelbilder', 'projecttheme'); ?>">
              <?php foreach ($gallery_ids as $gallery_id): ?>
                <?php $gallery_caption = wp_get_attachment_caption($gallery_id); ?>
                <figure class="accordion-gallery-item">
                  <?php echo wp_get_attachment_image($gallery_id, 'medium_large', false, ['class' => 'accordion-article-image', 'loading' => 'lazy', 'decoding' => 'async']); ?>
                  <?php if ($gallery_caption): ?>
                    <figcaption><?php echo esc_html($gallery_caption); ?></figcaption>
                  <?php endif; ?>
                </figure>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>