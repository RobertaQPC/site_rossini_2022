<div class="container-pre-header qpc-container ">
  <div class="container displayFlexAiC jc-sb">
    <div class="icons-social">
     <a href="https://www.facebook.com/ConservatorioPS" target="_blank">
       <img src="<?php echo site_url(); ?>/wp-content/themes/mos/images/facebook-icon-white.svg" alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
     </a>
     <a href="https://www.facebook.com/ConservatorioPS" target="_blank">
       <img src="<?php echo site_url(); ?>/wp-content/themes/mos/images/instagram-icon-white.svg" alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
     </a>
    </div>
    <div class="displayFlexAiC">
      <?php
        wp_nav_menu( array( 'theme_location' => 'extra-menu', 'menu_class' => 'extra-menu-qpc-class' ) );
        do_action('wpml_add_language_selector');
      ?>
    </div>

 </div>

</div>
