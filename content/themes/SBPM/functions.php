<?php
@ini_set( 'upload_max_size' , '64M' ); 
@ini_set( 'post_max_size', '64M'); 
@ini_set( 'max_execution_time', '300' );

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){
	wp_register_script('modernizr', get_bloginfo('template_url') . '/js/modernizr.js', true, '2.6.2', false);
	wp_enqueue_script('modernizr');

//	wp_register_script('require', get_bloginfo('template_url') . '/js/vendor/requirejs/require.js', array(), false, true);
//	wp_enqueue_script('require');

	wp_register_script('foundation', get_bloginfo('template_url') . '/js/vendor/foundation/js/foundation.js', array(), false, '2.1.1', true);
	wp_enqueue_script('foundation');

	wp_register_script('global', get_bloginfo('template_url') . '/js/global.js', array('require'), false, true);
	wp_enqueue_script('global');

	wp_enqueue_style('chosen', get_bloginfo('template_url') . '/css/chosen.css');

	wp_enqueue_style('global', get_bloginfo('template_url') . '/style.css');	
	
	wp_register_script('bootstrapmin', get_bloginfo('template_url') . '/js/vendor/bootstrap/js/bootstrap.min.js', array('jquery'), false, '3.3.4', true);
	wp_enqueue_script('bootstrapmin');

	wp_register_script('dataTable', get_bloginfo('template_url') . '/js/vendor/bootstrap/js/jquery.dataTables.min.js', array('jquery'), false, '1.10.7', true);
	wp_enqueue_script('dataTable');

	wp_register_script('dataTableboots', get_bloginfo('template_url') . '/js/vendor/bootstrap/js/dataTables.bootstrap.js', array('jquery'), false, '1.10.7', true);
	wp_enqueue_script('dataTableboots');

}

function my_init() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_bloginfo('template_url') . '/js/vendor/jquery/dist/jquery.js', false, '2.1.1', true);
		wp_enqueue_script('jquery');

		//wp_enqueue_script('jquery-ui-tabs');

		wp_deregister_script('jquery-ui');
		wp_register_script('jquery-ui', get_bloginfo('template_url') . '/js/vendor/jquery-ui/jquery-ui.js', false, '1.11.14', true);
		wp_enqueue_script('jquery-ui');

		wp_enqueue_style('jquery-ui', get_bloginfo('template_url') . '/js/vendor/jquery-ui/jquery-ui.css');	

		wp_register_script('underscore', 'http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js', false, '1.1.1', true);
		wp_enqueue_script('underscore');
		wp_register_script('calendario', get_bloginfo('template_url') . '/js/calendario.js', false, '1.1.1', true);
		wp_enqueue_script('calendario');
		wp_register_script('chosen', get_bloginfo('template_url') . '/js/chosen.jquery.min.js', false, '1.1.1', true);
		wp_enqueue_script('chosen');
	}
}
add_action('init', 'my_init');

//Add Featured Image Support
add_theme_support('post-thumbnails');

/**
* Custom CSS.
*
* @access public
* @return void
*/
function custom_css() {
	wp_enqueue_style( 'admin', get_template_directory_uri() . '/css/admin.css');
}
add_action('admin_head', 'custom_css');

// VC
require_once(trailingslashit( get_template_directory()).'includes/bloques.php');
require_once(trailingslashit( get_template_directory()).'includes/orbit.php');

// Redux
require_once(dirname(__FILE__).'/redux/sample-config.php');

// Menu Class
function change_submenu_class($menu) {
	$menu = preg_replace('/ class="sub-menu"/','/ class="dropdown" /',$menu);
	return $menu;
}
add_filter('wp_nav_menu','change_submenu_class');

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

function register_menus() {
	register_nav_menus(
	array(
		'main-nav' => 'Principal',
		'secondary-nav' => 'Secundario',
		'footer-utility' => 'Utilidad',
		'footer-services' => 'Servicios',
		'footer-catalogs' => 'Catálogos',
		'sidebar-menu' => 'Sidebar'
	)
);
}
add_action( 'init', 'register_menus' );

