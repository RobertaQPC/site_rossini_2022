<?php
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts()
{
    wp_register_script('global', get_bloginfo('template_url') . '/dist/app.js', array(), rand(111, 9999), true);
    wp_enqueue_script('global');

    wp_enqueue_style('custom', get_bloginfo('template_url') . '/dist/style.css', array(), rand(111, 9999));
}


//inserisco il taso per i blocchi riutilizzabili
add_action( 'admin_menu', 'linked_url' );
function linked_url() {
add_menu_page( 'linked_url', 'Reusable Blocks', 'read', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}

// con questo rimuovo il messaggio di errore dei nuovi blocchi nella sezione widget
//remove_filter( 'admin_head', 'wp_check_widget_editor_deps' );

// disabilito il nuovo block editor della sezione widget
function remove_block_widget() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'remove_block_widget' );


add_filter( 'wp_lazy_loading_enabled', '__return_false' );

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
                    'role'          => "Titolare",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/blocks/ui/accordion/accordion.php',
            'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/ui/accordion/js/accordion.js',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'accordion', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_accordion');

function qpc_swiper_blocks()
{
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        acf_register_block_type(array(
            'name'              => 'Swiper gallery',
            'title'             => __('Swiper gallery'),
            'description'       => __('Gallery'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Titolare",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/blocks/ui/swiper-gallery/swiper-block-gallery.php',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'gallery', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_swiper_blocks');

function qpc_infoNumber()
{

    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'Infografica',
            'title'             => __('Infografica'),
            'description'       => __('Infografica.'),
            'example'           => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonial'   => "<h1>Compila il blocco...</h1>",
                    'author'        => "Alessandro Moschetti",
                    'role'          => "Titolare",
                    'is_preview'    => true
                )
            )
        ),
            'render_template'   => get_template_directory() . '/template-parts/blocks/ui/infografica/infografica.php',
            'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/ui/infografica/js/infografica.js',
            'enqueue_style'    => get_template_directory_uri() . '/template-parts/blocks/ui/infografica/css/app.css',
            'category'          => 'layout',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'infografica', 'ui' ),
        ));
    }
}
add_action('acf/init', 'qpc_infoNumber');


 // PHP inserita solo per colorazione sintassi
add_filter('login_errors', 'sam_error_message');
function sam_error_message($error)
{
    // Controllo la presenza di un errore
    $pos = strpos($error, 'incorrect');

    if (is_int($pos)) {
        // Creo un messaggio di errore generale
        $error = "Informazioni sbagliate";
    }
    return $error;
}

// Richiamo la function della briciola
require get_template_directory() . '/breadcrumb.php';

// Paginazione
function qpc_numeric_posts_nav()
{
    if (is_singular()) {
        return;
    }

    global $wp_query;

    /** Stoppo l'esecuzione se ho solo 1 pagina */
    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);

    /** Aggiungo la pagina nell'array */
    if ($paged >= 1) {
        $links[] = $paged;
    }

    /** Aggiungo le pagine attorno nell'array corente */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if (get_previous_posts_link()) {
        printf('<li>%s</li>' . "\n", get_previous_posts_link());
    }

    /** Link alla prima pagina, aggiungo i dot se necessario */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');

        if (!in_array(2, $links)) {
            echo '<li>…</li>';
        }
    }

    /** Link alla pagina corrente */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link all'ultima pagina */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) {
            echo '<li>…</li>' . "\n";
        }

        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link()) {
        printf('<li>%s</li>' . "\n", get_next_posts_link());
    }

    echo '</ul></div>' . "\n";
}

/**
 * Check Mime Types
 */
function svgs_upload_check( $checked, $file, $filename, $mimes ) {

	if ( ! $checked['type'] ) {

		$check_filetype		= wp_check_filetype( $filename, $mimes );
		$ext				= $check_filetype['ext'];
		$type				= $check_filetype['type'];
		$proper_filename	= $filename;

		if ( $type && 0 === strpos( $type, 'image/' ) && $ext !== 'svg' ) {
			$ext = $type = false;
		}

		$checked = compact( 'ext','type','proper_filename' );
	}

	return $checked;

}
add_filter( 'wp_check_filetype_and_ext', 'svgs_upload_check', 10, 4 );
/* Abilito il caricamento SVG in media */
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

