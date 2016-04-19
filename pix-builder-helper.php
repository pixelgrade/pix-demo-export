<?php
// This file needs to be used outside of plugin

/*
Plugin Name: DemoXml - Pix Builder Helper
Plugin URI: http://wordpress.org/plugins/pix_builder_export_helper/
Description: This is only for Pile.
Author: Andrei Lupu
Version: 2.6
Author URI: http://andrei-lupu.com/
*/

// add_filter('wxr_export_post_meta_value', 'pix_builder_filter_try', 10, 2);

function pix_builder_filter_try( $meta_key, $meta_value ) {

	if ( ! empty($meta_value) && ( $meta_key === '_pile_page_builder' || $meta_key === '_pile_project_builder' ) ) {

		if ( class_exists('DemoXmlPlugin') ) {

			// // cache replacers
			$replacers = DemoXmlPlugin::$attachment_replacers;
			$blocks = json_decode( $meta_value );
 
			if ( !empty($blocks) ) {
				foreach ($blocks as $key => $block) {

					if ( $block->type === 'editor' ) {
						$block->content = wp_slash($block->content);
					} elseif ( $block->type === 'image' ) {
						$replacers = DemoXmlPlugin::rotate_array( $replacers );
						var_dump('rere' . $block->content );
						$block->content = $replacers[0];
					}
				}

				return json_encode($blocks);
			}

			// // I know for sure this meta_value has an id or ids separated with commas
			// $ids = explode(',', $meta_value);

			// // cache replacers
			// $replacers = DemoXmlPlugin::$attachment_replacers;
			// $new_meta = array();
			// foreach ($ids as $key => $id ) {
			// 	// always get the first id, and after that shift the id
			// 	$new_meta[$key] = $replacers[0];
			// 	$replacers = DemoXmlPlugin::rotate_array( $replacers );
			// }

			// $return_string = implode(',', $new_meta);

			// return $return_string;
		}
	}
	return $meta_value;
}

// add_filter( 'the_content_export', 'wxr_export_content_value_for_pile' );

add_filter( 'the_content_export', 'wxr_export_content_value_for_pile2', 999, 1 );

function wxr_export_content_value_for_pile( $content ) {
	return wp_slash( $content );
}

function wxr_export_content_value_for_pile2( $content ) {

		if ( class_exists('DemoXmlPlugin') ) {

			// // cache replacers
			$replacers = DemoXmlPlugin::$attachment_replacers;
			$blocks = json_decode( wp_unslash( $content ) );
 
			$is_builder = false;

			if ( !empty($blocks) ) {
				foreach ($blocks as $key => $block) {
					if ( $block->type === 'editor' ) {
						$block->content = wp_slash($block->content);
						$is_builder = true;
					} elseif ( $block->type === 'image' ) {
						$replacers = DemoXmlPlugin::rotate_array( $replacers );
						$block->content = $replacers[0];
						$is_builder = true;
					}
				}

				if ( $is_builder ) {
					return json_encode($blocks);
				}
			}

			// // I know for sure this meta_value has an id or ids separated with commas
			// $ids = explode(',', $meta_value);

			// // cache replacers
			// $replacers = DemoXmlPlugin::$attachment_replacers;
			// $new_meta = array();
			// foreach ($ids as $key => $id ) {
			// 	// always get the first id, and after that shift the id
			// 	$new_meta[$key] = $replacers[0];
			// 	$replacers = DemoXmlPlugin::rotate_array( $replacers );
			// }

			// $return_string = implode(',', $new_meta);

			// return $return_string;
		}
	return $content;
}
