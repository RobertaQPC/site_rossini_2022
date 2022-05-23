<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('template-parts/header/full-header.php');
?>
<div class="wrapper-404" id="page-content">
		<h1> <?php esc_html_e( 'Errore 404 :-( Pagina non trovata', 'mos-theme' ); ?></h1>
		<?php get_search_form(); ?>
	</div>
<?php get_footer(); ?>
