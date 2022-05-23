<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('template-parts/header/corsi-header.php');
?>
<div class="wrap-custom-post">
    <div class="qpc-container wrap-scheda-dett" id="wrap-custom-post">
        <h1 class="article-title"><?php the_title(); ?>*<?php the_title(); ?>*<?php the_title(); ?></h1>
        <?php 

        $fields = get_fields();

        if( $fields ): ?>
            <ul>
                <?php foreach( $fields as $name => $value ): ?>
                    <li><b><?php echo $name; ?></b> <?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>