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


// [wi name="cloud" /]

if(!function_exists('weathericons_sc')) {

	function weathericons_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'day' => '', 
				'night' => '', 
				'name' => '', 
				'moon' => '', 
				'time' => '', 
				'direction' => '', 
				'degtowards' => '', 
				'degfrom' => '', 
				'cardinal' => '', 
				'beaufort' => '', 
				'flip' => '', 
				'rotate' => '', 
				'more' => ''
		 ), $atts));
		 
		$option = ($name !='') ? ' wi-'.$name : '';
		$option .= ($day !='') ? ' wi-day-'.$day : '';
		$option .= ($night !='') ? ' wi-night-'.$night : '';
		$option .= ($moon !='') ? ' wi-moon-'.$moon : '';
		$option .= ($time !='') ? ' wi-time-'.$time : '';
		$option .= ($direction !='') ? ' wi-direction-'.$direction : '';
		$option .= ($degtowards !='') ? ' wi-wind.towards-'.$degtowards.'-deg' : '';
		$option .= ($degfrom !='') ? ' wi-wind.from-'.$degfrom.'-deg' : '';
		$option .= ($cardinal !='') ? ' wi-'.$cardinal : '';
		$option .= ($beaufort !='') ? ' wi-wind-beaufort-'.$beaufort : '';
		$option .= ($flip !='') ? ' wi-flip-'.$flip : '';
		$option .= ($rotate !='') ? ' wi-rotate-'.$rotate : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<i class="wi'.$option.'"></i>' . $content;
	}
		
	add_bbcodes( 'wi', 'weathericons_sc' );
}
/****
 * 
 * All icon name http://weathericons.io/
 * and configuration on https://erikflowers.github.io/weather-icons/
 *
****/