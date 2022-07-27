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
$id = 'related-items-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'related-items';
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

    $terms = get_terms(array(
          'taxonomy' => 'corsi_categoria',
          'hide_empty'=> '0',
          'orderby' => 'name',
        ));

    $featured_posts = get_field('elementi_in_vetrina');
    $titolo = get_field('titolo');
    $sottotitolo = get_field('sottotitolo');
    if( $featured_posts ):

    ?>

    <?php
       if( $titolo ): ?>
      <div class="qpc-block-title displayFlexOh">
        <div class="wrap-long-text">
           <div class="long-text"><?= $titolo; ?>*</div>
           <div class="long-text"><?= $titolo; ?>*</div>
          <?= ($sottotitolo!= '' ? "<span>$sottotitolo</span>" : ""); ?>
        </div>
      </div>
    <?php endif; ?>

  <div class="swiper-container swiperGrid qpc-container">
    <div class="swiper-wrapper">
     <?php
        foreach( $featured_posts as $featured_post ):
           $permalink = get_permalink( $featured_post->ID );
           $title = get_the_title( $featured_post->ID );
           $nomeCategoriaAttuale = get_the_terms( $featured_post->ID, 'corsi_categoria' )[0];
          // $terms = wp_get_object_terms($featured_post->ID, 'corsi_categoria')[0];  attualmente nn serve
           ?>
            <div class="swiper-slide">
              <div class="wrap-box-slide">
               <span><?= $nomeCategoriaAttuale->name ?></span>
               <span>Una vasta offerta didattica per il triennio in diverse discipline</span><!-- ricordarsi di chiedere se c'è un campo per la descrizione -->
               <a class="cta-button cta-button-underline" href=" <?= $permalink ?>"><?php esc_html_e('Vai alla scheda', 'mos-theme'); ?></a>
             </div>
           </div>
       <?php endforeach; ?>
   </div>
     <!-- Add Pagination -->
     <div class="swiper-pagination swiper-pagination-custom swiper-swiperGrid"></div>
  </div>
  <?php
    $ctaVetrina = get_field('cta_vetrina');
    if( $ctaVetrina ):
    $link_url = $ctaVetrina['url'];
    $link_title = $ctaVetrina['title'];
    $link_target = $ctaVetrina['target'] ? $ctaVetrina['target'] : '_self';
    ?>
  <a class="cta-button cta-button-outline cta-button-centered cta-uppercase" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
<?php endif; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
