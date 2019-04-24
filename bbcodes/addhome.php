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

if(!function_exists('addhomescreen_sc')) {
	function addhomescreen_sc($atts, $content=""){
		extract(bbcodes_atts(array(
			'appID' => '',//exemple: org.cubiq.addtohome = general if not have apps
			'fontSize' => '',//15
			'debug' => '',//false|true
			'modal' => '',//false|true
			'mandatory' => '',//false|true
			'autostart' => '',//false|true
			'skipFirstVisit' => '',//false|true
			'startDelay' => '',//1
			'lifespan' => '',//15
			'displayPace' => '',//1440
			'maxDisplayCount' => '',//number
			'icon' => '',//false|true
			'message' => '',
			'validLocation' => '',
			'onInit' => '',
			'onShow' => '',
			'onRemove' => '',
			'onAdd' => '',
			'onPrivate' => '',
			'privateModeOverride' => '',//false|true
			'detectHomescreen' => ''//empty|false|true|hash|smartURL|queryString
		 ), $atts));
		 ob_start();
//config option
	if(!empty($appID)):	$show_ouput = 'appID: \''.$appID.'\','; else: $show_ouput = ''; endif;
	if(!empty($onInit)): $show_ouput = 'onInit: '.$onInit.','; else: $show_ouput = ''; endif;
	if(!empty($onShow)): $show_ouput = 'onShow: '.$onShow.','; else: $show_ouput = ''; endif;
	if(!empty($onRemove)): $show_ouput = 'onRemove: '.$onRemove.','; else: $show_ouput = ''; endif;
	if(!empty($onAdd)):	$show_ouput = 'onAdd: '.$onAdd.','; else: $show_ouput = ''; endif;
	if(!empty($onPrivate)):	$show_ouput = 'onPrivate: '.$onPrivate.','; else: $show_ouput = ''; endif;
	if(!empty($fontSize)): $show_ouput = 'fontSize: '.$fontSize.','; else: $show_ouput = ''; endif; 
	if(!empty($debug)):	
		$debug_input = $debug; 
		switch($debug_input):
			case 'false': $show_ouput = 'debug: false,'; break;
			case 'true': $show_ouput = 'debug: true,'; break;
		endswitch;
	else: $show_ouput = ''; endif;
	if(!empty($modal)):	
		$modal_input = $modal; 
		switch($modal_input):
			case 'false': $show_ouput = 'modal: false,'; break;
			case 'true': $show_ouput = 'modal: true,'; break;
		endswitch;
	else: $show_ouput = ''; endif;
	if(!empty($mandatory)):	
		$mandatory_input = $mandatory; 
		switch($mandatory_input):
			case 'false': $show_ouput = 'mandatory: false,'; break;
			case 'true': $show_ouput = 'mandatory: true,';	break;
		endswitch;
	else: $show_ouput = ''; endif;
	if(!empty($autostart)):	
		$autostart_input = $autostart; 
		switch($autostart_input):
			case 'false': $show_ouput = 'autostart: false,'; break;
			case 'true': $show_ouput = 'autostart: true,'; break;
		endswitch;
	else: $show_ouput = ''; endif;
	if(!empty($skipFirstVisit)):	
		$skipFirstVisit_input = $skipFirstVisit; 
		switch($skipFirstVisit_input):
			case 'false': $show_ouput = 'skipFirstVisit: false,'; break;
			case 'true': $show_ouput = 'skipFirstVisit: true,'; break;
		endswitch;
	else: $show_ouput = ''; endif;
	if(!empty($startDelay)): $show_ouput = 'startDelay: '.$startDelay.','; else: $show_ouput = ''; endif;
	if(!empty($lifespan)): $show_ouput = 'lifespan: '.$lifespan.','; else: $show_ouput = ''; endif;
	if(!empty($displayPace)): $show_ouput = 'displayPace: '.$displayPace.','; else: $show_ouput = ''; endif;
	if(!empty($maxDisplayCount)): $show_ouput = 'maxDisplayCount: '.$maxDisplayCount.','; else: $show_ouput = ''; endif;
	if(!empty($icon)):	
		$icon_input = $icon; 
		switch($icon_input):
			case 'false': $show_ouput = 'icon: false,'; break;
			case 'true': $show_ouput = 'icon: true,'; break; 
		endswitch;
	else: $show_ouput = ''; endif;
	if(!empty($message)): $show_ouput = 'message: \''.$message.'\','; else: $show_ouput = ''; endif;
	if(!empty($validLocation)):	$show_ouput = 'validLocation: '.$validLocation.','; else: $show_ouput = ''; endif;
	if(!empty($privateModeOverride)):	
		$privateModeOverride_input = $privateModeOverride; 
		switch($privateModeOverride_input):
			case 'false': $show_ouput = 'privateModeOverride: false,'; break;
			case 'true': $show_ouput = 'privateModeOverride: true,'; break;
		endswitch;
	else: $show_ouput = ''; endif;
	if(!empty($detectHomescreen)):	
		$detectHomescreen_input = $detectHomescreen; 
		switch($detectHomescreen_input):
			case 'false': $show_ouput = 'detectHomescreen: false'; break;
			case 'true': $show_ouput = 'detectHomescreen: true'; break;
			case 'hash': $show_ouput = 'detectHomescreen: \''.JURI::base().'#ath\''; break;
			case 'queryString': $show_ouput = 'detectHomescreen: \''.JURI::base().'?ath=\''; break;
			case 'smartURL': $show_ouput = 'detectHomescreen: \''.JURI::base().'ath/\''; break;
		endswitch;
	else: $show_ouput = ''; endif;					
		$data = ob_get_clean();
			return $data;
		//return '<script>addToHomescreen({'.$show_ouput.'});</script>'; $content;
	}
		
	add_bbcodes( 'add-homescreen', 'addhomescreen_sc' );
}
