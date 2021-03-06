<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes() ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes() ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes() ?>><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes() ?>>
<!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset') ?>">
	<meta name="viewport" content="width=device-width,  initial-scale=1.0, maximum-scale=1.0" />
	<title><?php wp_title('|', true, 'right') ?></title>
	<meta name="author" content="">
	<link rel="author" href="">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head() ?>
	<?php the_field('Tracciamento_tag_head', 'option'); ?>
</head>

<body <?php body_class() ?>>
	<?php

	the_field('Tracciamento_tag_body', 'option');
	$queried_object = get_queried_object();
	$altezza_header = 'header-medium-heigth';
	$parallasse_header = null;
	$background_image_position_row = null;
	$colore_heading = null;
	$heading = null;
	$colore_sotto_titolo = null;
	$sotto_titolo = null;


	?>
	<!-- abilitato l'immagine in evidenza nell'header come background -->
	<div data-barba="wrapper">
		<div class="loading-container">
			<div class="loading-screen">
				<svg id="logo_bianco" xmlns="http://www.w3.org/2000/svg" width="354.916" height="100.836" viewBox="0 0 354.916 100.836">
					<path id="Tracciato_5604" data-name="Tracciato 5604" d="M142.53,378.553q-5.707,0-5.706,11.008v2.909a18.3,18.3,0,0,0,1.509,8.191,4.787,4.787,0,0,0,4.454,2.965q4.05,0,7.437-7.88h.665l-.259,8.212h-.406a2.211,2.211,0,0,0-.4-.572.768.768,0,0,0-.535-.165,21.838,21.838,0,0,0-2.668.57,19.667,19.667,0,0,1-4.713.572q-6,0-9.3-3.24t-3.3-9.739q0-6.5,3.444-10.032a12.323,12.323,0,0,1,9.259-3.535,17.144,17.144,0,0,1,4.4.57,17.722,17.722,0,0,0,2.523.569.812.812,0,0,0,.553-.164,2.225,2.225,0,0,0,.4-.572h.4l.294,7.99h-.662a22.333,22.333,0,0,0-3.406-5.687,5.231,5.231,0,0,0-3.995-1.97" transform="translate(-90.899 -363.447)" fill="#fff"/>
					<path id="Tracciato_5605" data-name="Tracciato 5605" d="M172.351,404.362q-6.148,0-9.185-3.333t-3.037-9.646q0-6.311,3.257-9.939t9.223-3.628q5.967,0,9,3.444t3.037,9.774q0,6.332-3.073,9.831t-9.224,3.5m4.714-11.745v-2.723q0-6.738-.664-8.5a3.762,3.762,0,0,0-2.1-2.5,5.311,5.311,0,0,0-1.877-.294,5.455,5.455,0,0,0-1.894.294,2.744,2.744,0,0,0-1.309,1.03,7.375,7.375,0,0,0-.827,1.547,10.26,10.26,0,0,0-.5,2.284q-.217,2.135-.219,6.295v2.651a39.866,39.866,0,0,0,.35,6.388,8.041,8.041,0,0,0,.865,2.705,3.887,3.887,0,0,0,3.534,1.805,3.585,3.585,0,0,0,3.773-2.449q.867-2.449.867-8.524" transform="translate(-96.245 -363.447)" fill="#fff"/>
					<path id="Tracciato_5606" data-name="Tracciato 5606" d="M214.953,379.007V404.08H209.8l-12.629-23.822V403.38h2.025v.7h-5.043v-.7h2.025V379.007h-2.025v-.7h10.16l9.648,18.483V379.007h-2.027v-.7h5.045v.7Z" transform="translate(-102.147 -363.532)" fill="#fff"/>
					<path id="Tracciato_5607" data-name="Tracciato 5607" d="M236.659,403.59a5.534,5.534,0,0,0,3.259-1,3.423,3.423,0,0,0,1.417-3,3.525,3.525,0,0,0-1.527-3.074,14.607,14.607,0,0,0-4.344-1.86,29.567,29.567,0,0,1-4.088-1.381,10.744,10.744,0,0,1-2.411-1.546q-2.285-1.913-2.283-5.926a7.72,7.72,0,0,1,2.337-5.634,8.6,8.6,0,0,1,6.388-2.356,15.679,15.679,0,0,1,4.069.571,14.877,14.877,0,0,0,2.632.57c.342,0,.65-.244.92-.736h.406l.258,7.439H243.1a22.842,22.842,0,0,0-3.7-5.136,5.858,5.858,0,0,0-4.2-1.934,5.31,5.31,0,0,0-3.515,1.051,3.466,3.466,0,0,0-1.254,2.8,3,3,0,0,0,1.492,2.688,13.515,13.515,0,0,0,3.663,1.528q2.172.589,2.854.809t1.694.608a8.714,8.714,0,0,1,1.658.809,11.857,11.857,0,0,1,1.361,1.068,5.073,5.073,0,0,1,1.122,1.417,9.413,9.413,0,0,1-1.49,10.585,8.984,8.984,0,0,1-6.534,2.413,24.442,24.442,0,0,1-4.805-.552q-2.705-.554-3-.553-.516,0-.993,1.105h-.514l-.37-8.764h.626a20.207,20.207,0,0,0,4.142,5.6,7.666,7.666,0,0,0,5.32,2.394" transform="translate(-107.771 -363.447)" fill="#fff"/>
					<path id="Tracciato_5608" data-name="Tracciato 5608" d="M253.379,378.307h19.143l.368,7.29h-.661a13.129,13.129,0,0,0-3.241-5.1,7.712,7.712,0,0,0-4.97-1.383h-1.289v11.378h1.251a3.766,3.766,0,0,0,2.91-1.307,7.5,7.5,0,0,0,1.655-3.517h.553v10.9h-.626a8.673,8.673,0,0,0-1.784-3.941,4.052,4.052,0,0,0-3.075-1.178h-.884v11.818h1.4a8.571,8.571,0,0,0,5.762-2.026,10.281,10.281,0,0,0,3.26-5.191h.736l-.3,8.028H253.379v-.811h2.171V379.116h-2.171Z" transform="translate(-112.422 -363.532)" fill="#fff"/>
					<path id="Tracciato_5609" data-name="Tracciato 5609" d="M293.844,391.045h-1.951V403.38h2.394v.7H282.321v-.7h2.394V379.007h-2.394v-.7h11.118a31.951,31.951,0,0,1,6.793.5,7.044,7.044,0,0,1,2.817,1.2,5.542,5.542,0,0,1,1.768,4.567q0,3.129-1.547,4.472a8.076,8.076,0,0,1-4.712,1.6v.111a6.519,6.519,0,0,1,4.162,1.766q1.177,1.364,1.177,4.567v1.951a10.53,10.53,0,0,0,.2,2.577.838.838,0,0,0,.865.662,1.19,1.19,0,0,0,1.049-.607,8.025,8.025,0,0,0,.718-2.559l.626.074q-.4,3.13-1.418,4.2t-4.03,1.066q-3.019,0-4.29-1.418t-1.27-5.319v-2.688a6.487,6.487,0,0,0-.533-3.02,2.057,2.057,0,0,0-1.971-.956m-1.951-12.038v11.339h1.18a3.714,3.714,0,0,0,3.11-1.289,6.838,6.838,0,0,0,1.013-4.2v-1.067q0-2.907-.978-3.847a4.361,4.361,0,0,0-3.11-.939Z" transform="translate(-117.443 -363.532)" fill="#fff"/>
					<path id="Tracciato_5610" data-name="Tracciato 5610" d="M327.726,397.415l6.406-18.408h-2.873v-.7h5.632v.7h-1.73l-8.873,25.44H323.2l-9.387-25.44h-1.693v-.7h12.038v.7h-2.614Z" transform="translate(-122.611 -363.532)" fill="#fff"/>
					<path id="Tracciato_5611" data-name="Tracciato 5611" d="M353.048,403.334l-2.689-7.954H343.07l-2.835,7.954H343v.7h-5.634v-.7h1.73l9.388-25.295h3.02l9.277,25.295h1.694v.7H350.434v-.7Zm-6.187-18.409L343.4,394.57h6.663Z" transform="translate(-126.991 -363.486)" fill="#fff"/>
					<path id="Tracciato_5612" data-name="Tracciato 5612" d="M388.665,378.307l.368,9.241h-.7a28.6,28.6,0,0,0-2.872-6.68,4.137,4.137,0,0,0-3.609-1.788h-.441v24.227h3.129v.773H371.1v-.773h3.128V379.08h-.478a4.173,4.173,0,0,0-3.644,1.861,27.649,27.649,0,0,0-2.836,6.607h-.7l.369-9.241Z" transform="translate(-132.059 -363.532)" fill="#fff"/>
					<path id="Tracciato_5613" data-name="Tracciato 5613" d="M409.526,404.362q-6.149,0-9.186-3.333t-3.037-9.646q0-6.311,3.257-9.939t9.223-3.628q5.966,0,9,3.444t3.039,9.774q0,6.332-3.077,9.831t-9.221,3.5m4.713-11.745v-2.723q0-6.738-.664-8.5a3.769,3.769,0,0,0-2.1-2.5,5.328,5.328,0,0,0-1.876-.294,5.47,5.47,0,0,0-1.9.294,2.746,2.746,0,0,0-1.308,1.03,7.414,7.414,0,0,0-.827,1.547,10.074,10.074,0,0,0-.5,2.284q-.221,2.135-.22,6.295v2.651a39.972,39.972,0,0,0,.35,6.388,8.1,8.1,0,0,0,.864,2.705,3.893,3.893,0,0,0,3.538,1.805,3.587,3.587,0,0,0,3.772-2.449q.864-2.449.865-8.524" transform="translate(-137.389 -363.447)" fill="#fff"/>
					<path id="Tracciato_5614" data-name="Tracciato 5614" d="M442.4,391.045h-1.95V403.38h2.391v.7H430.879v-.7h2.394V379.007h-2.394v-.7H442a31.967,31.967,0,0,1,6.793.5,7.05,7.05,0,0,1,2.817,1.2,5.544,5.544,0,0,1,1.767,4.567q0,3.129-1.547,4.472a8.079,8.079,0,0,1-4.713,1.6v.111a6.513,6.513,0,0,1,4.161,1.766q1.18,1.364,1.179,4.567v1.951a10.545,10.545,0,0,0,.2,2.577.838.838,0,0,0,.865.662,1.188,1.188,0,0,0,1.049-.607,8.081,8.081,0,0,0,.72-2.559l.626.074q-.405,3.13-1.42,4.2t-4.029,1.066q-3.019,0-4.288-1.418t-1.272-5.319v-2.688a6.487,6.487,0,0,0-.533-3.02,2.058,2.058,0,0,0-1.971-.956m-1.95-12.038v11.339h1.178a3.711,3.711,0,0,0,3.11-1.289,6.844,6.844,0,0,0,1.013-4.2v-1.067q0-2.907-.976-3.847a4.367,4.367,0,0,0-3.111-.939Z" transform="translate(-143.214 -363.532)" fill="#fff"/>
					<path id="Tracciato_5615" data-name="Tracciato 5615" d="M464.637,378.307h11.228v.7H473.84v24.374h2.024v.7H464.637v-.7h2.023V379.007h-2.023Z" transform="translate(-149.07 -363.532)" fill="#fff"/>
					<path id="Tracciato_5616" data-name="Tracciato 5616" d="M494.8,404.362q-6.148,0-9.184-3.333t-3.038-9.646q0-6.311,3.259-9.939t9.222-3.628q5.963,0,9,3.444t3.038,9.774q0,6.332-3.076,9.831t-9.222,3.5m4.714-11.745v-2.723q0-6.738-.662-8.5a3.769,3.769,0,0,0-2.1-2.5,5.315,5.315,0,0,0-1.878-.294,5.478,5.478,0,0,0-1.9.294,2.751,2.751,0,0,0-1.308,1.03,7.379,7.379,0,0,0-.827,1.547,10.141,10.141,0,0,0-.5,2.284q-.222,2.135-.22,6.295v2.651a39.868,39.868,0,0,0,.35,6.388,8.023,8.023,0,0,0,.865,2.705,3.886,3.886,0,0,0,3.533,1.805,3.585,3.585,0,0,0,3.773-2.449q.868-2.449.867-8.524" transform="translate(-152.182 -363.447)" fill="#fff"/>
					<path id="Tracciato_5617" data-name="Tracciato 5617" d="M139.677,444.5h-1.951v12.333h2.394v.7H128.154v-.7h2.394V432.459h-2.394v-.7h11.118a31.937,31.937,0,0,1,6.793.5,7.065,7.065,0,0,1,2.818,1.2,5.539,5.539,0,0,1,1.767,4.564q0,3.129-1.547,4.473a8.064,8.064,0,0,1-4.71,1.6v.109a6.527,6.527,0,0,1,4.158,1.767q1.178,1.364,1.179,4.566v1.952a10.577,10.577,0,0,0,.2,2.575.839.839,0,0,0,.867.662,1.184,1.184,0,0,0,1.048-.607,8.032,8.032,0,0,0,.718-2.558l.627.074q-.407,3.129-1.418,4.2t-4.031,1.068q-3.019,0-4.288-1.417t-1.271-5.32v-2.689a6.471,6.471,0,0,0-.534-3.018,2.056,2.056,0,0,0-1.97-.957m-1.951-12.04V443.8H138.9a3.714,3.714,0,0,0,3.113-1.289,6.854,6.854,0,0,0,1.012-4.2v-1.068q0-2.907-.975-3.848a4.367,4.367,0,0,0-3.113-.938Z" transform="translate(-90.698 -372.805)" fill="#fff"/>
					<path id="Tracciato_5618" data-name="Tracciato 5618" d="M173.955,457.815q-6.149,0-9.186-3.333t-3.037-9.646q0-6.312,3.257-9.941t9.223-3.626q5.966,0,9,3.442t3.037,9.774q0,6.332-3.073,9.829t-9.223,3.5m4.714-11.744v-2.725q0-6.736-.664-8.5a3.766,3.766,0,0,0-2.1-2.505,5.294,5.294,0,0,0-1.877-.3,5.45,5.45,0,0,0-1.9.3,2.752,2.752,0,0,0-1.308,1.033,7.143,7.143,0,0,0-.827,1.546,10.155,10.155,0,0,0-.5,2.28q-.218,2.136-.219,6.3v2.653a39.963,39.963,0,0,0,.35,6.387,8.073,8.073,0,0,0,.865,2.706,3.89,3.89,0,0,0,3.535,1.8,3.584,3.584,0,0,0,3.773-2.449q.865-2.446.867-8.521" transform="translate(-96.523 -372.72)" fill="#fff"/>
					<path id="Tracciato_5619" data-name="Tracciato 5619" d="M206.555,457.041a5.548,5.548,0,0,0,3.261-.993,3.424,3.424,0,0,0,1.416-3,3.523,3.523,0,0,0-1.527-3.074,14.609,14.609,0,0,0-4.344-1.859,29.812,29.812,0,0,1-4.088-1.38,10.815,10.815,0,0,1-2.411-1.547q-2.285-1.912-2.283-5.928a7.709,7.709,0,0,1,2.338-5.631,8.587,8.587,0,0,1,6.387-2.357,15.617,15.617,0,0,1,4.07.57,14.963,14.963,0,0,0,2.631.571q.516,0,.921-.736h.407l.257,7.435H213a22.864,22.864,0,0,0-3.7-5.134,5.858,5.858,0,0,0-4.2-1.933,5.324,5.324,0,0,0-3.516,1.05,3.469,3.469,0,0,0-1.251,2.8,3,3,0,0,0,1.49,2.689,13.588,13.588,0,0,0,3.664,1.527q2.172.589,2.853.809c.455.146,1.018.35,1.694.608a8.679,8.679,0,0,1,1.657.81,11.379,11.379,0,0,1,1.36,1.068,5.011,5.011,0,0,1,1.123,1.417,9.413,9.413,0,0,1-1.49,10.585,8.982,8.982,0,0,1-6.534,2.412,24.447,24.447,0,0,1-4.805-.553q-2.705-.553-3-.553-.518,0-1,1.106h-.514l-.369-8.763h.627a20.172,20.172,0,0,0,4.141,5.6,7.662,7.662,0,0,0,5.319,2.393" transform="translate(-102.549 -372.72)" fill="#fff"/>
					<path id="Tracciato_5620" data-name="Tracciato 5620" d="M233.809,457.041a5.538,5.538,0,0,0,3.258-.993,3.423,3.423,0,0,0,1.417-3,3.523,3.523,0,0,0-1.527-3.074,14.592,14.592,0,0,0-4.346-1.859,29.894,29.894,0,0,1-4.086-1.38,10.8,10.8,0,0,1-2.412-1.547q-2.282-1.912-2.281-5.928a7.719,7.719,0,0,1,2.336-5.631,8.592,8.592,0,0,1,6.389-2.357,15.606,15.606,0,0,1,4.069.57,14.949,14.949,0,0,0,2.632.571q.516,0,.921-.736h.4l.258,7.435h-.589a22.89,22.89,0,0,0-3.7-5.134,5.855,5.855,0,0,0-4.2-1.933,5.317,5.317,0,0,0-3.515,1.05,3.462,3.462,0,0,0-1.253,2.8,3,3,0,0,0,1.492,2.689,13.576,13.576,0,0,0,3.662,1.527q2.173.589,2.855.809c.453.146,1.017.35,1.694.608a8.719,8.719,0,0,1,1.656.81,11.658,11.658,0,0,1,1.362,1.068,5.049,5.049,0,0,1,1.122,1.417,9.417,9.417,0,0,1-1.49,10.585,8.984,8.984,0,0,1-6.535,2.412,24.46,24.46,0,0,1-4.8-.553q-2.706-.553-3-.553c-.343,0-.676.368-.993,1.106h-.516l-.369-8.763h.625a20.273,20.273,0,0,0,4.142,5.6,7.664,7.664,0,0,0,5.321,2.393" transform="translate(-107.277 -372.72)" fill="#fff"/>
					<path id="Tracciato_5621" data-name="Tracciato 5621" d="M250.706,431.759h11.229v.7H259.91v24.371h2.025v.7H250.706v-.7h2.025V432.46h-2.025Z" transform="translate(-111.958 -372.805)" fill="#fff"/>
					<path id="Tracciato_5622" data-name="Tracciato 5622" d="M288.738,432.459v25.072h-5.154l-12.629-23.818v23.119h2.026v.7h-5.044v-.7h2.025V432.459h-2.025v-.7H278.1l9.647,18.483V432.459h-2.026v-.7h5.045v.7Z" transform="translate(-114.947 -372.805)" fill="#fff"/>
					<path id="Tracciato_5623" data-name="Tracciato 5623" d="M299.2,431.759h11.228v.7H308.4v24.371h2.025v.7H299.2v-.7h2.024V432.46H299.2Z" transform="translate(-120.37 -372.805)" fill="#fff"/>
					<path id="Tracciato_5624" data-name="Tracciato 5624" d="M102.1,362.7q1.65-1.474,5.3-1.574l.007-.7q-6.751,0-10.528,2.209a12.56,12.56,0,0,0-5.457,7.384q-1.672,5.174-1.674,14.463a132.277,132.277,0,0,1-.66,15.3q-.66,5.253-2.335,7.486a9.584,9.584,0,0,1-3.924,3.052l.009.709a9.631,9.631,0,0,1,3.916,3.063q1.677,2.258,2.333,7.509a131.561,131.561,0,0,1,.66,15.252q0,9.641,1.674,14.869t5.43,7.383q3.757,2.156,10.555,2.159l-.055-.7q-3.654-.048-5.3-1.47c-1.1-.948-1.813-4.225-2.251-7.27a117.67,117.67,0,0,1-.663-14.971q0-8.776-2-14.185a18.421,18.421,0,0,0-5.228-8.044,21.825,21.825,0,0,0-7.638-3.958,21.71,21.71,0,0,0,7.638-3.956,18.409,18.409,0,0,0,5.228-8.019q2-5.381,2-14.208a111.841,111.841,0,0,1,.661-14.54c.44-3,1.2-6.263,2.3-7.242" transform="translate(-82.837 -360.431)" fill="#fff"/>
				</svg>
			</div>
		</div>

		<div data-barba="container" data-barba-namespace="<?php echo $queried_object->name; ?>">

			<style>
				.bgHeader::before {
					content: '';
					position: absolute;
					width: 100%;
					height: 100%;
					background-color: <?php the_field('colore_sfondo') ?>;
					z-index: 0;
					opacity: <?php the_field('opacita') ?>;
					mix-blend-mode: multiply;
				}
			</style>

			<header id="header" class="bgHeader header-medium-heigth bgHeaderCorsi">

				<div class="wrap-header fade-in-new">
<?php include(TEMPLATEPATH . '/template-parts/elements/pre-header.php'); ?>
					<div class="qpc-container">

						<a id="page-logo" href="<?php bloginfo('url') ?>" title="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
							<img class="logo-desktop" src="<?php $custom_logo_id = get_theme_mod('custom_logo');
															$image = wp_get_attachment_image_src($custom_logo_id, 'banner-header-1920-550');
															echo $image[0]; ?>" alt="<?php bloginfo('name') ?>  <?php bloginfo('description') ?>">
						</a>
						<!--<div class="vertical-line"></div>-->
						<?php // include (TEMPLATEPATH . '/search-form-header.php' );
						?>
					</div>
					<?php include(TEMPLATEPATH . '/template-parts/elements/menu.php'); ?>
				</div>
			</header>
			<?php echo qpc_breadcrumb(); ?>

			<div id="content-wrap">