function register_widgets(){
	register_sidebar( array(
		'name' => __( 'Sidebar' ),
		'id' => 'main-sidebar',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Logos header' ),
		'id' => 'logos-header',
		'description'   => esc_html__( 'Agregue los logos al caebzote' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}//end register_widgets()
	add_action( 'widgets_init', 'register_widgets' );

	/**
	* Layout Columns.
	*
	* @access public
	* @param mixed $columns
	* @return void
	*/
	function layout_columns($columns) {
		$columns['dashboard'] = 2;
		return $columns;
	}
	add_filter('screen_layout_columns', 'layout_columns');

	/**
	* Layout Dashboard.
	*
	* @access public
	* @return void
	*/
	function layout_dashboard() {
		return 2;
	}
	add_filter('get_user_option_screen_layout_dashboard', 'layout_dashboard');

	/**
	* Remove Version.
	*
	* @access public
	* @return void
	*/
	function remove_version() {
		return '';
	}
	add_filter('the_generator', 'remove_version');

	/**
	* Wrong Login.
	*
	* @access public
	* @return void
	*/
	function wrong_login() {
		return 'Nombre de usuario o contraseña incorrecta.';
	}
	add_filter('login_errors', 'wrong_login');

	/**
	* Remove Logo.
	*
	* @access public
	* @param mixed $wp_admin_bar
	* @return void
	*/
	function remove_wp_logo($wp_admin_bar) {
		$wp_admin_bar->remove_node('wp-logo');
		$wp_admin_bar->remove_node('comments');
		$wp_admin_bar->remove_node('updates');
	}
	add_action('admin_bar_menu', 'remove_wp_logo', 999);

	/**
	* Remove Links.
	*
	* @access public
	* @return void
	*/
	function remove_links_menu() {
		//remove_menu_page( 'options-general.php' );
		//remove_menu_page( 'themes.php' );
		//remove_menu_page('plugins.php');
		//remove_menu_page('tools.php');
		//remove_menu_page('edit-comments.php');
		// remove_menu_page('edit.php');
		//remove_menu_page('easy-content-types');
	}
	add_action( 'admin_menu', 'remove_links_menu' );

	/**
	* Remove Actions.
	*
	*/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('welcome_panel', 'wp_welcome_panel');

	/**
	* Custom Login Logo.
	*
	* @access public
	* @return void
	*/
	function custom_login_logo() { ?>
		<style type="text/css">
		h1 a {
			width: 100% !important;
			height: 170px !important;
			background: url("<?php echo get_bloginfo('template_directory') ?>/images/logo.png") center top no-repeat !important;
		}
		</style>
		<?php
	}
	add_action('login_head', 'custom_login_logo');

	//================
	//! Remove Roles
	//================

	remove_role("contributor");
	remove_role("author");


	function filtro_paginas_especificas( $query ) {
	  if ( $query->is_search && $query->is_main_query() ) {
	    $query->set( 'post__not_in', array( 520 ) ); 
	  }
	}
	add_filter( 'pre_get_posts', 'filtro_paginas_especificas' );


	function new_nav_menu_items($items) {
      echo 'bam';
		$blog_list = wp_get_sites();
		foreach ($blog_list as $blog):
			$detalles = get_blog_details($blog["blog_id"]);
			$items .= '<li class="menu-item menu-item-type-custom menu-item-object-custom">';
			$items .= '<a href="'.$detalles->siteurl.'"><'.$detalles->blogname.'</a>';
			$items .= '</li>';
		endforeach;	
		return $items;
	}
	// add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );


/* Quitar actualizaciones de los plugins de la lista "unset"*/
function disable_plugin_updates( $value ) {
   unset( $value->response['shortcodes-ultimate/shortcodes-ultimate.php'] );
   return $value;
}
add_filter( 'site_transient_update_plugins', 'disable_plugin_updates' );
