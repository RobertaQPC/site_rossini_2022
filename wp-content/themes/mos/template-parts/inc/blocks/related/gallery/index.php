<?php

/**
 * gallery Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'qpc-gallery-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'qpc-gallery';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
 // Block preview
			if( !empty( $block['data']['is_preview'] ) ) { ?>
		    <figure>
		    	<img src="https://placeimg.com/150/150/animals.jpg" alt="">
		    </figure>
		<?php }

    $titoloGalleria = get_field('titolo_galleria');
    $sottotitolo_galleria = get_field('sottotitolo_galleria');
    $bloccoGenericoGallery = get_field('blocco_generico_gallery');
    ?>

    <div class="wrap-row wp-block-group">
        <h2 class="">
           <?= $titoloGalleria ?>
        </h2>
        <span><?= $sottotitolo_galleria ?></span>

    </div>

  <?php  if( $bloccoGenericoGallery ) :
     $i = 0;
    ?>
    <div class="qpc-horizontal-gallery">
        <ul class="qpc-h-gallery displayFlexAiC">
            <?php foreach( $bloccoGenericoGallery as $image ):
              $thumbname = 'thumbs-'.($i%2);
              ?>
                <li>
                    <a href="<?php echo esc_url($image['url']); ?>">
                           <img class="" src="<?php echo esc_url($image['sizes'][ $thumbname]); $i++; ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </a>
                    <p><?php echo esc_html($image['caption']); ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
      </div>
    <?php
  endif; ?>