/* Nascondo la versione di Worpdress */
/* Nascondo la versione di Worpdress from scripts and styles
* @return {string} $src
* @filter script_loader_src
* @filter style_loader_src
*/
function fb_remove_wp_version_strings($src)
{
    global $wp_version;
    parse_str(parse_url($src, PHP_URL_QUERY), $query);
    if (!empty($query['ver']) && $query['ver'] === $wp_version) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

add_filter('script_loader_src', 'fb_remove_wp_version_strings');
add_filter('style_loader_src', 'fb_remove_wp_version_strings');
/* Hide WP version strings from generator meta tag */
function fb_remove_version()
{
    return '';
}

add_filter('the_generator', 'fb_remove_version');


/* rimuovo wp-embed.min.js */
function my_deregister_scripts()
{
    wp_dequeue_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');


/* aggiungo un foglio di stile alla parte admin */
function my_custom_fonts()
{
    wp_enqueue_style('admin_styles', get_template_directory_uri() . '/css/qpc_admin.css');
}
add_action('admin_head', 'my_custom_fonts');


/* carico le dashicons*/
function ww_load_dashicons()
{
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons', 999);

// Personalizzo il logo della parte admin
function qpc_login_stylesheet()
{
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/css/qpc_login.css');
}
add_action('login_enqueue_scripts', 'qpc_login_stylesheet');


// nascondo la gestione ACF a tutti gli utenti diversi dal mio
add_filter('acf/settings/show_admin', 'my_acf_show_admin');
function my_acf_show_admin($show)
{
    $admins = array(
        'qpc_admin'/*, 'user_name_2'*/
    );

    $current_user = wp_get_current_user();

    return (in_array($current_user->user_login, $admins));
}

// Gestisco le option del tema Mos
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' 	=> 'Opzioni tema Mos',
        'menu_title'	=> 'Opzioni Tema',
        'parent_slug'	=> '',
        'menu_slug' 	=> 'opzioni-tema-mos',
        'capability'	=> 'edit_posts',
        'position'	=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Header Settings',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'opzioni-tema-mos'
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Theme Footer Settings',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'opzioni-tema-mos'
    ));

    acf_add_options_sub_page(array(
    'page_title' 	=> 'Theme archive products Settings',
    'menu_title'	=> 'Archive products',
    'parent_slug'	=> 'opzioni-tema-mos'
));

}

//Add Featured Image Support
add_theme_support('post-thumbnails');

// without parameter -> Post Thumbnail (as set by theme using set_post_thumbnail_size())
the_post_thumbnail();
the_post_thumbnail('thumbnail');       // Thumbnail (default 150px x 150px max)
the_post_thumbnail('medium');          // Medium resolution (default 300px x 300px max)
the_post_thumbnail('large');           // Large resolution (default 640px x 640px max)
the_post_thumbnail('full');            // Original image resolution (unmodified)
the_post_thumbnail(array(100, 100));  // Other resolutions
add_image_size('thumbs-news-little', 383, 245, true); //90 la base (altezza in proporzione)
add_image_size('thumbs-square', 670, 670, true); //90 la base (altezza in proporzione)
add_image_size('thumbs-square-medium', 420, 420, true); //90 la base (altezza in proporzione)
add_image_size('swiper-block-gallery-resize', 690, 460, true); //crop base ed altezza determinate
add_image_size('banner-header', 1920, 1080, true); //crop base ed altezza determinate
add_image_size('banner-header-1920-400', 1920, 400, true); //crop base ed altezza determinate

