<?php

/**
 * kenelle links Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'qpc-infografica' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'qpc-infografica';
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

if (have_rows('infografica')) : ?>
    <div class="qpcRow qpc-infografica qpc-trigger">
      <div class="qpc-container jc-sb">
        <?php while (have_rows('infografica')) : the_row(); ?>
            <div class="qpc-col">
                <span class="count" data-target="<?php the_sub_field('numero'); ?>"><?php the_sub_field('numero'); ?></span>
                <span><?php the_sub_field('testo'); ?></span>
            </div>
        <?php
        endwhile; ?>
      </div>
     </div>
    <?php
    endif; ?>
