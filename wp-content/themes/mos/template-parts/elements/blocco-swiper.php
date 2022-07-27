<?php

$swiper = get_field("swiper");

?>
<?php
if (!empty($swiper['gestione_testo']['riga'])) { ?>
<section class="swiper-head wp-block-cover-image wp-block-cover <?= $swiper['extra_class']; ?> <?= $swiper['posizione_blocco_testo']; ?>" style="height: <?= $swiper['altezza_banner']; ?>">
	<?php
			if ( $swiper['formato_media'] == 'void' ) : ?>
  <?php endif; ?>

			<?php
					if ( $swiper['formato_media'] == 'img_head' ) :
					    $swiper['group_head']['img_head'];
						?>

					<div class="img-head" style="background:url('<?= wp_get_attachment_image_url( $swiper['group_head']['img_head']['ID'], 'banner-header');?>')<?= $swiper['group_head']['allineamento_immmagine']; ?> no-repeat " alt="<?php bloginfo(); ?>"></div>
  <?php endif; ?>

		<?php
        if ( $swiper['formato_media'] == 'gallery' ) : ?>
                <div class="swiper-container swiper1 swiper-home ">
                    <div class="swiper-wrapper">
                        <!--<div id="retino"></div>-->
						<?php $images = $swiper['gallery']; ?>
						<?php foreach ( $images as $image_id ) : ?>
                            <div class="swiper-slide">
                              <div class="parallax-bg" style="background:url(<?php echo $image_id['sizes']['banner-header']; ?>) no-repeat center;"></div>
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-pagination swiper-pagination1 swiper-pagination-white"></div>

		<?php elseif ( $swiper['formato_media'] == 'oembed' ) : ?>
            <div class="swiper-home block-right">
				<?= $swiper['oembed']; ?>
            </div>
		<?php elseif ( $swiper['formato_media'] == 'html5' ) : ?>
            <div class="swiper-home block-right">
                <video width="<?= $swiper['html5']['larghezza']; ?>"
                       height="<?= $swiper['html5']['altezza']; ?>"
				       <?php if ( $swiper['html5']['autoplay'] ) : ?> playsinline autoplay muted loop <?php endif; ?>>
                    <source src="<?= $swiper['html5']['file_mp4']; ?>" type="video/mp4">
					<?php if ( $swiper['html5']['file_ogg'] != '' ) : ?>
                        <source src="<?= $swiper['html5']['file_ogg']; ?>"
                                type="video/ogg">
                    <?php endif; ?>
                </video>
            </div>
		<?php endif; ?>
    <div class="wrap-swiper-title <?= $swiper['gestione_testo']['settings_titoli']['extra_class'];?>"
      style="max-width:<?= $swiper['gestione_testo']['settings_titoli']['larghezza_titoli'];?>;
              text-align:<?= $swiper['gestione_testo']['settings_titoli']['allineamento_testo'];?>;
              color:<?= $swiper['gestione_testo']['settings_titoli']['colore_testi'];?> ">

    <?php foreach ( $swiper['gestione_testo']['riga'] as $riga ) :
      if ( $riga['formato'] == 'testo' ) : ?>
                <span style="font-size:<?= $riga['gestione_testo']['dimensione_titolo'];?>vw;" class="<?= $riga['gestione_testo']['extra_class']; ?>"><?= $riga['gestione_testo']['testo']; ?></span>
                    <?php elseif ( $riga['formato'] == 'html' ): ?>
                    <div class="<?= $riga['gestione_html']['extra_class']; ?>">
                      <?= $riga['gestione_html']['testo']; ?>
                    </div>

      <?php endif; ?>
    <?php endforeach; ?>

    <?php
      $link = $riga['cta'];
      if( $link ):
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      <?php endif; ?>
</div>
</section>
<?php
} else {
} ?>
