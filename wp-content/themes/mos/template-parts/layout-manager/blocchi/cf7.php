<?php
$gestione_blocco_fa = $blocco['gestione_blocco_cf7'];
if ($gestione_blocco_fa) :
    $blocco_cf7_titolo = $gestione_blocco_fa['blocco_cf7_titolo'];
    $blocco_cf7_shortcode = $gestione_blocco_fa['blocco_cf7_shortcode'];
    ?>
    <div class="block-cf7">
        <?php if ($blocco_cf7_titolo != '') : ?>
        <?= "<p class='h2'>$blocco_cf7_titolo</p>" ?>
        <?php endif; ?>
        <?= do_shortcode("$blocco_cf7_shortcode") ?>
    </div>
<?php endif; ?>
