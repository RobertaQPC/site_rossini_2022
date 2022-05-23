<div class="cont-swiper-news qpc-container">
 <div class="swiper-button-next2"></div>
   <div class="swiper-container swiper2">
	  <div class="swiper-wrapper">

    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
      <?php setup_postdata($post); ?>

    	<div class="swiper-slide">

          <div class="featured-image">
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('thumbs-news-little') ?></a>
          </div>
          <div class="mc-description news-home">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php
            $content = get_the_content();
            $trimmed_content = wp_trim_words( $content, 15, '<a class="excerpt" href="'. get_permalink() .'"> [...]</a>' );
            echo $trimmed_content; ?>
            <a class="btnScheda" href="<?php the_permalink(); ?>">
              <?php esc_html_e( 'Leggi tutto', 'mos-theme' ); ?>
            </a>
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
    	<?php esc_html_e( 'Tutte le news', 'mos-theme' ); ?>
    </a>
</div>
