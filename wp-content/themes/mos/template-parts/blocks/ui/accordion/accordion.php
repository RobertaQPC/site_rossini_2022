<?php

/**
 * accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
 // Block preview
			if( !empty( $block['data']['is_preview'] ) ) { ?>
		    <figure>
		    	<img src="https://placeimg.com/150/150/animals" alt="">
		    </figure>
		<?php }




    if( have_rows('blocco_accordion') ): ?>
      <div class="accordion-head-wrap">
    <?php $count_checked = 0;?>
    <?php while( have_rows('blocco_accordion') ): the_row(); $count_checked++;
        $k = 0;
        $rand = rand(0,100);
        ?>
        <div class="accordion-head">
          <input type="radio" id="rd<?=$rand ?>_<?php echo $k+=1; ?>" name="rd"  checked="<?php if( $count_checked ==1 ){ echo "checked"; } ?>">
          <label class="accordion-head-label" for="rd<?=$rand ?>_<?php echo $k++; ?>"><?php the_sub_field('titolo_fisarmonica'); ?></label>
          <div class="accordion-head-content">
              <?php the_sub_field('contenuto_fisarmonica'); ?>
          </div>
        </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>
