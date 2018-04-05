<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	3.9.6
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2018 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
//no direct accees
defined ('_JEXEC') or die('resticted aceess');

// [fa name="home" zoom="2x" more="fa-spin fa-li" /]
// [fa name="home" zoom="2x" /]
// [fa name="home" /]

if(!function_exists('fontawesome_sc')) {

	function fontawesome_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'bs' => '', //version default Fa 5 solid
				'name' => '', //Name of icon
				'zoom' => '', // Zoom: lg, 2x, 3x, 4x, 5x
				'more' => ''//More fa-li, fa-spin, etc....
		 ), $atts));
		 
		$bsv = ($bs !='') ? $bs : 'fal'; //default PRO light v5
		$option = ($name !='') ? ' fa-'.$name : '';
		$option .= ($zoom !='') ? ' fa-'.$zoom : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<i class="'.$bsv.$option.'"></i>' . $content;
	}
		
	add_bbcodes( 'fa', 'fontawesome_sc' );
}
/****
 * 
 * All icon name http://fontawesome.io/icon/
 * and configuration on http://fontawesome.io/examples/
 *
****/