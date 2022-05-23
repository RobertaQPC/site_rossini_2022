<?php
/*
Template Name: Gallery social
*/
?>

  <?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('header/full-header.php');
?>

<?php
require('elements/slider.php');
?>

    <div class="container" id="">
      <?php get_template_part('loop',  'page'); ?>

          <p class=""> Guarda gli album caricati dalla pagina ufficiale di <a style="color:#F03" target="_blank" href="https://www.facebook.com/pg/allaricercadelviaggio/photos/?ref=page_internal"><strong>Alla Ricerca del viaggio</strong></a> </p>
          <div id="plusgallery" data-userid="allaricercadelviaggio" data-credit="false" data-limit="80"  data-album-limit="70"  data-exclude="" data-type="facebook" data-access-token="245341035557973|CbjoMpTghnkwec8V9cceuTxK-Bc"></div>

      <?php require('elements/colonne.php'); ?>
    </div>

<?php get_footer(); ?>
