<?php
$contenuto_tab = $blocco['contenuto_tab'];
$rand = rand(0,100);
?>
<div data-tabs class="qpc-tabs">

  <?php
  $j = 0;
  foreach ($contenuto_tab as $tab) : ?>
  <div class="qpc-tab">

  <input type="radio" name="tabgroup-<?=$rand ?>" <?php if($j == 0){echo 'checked="checked"';}?> id="qpc-tab<?=$rand ?>-<?php echo $j+=1 ?>"  />
  <label for="qpc-tab<?=$rand ?>-<?php echo $j ?>"><?= $tab['testo_scheda'] ?></label>
  <div class="tab__content">
    <?php echo $tab['contenuto_scheda'] ?>
  </div>
</div>

  <?php
  endforeach; ?>
</div>
