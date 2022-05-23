<?php
$contenuto_accordion = $blocco['contenuto_accordion'];
$rand = rand(0,100);

?>
<div class="accordion-head-wrap">
    <?php
    $k = 0;
    foreach ($contenuto_accordion as $accordion) :
        ?>
      <div class="accordion-head">
        <input type="radio" id="rd<?=$rand ?>_<?php echo $k+=1; ?>" name="rd<?=$rand ?>">
        <label class="accordion-head-label" for="rd<?=$rand ?>_<?php echo $k++; ?>"><?= $accordion['titolo_fisarmonica'] ?></label>
        <div class="accordion-head-content">
            <?= $accordion['contenuto_fisarmonica'] ?>
        </div>
      </div>
    <?php
    endforeach; ?>
</div>
