<?php
/*
 * Template Name: Custom Search
 * Ricerca su post_type viaggio e viaggio-di-nozze
 *
 */
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'header di default presente nella root
require('template-parts/header/header-viaggi.php');

$term = get_queried_object(); //rob

$args['post_type'] = get_query_var('post_type');

if (isset($_GET['date']) && $_GET['date'] != '') :
    $date = DateTime::createFromFormat('d/m/Y', $_GET['date']);
    $date_value = $date->format('Ymd');

    $meta_keys = $wpdb->get_results("SELECT meta_key FROM qpcPrefix17_postmeta WHERE meta_key LIKE 'date_disponibili_%_date_a' ORDER BY meta_key DESC");
    $metakey_index = array();
    foreach ($meta_keys as $meta_key):
        $metakey_index[] = intval(str_replace(array("date_disponibili_", "_date_a"), "", $meta_key->meta_key));
    endforeach;
    $metakey_max = max($metakey_index); // il numero massimo di date disponibili all'interno del repeater ACF

    $wheres = array();
    for ($i = 1; $i <= $metakey_max; $i++) :
        $wheres[] = " (mt1.meta_key LIKE 'date_disponibili_" . $i . "_date_a' AND CAST(mt1.meta_value AS DATE) <= '$date_value' AND mt2.meta_key LIKE 'date_disponibili_" . $i . "_date_r' and CAST(mt2.meta_value AS DATE) > '$date_value') ";
    endfor;
    $post__in = array();
    if (count($wheres) > 0) :
        $post_ids = $wpdb->get_results("SELECT mt1.post_id FROM qpcPrefix17_postmeta AS mt1 INNER JOIN  qpcPrefix17_postmeta AS mt2 ON mt1.post_id = mt2.post_id WHERE " . implode(" OR ", $wheres));

        foreach ($post_ids as $post_id):
            $post__in[] = $post_id->post_id;
        endforeach;
        $args['post__in'] = $post__in;
    endif;
endif;
if (isset($_GET['s']) && $_GET['s'] != '') :
    $args['tax_query'] = array(
        array(
            'taxonomy' => get_query_var('taxonomy'),
            'field' => 'slug',
            'terms' => get_query_var('s')
        ));
endif;

$args['posts_per_page'] = -1;
$args['order'] = 'DESC';
$args['orderby'] = 'date';

$the_query = new WP_Query($args);
?>

<section class="container">
    <div class="row row-news">
        <h1 class="title-style-theme-color title-style theme-color-text">
            <?php
            _e("Viaggi", "mos");
            if ($_GET['s'] != '') {
                _e(" in ", "mos");
                echo $_GET['s'];
            }
            if ($_GET['date'] != '') {
                _e(" con partenza dal ", "mos");
                echo $_GET['date'];
            } ?>
        </h1>
        <?php
        // include (TEMPLATEPATH . '/template-parts/elements/blocchi-search.php' );
        // show_search_results($the_query);
        switch ($the_query->post_count) {
            case 1:
                $col = "col-md-4";
                break;
            case 2:
                $col = "col-md-6";
                break;
            default:
                $col = "col-md-4";
                break;
        }
        if ($the_query->have_posts() && ((isset($_GET['s']) && $_GET['s'] != '')  || count($args['post__in']) > 0)):
            while ($the_query->have_posts()) :
                $the_query->the_post();
                $titolo_destinazione = get_field('titolo_destinazione');
                $correlata = get_field('copertina_libro_correlata');
                $size = 'thumbs-liste'; // (utilizzo la mia dimensione personalizzata)
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbs-news-little');
                $sizefull = 'full'; // (utilizzo la dimensione originale)
                ?>
                <div class="<?php echo $col ?>">
                    <div class="wrap-box">
                        <div class="img-container">
                            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>">
                                <?php
                                if (have_rows('fascia_sconto')):
                                    while (have_rows('fascia_sconto')): the_row(); ?>
                                        <div class="fascia-sconto"><?php echo get_sub_field("testo_sconto") ?>
                                            <span><?php echo get_sub_field("prezzo_sconto") ?></span></div>
                                        <div class="timbro-viaggio"><img
                                                    src="<?php echo get_sub_field("timbro_viaggio") ?>"></div>
                                    <?php
                                    endwhile;
                                endif;
                                ?>
                                <h3 class="article-title" title="<?php the_title_attribute() ?>">
                                    <?php the_title() ?>
                                </h3>
                                <img src="<?php echo $thumb['0']; ?>">
                            </a>
                        </div>
                        <p>Partenza: <strong class="disp"><?php the_field('giorni_notti') ?></strong></p>
                        <p>Disponibilità: <strong class="disp"><?php the_field('disponibilita') ?></strong></p>
                        <div class="container-btn-skew-wrap">
                            <div class="btn-skew-wrap">
                                <div class="btn-skew">
                                    <a href="<?php the_permalink() ?>"
                                       title="<?php the_title_attribute() ?>"><?php esc_html_e('Quota pacchetto', 'mos-theme'); ?>
                                        <span><?php the_field('price_doppia') ?> €</span></a>
                                </div>
                                <div class="calendar">
                                    <span><?php the_field('durata_viaggio') ?></span>
                                </div>
                                <span class="calendar-text"><?php esc_html_e('giorni', 'mos-theme'); ?></span>
                            </div><!-- btn-skew-wrap -->
                        </div><!-- container-btn-skew-wrap -->
                    </div><!-- wrap-box -->
                </div><!-- col-md-4 -->
            <?php
            endwhile;
            else :
                _e("Nessun risultato trovato", "mos");
        endif; ?>
    </div>
</section>
<?php get_footer(); ?>
