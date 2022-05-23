<?php
$blocco_tax_titolo = $blocco['gestione_blocco_tax']['blocco_tax_titolo'];
$blocco_tax_gallery = $blocco['gestione_blocco_tax']['blocco_tax_gallery'];
?>
<div class="block-tax">
    <?php if ($blocco_tax_titolo != '') : ?>
        <p class="h2"><?= $blocco_tax_titolo ?></p>
    <?php endif; ?>
    <?php
    foreach ($blocco_tax_gallery as $tax) :
        $category = get_category($tax);
        $blocco_tax_nome = $tax->cat_name;
        $blocco_tax_descrizione = $tax->category_description;
        $blocco_tax_sottotitolo = get_field('categoria_sottotitolo', "{$tax->taxonomy}_{$tax->term_id}");
        $blocco_tax_immagine = get_field('categoria_immagine', "{$tax->taxonomy}_{$tax->term_id}"); ?>
        <section style="<?php if ($blocco_tax_immagine != '') echo "background: url('$blocco_tax_immagine') transparent no-repeat center center; background-size:cover;"?>">
            <h3 class="h2"><?=$blocco_tax_nome; ?></h3>
            <?php if ($blocco_tax_sottotitolo!='') : ?><h4 class="h2"><?=$blocco_tax_sottotitolo; ?></h4><?php endif; ?>
            <?php if ($blocco_tax_descrizione!='') : echo $blocco_tax_descrizione; endif; ?>
            <a class="btnScheda" href="<?=get_term_link($tax->term_id,"{$tax->taxonomy}") ?>"><?php _e('Scopri', 'mos'); ?></a>
        </section>
            <?php
    endforeach;
    ?>
</div>
