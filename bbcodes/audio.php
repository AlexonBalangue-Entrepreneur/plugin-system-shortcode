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

if(!function_exists('audio_sc')) {

	function audio_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'config' => '',
				'url' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($config !='') ? ' '.$config : '';
		$option .= ($url !='') ? ' src="'.$url.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<audio'.$option.' controls>'.do_bbcodes($content).'</audio>';
	}
		
	add_bbcodes( 'audio', 'audio_sc' );
}

if(!function_exists('soundcloud_sc')) {

	function soundcloud_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : '';
		$option .= ($height !='') ? ' height="'.$height.'"' : '';
		$option .= ($source !='') ? ' src="//w.soundcloud.com/player/?source=https%3A//api.soundcloud.com/tracks/'.$source.'&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"' : '';

		return '<iframe'.$option.' scrolling="no" frameborder="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'soundcloud', 'soundcloud_sc' );
}

if(!function_exists('zippyshare_sc')) {

	function zippyshare_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'www' => '',
				'width' => '',
				'colortxt' => '',
				'colorbg' => '',
				'colorplayer' => '',
				'colorwave' => '',
				'colorborder' => '',
				'auto' => '', //false or true
				'volume' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($www !='') ? 'var zippywww="'.$www.'";' : '';
		$option .= ($width !='') ? 'var zippywidth='.$width.';' : '';
		$option .= ($colortxt !='') ? 'var zippytext="'.$colortxt.'";' : '';
		$option .= ($colorbg !='') ? 'var zippyback="'.$colorbg.'";' : '';
		$option .= ($colorplayer !='') ? ' height="'.$colorplayer.'";' : '';
		$option .= ($colorwave !='') ? 'var zippywave = "'.$colorwave.'";' : '';
		$option .= ($colorborder !='') ? 'var zippyborder = "'.$colorborder.'";' : '';
		$option .= ($auto !='') ? 'var zippyauto='.$auto.';' : '';
		$option .= ($volume !='') ? 'var zippyvol='.$volume.';' : '';
		$option .= ($source !='') ? 'var zippyfile="'.$source.'";' : '';

		return '<script type="text/javascript">'.$option.'</script><script type="text/javascript" src="http://api.zippyshare.com/api/embed_new.js"></script>'.$content;
	}
		
	add_bbcodes( 'zippyshare', 'zippyshare_sc' );
}

//Simply config


