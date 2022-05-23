<div class="cont-swiper-news qpc-container calendario-template cont-swiper-calendario">
 <div class="swiper-button-next2"></div>
   <div class="swiper-container swiper2">
	  <div class="swiper-wrapper">

      <?php foreach( $featured_posts as $featured_post ):
          $permalink = get_permalink( $featured_post->ID );
          $title = get_the_title( $featured_post->ID );
          $bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id($featured_post->ID), 'thumbs-square')[0];
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
            <img src="<?= $bg_header_url ?>" alt="">
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
    <?php endforeach; ?>

     </div><!-- swiper-container -->
		<div class="swiper-pagination swiper-pagination2 swiper-pagination-white"></div>
	 </div><!-- swiper-wrapper -->
	 <div class="swiper-button-prev2"></div>

 </div>

 <div class="wp-block-buttons is-content-justification-center">
    <a class="wp-block-button__link" href="<?php echo site_url();?>/news">
    	<?php esc_html_e( 'Tutti i concerti', 'mos-theme' ); ?>
    </a>
</div>
