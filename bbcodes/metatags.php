<?php

/**

 * @package	Plugin for Joomla!

 * @subpackage  plg_shortcode

 * @version	3.9.9

 * @author	AlexonBalangue.me

 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.

 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html

 */

//no direct accees

defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('metatags_key_sc')) {
	function metatags_key_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'keywords' => '',
				'url' => ''
		 ), $atts));
		 
		$tags = get_meta_tags($url);
		$option = ($keywords !='') ? $keywords : $tags['keywords'];
		
		return $option;

	}
	add_bbcodes( 'metatags-keywords', 'metatags_key_sc' );
}

if(!function_exists('metatags_desc_sc')) {
	function metatags_desc_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'description' => '',
				'url' => ''
		 ), $atts));
		 
		$tags = get_meta_tags($url);
		$option = ($description !='') ? $description : $tags['description'];
		
		return $option;

	}
	add_bbcodes( 'metatags-description', 'metatags_desc_sc' );
}

if(!function_exists('metatags_auth_sc')) {
	function metatags_auth_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'author' => '',
				'url' => ''
		 ), $atts));
		 
		$tags = get_meta_tags($url);
		$option = ($author !='') ? $author : $tags['author'];
		
		return $option;

	}
	add_bbcodes( 'metatags-author', 'metatags_auth_sc' );
}