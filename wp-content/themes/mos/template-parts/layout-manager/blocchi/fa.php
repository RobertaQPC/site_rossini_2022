<?php
    $gestione_blocco_fa = $blocco['gestione_blocco_fa'];
    if ($gestione_blocco_fa) :
        $blocco_fa_icona = $gestione_blocco_fa['blocco_fa_icona'];
        $blocco_fa_testo = $gestione_blocco_fa['blocco_fa_testo'];
        $blocco_fa_layout = $gestione_blocco_fa['blocco_fa_layout'];
?>
<div class="block-fa">
    <?php if ($blocco_fa_layout == 'icon_first') : ?>
    <?= $blocco_fa_icona ?>
    <?= $blocco_fa_testo ?>
    <?php elseif ($blocco_fa_layout == 'text_first') : ?>
        <?= $blocco_fa_testo ?>
        <?= $blocco_fa_icona ?>
    <?php endif; ?>
</div>
<?php endif; ?>
