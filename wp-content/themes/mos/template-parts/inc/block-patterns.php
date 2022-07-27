<?php
/**
 * QPC: Block Patterns
 *
 * @since QP 1.0
 */

/**
 *
 * @since QP 1.0
 *
 * @return void
 */

function qpc_accordion()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('qpc accordion'),
            'description'       => __('qpc accordion.'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/ui/accordion/accordion.php',
          //  'enqueue_script'    => get_template_directory_uri() . '/template-parts/inc/blocks/ui/accordion/js/accordion.js',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'accordion', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_accordion');


function qpc_gallery_blocks()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'qpc Gallery blocks',
            'title'             => __('qpc Gallery blocks'),
            'description'       => __('qpc Gallery blocks'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/related/gallery/index.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'gallery', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_gallery_blocks');

function qpc_infoNumber()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc Infografica',
            'title'             => __('qpc Infografica'),
            'description'       => __('qpc Infografica.'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/ui/infografica/infografica.php',
            'enqueue_script'    => get_template_directory_uri() . '/template-parts/inc/blocks/ui/infografica/js/infografica.js',
            'enqueue_style'    => get_template_directory_uri() . '/template-parts/inc/blocks/ui/infografica/css/app.css',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'infografica', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_infoNumber');

function qpc_newsRelated()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc Correlati',
            'title'             => __('qpc Correlati'),
            'description'       => __('qpc Correlati.'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/related/generic/index.php',
        //    'enqueue_script'    => get_template_directory_uri() . '/template-parts/inc/blocks/ui/infografica/js/infografica.js',
        //    'enqueue_style'    => get_template_directory_uri() . '/template-parts/inc/blocks/ui/infografica/css/app.css',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'related', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_newsRelated');

function qpc_swiper_filter()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc filtra resort in vetrina',
            'title'             => __('qpc filtra resort in vetrina'),
            'description'       => __('qpc filtra resort in vetrina.'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/related/swiper-filter/index.php',
            'enqueue_script'    => get_template_directory_uri() .'/template-parts/inc/blocks/related/swiper-filter/js/swiper-filter.js',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'related', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_swiper_filter');

function related_items()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc lista corsi in vetrina',
            'title'             => __('qpc lista corsi in vetrina'),
            'description'       => __('qpc lista corsi in vetrina.'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/related/related-items/index.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'related', 'ui' ),
        ));
    }
}
add_action('acf/init', 'related_items');

function qpc_icons()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc icone',
            'title'             => __('qpc icone'),
            'description'       => __('qpc icone'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/ui/icons/index.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'icons', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_icons');

function qpc_faq()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc gestione faq',
            'title'             => __('qpc gestione faq'),
            'description'       => __('qpc gestione faq'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/related/faq/index.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'camere', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_faq');

function qpc_faq_service()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc camere servizi',
            'title'             => __('qpc camere servizi'),
            'description'       => __('qpc camere servizi'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/related/camere/service.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'camere', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_faq_service');

function qpc_resort_grid()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'qpc elenco resort',
            'title'             => __('qpc elenco resort'),
            'description'       => __('qpc elenco resort'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Developer",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/inc/blocks/related/resort-grid/index.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'resort', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_resort_grid');
