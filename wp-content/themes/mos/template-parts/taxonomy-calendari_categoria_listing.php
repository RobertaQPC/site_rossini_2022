<div class="qpc-container wrap-archive-products">

<div class="qpcRow">
<?php
//$counter = 0;
if (!isset($cat_id)) {
    $cat_id = $cat_default->term_id;
    $subcategories = get_term_children($cat_id, 'calendari_categoria');

}

foreach ($subcategories as $subcategory) :
    $c = (get_term($subcategory, 'calendari_categoria'));
    if ($c->parent == $cat_id) :
        $parent = get_term($cat_id, 'calendari_categoria')->parent;
        if ($parent == 0) :

          $CategoriaDescrizione=$descrizione = get_field('descrizione_categoria', $term);
          $trimmed_content = wp_trim_words($CategoriaDescrizione, 15, '<a class="excerpt" href="'. get_permalink() .'"> [...]</a>');
          $size = 'thumbs-square-medium'; // (thumbnail, medium, large, full or custom size)
          $imgCategory = wp_get_attachment_image_src(get_field('categoria_immagine', $c), $size)[0];
          print_r(get_field('categoria_immagine', $subcategory));
          ?>



                         <div class="qpc-col-33">
                          <a href="<?php echo get_term_link($c->term_id, 'calendari_categoria'); ?>"><img src=" <?= $imgCategory; ?>" alt="" /></a> 
                           <h3><?php echo $c->name; ?></h3>
                           <div class="news-home"><?= $trimmed_content; ?></div>
                          <a class="btnScheda" href="<?php echo get_term_link($c->term_id, 'calendari_categoria'); ?>"><?php esc_html_e( 'Tutti  i concerti', 'mos-theme' ); ?> </a>
                         </div>

            <?php
            endif;
        endif;

endforeach; ?>
</div>
</div>
