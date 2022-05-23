<?php

// check if the flexible content field has rows of data
if( have_rows('righe_dinamiche') ):

 	// loop through the rows of data
    while ( have_rows('righe_dinamiche') ) : the_row();

		// check current row layout
        if( get_row_layout() == 'aggiungi_riga' ):

        	colonne();

        endif;

    endwhile;

endif;


function colonne(){

// verifico il campo contenitore
//print "123";
if( have_rows('colonne_dinamiche') ):

 // faccio partire il loop
while ( have_rows('colonne_dinamiche') ) : the_row();

$classe_extra = get_sub_field('classe_extra');

//***************
//lettura campo gruppo
if( have_rows('colonne_dinamiche_gruppo') ):

     // faccio partire il loop per gli stili delle tabele
    while ( have_rows('colonne_dinamiche_gruppo') ) : the_row();

    $width_row = get_sub_field('width_row');
    $align_center_image = get_sub_field('align_center_image');
    $display_row = get_sub_field('display_row');


          if( have_rows('padding') ):

            // gestisco il gruppo della gestione padding
            while ( have_rows('padding') ) : the_row();

             $padding_top = get_sub_field('padding_top');
             $padding_left = get_sub_field('padding_left');
             $padding_bottom = get_sub_field('padding_bottom');
             $padding_right = get_sub_field('padding_right');

              endwhile;
            endif;

          if( have_rows('margin') ):

            // gestisco il gruppo della gestione padding
            while ( have_rows('margin') ) : the_row();

             $margin_top = get_sub_field('margin_top');
             $margin_bottom = get_sub_field('margin_bottom');

             endwhile;
            endif;

                  if( have_rows('background') ):

                    // gestisco il gruppo della gestione background
                    while ( have_rows('background') ) : the_row();

              $background_image_row = get_sub_field('background_image_row');
              $background_color_row = get_sub_field('background_color_row');
              $background_image_position_row = get_sub_field('background_image_position_row');
              $background_size_image_row = get_sub_field('background_size_image_row');
              $parallasse = get_sub_field('parallasse');


              endwhile;
            endif;

      endwhile;
    endif;

if( have_rows('colonne_dinamiche_repeater') ):
$rows = get_field('repeater_field_name' ); // get all the rows
$arTesto=array();

//echo "<div class=\"row\">{$num}</div>";
while( have_rows('colonne_dinamiche_repeater') ): the_row();
  //echo "<div class=\"row\">{$num}</div>";
		$testo = get_sub_field('colonne_dinamiche_testo');
    $arTesto[]=$testo;
	endwhile;

  switch (count($arTesto)) {
    case 1:
      $col="col-md-12";
      break;
    case 2:
      $col="col-md-6";
      break;
    case 3:
      $col="col-md-4";
      break;
    case 4:
      $col="col-md-3";
      break;
    case 5:
      $col="col-md-2";
      break;
    case 6:
      $col="col-md-2";
      break;
    default:
      $col="col-md-12";
      break;
  }
echo
'<div class="wrap-row" style=" background: url('.$background_image_row.') '.$background_color_row.' '.$parallasse.' '.$background_image_position_row.'  no-repeat; background-size:'.$background_size_image_row.'">
<div class="row flex '.$display_row.' '.$align_center_image.' '.$classe_extra.'" style=" background:'.$background_color_row.'; width:'.$width_row.'%; margin:'.$margin_top.'px auto '.$margin_bottom.'px auto; padding-left:'.$padding_left.'px; padding-top:'.$padding_top.'px; padding-bottom:'.$padding_bottom.'px; padding-right:'.$padding_right.'px;" >';
foreach($arTesto as $testo) {

  echo '<div class="'.$col.'"> ' ;
  echo ''.$testo.'';
  echo '</div>';

  }
  echo'
  </div>
  </div>';

 endif;
endwhile;

else :
// nessun layout trovato (gestire in futuro)
endif;
}
?>
