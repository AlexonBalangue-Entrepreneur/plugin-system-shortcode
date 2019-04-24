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

// [typcn name="home" /]

if(!function_exists('typicons_sc')) {

	function typicons_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'name' => '', //Name of icon
				'more' => ''//More typcn-li, typcn-spin, etc....
		 ), $atts));
		 
		$option = ($name !='') ? ' typcn-'.$name : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<span class="typcn'.$option.'"></span>' . $content;
	}
		
	add_bbcodes( 'typcn', 'typicons_sc' );
}
/****
 * 
 * All icon name http://typicons.com
 * and configuration on http://typicons.com/more/how-to-use-typicons/
 *
****/