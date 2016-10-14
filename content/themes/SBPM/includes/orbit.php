<?php
/*
* Add-on Name: Menú de contenidos Bloques for Visual Composer
*/

if (!class_exists('INN_Orbit_list')) {
	class INN_Orbit_list {
		function __construct() {
			add_action('admin_init', array($this, 'add_orbit_list'));
			if (function_exists('vc_is_inline')) {
				if (!vc_is_inline()) {
					add_shortcode('orbit_list', array($this, 'orbit_list'));
					add_shortcode('orbit_list_item', array($this, 'orbit_list_item'));
				}
			} else {
				add_shortcode('orbit_list', array($this, 'orbit_list'));
				add_shortcode('orbit_list_item', array($this, 'orbit_list_item'));
			}
		}

		function orbit_list($atts, $content = null) {
			$orbit_list_title = '';
			extract(shortcode_atts(array(
				'orbit_list_title' => '',
			), $atts));
			$output = '<div class="block block-orbit">';
			$output .= '<div class="orbit-container">';
			$output .= '<ul class="no-bullet" data-orbit data-options="bullets:false;animation:fade;">';
			$output .= do_shortcode($content);
			$output .= '</ul>';
			$output .= '</div>';
			$output .= '</div>';
			return $output;
		}

		function orbit_list_item($atts, $content = null) {
			$orbit_list_item_image = $contenido = '';
			extract(shortcode_atts(array(
				'orbit_list_item_image' => '', 'contenido' => '',
			), $atts));
			$output = '<li>';
			$output .= '<img src="'.wp_get_attachment_url($orbit_list_item_image).'" alt="">';
			if($contenido != ''){
				$output .= '<div class="item-info-orbit">'.$contenido.'</div>';
			}
			$output .= '</li>';
			return $output;
		}

		function add_orbit_list() {
			if (function_exists('vc_map')) {
				// Add list
				vc_map(
				array(
					"name" => __("Orbit","smile"),
					"base" => "orbit_list",
					"class" => "",
					"icon" => "icon-wpb-layout_blocks",
					"category" => __("Orbit","smile"),
					"as_parent" => array('only' => 'orbit_list_item'),
					"description" => __("","smile"),
					"content_element" => true,
					"show_settings_on_create" => true,
					"params" => array(
						array(
							"type" => "textfield",
							"holder" => "div",
							"heading" => __("Título"),
							"admin-label" => true,
							// "class" => "display-none",
							"param_name" => "orbit_list_title",
							"description" => __(""),
							"value" => "",
						),
					),
					"js_view" => 'VcColumnView'
					)
				);
				// Add list item
				vc_map(
				array(
					"name" => __("Imagen"),
					"base" => "orbit_list_item",
					"class" => "",
					"icon" => "icon-wpb-layout_sidebar",
					"category" => __("Páginas",'smile'),
					"content_element" => true,
					"as_child" => array('only' => 'orbit_list'),
					"params" => array(
						array(
							"type" => "attach_image",
							"holder" => "div",
							"heading" => __("Imagen"),
							"class" => "display-none",
							"param_name" => "orbit_list_item_image",
							"value" => "",
						),
						array(
							"type" => "textarea_html",
							// "holder" => "div",
							"heading" => __("Contenido"),
							// "class" => "display-none",
							"param_name" => "contenido",
							"value" => "",
						),
						)
						)
					);
				}
			}
		}
	}

	global $INN_Orbit_list; // WPB: Beter to create singleton in INN_Orbit_list I think, but it also work
	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_orbit_list extends WPBakeryShortCodesContainer {
			function content($atts, $content = null) {
				global $INN_Orbit_list;
				return $INN_Orbit_list -> front_orbit_list($atts, $content);
			}
		}
		class WPBakeryShortCode_orbit_list_item extends WPBakeryShortCode {
			function content($atts, $content = null) {
				global $INN_Orbit_list;
				return $INN_Orbit_list -> front_orbit_list_item($atts, $content);
			}
		}
	}

	if (class_exists('INN_Orbit_list')) {
		$INN_Orbit_list = new INN_Orbit_list;
	}
