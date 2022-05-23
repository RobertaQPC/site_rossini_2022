
<?php

$counter = 0;
$cat_default = get_term_by("name", "Linea Buono Due Volte", "prodotto_categoria");
if (!isset($cat_id)) {
    $cat_id = $cat_default->term_id;
    $subcategories = get_term_children($cat_id, 'prodotto_categoria');

}
foreach ($subcategories as $subcategory) :
    $c = (get_term($subcategory, 'prodotto_categoria'));
    if ($c->parent == $cat_id) :
        $parent = get_term($cat_id, 'prodotto_categoria')->parent;
        if ($parent == 0) : ?>
            <div  class="row row-shadow row-news aos-item aos-init aos-animate" data-aos="fade-up">
            <div class="swiper-container swiper1 swiper-container-horizontal col-lg-6 left-column <?php echo((++$counter % 2 == 1) ? 'order-md-1' : ''); ?>">

                <div class="swiper-wrapper">
                    <?php
                    $subsubcategories = get_term_children($subcategory, 'prodotto_categoria');
                    foreach ($subsubcategories as $subsubcategory) :
                        $subc = get_term($subsubcategory, 'prodotto_categoria');
                        if ($subc->parent == $subcategory):
                            $thumb = get_field("immagine_banner", $subc);
                            if (!$thumb)
                                $thumb = get_field("immagine_banner", $c);
                            ?>
                            <div class="swiper-slide ">
                             <div class="parallax-bg left-column" style="background:url(<?php echo $thumb['sizes']['featured-prodotto']; ?>) no-repeat center; opacity:<?php the_field ('opacity') ?>;" data-swiper-parallax="-23%">
                               <div class="wrap-box ">
                                   <h3 class="article-title">
                                       <a href="<?php echo get_term_link($subc, 'prodotto_categoria'); ?>"><?php echo $subc->name; ?></a>
                                   </h3>
                                   <a class="btnScheda"
                                      href="<?php echo get_term_link($subc, 'prodotto_categoria'); ?>"><?php esc_html_e("SCOPRI", "mos"); ?></a>
                               </div>
                             </div>

                            </div>

                        <?php
                        endif;
                    endforeach; ?>
                </div>
                <div class="swiper-pagination swiper-pagination1"></div>
            </div>
            <div class="col-lg-6  right-column col-taxonomy" style="border-bottom: 6px solid <?php the_field('colore_bordo', $c); ?>;">

                <div class="wrap-box" style="background: <?php the_field('colore_overlay', $c); ?>; ">
                    <div>
                        <h2 class="article-title"><?php echo $c->name; ?></h2>
                        <div><?php echo $c->description; ?></div>
                        <a class="btnScheda" href="<?php echo get_term_link($c->term_id, 'prodotto_categoria'); ?>"><?php esc_html_e("SCOPRI", "mos"); ?></a>
                    </div>
                </div>
            </div>
            </div><?php
        else :
            $args = array(
                'post_type' => 'prodotti',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'prodotto_categoria',
                        'field' => 'id',
                        'terms' => $subcategory
                    ),
                ),
                'posts_per_page' => -1
            );
            $the_query = new WP_Query($args);

            if ($the_query->have_posts()): ?>
                <div class="row row-shadow row-news aos-item aos-init aos-animate" data-aos="fade-up">
                    <div class="swiper-container swiper1 swiper-container-horizontal col-lg-6 <?php echo((++$counter % 2 == 1) ? 'order-md-1' : ''); ?>">
                        <div class="swiper-wrapper">
                            <?php
                            while ($the_query->have_posts()) :
                                $the_query->the_post();
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'featured-prodotto');
                                if (count($thumb) == 0)
                                    $thumb[0] = get_field("immagine_banner", $c)['sizes']['featured-prodotto'];
                                ?>
                                <div class="swiper-slide">
                                  <div class="parallax-bg left-column" style="background:url(<?php echo $thumb[0]; ?>) no-repeat center; opacity:<?php the_field ('opacity') ?>; " data-swiper-parallax="-23%">
                                    <div class="wrap-box">
                                        <h3 class="article-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <a class="btnScheda"
                                           href="<?php the_permalink(); ?>"><?php esc_html_e("SCOPRI", "mos"); ?></a>
                                    </div>
                                  </div>

                                </div>
                            <?php
                            endwhile; ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination1"></div>
                    </div>
                    <div class="col-lg-6 right-column col-taxonomy" style="border-bottom: 6px solid <?php the_field('colore_bordo', $c); ?>;">

                        <div class="wrap-box" style="background: <? the_field('colore_overlay', $c); ?>; ">
                            <div>
                                <h2 class="article-title"><?php echo $c->name; ?></h2>
                                <div><?php echo $c->description; ?></div>
                                <a class="btnScheda"
                                   href="<?php echo get_term_link($c, 'prodotto_categoria'); ?>"><?php esc_html_e("SCOPRI", "mos"); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endif;
        endif;
    endif;
endforeach;
