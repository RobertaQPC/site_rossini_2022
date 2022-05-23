<?php
$gestione_blocco_swiper = $blocco['gestione_blocco_swiper'];
if ($gestione_blocco_swiper):
    $blocco_swiper_altezza = $gestione_blocco_swiper['blocco_swiper_altezza'];
    $blocco_swiper_opacita = $gestione_blocco_swiper['blocco_swiper_opacita'];
    $blocco_swiper_slider = $gestione_blocco_swiper['blocco_swiper_slider'];
    ?>
    <div class="block-swiper">
        <!-- modificato lo width_rowr in maniera che prenda le immagini di background -->
        <div class="swiper-container swiper1 swiper-home" style="height:<?= $blocco_swiper_altezza ?>">
            <div class="swiper-wrapper">
                <!--<div id="retino"></div>-->
                <?php
                foreach ($blocco_swiper_slider as $slider) :
                    // vars
                    $img_background = $slider['blocco_swiper_slider_immagine'];
                    $title = $slider['blocco_swiper_slider_titolo'];
                    $subtitle = $slider['blocco_swiper_slider_sottotitolo'];
                    $calltoaction = $slider['blocco_swiper_calltoaction'];
                    ?>
                    <div class="swiper-slide">
                        <div class="parallax-bg"
                             style="background:url(<?= $img_background ?>) no-repeat center; opacity:<?= $blocco_swiper_opacita ?>; "
                             data-swiper-parallax="-23%">
                            <div class="wrap-text">
                                <div class="title" data-swiper-parallax="-300"
                                     data-swiper-parallax-opacity="0"><?php echo $title; ?></div>
                                <div class="subtitle" data-swiper-parallax="-200"><?php echo $subtitle; ?></div>
                                <?php if (trim(implode('', $calltoaction))!='') : ?>
                                <a class="btnScheda"
                                   href="<?= $calltoaction['blocco_swiper_calltoaction_link'] ?>"><?= $calltoaction['blocco_swiper_calltoaction_testo'] ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination1 swiper-pagination-white"></div>
            <!-- Add Navigation -->
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-button-next swiper-button-white"></div>
        </div>

    </div>
<?php endif; ?>
