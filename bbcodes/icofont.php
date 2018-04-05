<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.1.3
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

//icofonts
//[icofont name='star' /]
if(!function_exists('icofont_sc')) {

	function icofont_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'name' => '',
				'more' => ''
		 ), $atts));
		 
		$option = ($name !='') ? ' icofont-'.$name : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<span class="icofont'.$option.'"></span>'.$content;
	}
		
	add_bbcodes( 'icofont', 'icofont_sc' );
}