<?php
/*
Template Name: Pagina faq
*/
?>

<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('header/full-header.php');
?>


<div class="container">


  <h1 class="title-style-theme-color title-style theme-color-text">
    <?php if(!is_singular()): ?>
      <?php the_permalink() ?>
    <?php endif; the_title() ?>
  </h1>

  <?php get_template_part('loop',  'page'); ?>

</div><!-- container -->

<?php if( have_rows('tour_lista_nozze') ):

while( have_rows('tour_lista_nozze') ): the_row();

  // vars
  $background_image = get_sub_field('background_image');
  $upload_pdf = get_sub_field('upload_pdf');

  ?>
<div class="identikit-section" style=" background: url('<?php the_sub_field('background_image'); ?>') no-repeat top center; background-size: cover;">

  <div class="container" id="">

    <h1 class="title-style-theme-color title-style ">
      <?php if(!is_singular()): ?>
        <?php the_permalink() ?>
      <?php endif; the_title() ?>
      <span class="subtitle"><?php the_field ('sotto-titolo') ?></span>

    </h1>

    <div id="accordion">
      <?php if( have_rows('add_tappa') ): ?>

        <?php while( have_rows('add_tappa') ): the_row();
          $titolo_tappa = get_sub_field('titolo_tappa');
          $tappa = get_sub_field('tappa');
          ?>

          <h3><?php echo $titolo_tappa; ?></h3>
          <div>
            <p><?php echo $tappa; ?></p>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>

    </div><!-- accordion -->

  </div><!-- container -->

</div><!-- identikit-section -->
<div class="bottom-bg"></div>
<?php endwhile; ?>
<?php endif; ?>



<?php get_footer(); ?>
