<?php

/*
Plugin Name: Qpc calendario concerti
Plugin URI: https://www.quartopianocomunicazione.it
Description: Gestione calendario concerti qpc.
Author: Alessandro Moschetti QPC
Version: 1.0
Author URI: https://www.quartopianocomunicazione.it
*/

/**
 * Aggiungo i meta box per il post editing screen
 */

 function qpc_calendari(){

     // custom post types
     $labels = array(
         'name' => 'Calendario',
         'singular_name' => 'calendario',
         'menu_name' => 'calendari',
         'all_items' => 'Tutti i calendari',
         'add_new' => 'Aggiungi',
         'add_new_item' => 'Aggiungi nuovo calendario',
         'edit' => 'Modifica',
         'edit_item' => 'Modifica calendario',
         'new_item' => 'Nuovo calendario',
         'view' => 'Vista',
         'view_item' => 'Vista calendario',
         'search_items' => 'Cerca calendario',
         'not_found' => 'Nessun calendario trovato',
         'not_found_in_trash' => 'Nessun calendario trovato nel cestino',
         'parent' => 'Parent calendario',
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
         'rewrite' => array( 'slug' => 'calendari', 'with_front' => true ),
         'query_var' => true,
         'menu_position' => 5,
         'menu_icon' => 'dashicons-calendar-alt',
         'supports' => $supports,
         'taxonomies' => array( 'calendari' ),
         'show_in_rest' => true,

     );

     register_post_type( 'calendario', $args );

 		//  Tassonomie custom
     $labels = array(
         "name" => "Categorie calendari",
         "label" => "Categorie calendari",
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
         "label" => "Categorie calendari",
         "show_ui" => true,
         "query_var" => true,
         "rewrite" => array( 'slug' => 'concerti', 'with_front' => true ),
         "show_admin_column" => true,
     );
     register_taxonomy( "calendari_categoria", array( "calendario" ), $args );

 }
 add_action( 'init', 'qpc_calendari' );
