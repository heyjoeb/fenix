<?php
function mytheme_setup()
{
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'serv-thumb', 180, 540 );//180 de ancho...alto "ilimitado"

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
	register_post_type( 'conference', array(
		'labels' => array(
			'name' => 'Conferencias',
			'singular_name' => 'Conferencia',
			'add_new' => 'Añadir Nueva',
			'add_new_item' => 'Añadir Nueva Conferencia',
			'edit_item' => 'Editar Conferencia',
			'new_item' => 'Nueva Conferencia',
			'view_item' => 'Ver Conferencia',
			'search_items' => 'Buscar Conferencias',
			'not_found' => 'Conferencias no encontradas',
			'not_found_in_trash' => 'Conferencias no encontradas en papelera'
		),
		'public' => true,
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
		),
		'menu_position' => 24,
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

//opciones del tema para servicios
add_filter( 'kc_post_settings', 'service_options' );
function service_options( $groups ) {
	$my_group = array(
		'service'	=> array(		// Post type name
			array(
				'id'		=> 'service_section',
				'title'		=> 'Opciones Servicio',
				'role'		=> array('administrator', 'editor'),
				'fields'	=> array(
					array(
						'id'		=> 'template',
						'title'		=> 'Plantilla',
						'type'		=> 'select',
						'options'	=> array(
							'normal'	   => 'Normal',
							'conferencias' => 'Conferencias',
						),
						'default'	=> 'normal'
					),
					array(
						'id'    => 'wide_img',
						'title' => 'Imagen Superior',
						'type'  => 'file',
						'mode'  => 'single',
						'size'  => 'full'
					),
				)
			)
		)
	);

	$groups[] = $my_group;
	return $groups;
}

//opciones del tema para conferencias
add_filter( 'kc_post_settings', 'conference_options' );
function conference_options( $groups ) {
	$my_group = array(
		'conference'	=> array(		// Post type name
			array(
				'id'		=> 'conference_section',
				'title'		=> 'Opciones Conferencias',
				'role'		=> array('administrator', 'editor'),
				'fields'	=> array(
					array(
						'id'		=> 'date',
						'title'		=> 'Fecha',
						'type'		=> 'text',
					),
					array(
						'id'		=> 'place',
						'title'		=> 'Lugar',
						'type'		=> 'text',
					),
					array(
						'id'		=> 'duration',
						'title'		=> 'Duración',
						'type'		=> 'text',
					),
					array(
						'id'		=> 'value',
						'title'		=> 'Valor',
						'type'		=> 'text',
					),
				)
			)
		)
	);

	$groups[] = $my_group;
	return $groups;
}

//registrar zonas de widgets
function create_widget_zones()
{
	register_sidebar( array(
		'name' => 'Area Principal Widgets',
		'id' => 'primary-widget-area',
		'description' => 'Para el home page y paginas normales',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h1>',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'create_widget_zones' );
