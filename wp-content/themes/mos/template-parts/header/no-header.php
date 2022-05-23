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
  <div data-barba="container" data-barba-namespace="<?php echo $post->post_name;?>">
    <?php include(TEMPLATEPATH . '/template-parts/elements/pre-header.php'); ?>
    <div class="wrap-header fade-in-new">
      <div class="qpc-container displayFlexcenter">
        <a id="page-logo" href="<?php bloginfo('url') ?>"
           title="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
            <img class="logo-desktop" src="<?php $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            echo $image[0]; ?>" alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
            <img class="logo-mobile" src="<?php echo site_url(); ?>/wp-content/themes/mos/images/logo-ente-concerti.svg;"
                 alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
        </a>
          <?php include(TEMPLATEPATH . '/template-parts/elements/menu.php'); ?>
      </div>
      </div>

<div id="content-wrap">
