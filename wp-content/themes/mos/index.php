<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('template-parts/header/archive-header.php');
?>

<div class="qpc-container blog-container">

<div id="page-content-post" class="blog-content">
 <?php $i = 0; ?>
 <?php if (have_posts()):
   while (have_posts()) : the_post() ?>

   <?php
if($i == 0) {
 echo '<div class="qpcRow">';
}
?>
<div class="qpc-col-33">

     <article id="article-<?php the_ID() ?>" class="article">

       <div class="featured-image">
         <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('thumbs-square-medium') ?></a>
       </div>

       <div class="article-title news-home">
         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
       </div>
       <div class="mc-description news-home">
         <?php
         $content = get_the_content();
         $trimmed_content = wp_trim_words( $content, 15, '<a class="excerpt" href="'. get_permalink() .'"> [...]</a>' );
         echo $trimmed_content; ?>
       </div>
       <a class="btnScheda" href="<?php the_permalink(); ?>">
         <?php esc_html_e( 'Leggi tutto', 'mos-theme' ); ?>
       </a>
  </article>
 </div> <!--qpc-col-33  -->

 <?php
$i++;
if($i == 3) {
$i = 0;
echo '</div>';
}
?>
<?php endwhile; ?>
<?php endif ?>

<?php
if($i > 0) {
echo '</div>';
}
?>

  <?php comments_template(); ?>
</div>
<div class="blog-sidebar">
  <?php get_sidebar(); ?>
</div>
</div>
<?php echo qpc_numeric_posts_nav(); ?>
<?php get_footer(); ?>
