<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<?php

	global $page, $paged;

	$display_title = wp_title( '-', false, 'right' );

	$display_title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	$display_title .= " - $site_description";

	if ( $paged >= 2 || $page >= 2 )
	$display_title .= ' | ' . sprintf( __( 'Page %s', 'starkers' ), max( $paged, $page ) );

	?>
	<title><?php echo $display_title ?></title>
	<meta name="description" content="<?php echo $display_title ?>">
	<meta name="viewport" content="width=device-width">

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css">

	<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.1.min.js"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 7]>
  <p class="chromeframe">Está usando un navegador desactualizado. <a href="http://browsehappy.com/">Actualice su navegador hoy.</a> o <a href="http://www.google.com/chromeframe/?redirect=true">instale Google Chrome Frame</a> para una mejor experiencia al navegar este sitio.</p>
<![endif]-->

	<?php
	global $post;

	if ( 'service' == get_post_type() && $post->post_parent ) {
		echo '<div id="main-wrapper-light">';
	} else {
		echo '<div id="main-wrapper">';
	}
	?>

		<div id="nav-main">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => false,
				'menu_id' => 'drop-menu',
			) );
			?>
			<div class="clearfloat"></div>
		</div>
		<!--termina #nav-main-->
		<div id="header-main">
			<div id="logo">
				<img src="<?php bloginfo('template_directory'); ?>/img/logo_fenix_valor.png" width="102" height="130" alt="fenix valor"></div>
			<!--termina #logo-->
			<div id="header-copy">
				<span id="caps-copy">En FENIX VALOR</span>
				<br>
				<span id="default-copy">
					Tenemos el servicio de Valoración, Diagnóstico Financiero y Análisis de Mercado que usted y su empresa necesitan
				</span>
			</div>
			<!--termina #header-copy-->
			<div class="clearfloat"></div>
		</div>
		<!--termina #header-main-->
		<div id="stock-ticker">
			<iframe id="videoDataifx" width="960" scrolling="no" height="33"
		frameborder="no" src="http://dataifx.com/widget/index.php/ticker"></iframe>
		</div>
		<!--termina #stock-ticker-->

		<div id="slides">
			<div class="slides_container">
				<?php
				$args = array( 'posts_per_page' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_type' => 'slide' );
				$query_slider = new WP_Query($args);
				while ( $query_slider->have_posts() ) : $query_slider->the_post();
					$link = get_post_meta( get_the_ID(), '_slide_link', true );
				?>
					<div>
						<a href="<?php echo $link; ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('full'); ?></a>
					</div>
				<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<!--termina .slides_container-->
		</div>
		<!--termina #slides-->
