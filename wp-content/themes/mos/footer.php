</div>




  <div class="cont-box-newsletter">
   <div class="qpc-container">
    <div class="wrap-box-newsletter">
      <?php echo do_shortcode('[contact-form-7 id="166" title="Newsletter"]'); ?>
    </div>
    <img src="<?php echo site_url(); ?>/wp-content/themes/mos/images/loghi-partner.svg" alt="">

   </div>
  </div>



<footer  role="contentinfo" id="page-footer">

  <div class="container-pre-header">
    <div class="container qpc-container displayFlexAiC jc-sb">
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

<div class="qpc-container" id="footer-sidebar">
    <div class="qpcRow jc-sb ai-fs">
        <div class="qpc-col-25">
            <div id="footer-sidebar1">
                <?php
                if (is_active_sidebar('footer-sidebar-1')) {
                    dynamic_sidebar('footer-sidebar-1');
                }
                ?>
            </div>
        </div>
        <div class="qpc-col-25">
            <div id="footer-sidebar2">
                <?php
                if (is_active_sidebar('footer-sidebar-2')) {
                    dynamic_sidebar('footer-sidebar-2');
                }
                ?>
            </div>
        </div>
        <div class="qpc-col-25">
            <div id="footer-sidebar3">
                <?php
                if (is_active_sidebar('footer-sidebar-3')) {
                    dynamic_sidebar('footer-sidebar-3');
                }
                ?>
            </div>
        </div>
        <div class="qpc-col-25">
            <div id="footer-sidebar4">
                <?php
                if (is_active_sidebar('footer-sidebar-4')) {
                    dynamic_sidebar('footer-sidebar-4');
                }
                ?>
            </div>
        </div>
    </div><!-- chiudo qpcRow footer -->
</div>

  <div class="post-footer">
    <div class="qpc-container">
     <div class="qpcRow">
            <div class="qpc-col-50">
                <p class="footer-copyright">
                     <?= date('Y') ?> &copy;<?= get_bloginfo(); ?> - Tutti i diritti riservati
                </p>
            </div>
            <div class="qpc-col-50">
                <p class="credit">
                    <a href="https://www.quartopianocomunicazione.it">web agency</a>
                </p>
            </div>
        </div>
    </div>
  </div>

</footer>

<?php wp_footer() ?>

</div> <!-- chiudo barba-wrapper -->
</div> <!-- chiudo barba-container -->
<a href="#0" class="qpc-top qpc-top-icon">Top</a>

<?php the_field('script_aggiuntivi', 'option'); ?>
</body>
</html>
