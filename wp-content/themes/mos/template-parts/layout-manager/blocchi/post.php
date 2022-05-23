<?php
$gestione_blocco_post = $blocco['gestione_blocco_post'];
$posts = $gestione_blocco_post['blocco_post_gallery'];
$titolo_blocco_post = $gestione_blocco_post['blocco_post_titolo'];
?>
<div class="container block-post cont-swiper">
    <?php if ($titolo_blocco_post != '') : ?>
        <p class="h2"><?= $titolo_blocco_post ?></p>
    <?php endif; ?>
    <div class="swiper-button-next swiper-button-next2"></div>
    <div class="swiper-container swiper2">
        <div class="swiper-wrapper">

            <?php foreach ($posts as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>

                <div class="swiper-slide">
                    <?php if (has_post_thumbnail(get_the_ID())) : ?>
                    <div class="featured-image">
                        <a href="<?php the_permalink() ?>"
                           title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('thumbs-news-little') ?></a>
                    </div>
                    <?php endif; ?>
                    <h1 class="article-title news-home">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h1>
                    <div class="mc-description news-home">
                        <?php
                        $content = get_the_content();
                        $trimmed_content = wp_trim_words($content, 15, '<a class="excerpt" href="' . get_permalink() . '"> [...]</a>');
                        echo $trimmed_content; ?>
                    </div>
                    <a class="btnScheda" href="<?php the_permalink(); ?>">
                        <?php esc_html_e('Leggi tutto', 'mos-theme'); ?>
                    </a>
                </div>
            <?php endforeach; ?>

        </div><!-- swiper-container -->
        <div class="swiper-pagination swiper-pagination2 swiper-pagination-white"></div>
    </div><!-- swiper-wrapper -->
    <div class="swiper-button-prev swiper-button-prev2"></div>
</div>

<a class="btnSchedaPath" href="<?php echo site_url(); ?>/news">
    <?php esc_html_e('Tutte le news', 'mos-theme'); ?>
</a>
