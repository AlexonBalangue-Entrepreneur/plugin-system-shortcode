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

// [fi name="music" /]

if(!function_exists('foundationicons_sc')) {

	function foundationicons_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'name' => '', //Name of icon
				'more' => ''//More fi-li, fi-spin, etc....
		 ), $atts));
		 
		$option = ($name !='') ? 'fi-'.$name : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<i class="'.$option.'"></i>' . $content;
	}
		
	add_bbcodes( 'fi', 'foundationicons_sc' );
}
/****
 * 
 * All icon name http://foundationicons.com
 * and configuration on http://foundationicons.com/more/how-to-use-foundationicons/
 *
****/