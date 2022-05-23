<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('template-parts/header/full-header.php');
?>
<div class="wrap-custom-post">
<div id="page-content-post">
	<?php get_template_part('loop', 'single'); ?>
	<div class="postNav">
		<span class="previous_post_link"><?php previous_post_link(); ?></span>
		<span class="next_post_link"><?php next_post_link(); ?></span>
	</div>
	<?php comments_template(); ?>
</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
