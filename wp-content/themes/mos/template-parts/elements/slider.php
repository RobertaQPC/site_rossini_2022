<?php if( have_rows('sliders') ): ?>

	<?php while( have_rows('sliders') ): the_row();
		// vars
    $images = get_sub_field('gallery');
    $altezza_sliders = get_sub_field('altezza_sliders');
    $url_slider = get_sub_field('url_slider');
    $blank = get_sub_field('blank');
		?>

  <!-- modificato lo width_rowr in mnaiera che prenda le immagini di background -->
    <div id="slider" class="custom-post flexslider">
      <ul class="slides">
            <?php foreach( $images as $image ): ?>
              <li style="background-image: url(<?php echo $image['url']; ?> ); alt='<?php echo $image['alt']; ?>'; height:<?php echo $altezza_sliders; ?>">
                    <p class="captionSlider"><?php echo $image['caption']; ?></p>
                    <!--<div id="retino"></div>-->
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

		<!--
		<a data-number="1" class="anchorLink btnDown bounce" href="#content-wrap">
		<i class="fa fa-chevron-down bounce"></i>
		<svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" viewBox="0 0 64 64">
				<path fill="#8bc34a" d="M32,16c-4.971,0-9,4.029-9,9v14c0,4.971,4.029,9,9,9c4.971,0,9-4.029,9-9V25C41,20.029,36.971,16,32,16z M39,39c0,3.866-3.134,7-7,7s-7-3.134-7-7V25c0-3.866,3.134-7,7-7s7,3.134,7,7V39z M32,21c-0.552,0-1,0.448-1,1v5c0,0.553,0.448,1,1,1c0.553,0,1-0.447,1-1v-5C33,21.448,32.553,21,32,21z" />
		</svg>
		</a>
	-->

	<?php endwhile; ?>

<?php endif; ?>
