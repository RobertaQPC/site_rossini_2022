<div class="swiper-container swiper2">
	<div class="swiper-wrapper">

<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
  <?php setup_postdata($post); ?>

	<div class="swiper-slide">Slide 1</div>


      <div class="featured-image">
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('thumbs-news-home') ?></a>
      </div>
      <h1 class="article-title news-home">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h1>
      <div class="mc-description news-home">
        <?php (is_single()) ? the_content() : the_excerpt() ?>
      </div>
      <a class="btnScheda" href="<?php the_permalink(); ?>">
        <?php esc_html_e( 'Leggi tutto', 'mos-theme' ); ?>
      </a>

  </div>
<?php endforeach; ?>

    <a class="btnSchedaPath" href="<?php echo site_url();?>/news">
      <?php esc_html_e( 'Tutte le news', 'mos-theme' ); ?>
    </a>

    </div><!-- swiper-container -->
	</div><!-- swiper-wrapper -->
<div class="swiper-pagination"></div>
<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>
