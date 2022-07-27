<?php
/*
 * Template Name: archivio Lista calendario
 * Template Post Type: post, calendari_categoria
 */
 ?>
 <?php
 /* uso l'header personalizzato */
 define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
 require('template-parts/header/archive-header.php');

 ?>


 <div class="qpc-container wrap-archive-products">
   <div class="wrap-medium">
      <?php the_field('intro_description_archive_products', 'option'); ?>
   </div>

 <div class="qpcRow">

<?php
  $terms = get_terms(array(
        'taxonomy' => 'calendari_categoria',
        'hide_empty'=> '0',
        'orderby' => 'calendari_categoria',
      ));


  foreach ($terms as $term) {
      if ($term->parent==0) {
          $taxonomy_name="calendari_categoria";
          $childrens = get_term_children($term->term_id, "calendari_categoria");
          $nomeCategoriaAttuale=$term->name;
          $CategoriaDescrizione=$descrizione = get_field('descrizione_categoria', $term);
          $trimmed_content = wp_trim_words($CategoriaDescrizione, 15, '<a class="excerpt" href="'. get_permalink() .'"> [...]</a>');
          $size = 'thumbs-square-medium'; // (thumbnail, medium, large, full or custom size)
          $imgCategory = wp_get_attachment_image_src(get_field('categoria_immagine', $term), $size);
          //var_dump($size);
          ?>



         <div class="qpc-col-33">
          <a href="<?= get_term_link($term, $taxonomy_name) ?>"><img src=" <?= $imgCategory[0] ?? '' ?>"/></a>   
           <h3><?= $nomeCategoriaAttuale; ?></h3>
           <div class="news-home"><?= $trimmed_content; ?></div>
          <a class="btnScheda" href="<?= get_term_link($term, $taxonomy_name) ?>"><?php esc_html_e( 'Tutti  i concerti', 'mos-theme' ); ?> </a>
         </div>

    <?php
      }
  }?>
 </div>
</div>

<?php get_footer(); ?>
