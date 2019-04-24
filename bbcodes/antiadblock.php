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

if(!function_exists('antiadblocker_sc')) {

	function antiadblocker_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'showcss' => '', 
				'hidecss' => '',
				'name' => ''
		 ), $atts));
		 
		$showcss_out = ($showcss !='') ? $showcss : 'blocker';
		$hidecss_out = ($hidecss !='') ? $hidecss : 'noblocker';
		$encoded = ($name !='') ? $name : chr(98 + mt_rand(0,24)) . substr(sha1(time()), 0, 20); 
		//output HTML
		ob_start();
			echo '<script>function '.$encoded.'(){clearInterval(adBTimers),0==$(".'.$showcss_out.'").height()&&$(".'.$hidecss_out.'").show()}var adBTimers;$(document).ready(function(){adBTimers=setInterval(function(){'.$encoded.'()},3e3)});</script>'. $content;
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'adblocker-js', 'antiadblocker_sc' );
}
if(!function_exists('adblocker_sc')) {

	function adblocker_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'showcss' => '', 
				'hidecss' => '',
				'style' => '',
				'message' => ''
		 ), $atts));
		 
		$showcss_out = ($showcss !='') ? ' class="'.$showcss.'"' : ' class="blocker"';
		$hidecss_out = ($hidecss !='') ? ' class="'.$hidecss.'"' : ' class="noblocker"';
		if($style == 'yes'){$hidecss_out .= ' style="background-color:#cccccc;display:none;height:90px;text-align:center;width:100%;"';}
		$messages_out = ($message !='') ? $message : '';
		
		//output HTML
		ob_start();
			echo '<div'.$hidecss_out.'>'.do_bbcodes($content).'</div><div'.$showcss_out.'>'.$messages_out.'</div>';
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'adblocker', 'adblocker_sc' );
}
/*
Script JS compatible with Boostrap on http://teufa.free.fr/pages/my-bootstrap-jquery-anti-adblock/index.html#
<script>
var adBlockTimer;
function AdblockUser() {
    clearInterval(adBlockTimer);
    if ($('.myTestAd').height() == 0) {
  $(".bloc").show();
    }
}
$(document).ready(function(){
    adBlockTimer = setInterval(function(){AdblockUser()},3000);
});
</script>

<div class="myTestAd">
<!---------------/ votre code publictaire ici \------------------------------>
</div>
<div class="bloc" style="background-color: #cccccc; display: none; height: 90px; text-align: center; width: 100%;">
SVP, veuillez désactiver ADBlock. En nous privant de revenus, les bloqueurs de publicités nuisent au dÃ©veloppement du site et à la création d'emplois. Merci!
</div>
<!--/myadblock-->

*/