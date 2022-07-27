<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'qpc-icons-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'qpc-icons';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
 // Block preview
			if( !empty( $block['data']['is_preview'] ) ) { ?>
		    <figure>
		    	<img src="https://placeimg.com/150/150/animals.jpg" alt="">
		    </figure>
		<?php }


   if( have_rows('qpc_icone') ): ?>
        <?php while( have_rows('qpc_icone') ): the_row();
             $icon = get_sub_field('qpc_icon_moon');
             $titolIcona = get_sub_field('titolo_icona');
            ?>
            <div class="wrap-block-qpc-icon displayInlineFlexAiC">
              <span class="<?= $icon;?>"></span>
              <?php //var_dump($icon); ?>

              <?php if( !empty( $titolIcona ) ): ?><h3><?= $titolIcona ?></h3><?php endif; ?>
            </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    <?php endif; ?>
