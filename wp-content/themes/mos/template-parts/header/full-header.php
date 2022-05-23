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
            <svg class="logo-loader" version="1.1" id="Livello_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
          	 viewBox="0 0 155.8 81.5" style="enable-background:new 0 0 155.8 81.5;" xml:space="preserve">
          <style type="text/css">
          	.st0{fill:none;stroke:#FFFFFF;stroke-width:0.5;stroke-miterlimit:10;}
          	.st1{fill:none;stroke:#FFFFFF;stroke-width:0.25;stroke-miterlimit:10;}
          	.st2{enable-background:new    ;}
          </style>
          <g id="Raggruppa_1554" transform="translate(-278.001 -77.169)">
          	<g id="Raggruppa_1552" transform="translate(254.718 3.495)">
          		<g id="Raggruppa_1491" transform="translate(2.825)">
          			<path id="Tracciato_24" class="st0" d="M27.7,75.6c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6c0-2.9-2-5.4-4.9-5.9
          				C28.5,75.6,28.1,75.6,27.7,75.6z"/>
          			<path id="Tracciato_25" class="st0" d="M47,75.6c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6c0-2.9-2-5.4-4.9-5.9
          				C47.8,75.6,47.4,75.6,47,75.6z"/>
          			<path id="Tracciato_26" class="st0" d="M66.3,75.6c-3.3,0-6,2.7-6,6s2.7,6,6,6s6-2.7,6-6c0-2.9-2-5.4-4.9-5.9
          				C67.1,75.6,66.7,75.6,66.3,75.6z"/>
          			<g id="Raggruppa_41" transform="translate(21.303 98.044)">
          				<path id="Tracciato_27" class="st0" d="M0-1.9h10.4v2.7h-7v2.5h6.3V6H3.4v2.5h7.1v2.7H0V-1.9z"/>
          			</g>
          			<g id="Raggruppa_42" transform="translate(42.237 98.044)">
          				<path id="Tracciato_28" class="st0" d="M9-1.9h3.2v13.2h-3l-6-7.9v7.9H0V-1.9h3L9,6V-1.9z"/>
          			</g>
          			<g id="Raggruppa_43" transform="translate(64.129 98.044)">
          				<path id="Tracciato_29" class="st0" d="M0-1.9h11.3v2.8h-4v10.3H3.9V0.9H0V-1.9z"/>
          			</g>
          			<g id="Raggruppa_44" transform="translate(85.025 98.044)">
          				<path id="Tracciato_30" class="st0" d="M0-1.9h10.4v2.7h-7v2.5h6.3V6H3.4v2.5h7.1v2.7H0V-1.9z"/>
          			</g>
          			<g id="Raggruppa_45" transform="translate(20.458 119.827)">
          				<path id="Tracciato_31" class="st0" d="M8.8,1.5C8.3,1.2,7.7,1,7.1,1S5.8,1.2,5.3,1.5C4.7,1.8,4.3,2.3,4,2.9
          					C3.4,4.1,3.4,5.6,4,6.8c0.3,0.6,0.7,1,1.3,1.4c0.5,0.3,1.2,0.5,1.8,0.5s1.2-0.2,1.7-0.4C9.4,8,9.9,7.6,10.4,7.1l2,2.2
          					c-0.7,0.8-1.6,1.4-2.5,1.8c-2.1,1-4.5,0.9-6.5-0.2c-1-0.6-1.9-1.4-2.5-2.5S0,6.1,0,4.9C0,2.4,1.3,0.1,3.4-1
          					c2-1.1,4.4-1.2,6.5-0.3c0.9,0.4,1.7,0.9,2.4,1.7l-2,2.4C10,2.2,9.4,1.8,8.8,1.5z"/>
          			</g>
          			<g id="Raggruppa_46" transform="translate(41.73 119.827)">
          				<path id="Tracciato_32" class="st0" d="M10.8-1c2.2,1.2,3.5,3.4,3.5,5.9s-1.3,4.8-3.5,6c-2.3,1.2-5,1.2-7.3,0
          					c-1.1-0.6-1.9-1.4-2.6-2.5C0.3,7.3,0,6.1,0,4.9C0,2.4,1.3,0.1,3.5-1C5.8-2.2,8.5-2.2,10.8-1L10.8-1z M5.3,1.5
          					C4.8,1.9,4.3,2.3,4,2.9c-0.6,1.3-0.6,2.7,0,4C4.3,7.5,4.8,8,5.3,8.3s1.2,0.5,1.8,0.5s1.3-0.2,1.8-0.5s1-0.8,1.3-1.4
          					c0.6-1.2,0.6-2.7,0-3.9C9.9,2.3,9.5,1.9,8.9,1.5C8.4,1.2,7.8,1,7.1,1C6.5,1,5.9,1.2,5.3,1.5z"/>
          			</g>
          			<g id="Raggruppa_47" transform="translate(65.97 120.034)">
          				<path id="Tracciato_33" class="st0" d="M9-1.9h3.2v13.2h-3l-6-7.9v7.9H0V-1.9h3L9,6V-1.9z"/>
          			</g>
          			<g id="Raggruppa_48" transform="translate(88.163 119.827)">
          				<path id="Tracciato_34" class="st0" d="M8.8,1.5C8.3,1.2,7.7,1,7.1,1S5.8,1.2,5.3,1.5C4.7,1.8,4.3,2.3,4,2.9
          					C3.4,4.1,3.4,5.6,4,6.8c0.3,0.6,0.7,1,1.3,1.4c0.5,0.3,1.2,0.5,1.8,0.5s1.2-0.2,1.7-0.4C9.4,8,9.9,7.6,10.4,7.1l2,2.2
          					c-0.7,0.8-1.6,1.4-2.5,1.8c-2.1,1-4.5,0.9-6.5-0.2c-1-0.6-1.9-1.4-2.5-2.5S0,6.1,0,4.9C0,2.4,1.3,0.1,3.4-1
          					c2-1.1,4.4-1.2,6.5-0.3c0.9,0.4,1.7,0.9,2.4,1.7l-2,2.4C10,2.2,9.4,1.8,8.8,1.5z"/>
          			</g>
          			<g id="Raggruppa_49" transform="translate(110.281 120.034)">
          				<path id="Tracciato_35" class="st0" d="M0-1.9h10.4v2.7h-7v2.5h6.3V6H3.4v2.5h7.1v2.7H0V-1.9z"/>
          			</g>
          			<g id="Raggruppa_50" transform="translate(131.214 120.034)">
          				<path id="Tracciato_36" class="st0" d="M7.9,11.3L6,7.6H3.4v3.6H0V-1.9h5.9C7.4-2,8.8-1.6,10-0.7c1,0.9,1.5,2.1,1.4,3.4
          					c0,0.9-0.2,1.8-0.6,2.6C10.4,6,9.8,6.6,9.1,7l2.7,4.3H7.9z M3.4,4.9h2.5c0.6,0,1.2-0.2,1.6-0.5C8,4,8.2,3.4,8.1,2.8
          					c0-0.6-0.2-1.1-0.6-1.5C7.1,1,6.5,0.8,5.9,0.8H3.4V4.9z"/>
          			</g>
          			<g id="Raggruppa_51" transform="translate(151.941 120.034)">
          				<path id="Tracciato_37" class="st0" d="M0-1.9h11.3v2.8h-4v10.3H3.9V0.9H0V-1.9z"/>
          			</g>
          			<g id="Raggruppa_52" transform="translate(172.838 120.034)">
          				<path id="Tracciato_38" class="st0" d="M0-1.9h3.4v13.2H0V-1.9z"/>
          			</g>
          			<g id="Raggruppa_60" transform="translate(20.949 148.333)">
          				<path id="Tracciato_39" class="st1" d="M4.2,0.1c0,0.6-0.2,1.2-0.7,1.6C3,2,2.3,2.2,1.6,2.2H0.8v2.6H0v-6.7h1.8
          					C3.4-1.9,4.2-1.3,4.2,0.1z M0.8,1.5h0.7c0.5,0,1-0.1,1.5-0.3c0.3-0.3,0.5-0.7,0.5-1.1s-0.1-0.8-0.4-1c-0.5-0.2-1-0.4-1.5-0.3
          					H0.8V1.5z"/>
          			</g>
          			<g id="Raggruppa_61" transform="translate(29.15 148.333)">
          				<path id="Tracciato_40" class="st1" d="M3.7,4.8H0v-6.7h3.7v0.7h-3V1h2.8v0.7H0.8v2.5h3L3.7,4.8L3.7,4.8z"/>
          			</g>
          			<g id="Raggruppa_62" transform="translate(36.483 148.236)">
          				<path id="Tracciato_41" class="st1" d="M4.2,3.1c0,0.5-0.2,1.1-0.6,1.4C3.1,4.9,2.4,5,1.8,5S0.6,4.9,0,4.7V3.9
          					C0.3,4,0.6,4.1,0.9,4.2c0.3,0.1,0.6,0.1,1,0.1S2.7,4.2,3,4c0.3-0.2,0.4-0.5,0.4-0.8c0-0.2,0-0.4-0.1-0.6C3.2,2.4,3,2.3,2.8,2.2
          					C2.5,2,2.2,1.9,1.8,1.8C1.3,1.6,0.9,1.4,0.5,1C0.2,0.7,0.1,0.2,0.1-0.2c0-0.5,0.2-0.9,0.6-1.2s1-0.5,1.5-0.5
          					c0.6,0,1.3,0.1,1.8,0.4L3.8-0.9C3.3-1.1,2.7-1.2,2.2-1.2c-0.3,0-0.7,0.1-1,0.3C1-0.8,0.9-0.5,0.9-0.2c0,0.2,0,0.4,0.1,0.6
          					s0.3,0.3,0.4,0.4c0.3,0.1,0.6,0.3,1,0.4c0.5,0.2,1,0.4,1.5,0.8C4.1,2.3,4.2,2.7,4.2,3.1z"/>
          			</g>
          			<g id="Raggruppa_63" transform="translate(43.697 148.306)">
          				<path id="Tracciato_42" class="st1" d="M5.1,4.8L4.3,2.7H1.6L0.8,4.8H0l2.7-6.7h0.7L6,4.8H5.1z M4.1,2L3.3-0.1
          					C3.2-0.3,3.1-0.7,3-1C2.9-0.7,2.8-0.3,2.7,0L1.9,2H4.1z"/>
          			</g>
          			<g id="Raggruppa_64" transform="translate(53.111 148.333)">
          				<path id="Tracciato_43" class="st1" d="M0.8,2v2.8H0v-6.7h1.8C2.5-2,3.1-1.8,3.7-1.4C4.1-1.1,4.3-0.5,4.2,0
          					c0,0.8-0.5,1.6-1.3,1.8l1.8,3H3.8L2.2,2H0.8z M0.8,1.3h1.1c0.4,0,0.9-0.1,1.2-0.3c0.3-0.3,0.4-0.6,0.4-1S3.4-0.7,3.1-1
          					C2.7-1.2,2.2-1.3,1.8-1.2h-1C0.8-1.2,0.8,1.3,0.8,1.3z"/>
          			</g>
          			<g id="Raggruppa_65" transform="translate(61.115 148.228)">
          				<path id="Tracciato_44" class="st1" d="M6.2,1.6C6.3,2.5,6,3.4,5.4,4.1C4.8,4.7,3.9,5.1,3.1,5C2.2,5.1,1.4,4.7,0.8,4.1
          					C0.2,3.4-0.1,2.5,0,1.5C-0.1,0.6,0.2-0.3,0.8-1c0.6-0.6,1.4-1,2.3-0.9C4-1.9,4.8-1.6,5.4-1C5.9-0.3,6.2,0.6,6.2,1.6z M0.8,1.6
          					c0,0.7,0.2,1.4,0.6,2c0.9,0.9,2.4,0.9,3.4,0l0,0c0.8-1.3,0.8-2.9,0-4.1C4.4-1,3.7-1.3,3.1-1.2C2.4-1.3,1.8-1,1.4-0.5
          					C1,0.1,0.8,0.8,0.8,1.6L0.8,1.6z"/>
          			</g>
          		</g>
          	</g>
          </g>
          <g class="st2">
          	<path class="st0" d="M149.9,75.3c-0.7,0.3-1.5,0.3-2.2,0.1c-1.1-0.2-1.8-1-2.6-1.7c-1.1-0.9-2.4-1.5-3.8-1.5
          		c-0.5,0-1.1,0.1-1.6,0.2c-1.5,0.3-3,0.3-4.3-0.5c-1.1-0.7-1.8-1.7-2.4-2.8c-0.2-0.5-0.5-0.9-0.8-1.5c0,0.4,0,0.7,0,0.9
          		c0,1.1,0,2.1,0,3.2c0,0.5-0.3,0.7-0.9,0.9c-0.2-0.4-0.5-0.9-0.7-1.3c-0.5,0.6-0.9,1.3-1.6,1.9c-0.5,0.5-1.3,0.6-1.9,1
          		c-0.5,0.3-0.9,0.7-1.2,1.1c-0.4,0.7-0.7,1.5-1.1,2.2c-0.3,0.6-0.7,1.2-1.2,1.7c-0.3,0.3-0.8,0.5-1.3,0.5c-0.7,0.1-1-0.4-0.9-1.2
          		c0.2-0.1,0.5-0.2,0.7-0.2c0.8,0,1.1-0.5,1.4-1c0.5-0.9,1-1.9,1.4-2.8c0.5-1,1.4-1.6,2.5-1.7c0.8-0.1,1.2-0.7,1.6-1.3
          		c-0.6,0.1-1.1,0.2-1.6,0.1c-0.8-0.1-1.7-0.2-2.5-0.5c-1-0.3-1.7,0.2-2.4,0.7c-0.2,0.2-0.4,0.4-0.6,0.6c-0.7,0.9-1.7,1.1-2.8,1
          		c-0.5,0-0.8-0.4-0.8-1c0.1-0.1,0.2-0.1,0.3-0.2c0.1,0,0.1,0,0.1,0c0.9,0.3,1.7,0.1,2.3-0.7c1.1-1.3,2.4-1.7,4-1.5
          		c0.7,0.1,1.3,0.3,2,0.4c0.4,0,0.8,0,1.1-0.2c1-0.6,1.7-1.5,1.7-2.8c0-1.1-0.1-2.2,0-3.3c0.4-3,0.1-6,0.2-9
          		c0.1-4.2,0.1-8.3,0.2-12.5c0-2.5,0-5,0-7.6c0-0.2,0-0.5-0.1-0.7c-0.3-0.6-0.1-0.9,0.4-1.2c0-0.2,0-0.5,0-0.7c0-1.6,0-3.3,0-4.9
          		c0-2.2,0.1-4.3,0.1-6.5c0-0.3,0-0.6,0-0.9c-0.1-0.3-0.2-0.5-0.3-0.9c-0.2,0-0.4-0.1-0.6-0.1c-2.1,0-4.2,0-6.2,0.1
          		c-1.3,0-2.7,0.1-4,0.2c-0.8,0-0.9-0.1-1.1-0.8c-0.4-1.3-0.9-2.5-1.3-3.8c-0.5-1.5-1-3-1.5-4.5c-0.3-0.9-0.6-1.7-0.9-2.6
          		c-0.5-1.5-1-3-1.5-4.5c-0.1-0.2,0-0.5,0-0.8c0.3,0,0.5-0.1,0.7-0.1c1.3,0,2.6,0,3.9,0c0.5,0,1-0.1,1.5-0.2c0.2,0,0.4,0,0.6,0
          		c1.2,0.1,2.3,0.2,3.5,0.2c0.6,0,1.2-0.1,1.9-0.2c0.2,0,0.4,0,0.7,0c0.7,0.1,1.3,0.1,2,0.2c0.4,0,0.7,0.1,1.1,0.1
          		c0.6,0,1.3,0.1,1.9-0.2c0.6,0.2,1,0.2,1.2,0.2c0.5,0.1,1.1,0.3,1.6,0.3c1.2,0,2.4,0,3.6,0c0.2,0,0.4,0,0.6,0
          		c0.7,2.1,1.4,4.1,2.2,6.2c0.5,1.4,1.1,2.8,1.6,4.2c0.4,1.1,0.7,2.2,1.1,3.3c0.2,0.7,0.6,1,1.5,0.9c-0.1,0.5-0.2,0.8-0.3,1.2
          		c-0.1,0.4-0.5,0.5-0.9,0.5c-2.5,0.1-5.1,0.1-7.6,0.2c-0.9,0-1.8,0.2-2.8,0.2c-0.1,0.5-0.2,1-0.2,1.6c0,3.8,0,7.6,0,11.4
          		c0,0.3,0,0.6,0,0.9c0.1,0.1,0.2,0.2,0.3,0.3c0.4-0.2,0.8-0.3,1.2-0.5c0.3,0.8,0,1.4-0.5,1.9c-0.3,0-0.5,0-0.9,0c0,0.3,0,0.5,0,0.7
          		c0,4,0,8.1,0,12.1c0,5.1-0.1,10.2-0.2,15.3c0,0.2,0,0.5,0,0.7c0.1,0.1,0.2,0.2,0.4,0.3c0,0.4,0.1,0.8,0,1.1c-0.3,0.6,0,1.2,0.1,1.7
          		c0.3,1.1,0.8,2.2,1.7,3.1c0.6,0.6,1.3,1.1,2.2,1.3c1.4,0.4,2.8,0.1,4.2-0.2c1-0.2,2,0.1,2.8,0.6c1,0.6,2,1.4,3,2.1
          		c0.6,0.5,1.3,0.6,2,0.4C149.7,74.2,150,74.4,149.9,75.3z M130.3,17.4c-0.8-2.1-1.5-4.2-2.2-6.2c-1.4,0-2.8,0-4.2,0
          		c0.7,2.1,1.4,4.2,2,6.2C127.4,17.4,128.8,17.4,130.3,17.4z M118,11.4c0.7,2,1.4,3.9,2,5.8c0.1,0.3,0.3,0.5,0.6,0.5
          		c1.1-0.1,2.3-0.1,3.4-0.2c0.1,0,0.1-0.1,0.3-0.1c-0.8-2.1-1.4-4.2-2.3-6.2C120.6,11.2,119.3,11.3,118,11.4z M136.2,17.2
          		c0-0.2-0.1-0.4-0.1-0.5c-0.6-1.7-1.2-3.3-1.8-5c-0.1-0.4-0.3-0.7-0.7-0.6c-1.2,0-2.4,0-3.6,0c0.7,2.1,1.4,4.1,2.1,6.1
          		C133.4,17.2,134.7,17.2,136.2,17.2z M135.5,11c0.7,2.1,1.5,4.2,2.1,6.2c1.4,0,2.7,0,4.1,0c-0.8-2.1-1.5-4.2-2.3-6.2
          		C138.2,11,136.9,11,135.5,11z M117.6,9.9c1.4-0.2,2.7,0.2,4-0.3c-0.7-1.9-1.4-3.9-2-5.7c-1.4-0.1-2.7-0.1-4.1-0.2
          		C116.2,5.9,116.9,7.9,117.6,9.9z M121.5,3.9c0.6,2,1.3,3.8,1.8,5.7c1.4,0,2.8,0,4.3,0c-0.7-1.9-1.4-3.8-2.1-5.7
          		C124.2,3.9,122.9,3.9,121.5,3.9z M133.5,9.4c-0.7-1.9-1.3-3.6-1.9-5.4c-1.3,0-2.6,0-4.1,0c0.7,1.9,1.3,3.8,1.9,5.6
          		C130.9,9.6,132.1,9.5,133.5,9.4z M137,4.1c-1.3,0-2.6,0-3.9,0c0.7,1.9,1.3,3.7,1.9,5.4c1.4,0,2.7,0,4,0
          		C138.3,7.6,137.6,5.8,137,4.1z"/>
          </g>
          </svg>
        </div>
      </div>

        <div data-barba="container" data-barba-namespace="<?php echo $queried_object->name;?>">
          <?php include(TEMPLATEPATH . '/template-parts/elements/pre-header.php'); ?>
        <div class="wrap-header fade-in-new">
          <div class="qpc-container displayFlexcenter">

          <a id="page-logo" href="<?php bloginfo('url') ?>"
             title="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
              <img class="logo-desktop" src="<?php $custom_logo_id = get_theme_mod('custom_logo');
              $image = wp_get_attachment_image_src($custom_logo_id, 'banner-header-1920-550');
              echo $image[0]; ?>" alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
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
