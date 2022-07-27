<?php

/**
 * accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion';
if (!empty($block['className'])) {
  $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
  $className .= ' align' . $block['align'];
}
// Block preview
if (!empty($block['data']['is_preview'])) { ?>
  <figure>
    <img src="https://placeimg.com/150/150/animals" alt="">
  </figure>
<?php }

$titoloVetrina = get_field('titolo_vetrina');
$sottotitoloVetrina = get_field('sottotitolo_vetrina');
$tipoContenuto = get_field('tipo_contenuto');

//var_dump($tipoContenuto);
//if ($tipoContenuto == 'faq') :
?>

<div class="wrap-accordion">
  <div class="wrap-row wp-block-group qpc-block-title">
    <h3 class=""><?= $titoloVetrina ?></h3>
    <?= $sottotitoloVetrina ?? ''  ?>
  </div>
  <div class="accordion-head-wrap">
    <?php $count_checked = 0; ?>
    <?php
    if (have_rows('blocco_accordion')) :
      while (have_rows('blocco_accordion')) : the_row();
        $count_checked++;
        $k = 0;
        $rand = rand(0, 100);
    ?>
        <div class="accordion-head">
          <input class="input-menu-accordion" type="radio" id="rd<?= $rand ?>_<?php echo $k += 1; ?>" name="rd">
          <label class="accordion-head-label" for="rd<?= $rand ?>_<?php echo $k++; ?>"><?php the_sub_field('titolo_fisarmonica'); ?></label>
          <div class="accordion-head-content">
            <?php the_sub_field('contenuto_fisarmonica'); ?>

            <?php
            if ($tipoContenuto == 'rassegna_stampa') :
              if (have_rows('rassegna_stampa_contenuto')) :  ?>

                  <?php while (have_rows('rassegna_stampa_contenuto')) : the_row();
                    $titoloRassegnaStampa = get_sub_field('titolo_rassegna_stampa');
                    $testataRassegnaStampa = get_sub_field('testata_rassegna_stampa');
                    $caricaPdf = get_sub_field('carica_pdf');
                    $date_string = get_sub_field( 'data_rassegna_stampa' );
                    $strtotime = DateTime::createFromFormat('Ymd', $date_string)->getTimestamp();
                  ?>
                  <div class="wrap-rassegna-stampa">
                    <div class=""><?= $titoloRassegnaStampa ?></div>
                    <div class=""><?= $testataRassegnaStampa ?></div>
                    <div class=""> <a href="<?= $caricaPdf ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/mos/images/pdf-icon.svg;" alt="<?php esc_html_e( 'Scarica la rassegna stampa in formato pdf', 'mos-theme' ); ?>" >  </a> </div>
                    <div class="calendario-template">
                      <div class="wrap-info-calendar">
                        <span><?php echo date_i18n("D", $strtotime); ?></span>
                        <span><?php echo date("d", $strtotime); ?></span>
                        <span><?php echo mb_strimwidth( date_i18n("F", $strtotime), 0, 3); ?></span>
                      </div>
                    </div>
                  </div>
              <?php
                  endwhile;
                endif;
              endif; ?>
          </div>
        </div>
    <?php
      endwhile;
    endif; ?>

  </div>
  <?php
  //endif;
  ?>
