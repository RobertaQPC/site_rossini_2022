<?php
function gestione_riga($gestione_riga){
    // init
    $style_fields = array();
    $classes = array();
    $js = array();

    $gestione_riga_sfondo = $gestione_riga['gestione_riga_sfondo'];
    $gestione_riga_stile = $gestione_riga['gestione_riga_stile'];

    if ($gestione_riga_sfondo) :
        $gestione_riga_sfondo_url = $gestione_riga_sfondo['gestione_riga_sfondo_url'];
        $gestione_riga_sfondo_parallax = $gestione_riga_sfondo['gestione_riga_sfondo_parallax'];
        $gestione_riga_sfondo_posizione = $gestione_riga_sfondo['gestione_riga_sfondo_posizione'];
        $gestione_riga_sfondo_dimensione = $gestione_riga_sfondo['gestione_riga_sfondo_dimensione'];

        $style_fields['background-size'] = $gestione_riga_sfondo_dimensione;
        $style_fields['background-image'] = ($gestione_riga_sfondo_url == '') ? 'none' : "url('$gestione_riga_sfondo_url')";
        $style_fields['background-position'] = $gestione_riga_sfondo_posizione;
        $style_fields['background-repeat'] = 'no-repeat'; //DEFAULT
        $classes[] = 'row'; //DEFAULT
        if ($gestione_riga_sfondo_parallax != '')  $classes[] = 'parallax';
    endif;

    if ($gestione_riga_stile) :
        //margin auto
        if ($gestione_riga_stile['gestione_riga_stile_margin']['gestione_riga_stile_margin_auto']){
            $gestione_riga_stile['gestione_riga_stile_margin']['gestione_riga_stile_margin_right'] = 'auto';
            unset($gestione_riga_stile['gestione_riga_stile_margin']['gestione_riga_stile_margin_left']);
            unset($gestione_riga_stile['gestione_riga_stile_margin']['gestione_riga_stile_margin_auto']);
        }
        foreach ($gestione_riga_stile['gestione_riga_stile_margin'] as $i => $margin_value){
          if ($margin_value >= -100 && $margin_value!='auto')
            $gestione_riga_stile['gestione_riga_stile_margin'][$i] = $margin_value .'px';
        }
        $gestione_riga_stile_margin = $gestione_riga_stile['gestione_riga_stile_margin'];
        $gestione_riga_stile_padding = $gestione_riga_stile['gestione_riga_stile_padding'];
      //  $gestione_riga_stile_margin_css = str_replace('autopx', 'auto', implode("px ", $gestione_riga_stile_margin)."px");
        $gestione_riga_stile_margin_css = implode(" ", $gestione_riga_stile_margin);
        $gestione_riga_stile_padding_css = implode("px ", $gestione_riga_stile_padding)."px";
        $gestione_riga_stile_classe = $gestione_riga_stile['gestione_riga_stile_classe'];
        $gestione_riga_stile_js = $gestione_riga_stile['gestione_riga_stile_js'];
        $gestione_riga_stile_width = $gestione_riga_stile['gestione_riga_stile_width'];


        if ($gestione_riga_stile_margin_css != '') $style_fields['margin'] = $gestione_riga_stile_margin_css;
        if ($gestione_riga_stile_padding_css != '') $style_fields['padding'] = $gestione_riga_stile_padding_css;
        if ($gestione_riga_stile_width != '') $style_fields['width'] = $gestione_riga_stile_width.'%';

        if ($gestione_riga_stile_classe != '') $classes[] = $gestione_riga_stile['gestione_riga_stile_classe'];



        if ($gestione_riga_stile_js != '') {
            switch ($gestione_riga_stile_js) {
                case 'aos':
                    $classes[] = 'aos-item';
                    $js['data-aos'] = "fade-up";
                    break;
                default:
                    break;
            }

        }
    endif;

    return array('style_fields' => $style_fields, 'classes' => $classes, 'js' => $js);
}

function gestione_layout($gestione_layout){
    $numero_colonne = $gestione_layout['numero_colonne'];
    $layout_colonne = explode("-", $gestione_layout['layout_colonne']);
    return array('numero_colonne' => $numero_colonne, 'layout_colonne' => $layout_colonne);
}
