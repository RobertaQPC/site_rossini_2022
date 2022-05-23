<?php
/*
 * Template Name: archivio calendario
 * Template Post Type: post, calendari_categoria
 // questo corrisponde a calendari/concerti-20-21/
 */
?>
<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('template-parts/header/full-header.php');
?>

<?php
$cat_id = get_queried_object_id();

$subcategories = (get_term_children($cat_id, 'calendari_categoria'));

if (empty($subcategories)) {
    require ("template-parts/taxonomy-calendari_listing.php");
} else {
    require ("template-parts/taxonomy-calendari_categoria_listing.php");
}
get_footer(); ?>
