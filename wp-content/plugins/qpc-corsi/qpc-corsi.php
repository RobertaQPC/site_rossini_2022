<?php

/*
Plugin Name: Qpc Corsi
Plugin URI: https://www.quartopianocomunicazione.it
Description: Gestione corsi qpc.
Author: Alessandro Moschetti QPC
Version: 1.0
Author URI: https://www.quartopianocomunicazione.it
*/

/**
 * Aggiungo i meta box per il post editing screen
 */

function qpc_corsi()
{

    // custom post types
    $labels = array(
        'name' => 'Corso',
        'singular_name' => 'corso',
        'menu_name' => 'Corsi',
        'all_items' => 'Tutti i corsi',
        'add_new' => 'Aggiungi',
        'add_new_item' => 'Aggiungi nuovo corso',
        'edit' => 'Modifica',
        'edit_item' => 'Modifica corso',
        'new_item' => 'Nuovo corso',
        'view' => 'Vista',
        'view_item' => 'Vista corso',
        'search_items' => 'Cerca corso',
        'not_found' => 'Nessun corso trovato',
        'not_found_in_trash' => 'Nessun corso trovato nel cestino',
        'parent' => 'Parent corso',
    );

    $supports = array(
        'title',
        'editor',
        'author',
        'thumbnail',
        'excerpt',
        'trackbacks',
        'custom-fields',
        'comments',
        'revisions',
        'page-attributes',
        'post-formats'

    );

    $args = array(
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'show_ui' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array('slug' => 'corso', 'with_front' => true),
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-media-audio',
        'supports' => $supports,
        'taxonomies' => array('corsi'),
        'show_in_rest' => true,

    );

    register_post_type('corsi', $args);

    //  Tassonomie custom
    $labels = array(
        "name" => "Categorie corsi",
        "label" => "Categorie corsi",
        "menu_name" => "Categorie",
        "all_items" => "Tutte le categorie",
        "edit_item" => "Modifica categoria",
        "view_item" => "vedi categoria",
        "update_item" => "Aggiorna categoria",
        "add_new_item" => "Aggiungi nuova categoria",
        "new_item_name" => "Nome nuova categoria ",
        "parent_item" => "Parent categoria",
        "parent_item_colon" => "Parent categoria:",
        "search_items" => "Cerca Categorie",
        "popular_items" => "Categorie popolari",
        "separate_items_with_commas" => "Separa le Categorie con una virgola",
        "add_or_remove_items" => "Aggiungi o rimuovi Categorie",
        "choose_from_most_used" => "Choose from the most used Categorie",
        "not_found" => "Nessuna Categoria trovata",
    );

    $args = array(
        "labels" => $labels,
        "hierarchical" => true,
        "label" => "Categorie corsi",
        "show_ui" => true,
        "query_var" => true,
        "rewrite" => array('slug' => 'corsi', 'with_front' => true),
        "show_admin_column" => true,
    );
    register_taxonomy("corsi_categoria", array("corsi"), $args);
}
add_action('init', 'qpc_corsi');



// SETUP CRON
add_action('wp', 'nettuno_schedule_cron');
function nettuno_schedule_cron()
{
    if (!wp_next_scheduled('nettuno_cron')) {
        wp_schedule_event(time(), 'daily', 'nettuno_cron');
    }
}

// the actual function
function nettuno_cron_function()
{
    // Cancella i vecchi log
    deleteOldLogs();

    /*  $corsi = callApiNettuno('corsiAfam');

    foreach ($corsi['corsiAfam'] as $corso) {
        insertUpdateCorsoAfam($corso);
    }
*/
    $corsi = array_merge(
        callApiNettuno('offerteFormative', 'tr'),
        callApiNettuno('offerteFormative', 'bn'),
        callApiNettuno('offerteFormative', 'po')
    );

    foreach ($corsi['offerteFormative'] as $corso) {
        insertUpdateOffertaFormativa($corso);
    }

    $corsi = callApiNettuno('corsiAfam');

    foreach ($corsi['corsiAfam'] as $corso) {
        insertUpdateCorsoAfam($corso);
    }

    /*  $discipline = callApiNettuno('discilineAfam');
    foreach ($discipline['discilineAfam'] as $disciplina) {
        insertUpdateDisciplina($disciplina);
    }

*/
    // File del log del cron corrente
    $log_filename = plugin_dir_path(__FILE__) . "log/nettuno.cron." . date('Y-m-d-h') . ".log";
    // Scrivi sul log
    $log = 'Nettuno Cron Worked - ' . date('r') . PHP_EOL . "-------------------------" . PHP_EOL;
    file_put_contents($log_filename, $log, FILE_APPEND);
}

// the CRON hook for firing function
add_action('nettuno_cron', 'nettuno_cron_function');
// Add admin menù page
add_action('admin_menu', 'register_nettuno_menu_page');
function register_nettuno_menu_page()
{
    add_menu_page('Import Nettuno', 'Import Nettuno', 'manage_options', 'nettuno-import', 'nettuno_import_admin', 'dashicons-database-import', 90);
}

