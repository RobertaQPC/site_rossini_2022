
<?php

$args = (array(
    'post_type' => 'calendario',
    'order' => 'ASC',
    'orderby' => 'title',
    'tax_query' => array(
        array(
            'taxonomy' => 'calendari_categoria',
            'field' => 'id',
            'terms' => $cat_id
        ),
    ),
    'posts_per_page' => -1
));

$the_query = new WP_Query($args);

?>

<div class="qpc-container cont-swiper-calendario calendario-template ">
 <div class="qpcRow">

 <?php
 if ($the_query->have_posts()):
     while ($the_query->have_posts()) :
         $the_query->the_post();
         $bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbs-square')[0];
         $data_concerto = get_field( 'data_concerto' );
         $ora_concerto = get_field( 'ora_concerto' );
         $luogo_concerto = get_field( 'luogo_concerto' );
         $date_string = get_field( 'data_concerto' );
         $strtotime = DateTime::createFromFormat('Ymd', $date_string)->getTimestamp();
         $permalink = get_permalink( $post->ID );
        // $title = get_the_title( $featured_post->ID );
         ?>
         <div class="qpc-col-33">

         <div class="featured-image">
           <div class="wrap-info-calendar">
             <span><?php echo date_i18n("D", $strtotime); ?></span>
             <span><?php echo date("d", $strtotime); ?></span>
             <span><?php echo mb_strimwidth( date_i18n("F", $strtotime), 0, 3); ?></span>
           </div>
           <img src="<?= $bg_header_url ?>" alt="">
           <div class="mc-description news-home">
             <a href=""><?php echo esc_html( $title ); ?></a>
             <div class="wrap-info">
               <span><?= date_i18n("d F Y", $strtotime) ?></span>
               <span><?= $ora_concerto ?></span>
               <span><?= $luogo_concerto ?></span>
             </div>
           </div>
           <div class="wrap-cta-carousel">
            <a class="wp-block-button__link" href="<?= $permalink ?>"><?php esc_html_e( 'Approfondisci', 'mos-theme' ); ?></a>
           </div>
         </div>
       </div>

     <?php
     endwhile;
 endif;
?>
 </div>
</div>

<?php get_footer(); ?>
