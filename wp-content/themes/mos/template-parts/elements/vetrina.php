<?php
$featured_posts = get_field('concerti_in_vetrina');
if( $featured_posts ): ?>
  <div class="wrap-row wp-block-group">
      <h2 class=""><?php esc_html_e( 'Prossimi concerti', 'mos-theme' ); ?></h2>
  </div>
  <?php include (TEMPLATEPATH . '/template-parts/elements/swiper-concerti.php' ); ?>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

<?php
$posts = get_field('correlati_news');

if( $posts ): ?>

    <div class="container-news">
        <div class="wrap-row wp-block-group">
            <h2 class=""><?php esc_html_e( 'Ultimi aggiornamenti', 'mos-theme' ); ?></h2>
        </div>
        <?php include (TEMPLATEPATH . '/template-parts/elements/swiper-news.php' ); ?>
    </div>

    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
