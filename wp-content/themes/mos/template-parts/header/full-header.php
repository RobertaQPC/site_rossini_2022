<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo('charset') ?>">
        <meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0"/>
        <title><?php wp_title('|', true, 'right') ?></title>
		<meta name="author" content="">
		<link rel="author" href="">
		<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<?php wp_head() ?>
    <?php the_field('Tracciamento_tag_head', 'option'); ?>
    </head>
    <body <?php body_class() ?>>
      <?php

        the_field('Tracciamento_tag_body', 'option');
        $queried_object = get_queried_object();
        $altezza_header = 'header-medium-heigth';
        $parallasse_header = null;
        $background_image_position_row = null;
        $colore_heading= null;
        $heading= null;
        $colore_sotto_titolo= null;
        $sotto_titolo= null;

        if ($queried_object = get_queried_object()) {
            // var_dump($queried_object);
            if (property_exists($queried_object, 'taxonomy')) {
                if ($queried_object->taxonomy == 'calendari_categoria') {
                  //  $sandro = get_field('categoria_immagine', $queried_object);
                  //  if( $sandro ):
                  //  $pippo = 'banner-header-1920-550';
                  //  $bg_header_url = wp_get_attachment_image_src($sandro, $pippo)[0];
                  //   endif;
                    $image = get_field('categoria_immagine', $queried_object);
                    $link = wp_get_attachment_image_src($image, 'banner-header-1920-400')[0];
                    //var_dump($link);
                    $bg_header_url = $link;
                    $heading = '<span>'.$queried_object->name.'</span>';
                    $sotto_titolo = '';

                } elseif ($queried_object->taxonomy == 'category') {
                    //    var_dump($queried_object);
                    //$bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'banner-header-1920-550')[0];
                    $bg_header_url = wp_get_attachment_image_src( get_field('categoria_immagine', $queried_object ), 'banner-header-1920-550' )[0];
                //    $altezza_header = get_field('altezza_header', get_option('page_for_posts'),  $queried_object);
                    $altezza_header = get_field('altezza_header', $queried_object);
                    $parallasse_header = get_field('parallasse_header', $queried_object);
                    $background_image_position_row = get_field('background_image_position_row', $queried_object);
                    $colore_heading = get_field('colore_heading', $queried_object);
                    $heading = get_field('heading',  $queried_object);
                    $colore_sotto_titolo = get_field('colore-sotto-titolo', $queried_object);
                  //  $sotto_titolo = $queried_object->name;
                    $sotto_titolo = get_field('sotto-titolo', $queried_object);
                }
            } elseif (($queried_object->post_type == 'page' && $queried_object->ID == get_option('page_for_posts')) || $queried_object->taxonomy == 'category') {
                //pagina articoli
                $bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id($queried_object->ID), 'banner-header-1920-550')[0];
                $altezza_header = get_field('altezza_header', $queried_object->ID);
                $parallasse_header = get_field('parallasse_header', $queried_object->ID);
                $background_image_position_row = get_field('background_image_position_row', $queried_object->ID);
                $colore_heading = get_field('colore_heading', $queried_object->ID);
                $heading = get_field('heading', $queried_object->ID);
                $colore_sotto_titolo = get_field('colore-sotto-titolo', $queried_object->ID);
                $sotto_titolo = get_field('sotto-titolo', $queried_object->ID);
                if (!$sotto_titolo) {
                    $sotto_titolo = '&nbsp;';
                }
            } elseif
            (wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), null, 'banner-header-1920-400')[0] != '') {
              $bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), null, 'banner-header-1920-400')[0];
            }
        }
        if (get_field('altezza_header')) {
            $altezza_header = get_field('altezza_header');
        }
        if (!$parallasse_header && get_field('parallasse_header')) {
            $parallasse_header = get_field('parallasse_header');
        }
        if (!$background_image_position_row && get_field('background_image_position_row')) {
            $background_image_position_row = get_field('background_image_position_row');
        }
        if (!$colore_heading && get_field('colore_heading')) {
            $colore_heading = get_field('colore_heading');
        }
        if (!$heading && get_field('heading')) {
            $heading = get_field('heading');
        }
        if (!$colore_sotto_titolo && get_field('colore-sotto-titolo')) {
            $colore_sotto_titolo = get_field('colore-sotto-titolo');
        }
        if (!$sotto_titolo && get_field('sotto-titolo')) {
            $sotto_titolo = get_field('sotto-titolo');
        }
        ?>
        <!-- abilitato l'immagine in evidenza nell'header come background -->
      <div data-barba="wrapper">
        <div class="loading-container">
          <div class="loading-screen">
           <?php include(TEMPLATEPATH . '/template-parts/header/logosvg.php'); ?>
        </div>
      </div>

        <div data-barba="container" data-barba-namespace="<?php echo $queried_object->name;?>">
          <?php include(TEMPLATEPATH . '/template-parts/elements/pre-header.php'); ?>
        <div class="wrap-header fade-in-new">
          <div class="qpc-container displayFlexcenter">

          <a id="page-logo" href="<?php bloginfo('url') ?>"
             title="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
             <?php include(TEMPLATEPATH . '/template-parts/header/logosvg.php'); ?>
          </a>
          <?php include(TEMPLATEPATH . '/template-parts/elements/menu.php'); ?>
          <!--<div class="vertical-line"></div>-->
          <?php // include (TEMPLATEPATH . '/search-form-header.php' );?>
        </div>
       </div>
      <style>

      .bgHeader::before{
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-color:<?php the_field ('colore_sfondo') ?> ;
        z-index: 0;
        opacity:  <?php the_field ('opacita') ?>;
        mix-blend-mode: multiply;
      }


      </style>

    <header id="header" class="bgHeader <?php echo(get_field('altezza_header') == '' ? 'header-medium-heigth' : get_field('altezza_header')); ?> " style="  <?php if( !empty( $bg_header_url ) ): ?>background: url('<?php  echo $bg_header_url; ?>')<?php endif; ?> <?php the_field('parallasse_header') ?> <?php the_field('background_image_position_row') ?> ">
      <div class="titleHome">
        <span style="color:<?=$colore_heading ?>  "><?=$heading ?></span>
        <h3 style="color:  <?=$colore_sotto_titolo ?>"><?=$sotto_titolo ?></h3>
      </div>
        <!--
        <a data-number="1" class="anchorLink btnDown bounce" href="#content-wrap">
        <i class="fa fa-chevron-down bounce"></i>
        <svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" viewBox="0 0 64 64">
            <path fill="#8bc34a" d="M32,16c-4.971,0-9,4.029-9,9v14c0,4.971,4.029,9,9,9c4.971,0,9-4.029,9-9V25C41,20.029,36.971,16,32,16z M39,39c0,3.866-3.134,7-7,7s-7-3.134-7-7V25c0-3.866,3.134-7,7-7s7,3.134,7,7V39z M32,21c-0.552,0-1,0.448-1,1v5c0,0.553,0.448,1,1,1c0.553,0,1-0.447,1-1v-5C33,21.448,32.553,21,32,21z" />
        </svg>
        </a>

      <a data-number="1" class="anchorLink " href="#welcome">
        <div class="wrap-scroll-line">
         <h5>Scopri di più!</h5>
         <div class="scroll-line"></div>
        </div>
      </a>-->
		</header>
    <?php echo qpc_breadcrumb(); ?>

		<div id="content-wrap">
