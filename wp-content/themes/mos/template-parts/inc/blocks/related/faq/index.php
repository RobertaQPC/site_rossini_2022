<?php

/**
 * Related items.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'camere-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'camere';
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

    $titolo = get_field('titolo');
    $sottotitolo = get_field('sottotitolo');
    ?>

<div class="wrap-block-camere">

    <?php
       if( $titolo ): ?>
      <div class="wrap-row wp-block-group qpc-block-title">
          <h2 class="">
            <?= $titolo ?>
            <span><?= $sottotitolo ?></span>
          </h2>
          <div class="wrap-swiper-arrows displayFlexAiCjCc">
           <div class="swiper-button swiper-button-next-camere"></div>
           <div class="swiper-button swiper-button-prev-camere"></div>
         </div>

      </div>
    <?php endif; ?>

       <?php if( have_rows('gestione_camere') ): ?>
         <div class="swiper-container swiper-camere">
            <div class="swiper-wrapper">
           <?php while( have_rows('gestione_camere') ): the_row();
               $titoloCamera = get_sub_field('titolo_camera');
               $descrizioneCamera = get_sub_field('descrizione_camera');
               $infoTecniche = get_sub_field('info_tecniche');
               ?>
               <div class="swiper-slide displayInlineFlexAiC">
                 <div class="swiper-slide-col-sx">
                   <h3><?= $titoloCamera ?></h3>
                   <span><?= $descrizioneCamera ?></span>
                 </div>
                 <div class="swiper-slide-col-ds">
                    <?php if( have_rows('icone_camere') ): ?>
                      <span class="info-tecniche"><?= $infoTecniche ?></span>
                      <div class="wrap-icons-camere">
                        <?php while( have_rows('icone_camere') ): the_row();
                          $aggiungiIcone = get_sub_field('aggiungi_icone');
                          ?>
                         <span class="<?= $aggiungiIcone ?>"></span>
                             <?php
                           endwhile;
                         endif;
                         ?>
                    </div>
                   <?php
                    $galleryCamere = get_sub_field('gallery_camere');
                    if( $galleryCamere ): ?>
                    <div class="swiper-container swiper-camere-nested">
                      <div class="swiper-wrapper">
                            <?php foreach( $galleryCamere as $image ): ?>
                              <a class="swiper-slide shadow shadow-radius" href="<?php echo $image['sizes']['large']; ?>">
                               <div class=" swiper-camere-nested-gallery" style="background:url('<?php echo $image['sizes']['swiper-block-gallery-resize']; ?>') no-repeat;"></div>
                              </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-custom swiper-pagination-nested"></div>
                      </div>
                    <?php endif; ?>
                </div>
              </div><!-- swiper-slide main -->

       <?php
       endwhile;
       endif; ?>

     </div>

  </div>

  <!-- Add Pagination
  <div class="swiper-pagination swiper-pagination-custom swiper-pagination-camere"></div> -->
</div>