add_filter( 'image_size_names_choose', 'qpc_custom_sizes' );
function qpc_custom_sizes( $sizes ) {
  return array_merge( $sizes, array(
    'thumbs-news-little' => __( 'Thumbs news little' ),
    'thumbs-square' => __( 'Thumbs square' ),
    'thumbs-square-medium' => __( 'Thumbs square medium' ),
    'swiper-block-gallery-resize' => __( 'Swiper block gallery resize' ),
    'banner-header' => __( 'Banner header' ),
    'banner-header-1920-400' => __( 'Banner header 1920 x 400' )
  ) );
}
// Imposto do default il resize quality a 80%
add_filter('jpeg_quality', function () {
    return 80;
});

/**
 * Rimuovo gli attributi width ed height quando carico le immagini dal tasto media
 *
 * @param string $html
 *
 * @return string
 */
function remove_image_size_attributes($html)
{
    return preg_replace('/(width|height)="\d*"/', '', $html);
}

// Rimuovo gli attributi da un post thumbnails
add_filter('post_thumbnail_html', 'remove_image_size_attributes');

// Rimuovo gli attributi da aggiungi immagini di WordPress
add_filter('image_send_to_editor', 'remove_image_size_attributes');

// Rimuovo  il filtro wpautop di WordPress che determina in automatico le interruzioni di riga <p> <br> etc... SOLO X IMPORT
/*
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
*/

// Rimuovo le emoticon
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/** * Rimuovo la versione di base di jquery e migrate */
add_action('wp_enqueue_scripts', function () {
    if (is_admin()) {
        return;
    }
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery');
});


//Gestisco la personalizzazione del logo
add_theme_support('custom-logo');

function theme_prefix_setup()
{
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}

add_action('after_setup_theme', 'theme_prefix_setup');


/**
 * Aggiungo a pingback url auto-discovery header per articoli singolarmente identificabili.
 */
function qpc_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
    }
}

add_action('wp_head', 'qpc_pingback_header');

// Aggiungo i posts e i commenti RSS feed links in head.
add_theme_support('automatic-feed-links');

//add_theme_support( 'title-tag' ); se uso Yoast questo non serve perchè duplica il title


function theme_prefix_the_custom_logo()
{
    if (function_exists('the_custom_logo')) {
        the_custom_logo();
    }
}

/* uso l'immagine in evidenza per l'header
add_theme_support( 'custom-header' );

$args = array(
    'width'         => 980,
    'height'        => 300,
    'default-image' => get_template_directory_uri() . '/images/header.jpg',
);
add_theme_support( 'custom-header', $args );
*/


//Gestisco il background personalizzato nel tema
add_theme_support('custom-background');

$defaults = array(
    'default-image' => '',
    'default-preset' => 'default',
    'default-position-x' => 'left',
    'default-position-y' => 'top',
    'default-size' => 'auto',
    'default-repeat' => 'repeat',
    'default-attachment' => 'scroll',
    'default-color' => '',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => '',
);
add_theme_support('custom-background', $defaults);

// Clean up the <head>
function removeHeadLinks()
{
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rel_canonical');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
}

add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Aggiungo il mio menu personalizzato
function qpc_menu()
{
    register_nav_menus(
        array(
            'menu-qpc' => __('Menu qpc'),
            'extra-menu' => __('Extra Menu')
        )
    );
}

add_action('init', 'qpc_menu');

/*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
add_theme_support('html5', array(
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
));

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
 */
add_theme_support('post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
    'gallery',
    'audio',
));


// Registro la sidebar e il footer a 3 collonne
function register_widgets()
{
    register_sidebar(array(
        'name' => __('Sidebar'),
        'id' => 'main-sidebar',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 1',
        'id' => 'footer-sidebar-1',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 2',
        'id' => 'footer-sidebar-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 3',
        'id' => 'footer-sidebar-3',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'Footer Sidebar 4',
        'id' => 'footer-sidebar-4',
        'description' => 'Appears in the footer area',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}//end register_widgets()

add_action('widgets_init', 'register_widgets');
