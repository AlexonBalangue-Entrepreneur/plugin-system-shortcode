<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	3.9.8
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2016 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');
/**
if(!function_exists('name_sc')) {

	function jreadmore_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : 'id';

		return '<hr'.$option.'/>'.$content;
	}
		
	add_bbcodes( 'name', 'name_sc' );
}
***/