<?php
if (!isset($cat_id)) {
    $cat_default = get_term_by("name", "Linea Buono Due Volte", "prodotto_categoria");
    $cat_id = $cat_default->term_id;
    $subcategories = (get_term_children($cat_id, 'prodotto_categoria'));

}
$args = (array(
    'post_type' => 'prodotti',
    'tax_query' => array(
        array(
            'taxonomy' => 'prodotto_categoria',
            'field' => 'id',
            'terms' => $cat_id
        ),
    ),
    'posts_per_page' => -1
));

$the_query = new WP_Query($args);



if ($the_query->have_posts()):
    $counter = 0;

    while ($the_query->have_posts()) :
        $the_query->the_post();
        $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'featured-prodotto');
        $bg_header_url = wp_get_attachment_image_src(get_post_thumbnail_id($the_query->term_id), 'featured-prodotto')[0];

        ?>
        <div  class="row row-shadow row-news aos-item aos-init aos-animate" data-aos="fade-up">
          <div class="col-lg-6 left-column <?php echo((++$counter % 2 == 1) ? 'order-md-1' : '');?>" style="background: url('<?php echo $bg_header_url;?>' ">

            </div>
            <div class="col-lg-6 right-column">
                <div class="wrap-box">
                    <div>
                        <h3 class="article-title" title="<?php the_title_attribute() ?>">
                            <a href="<?php the_permalink() ?>"
                               title="<?php the_title_attribute() ?>"><?php the_title() ?></a>
                        </h3>
                        <h6><?php the_field("sottotitolo"); ?></h6>
                        <a class="btnScheda" href="<?php the_permalink(); ?>"><?php esc_html_e("SCOPRI", "mos"); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    endwhile;
endif;
