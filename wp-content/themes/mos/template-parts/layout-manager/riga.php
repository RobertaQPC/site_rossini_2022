<?php include(TEMPLATEPATH . "/template-parts/layout-manager/layout-functions.php");
// check if the flexible content field has rows of data
if (have_rows('righe')) : ?>
    <div class="wrapper">
        <?php
        // loop through the rows of data
        while (have_rows('righe')) : the_row();
            $gestione_riga = get_sub_field('gestione_riga');

            if ($gestione_riga) :
                $assets_riga = gestione_riga($gestione_riga);

                /**
                 * TODO: gestione effetti JS
                 * TODO: parallasse CSS
                 */
                ?>
                <section
                        style="<?php  foreach ($assets_riga['style_fields'] as $property => $values) echo "$property: $values; "; ?>" <?php if ($assets_riga['classes']) echo "class='" . implode(" ", $assets_riga['classes']) . "'"; ?> <?php if ($assets_riga['js']) foreach ($assets_riga['js'] as $key => $value) echo "$key='$value'"; ?>>
                    <?php
                    $gestione_layout = get_sub_field('gestione_layout');
                    $gestione_colonne = get_sub_field('gestione_colonne');
                    if ($gestione_layout) :
                        $assets_colonne = gestione_layout($gestione_layout);
                        for ($i = 0; $i < $assets_colonne['numero_colonne']; $i++) : ?>
                            <div class="col-md-<?= $assets_colonne['layout_colonne'][$i] ?>">
                                <?php $nome_blocco_repeater = 'gestione_blocco_repeater_' . ($i + 1);
                                $$nome_blocco_repeater = ($gestione_colonne[$nome_blocco_repeater]);
                                if ($$nome_blocco_repeater) :
                                    $gestione_blocco_repeater = $$nome_blocco_repeater;

                                    foreach ($gestione_blocco_repeater as $blocco) :
                                      //var_dump($blocco);
                                        $colonna_tipo_blocco = $blocco['colonna_tipo_blocco'];
                                        if (file_exists(TEMPLATEPATH . '/template-parts/layout-manager/blocchi/' . $colonna_tipo_blocco . '.php'))
                                            require(TEMPLATEPATH . '/template-parts/layout-manager/blocchi/' . $colonna_tipo_blocco . '.php');
                                    endforeach;

                                endif; ?>
                            </div>
                        <?php
                        endfor;
                    endif;
                    ?>
                </section>
            <?php
            endif;

        endwhile; ?>
    </div>
<?php
endif;
?>
