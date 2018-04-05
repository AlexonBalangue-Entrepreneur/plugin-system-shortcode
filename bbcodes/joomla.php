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

if(!function_exists('jreadmore_sc')) {

	function jreadmore_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : ' id="system-readmore"';

		return '<hr'.$option.'/>'.$content;
	}
		
	add_bbcodes( 'jreadmore', 'jreadmore_sc' );
}
if(!function_exists('jpagebreak_sc')) {

	function jpagebreak_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'title' => '',
				'class' => ''
		 ), $atts));
		 
		$option = ($title !='') ? ' title="'.$title.'" alt="'.$title.'"' : '';
		$option = ($class !='') ? ' class="'.$class.'"' : ' class="system-pagebreak"';

		return '<hr'.$option.'/>'.$content;
	}
		
	add_bbcodes( 'jpagebreak', 'jpagebreak_sc' );
}
if(!function_exists('jcurrenturls_sc')) {

	function jcurrenturl_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'intern' => ''
		 ), $atts));
		 
		$option = ($title !='') ? $intern : $_SERVER["REQUEST_URI"];

		return $option.$content;
	}
		
	add_bbcodes( 'jurls', 'jcurrenturl_sc' );
}
if(!function_exists('jflags_sc')) {

	function jflags_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'folder' => '',
				'name' => '',
				'type' => '',
		 ), $atts));
		 
		$option1 = ($folder !='') ? $folder : 'media/mod_languages/images';
		$option2 = ($name !='') ? $name : '';
		$option3 = ($type !='') ? $type : 'gif';

		return '<img src="'.$option1.'/'.$option2.'.'.$option3.'" alt="'.$option2.'"/> '.$content;
	}
		
	add_bbcodes( 'jflag', 'jflags_sc' );
}