<?php
function mytheme_setup()
{
	add_theme_support( 'post-thumbnails' );

	register_nav_menus( array(
		'primary' => 'Menú Principal',
	) );
}
add_action( 'after_setup_theme', 'mytheme_setup' );

function my_js()
{
	//jquery desde google cdn
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false, '1.8.1', true);

	//scripts del footer
	wp_enqueue_script('plugins', get_bloginfo('template_directory').'/js/plugins.js', array('jquery'), '', true);
	wp_enqueue_script('main', get_bloginfo('template_directory').'/js/main.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'my_js');

// Registrar post types
function create_post_types()
{
	register_post_type( 'slide', array(
		'labels' => array(
			'name' => 'Rotadores',
			'singular_name' => 'Rotador',
			'add_new' => 'Añadir Nuevo',
			'add_new_item' => 'Añadir Nuevo Rotador',
			'edit_item' => 'Editar Rotador',
			'new_item' => 'Nuevo Rotador',
			'view_item' => 'Ver Rotador',
			'search_items' => 'Buscar Rotadores',
			'not_found' => 'Rotadores no encontrados',
			'not_found_in_trash' => 'Rotadores no encontrados en papelera'
		),
		'public' => true,
		'supports' => array(
			'title',
			'thumbnail',
			'page-attributes',
		),
		'menu_position' => 21,
	));
	register_post_type( 'service', array(
		'labels' => array(
			'name' => 'Servicios',
			'singular_name' => 'Servicio',
			'add_new' => 'Añadir Nuevo',
			'add_new_item' => 'Añadir Nuevo Servicio',
			'edit_item' => 'Editar Servicio',
			'new_item' => 'Nuevo Servicio',
			'view_item' => 'Ver Servicio',
			'search_items' => 'Buscar Servicios',
			'not_found' => 'Servicios no encontrados',
			'not_found_in_trash' => 'Servicios no encontrados en papelera'
		),
		'public' => true,
		'hierarchical' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'page-attributes',
		),
		'menu_position' => 22,
	));
	register_post_type( 'inform', array(
		'labels' => array(
			'name' => 'Informes',
			'singular_name' => 'Informe',
			'add_new' => 'Añadir Nuevo',
			'add_new_item' => 'Añadir Nuevo Informe',
			'edit_item' => 'Editar Informe',
			'new_item' => 'Nuevo Informe',
			'view_item' => 'Ver Informe',
			'search_items' => 'Buscar Informes',
			'not_found' => 'Informes no encontrados',
			'not_found_in_trash' => 'Informes no encontrados en papelera'
		),
		'public' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
		),
		'taxonomies' => array(
			'category',
		),
		'menu_position' => 23,
	));
}
add_action('init', 'create_post_types');

//opciones del tema para rotador
add_filter( 'kc_post_settings', 'slider_options' );
function slider_options( $groups ) {
	$my_group = array(
		'slide'	=> array(		// Post type name
			array(
				'id'		=> 'slider_section',
				'title'		=> 'Opciones Rotador',
				'role'		=> array('administrator', 'editor'),
				'fields'	=> array(
					array(
						'id'		=> 'slide_in',
						'title'		=> 'Rotador disponible en',
						'type'		=> 'checkbox',
						'options'	=> array(
							'home'	=> 'Home',
							'paginas' => 'Páginas',
						),
						'default'	=> 'home'
					),
					array(
						'id'		=> 'slide_link',
						'title'		=> 'URL Enlace',
						'type'		=> 'text',
					)
				)
			)
		)
	);

	$groups[] = $my_group;
	return $groups;
}
