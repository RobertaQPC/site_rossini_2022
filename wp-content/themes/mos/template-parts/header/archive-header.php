<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes() ?>><!--<![endif]-->
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
<?php the_field('Tracciamento_tag_body', 'option'); ?>

<div data-barba="wrapper">
  <div class="loading-container">
     <div class="loading-screen">
     </div>
   </div>

  <div data-barba="container" data-barba-namespace="<?php post_type_archive_title(); ?>">
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
  background-color:<?php the_field ('colore_sfondo', 'option') ?> ;
  z-index: 0;
  opacity:  <?php the_field ('opacita', 'option') ?>;
  mix-blend-mode: multiply;
}


</style>

<?php
$bg_header_url = wp_get_attachment_image_src(get_field('immagine_banner', 'option'), 'banner-header-1920-400')[0];
$colore_heading = get_field('colore_heading', 'option');
$heading = get_field('heading', 'option');
$colore_sotto_titolo = get_field('colore-sotto-titolo', 'option');
$sotto_titolo = get_field('sotto-titolo', 'option');
?>
<header id="header" class="bgHeader  <?php echo(get_field('altezza_header') == '' ? 'header-medium-heigth' : get_field('altezza_header')); ?> " style="background: url('<?php  echo $bg_header_url; ?>') <?php the_field('parallasse_header') ?> <?php the_field('background_image_position_row') ?> ">
<div class="titleHome">

      <?php if ( is_archive(  )  ) : ?>
        <span style="color:<?=$colore_heading ?>  "><?=$heading ?></span>
        <?php if( !empty( $sotto_titolo ) ): ?>
          <h3 style="color:  <?=$colore_sotto_titolo ?>"><?=$sotto_titolo ?></h3>
        <?php endif; ?>
    <?php else : ?>
      <span style="color:<?=$colore_heading ?>  "><?php esc_html_e( 'News', 'mos-theme' ); ?></span>
      <?php if( !empty( $sotto_titolo ) ): ?>
        <h3 style="color:  <?=$colore_sotto_titolo ?>"><?=$sotto_titolo ?></h3>
      <?php endif; ?>
    <?php endif; ?>
</div>

</header>

<?php echo qpc_breadcrumb(); ?>

<div id="content-wrap">
