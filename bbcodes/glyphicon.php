<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	3.9.6
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

//Glyphicons
//[glyphicon name='star' /]
if(!function_exists('glyphicon_sc')) {

	function glyphicon_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'name' => '',
				'more' => ''
		 ), $atts));
		 
		$option = ($name !='') ? ' glyphicon-'.$name : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<span class="glyphicon'.$option.'"></span>'.$content;
	}
		
	add_bbcodes( 'glyphicon', 'glyphicon_sc' );
}