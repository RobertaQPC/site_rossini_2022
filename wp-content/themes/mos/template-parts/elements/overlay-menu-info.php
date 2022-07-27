
<div class="popup-menu-info">
  <svg version="1.1" id="Livello_1" class="icon-close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 83 83" style="enable-background:new 0 0 83 83;" xml:space="preserve">
  	<g id="Raggruppa_1786" transform="translate(-56 -58)">
  		<circle id="Ellisse_53" class="st0" cx="97.5" cy="99.5" r="40.5" />
  		<polygon class="st1" points="111.5,110.8 99.3,98.6 111.2,86.7 109.8,85.3 97.9,97.2 86,85.3 84.6,86.7 96.5,98.6 84.3,110.8
  			85.7,112.2 97.9,100 110.1,112.2 	" />
  	</g>
  </svg>

  <div class="popup-menu-info-container">
    <div class="tag">
      <h3><?php esc_html_e( 'Collegamenti rapidi', 'mos-theme' ); ?></h3>
      <?php if( have_rows('quick_info','option') ): ?>
        <ul class="quick-info-wrap">
        <?php while( have_rows('quick_info','option') ): the_row();
              $quickInfo = get_sub_field('quick_info_label','option');
              if( $quickInfo ):
                  $quickInfoUrl = $quickInfo['url'];
                  $quickInfoTitle = $quickInfo['title'];
                  $quickInfoTarget = $quickInfo['target'] ? $quickInfo['target'] : '_self';
                  ?>
            <li>
              <a class="cta-button cta-button-colored cta-button-uppercase" href="<?php echo esc_url( $quickInfoUrl ); ?>" target="<?php echo esc_attr( $quickInfoTarget ); ?>"><?php echo esc_html( $quickInfoTitle ); ?></a>

            </li>
              <?php endif; ?>
        <?php endwhile; ?>
        </ul>
   <?php endif; ?>
    </div>
    <div class="col-sx displayFlexAiC jc-c">
      <?php wp_nav_menu( array( 'theme_location' => 'info-menu', 'menu_class' => 'info-menu-class' ) ); ?>
    </div>
    <div class="col-ds">
      <h2><?php esc_html_e( 'Informazioni utili', 'mos-theme' ); ?></h2>
      <?php the_field('informazioni_utili', 'option'); ?>
    </div>
  </div>
</div>
