<?php

/*
* Template Name: Dettaglio scheda concerti
* Template Post Type: post, calendario
*/
?>

  <?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('header/no-header.php');
$bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbs-square')[0];
$data_concerto = get_field( 'data_concerto' );
$ora_concerto = get_field( 'ora_concerto' );
$luogo_concerto = get_field( 'luogo_concerto' );
$date_string = get_field( 'data_concerto' );
$strtotime = DateTime::createFromFormat('Ymd', $date_string)->getTimestamp();

?>
<?php echo qpc_breadcrumb(); ?>

<div class="qpc-container wrap-scheda-dett" id="wrap-custom-post">
    <h2><?php the_title(); ?></h2>
    <div class="qpcRow ai-fs">
     <div class="qpc-col-50">
          <div class="wrap-info-calendar">
            <span><?php echo date_i18n("D", $strtotime); ?></span>
            <span><?php echo date("d", $strtotime); ?></span>
            <span><?php echo mb_strimwidth( date_i18n("F", $strtotime), 0, 3); ?></span>
          </div>
        <img src="<?= $bg_header_url ?>" alt="">
      </div>
    <div class="qpc-col-50">
      <div class="wrap-info">
        <span><?= date_i18n("d F Y", $strtotime) ?></span>
        <span><?= $ora_concerto ?></span>
        <span><?= $luogo_concerto ?></span>
      </div>
      <?php the_content() ?>
    </div>

  </div>
</div>


<?php
$terms = wp_get_post_terms(get_the_ID(), 'calendari_categoria');
$args = array(
    'post_type' => 'calendario',
    'calendari_categoria' => $terms[0]->slug,
    'post__not_in' => array(get_the_ID()),
);


?>
           <div class="cont-swiper-news qpc-container calendario-template cont-swiper-calendario">
              <h2><?php esc_html_e( 'Tutti i concerti della stagione', 'mos-theme' ); ?></h2>
             <div class="swiper-button-next2"></div>
               <div class="swiper-container swiper2">
            	  <div class="swiper-wrapper">
                        <?php
                        $the_query = new WP_Query($args);
                        while ($the_query->have_posts()) :
                                 $the_query->the_post();
                                 $data_concerto = get_field( 'data_concerto' );
                                 $ora_concerto = get_field( 'ora_concerto' );
                                 $luogo_concerto = get_field( 'luogo_concerto' );
                                 $date_string = get_field( 'data_concerto' );
                                 $strtotime = DateTime::createFromFormat('Ymd', $date_string)->getTimestamp();
                            ?>

                            <div class="swiper-slide">
                                <div class="featured-image">
                                  <div class="wrap-info-calendar">
                                    <span><?php echo date_i18n("D", $strtotime, $post->ID); ?></span>
                                    <span><?php echo date("d", $strtotime); ?></span>
                                    <span><?php echo mb_strimwidth( date_i18n("F", $strtotime), 0, 3); ?></span>
                                  </div>
                                  <?php the_post_thumbnail('thumbs-square'); ?>
                                  <div class="mc-description news-home">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <div class="wrap-info">
                                      <span><?= date_i18n("d F Y", $strtotime) ?></span>
                                      <span><?= $ora_concerto ?></span>
                                      <span><?= $luogo_concerto ?></span>
                                    </div>
                                  </div>
                                  <div class="wrap-cta-carousel">
                                   <a class="wp-block-button__link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Approfondisci', 'mos-theme' ); ?></a>
                                  </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_query();
                        wp_reset_postdata(); ?>
                      </div><!-- swiper-container -->
                 		 <div class="swiper-pagination swiper-pagination2 swiper-pagination-white"></div>
                 	 </div><!-- swiper-wrapper -->
                  <div class="swiper-button-prev2"></div>

<?php get_footer(); ?>
