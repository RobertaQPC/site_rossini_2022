<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'related-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'related';
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
      $posts = get_field('correlati_news');
      $titoloVetrina = get_field('titolo_vetrina');
      $sottotitoloVetrina = get_field('sottotitolo_vetrina');
      $tipoContenuto = get_field('tipo_contenuto');

    if ( $tipoContenuto == 'correlati_news' ) :

    if( $posts ): ?>

    <div class="container-news">
      <div class="qpc-block-title displayFlexOh">
          <div class="wrap-long-text">
              <div class="long-text"><?= $titoloVetrina ?>*</div>
              <div class="long-text"><?= $titoloVetrina ?>*</div>
          </div>
          <?= ($sottotitoloVetrina!= '' ? "<span>$sottotitoloVetrina</span>" : ""); ?>
      </div>
        <div class="cont-swiper-news qpc-container">
         <div class="swiper-button-next2"></div>
           <div class="swiper-container swiper2">
        	  <div class="swiper-wrapper">

            <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
              <?php setup_postdata($post); ?>

            	<div class="swiper-slide">

                  <div class="featured-image">
                      <a class="shadow shadow-radius" href="<?php the_permalink( $post->ID); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'thumbs-news-little') ?></a>
                      <div class="mc-description news-home">
                        <a class="mc-description-title" href="<?php the_permalink( $post->ID); ?>"><?php echo get_the_title($post->ID); ?></a>
                        <p>
                        <?php
                        $content = get_the_content();
                        $trimmed_content = wp_trim_words( $content, 15, '<a class="excerpt" href="'. get_permalink($post->ID) .'"> [...]</a>' );
                        echo $trimmed_content; ?>
                        </p>
                      </div>
                      <a class="cta-button cta-button-underline" href="<?php the_permalink( $post->ID); ?>">
                        <?php esc_html_e( 'Leggi tutto', 'mos-theme' ); ?>
                      </a>
                  </div>

              </div>
            <?php endforeach; ?>

           </div><!-- swiper-container -->
     		  <div class="swiper-pagination swiper-pagination-custom swiper-pagination2"></div>
          <div class="wp-block-buttons is-content-justification-center">
            <?php
              $link = get_field('cta_vetrina');
              if( $link ):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
             <a class="cta-button cta-button-outline cta-button-centered cta-uppercase" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
             <?php endif; ?>
         </div>
     	   </div><!-- swiper-wrapper -->
     	  <div class="swiper-button-prev2"></div>

       </div>

    </div>
  <?php endif; ?>

<?php endif; ?>


  <?php
      if ( $tipoContenuto == 'concerti_in_vetrina' ) :
      ?>

      <?php
      $featured_posts = get_field('concerti_in_vetrina');
      if( $featured_posts ): ?>
     <div class="qpc-block-title displayFlexOh">
      <div class="wrap-long-text">
        <div class="long-text"><?= $titoloVetrina ?>*</div>
        <div class="long-text"><?= $titoloVetrina ?>*</div>
      </div>
      <?= ($sottotitoloVetrina!= '' ? "<span>$sottotitoloVetrina</span>" : ""); ?>
     </div>

      <div class="cont-swiper-news qpc-container calendario-template cont-swiper-calendario">
       <div class="swiper-button-next2"></div>
         <div class="swiper-container swiper2">
      	  <div class="swiper-wrapper">

            <?php foreach( $featured_posts as $featured_post ):
                $permalink = get_permalink( $featured_post->ID );
                $title = get_the_title( $featured_post->ID );
                $bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id($featured_post->ID), 'thumbs-square');
                $data_concerto = get_field( 'data_concerto', $featured_post->ID );
                $ora_concerto = get_field( 'ora_concerto', $featured_post->ID );
                $luogo_concerto = get_field( 'luogo_concerto', $featured_post->ID );
                $date_string = get_field( 'data_concerto', $featured_post->ID );
                $strtotime = DateTime::createFromFormat('Ymd', $date_string)->getTimestamp();
                ?>
          	<div class="swiper-slide">
                <div class="featured-image">
                  <div class="wrap-info-calendar">
                    <span><?php echo date_i18n("D", $strtotime); ?></span>
                    <span><?php echo date("d", $strtotime); ?></span>
                    <span><?php echo mb_strimwidth( date_i18n("F", $strtotime), 0, 3); ?></span>
                  </div>
                  <?php if ($bg_header_url) : ?><img src="<?= $bg_header_url[0] ?>" alt=""><?php endif; ?>
                  <div class="mc-description news-home">
                    <a href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
                    <div class="wrap-info">
                      <span><?= date_i18n("d F Y", $strtotime) ?></span>
                      <span><?= $ora_concerto ?></span>
                      <span><?= $luogo_concerto ?></span>
                    </div>
                  </div>
                  <div class="wrap-cta-carousel">
                   <a class="wp-block-button__link" href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( 'Approfondisci', 'mos-theme' ); ?></a>
                  </div>
                </div>
            </div>
          <?php
        endforeach; ?>

           </div><!-- swiper-container -->
      		<div class="swiper-pagination swiper-pagination2 swiper-pagination-white"></div>
          <div class="wp-block-buttons is-content-justification-center">
            <?php
              $link = get_field('cta_vetrina');
              if( $link ):
              $link_url = $link['url'];
              $link_title = $link['title'];
              $link_target = $link['target'] ? $link['target'] : '_self';
              ?>
             <a class="cta-button cta-button-outline cta-button-centered cta-uppercase" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
             <?php endif; ?>
         </div>
      	 </div><!-- swiper-wrapper -->
      	 <div class="swiper-button-prev2"></div>

       </div>


   <?php endif; ?>



<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
