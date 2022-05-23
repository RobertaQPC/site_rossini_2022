</div>




  <div class="cont-box-newsletter">
    <div class="wrap-box-newsletter">
      <?php echo do_shortcode('[contact-form-7 id="166" title="Newsletter"]'); ?>
    </div>
  </div>



<footer  role="contentinfo" id="page-footer">

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
                    All rights reserved <?= date('Y') ?> &copy;<?= get_bloginfo(); ?> - Tutti i diritti riservati
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
