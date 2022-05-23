<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('template-parts/header/corsi-header.php');

$currentTermID = 0;
?>


<div class="qpc-container wrap-archive-products">
  <?php
  $terms = get_terms(['taxonomy' => 'corsi_categoria', 'parent' => $currentTermID, 'orderby' => 'name']);

  if ($terms) :
    foreach ($terms as $term) :

      $childrenTerms = get_terms(['taxonomy' => 'corsi_categoria', 'parent' => $term->term_id, 'orderby' => 'name']);
      if (count($childrenTerms) > 0) :
  ?>
        <h1 class="article-title"><?= $term->name; ?>*<?= $term->name; ?>*<?= $term->name; ?></h1>

        <div class="qpcRow">
          <?php

          foreach ($childrenTerms as $childTerm) : ?>
            <div class="qpc-col-33">
              <h3><?= $childTerm->name ?></h3>
              <div class="news-home"><?= $childTerm->description; ?></div>
              <a class="link" href="<?= get_term_link($childTerm, "corsi_categoria") ?>"><?php esc_html_e('Approfondisci', 'mos-theme'); ?> </a>
            </div>
          <?php

          endforeach; ?>
        </div>

        <div><a class="btn" href="<?= get_term_link($term, "corsi_categoria") ?>"><?php esc_html_e("Scopri tutti i corsi in {$term->name}", 'mos-theme'); ?> </a></div>
    <?php
      endif;
    endforeach; ?>
  <?php
  endif; ?>
</div>
<?php get_footer(); ?>