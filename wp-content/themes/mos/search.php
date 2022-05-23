<?php
/* uso l'header personalizzato */
define('mos', false); // determino il tema e rimuovo l'hedear di dafault presente nella root
require('template-parts/header/full-header.php');
?>

<div class="wrap-custom-post">

<div id="page-content-post">
 <?php $i = 0; ?>
 <?php if (have_posts()):
   while (have_posts()) : the_post() ?>

   <?php
if($i == 0) {
 echo '<div class="row">';
}
?>
<div class="col-md-4 aos-item" data-aos="fade-up">

     <article id="article-<?php the_ID() ?>" class="article">

     <div class="content">
       <div class="featured-image">
         <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('thumbs-news-home') ?></a>
       </div>
       <div class="content-overlay"></div>
       <div class="content-details fadeIn-top">
       <h1 class="article-title news-home">
         <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
       </h1>
       <div class="mc-description news-home">
         <?php
         $content = get_the_content();
         $trimmed_content = wp_trim_words( $content, 15, '<a class="excerpt" href="'. get_permalink() .'"> [...]</a>' );
         echo $trimmed_content; ?>
       </div>
       <a class="btnScheda" href="<?php the_permalink(); ?>">
         <?php esc_html_e( 'Leggi tutto', 'mos-theme' ); ?>
       </a>
     </div><!-- content-details fadeIn-top -->
    </div><!-- content -->
  </article>
 </div> <!--col-md-4  -->

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
<?php get_sidebar(); ?>
</div>
<?php echo qpc_numeric_posts_nav(); ?>
<?php get_footer(); ?>
