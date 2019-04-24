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

// [cookies legal="text here" botton="Accept cookie" url="http://info.tld/privacy" /]
/*
add your fils css:
.coockie_banner { left: 0px; text-align: center; position: fixed; bottom: 0px; background: rgb(0, 0, 0) none repeat scroll 0% 0%; color: rgb(255, 255, 255); width: 100% !important; padding-top: 4px; padding-bottom: 4px; }
.coockie_banner p { padding:4px; }

recommande use module opensource Joomla on AlexonBalangue.me select cookies
*/
if(!function_exists('cookies_sc')) {

	function cookies_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'css' => '', //expert only
				'legal' => '', 
				'botton' => '', 
				'btncss1' => '', //expert only
				'btncss2' => '', //expert only
				'url' => '',
				'info' => '',
				'agreecookieown' => 'Yes',//Cookie Yes/NO Take off PHP config
				'agreeanalistycown' => 'Yes',//Cookie Yes/NO
				'customcown' => '',//Custom Yes/NO
				'hidden1' => '',//expert only
				'hidden2' => '',//expert only
				'hidden3' => ''//expert only
		 ), $atts));
		 
		$csss = ($css !='') ? ' '.$css : ' class="coockie_banner"';//expert only
		$legales = ($legal !='') ? $legal : '';
		$bottons = ($botton !='') ? $botton : '';
		$btn_classOK = ($btncss1 !='') ? ' '.$btncss1 : ' class="btn btn-primary"';//expert only
		$btn_classINFO = ($btncss2 !='') ? ' '.$btncss2 : ' class="btn btn-info"';//expert only
		$urls = ($url !='') ? $url : '';
		$infos = ($info !='') ? $info : '<i class="fa fa-info fa-3x"></i>';
		$cookie_out = ($hidden1 !='') ? $hidden1 : 'agreeCookies';//expert only
		$analistycs_out = ($hidden2 !='') ? $hidden2 : 'agreeAnalitycs';//expert only
		$custom_out = ($hidden3 !='') ? $hidden3 : '';//expert only
		//Take off Shortcode instead PHP config variable autorisate 
		$agreeCookies = ($agreecookieown !='') ? $agreecookieown : 'No';
		$agreeAnalitycs = ($agreeanalistycown !='') ? $agreeanalistycown : 'No';
		$agreeCustomers = ($customcown !='') ? $customcown : 'No';
		
		$cookie = isset($_COOKIE['accept_cookie']) ? $_COOKIE['accept_cookie'] : 'No';
			
			$strOutputHTML = "";
			$strOutputHTML .= '<div'.$csss.'>';
			$strOutputHTML .= '<p class="text-center">'.$legales.'<button'.$btn_classOK.'>'.$bottons.'</button><a href="'.$urls.'" target="_blank"'.$btn_classINFO.'>'.$infos.'</a></p>';
            if($agreeCookies == 'Yes') {
                $strOutputHTML .= '<input type="hidden" class="'.$cookie_out.'" value="true" />';
            } else {
                 $strOutputHTML .= '<input type="hidden" class="'.$cookie_out.'" value="false" />';
            }
            if($agreeAnalitycs == 'Yes') {
                $strOutputHTML .= '<input type="hidden" class="'.$analistycs_out.'" value="true" />';
            } else {
                $strOutputHTML .= '<input type="hidden" class="'.$analistycs_out.'" value="false" />';
            }
            if($agreeCustomers == 'Yes') {
                $strOutputHTML .= '<input type="hidden" class="'.$custom_out.'" value="true" />';
            } else {
                $strOutputHTML .= '<input type="hidden" class="'.$custom_out.'" value="false" />';
            }
			//$strOutputHTML .= '</div>'
		if($cookie != 'Yes'){
			return $strOutputHTML .'</div>'. $content;
		}
		return $content;
	}
		
	add_bbcodes( 'cookies', 'cookies_sc' );
}