function nettuno_import_admin(){
    echo "<div class='wrap'>";
    echo "<h1>Import Nettuno</h1>";
    nettuno_cron_function();
    echo "<p>loading... </p>";
    echo "</div>";
}

function deleteOldLogs()
{
    $path =  plugin_dir_path(__FILE__) . "log/";
    if ($handle = opendir($path)) {

        while (false !== ($file = readdir($handle))) {
            $filelastmodified = filemtime($path . $file);
            //24 hours in a day * 3600 seconds per hour
            if ((time() - $filelastmodified) > 24 * 3600 && pathinfo($path . $file, PATHINFO_EXTENSION) == 'log') {

                unlink($path . $file);
            }
        }

        closedir($handle);
    }
}



function callApiNettuno($params)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL            => 'https://registroelettronico.nettunopa.it/web_interface/api/srvData/' . $params,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING       => "",
        CURLOPT_MAXREDIRS      => 10,
        CURLOPT_TIMEOUT        => 30,
        CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST  => "GET",
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER     => array(
            "Content-Type: application/json",
            "cache-control: no-cache",
            "Api-Key: L|#i18*/@Fd[h>5+lU.;5j}-WN#61K"
        ),
    ));
    return executeGETcurl($curl);
}

function executeGETcurl($curl)
{

    $response = curl_exec($curl);
    $err      = curl_error($curl);
    curl_close($curl);
    if ($err) {
        return "cURL Error #:" . $err;
    } else {
        return json_decode($response, true);
    }
}

function insertUpdateCorsoAfam($corso)
{

    if ($corso['idlivello'] == 'tr' || $corso['idlivello'] == 'bn' || $corso['idlivello'] == 'po') {
        $term = get_term_by('name', $corso['descLivello'], 'corsi_categoria');

        if (!$term) {
            $term = wp_insert_term($corso['descLivello'], 'corsi_categoria');
        }
        $args = ['taxonomy' => 'corsi_categoria', 'parent' => $term->term_id, 'name' => $corso['descCorso'], "hide_empty" => false];
        $childTerm = get_terms($args);

        var_dump($corso);
        if (count($childTerm) == 0) $childTerm[0] = wp_insert_term($corso['descCorso'], 'corsi_categoria', ['parent' => $term->term_id]);

        update_field('idCorso', $corso['idCorso'], 'corsi_categoria_' . $childTerm[0]->term_id);
        update_field('reqSupplement', $corso['reqSupplement'], 'corsi_categoria_' . $childTerm[0]->term_id);
        update_field('programmaEsameAmmissione', $corso['programmaEsameAmmissione'], 'corsi_categoria_' . $childTerm[0]->term_id);
    }
}
function insertUpdateOffertaFormativa($corso)
{

    if ($corso['idlivello'] == 'tr' || $corso['idlivello'] == 'bn' || $corso['idlivello'] == 'po') {
        var_dump($corso);

        $term = get_term_by('name', $corso['descLivello'], 'corsi_categoria');

        if (!$term) {
            $term = wp_insert_term($corso['descLivello'], 'corsi_categoria');
        }
        $args = ['taxonomy' => 'corsi_categoria', 'parent' => $term->term_id, 'name' => $corso['descCorso'], "hide_empty" => false];
        $childTerm = get_terms($args);

        if (count($childTerm) == 0) $childTerm[0] = wp_insert_term($corso['descCorso'], 'corsi_categoria', ['parent' => $term->term_id]);

        update_field('idCorso', $corso['idCorso'], 'corsi_categoria_' . $childTerm[0]->term_id);


        if ($corso['idCorso'] !== null) {

            $postid = null;
            $args = array(
                'numberposts'    => -1,
                'post_type'      => 'corsi',
                'meta_key'       => 'idmateria',
                'meta_value'     => $corso['idMateria']
            );

            // query
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $postid = get_the_ID();
                }
            }
            wp_reset_query();
            // ITALIANO
            $post_array = array(
                'post_type'    => 'corsi',
                'post_status'  => 'publish',
                'post_title'   => $corso['descMateria']
            );



            if ($postid !== null) {
                $post_array['ID'] = $postid;
            }
   ///         $post_array['tax_input'] = array('corsi_categoria' => $childTerm[0]->term_id);
            $post_id = wp_insert_post($post_array);
            wp_set_post_terms($post_id, array($childTerm[0]->term_id), 'corsi_categoria', true);


            update_field('idMateria', $corso['idMateria'], $post_id);
            update_field('tipologia', $corso['tipologia'], $post_id);
            update_field('daanno', $corso['daanno'], $post_id);
            update_field('finoanno', $corso['finoanno'], $post_id);
            update_field('ore', $corso['ore'], $post_id);
            update_field('crediti', $corso['crediti'], $post_id);
        }
    }
}
