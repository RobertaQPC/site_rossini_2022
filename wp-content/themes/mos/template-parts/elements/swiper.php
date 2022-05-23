  <!-- modificato lo width_rowr in maniera che prenda le immagini di background -->
  <div class="swiper-container swiper1 swiper-home" style="height:<?php the_field ('altezza_sliders') ?>">
		<div class="swiper-wrapper">
			<!--<div id="retino"></div>-->
			<?php if( have_rows('swipers') ): ?>
				<?php while( have_rows('swipers') ): the_row();
					// vars
					$img_background = get_sub_field('img_background');
					$title = get_sub_field('title');
					$subtitle = get_sub_field('subtitle');
					?>
							<div class="swiper-slide">
							 <div class="parallax-bg" style="background:url(<?php echo $img_background['sizes']['banner-header']; ?>) no-repeat center; opacity:<?php the_field ('opacity') ?>; " >
							 <div class="wrap-text">
								<div class="title" ><?php echo $title; ?></div>
								<div class="subtitle" ><?php echo $subtitle; ?></div>
								<div class="text" >
									<?php if( have_rows('btn_slider') ): ?>
										<?php while( have_rows('btn_slider') ): the_row();
										$url_slider = get_sub_field('url_slider');
										$testo_btn_scheda = get_sub_field('testo_btn_scheda');
										?>
									<a class="btnScheda" href="<?php echo $url_slider; ?>"><?php echo $testo_btn_scheda; ?></a>
								<?php endwhile; ?>
							<?php endif; ?>
								</div>
							</div>
              </div>
						  </div>
						<?php endwhile; ?>
					<?php endif; ?>
    </div>
		<!-- Add Pagination -->
		<div class="swiper-pagination swiper-pagination1 swiper-pagination-white"></div>
		<!-- Add Navigation -->
		<div class="swiper-button-prev swiper-button-white"></div>
		<div class="swiper-button-next swiper-button-white"></div>
	</div>

  <a  data-number="1" class="anchorLink " href="#wrap-custom-post">
      <div class="wrap-scroll-line">
          <h5>Scopri di più!</h5>
          <div class="scroll-line"></div>
      </div>
  </a>


		<!--
		<a data-number="1" class="anchorLink btnDown bounce" href="#content-wrap">
		<i class="fa fa-chevron-down bounce"></i>
		<svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" viewBox="0 0 64 64">
				<path fill="#8bc34a" d="M32,16c-4.971,0-9,4.029-9,9v14c0,4.971,4.029,9,9,9c4.971,0,9-4.029,9-9V25C41,20.029,36.971,16,32,16z M39,39c0,3.866-3.134,7-7,7s-7-3.134-7-7V25c0-3.866,3.134-7,7-7s7,3.134,7,7V39z M32,21c-0.552,0-1,0.448-1,1v5c0,0.553,0.448,1,1,1c0.553,0,1-0.447,1-1v-5C33,21.448,32.553,21,32,21z" />
		</svg>
		</a>
	-->
