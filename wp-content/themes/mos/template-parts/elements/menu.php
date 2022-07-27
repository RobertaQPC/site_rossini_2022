<?php require ("overlay-menu-info.php"); ?>

<div class="button_container toggle">
   <span class="top"></span>
   <span class="middle"></span>
   <span class="bottom"></span>
  </div>
<div class="popout jc-sb displayFlexAiC">
  <div class="info-menu">
    <img src="<?php echo site_url(); ?>/wp-content/themes/mos/images/info-menu.svg" alt="">
  </div>
<?php wp_nav_menu( array( 'theme_location' => 'menu-qpc', 'menu_class' => 'menu-qpc-class' ) ); ?>
</div>
