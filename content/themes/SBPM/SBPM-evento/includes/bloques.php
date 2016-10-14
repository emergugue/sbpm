<?php
/*
* Add-on Name: Menú de contenidos Bloques for Visual Composer
*/

if (!class_exists('INN_Blocks_list')) {
	class INN_Blocks_list {
		function __construct() {
			add_action('admin_init', array($this, 'add_blocks_list'));
			if (function_exists('vc_is_inline')) {
				if (!vc_is_inline()) {
					add_shortcode('blocks_list', array($this, 'blocks_list'));
					add_shortcode('blocks_list_item', array($this, 'blocks_list_item'));
				}
			} else {
				add_shortcode('blocks_list', array($this, 'blocks_list'));
				add_shortcode('blocks_list_item', array($this, 'blocks_list_item'));
			}
		}

		function blocks_list($atts, $content = null) {
			$blocks_list_title = '';
			extract(shortcode_atts(array(
				'blocks_list_title' => '',
			), $atts));
			$output = '<div class="block block-rounded block-purple block-image">';
			$output .= '<div class="block_heading">';
			$output .= '<h4 class="text-center">'.$blocks_list_title.'</h4>';
			$output .= '</div>';
			$output .= '<div class="block_content">';
			$output .= do_shortcode($content);
			$output .= '</div>';
			$output .= '</div>';
			return $output;
		}

		function blocks_list_item($atts, $content = null) {
			$blocks_list_item_alignment = $blocks_list_item_button = $blocks_list_item_position = $blocks_list_item_image = $blocks_list_item_type = $blocks_list_item_text = $blocks_list_item_link = '';
			extract(shortcode_atts(array(
				'blocks_list_item_alignment' => '',
				'blocks_list_item_button' => '',
				'blocks_list_item_position' => '',
				'blocks_list_item_image' => '',
				'blocks_list_item_type' => '',
				'blocks_list_item_text' => '',
				'blocks_list_item_link' => '',
			), $atts));
			if ($blocks_list_item_type == "image") {
				$output = '<div class="text-center">';
				$output .= '<img src="'.wp_get_attachment_url($blocks_list_item_image).'" alt="">';
				$output .= '</div>';
			} else {
				$output = '<div class="block_content_holder">';
				$output .= ''.wpb_js_remove_wpautop($content, true).'';
				$output .= '</div>';
			}
			if ($blocks_list_item_position == "relative") {
				$positionButton = "bottom bottom-center";
				$paddingBottom = "";
			} else {
				$positionButton = "text-center clearfix";
				$paddingBottom = "button-gapBottom";
			}
			$output .= '<div class="'.$positionButton.'">';
			$blocks_list_item_link = ( $blocks_list_item_link == '||' ) ? '' : $blocks_list_item_link;
			$link = vc_build_link( $blocks_list_item_link );
			$a_href = $link['url'];
			$a_title = $link['title'];
			$a_target = $link['target'];

			$output .= '<a class="button '.$paddingBottom.' round" href="'.$a_href.'" title="'.$a_title.'" target="'.$a_target.'">'.$blocks_list_item_text.'</a>';
			$output .= '</div>';
			return $output;
		}

		function add_blocks_list() {
			if (function_exists('vc_map')) {
				// Add list
				vc_map(
				array(
					"name" => __("Bloques","smile"),
					"base" => "blocks_list",
					"class" => "",
					"icon" => "icon-wpb-layout_blocks",
					"category" => __("Bloques","smile"),
					"as_parent" => array('only' => 'blocks_list_item'),
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
							"param_name" => "blocks_list_title",
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
					"name" => __("Contenido"),
					"base" => "blocks_list_item",
					"class" => "",
					"icon" => "icon-wpb-layout_sidebar",
					"category" => __("Páginas",'smile'),
					"content_element" => true,
					"as_child" => array('only' => 'blocks_list'),
					"params" => array(
						array(
							"type" => "dropdown",
							"holder" => "div",
							"heading" => __("Tipo"),
							"class" => "display-none",
							"param_name" => "blocks_list_item_type",
							"value" => array(
								"Imagen" =>'image',
								"Texto" =>'text',
							),
						),
						array(
							"type" => "attach_image",
							"holder" => "div",
							"heading" => __("Imagen"),
							"class" => "display-none",
							"param_name" => "blocks_list_item_image",
							"value" => "",
							"dependency" => Array("element" => "blocks_list_item_type", "value" => "image"),
						),
						array(
							"type" => "textarea_html",
							// "holder" => "div",
							"heading" => __("Contenido"),
							// "class" => "display-none",
							"param_name" => "content",
							"value" => "",
							"dependency" => Array("element" => "blocks_list_item_type", "value" => "text"),
						),
						array(
							"type" => "dropdown",
							"holder" => "div",
							"heading" => __("Botón"),
							"param_name" => "blocks_list_item_button",
							"class" => "display-none",
							"value" => array(
								"Encendido" =>'on',
								"Apagado" =>'off',
							),
						),
						// array(
						// 	"type" => "dropdown",
						// 	"holder" => "div",
						// 	"heading" => __("Botón Alineación"),
						// 	"param_name" => "blocks_list_item_alignment",
						// 	"class" => "display-none",
						// 	"value" => array(
						// 		"Centro" =>'center',
						// 		"Derecha" =>'right',
						// 		"Izquierda" =>'left',
						// 	),
						// ),
						array(
							"type" => "dropdown",
							"holder" => "div",
							"heading" => __("Botón Tipo"),
							"param_name" => "blocks_list_item_position",
							"class" => "display-none",
							"value" => array(
								"Clear" =>'clear',
								"Relativo" =>'relative',
							),
						),
						array(
							"type" => "textfield",
							"holder" => "div",
							"heading" => __("Botón Texto"),
							"class" => "display-none",
							"param_name" => "blocks_list_item_text",
							"dependency" => Array("element" => "blocks_list_item_button", "value" => "on"),
							"value" => "Saber más",
						),
						array(
							"type" => "vc_link",
							"holder" => "div",
							"heading" => __("Botón Enlace"),
							"class" => "display-none",
							"param_name" => "blocks_list_item_link",
							"dependency" => Array("element" => "blocks_list_item_button", "value" => "on"),
							"value" => "",
						),
						)
						)
					);
				}
			}
		}
	}

	global $INN_Blocks_list; // WPB: Beter to create singleton in INN_Blocks_list I think, but it also work
	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_blocks_list extends WPBakeryShortCodesContainer {
			function content($atts, $content = null) {
				global $INN_Blocks_list;
				return $INN_Blocks_list -> front_blocks_list($atts, $content);
			}
		}
		class WPBakeryShortCode_blocks_list_item extends WPBakeryShortCode {
			function content($atts, $content = null) {
				global $INN_Blocks_list;
				return $INN_Blocks_list -> front_blocks_list_item($atts, $content);
			}
		}
	}

	if (class_exists('INN_Blocks_list')) {
		$INN_Blocks_list = new INN_Blocks_list;
	}
