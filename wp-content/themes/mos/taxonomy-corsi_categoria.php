 <?php
  /* uso l'header personalizzato */
  define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
  require('template-parts/header/archive-header.php');

  $currentTermID = get_queried_object_id();
  $currentTerm = get_queried_object();
  ?>


 <div class="qpc-container wrap-archive-products">
   <h1 class="article-title"><?= $currentTerm->name; ?>*<?= $currentTerm->name; ?>*<?= $currentTerm->name; ?> </h1>
     <div class="qpcRow button-group filters-button-group">
       <button class="btnScheda" data-filter="*">Tutti i corsi</button>
       <button class="btnScheda" data-filter=".integrative-e-affini">Integrative e affini</button>
       <button class="btnScheda" data-filter=".a-scelta">A scelta</button>
       <button class="btnScheda" data-filter=".base">Base</button>
       <button class="btnScheda" data-filter=".caratterizzante">Caratterizzante</button>
     </div>
   <?php

    $terms = get_terms(['taxonomy' => 'corsi_categoria', 'parent' => $currentTermID, 'orderby' => 'name' ]);
    if ($terms) { ?>

     <div class="qpcRow  isotope">
       <?php
        foreach ($terms as $term) {
          if ($term->parent == $currentTermID) {  ?>
           <div class="qpc-col-33 <?= str_replace(" ","-", strtolower(get_field("tipologia"))); ?>">
             <h3><?= $term->name ?></h3>
             <div class="news-home"><?= $term->description; ?></div>
             <a class="link" href="<?= get_term_link($term, "corsi_categoria") ?>"><?php esc_html_e('Approfondisci', 'mos-theme'); ?> </a>
           </div>
       <?php
          }
        } ?>
     </div>
   <?php
    } else { ?>
     <div class="qpcRow button-group filters-button-group">
       <button class="btnScheda" data-filter="*">Tutti i corsi</button>
       <button class="btnScheda" data-filter=".integrative-e-affini">Integrative e affini</button>
       <button class="btnScheda" data-filter=".a-scelta">A scelta</button>
       <button class="btnScheda" data-filter=".base">Base</button>
       <button class="btnScheda" data-filter=".caratterizzante">Caratterizzante</button>
     </div>
     <div class="qpcRow isotope">
     <?php
      $args = [
        'posts_per_page' => 50,
        'tax_query' => [
          [
            'taxonomy' => 'corsi_categoria',
            'field'    => 'term_id',
            'terms'    => $currentTermID
          ]
        ],
        'orderby'          => 'name',
        'order'            => 'ASC',
        'post_type'        => 'corsi',
      ];

      $the_query = new WP_Query($args);

      // The Loop
      if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
          $the_query->the_post();  ?>
         <div class="qpc-col-33 <?= str_replace(" ","-", strtolower(get_field("tipologia"))); ?>">
           <h3><?php the_title(); ?></h3>
           <a class="link" href="<?php the_permalink() ?>"><?php esc_html_e('Vai al corso', 'mos-theme'); ?> </a>
         </div><?php
        }
      }
      wp_reset_postdata(); ?>
      </div><?php
    } ?>
 </div>
 <?php get_footer(); ?>