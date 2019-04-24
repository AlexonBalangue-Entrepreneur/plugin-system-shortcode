<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.0
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('video_sc')) {

	function video_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'width' => '',
				'height' => '',
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
		$option .= ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($config !='') ? ' '.$config : '';
		$option .= ($url !='') ? ' src="'.$url.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<video'.$option.' controls>'.do_bbcodes($content).'</video>';
	}
		
	add_bbcodes( 'video', 'video_sc' );
}

if(!function_exists('youtube_sc')) {

	function youtube_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//www.youtube.com/embed/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'youtube', 'youtube_sc' );
}

if(!function_exists('dailymotion_sc')) {

	function dailymotion_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//www.dailymotion.com/embed/video/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'dailymotion', 'dailymotion_sc' );
}

if(!function_exists('vimeo_sc')) {

	function vimeo_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//player.vimeo.com/video/'.$source.'?title=0&byline=0&portrait=0"' : '';

		return '<iframe'.$option.' frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'vimeo', 'vimeo_sc' );
}

if(!function_exists('vine_sc')) {

	function vine_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="://vine.co/v/'.$source.'/embed/simple"' : '';

		return '<iframe'.$option.' frameborder="0">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'vine', 'vine_sc' );
}

if(!function_exists('veevr_sc')) {

	function veevr_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://embed.veevr.com/video/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no" webkitallowfullscreen mozallowfullscreen allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'veevr', 'veevr_sc' );
}

if(!function_exists('ustream_sc')) {

	function ustream_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.ustream.tv/embed/'.$source.'?v=3&amp;wmode=direct"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no" webkitallowfullscreen mozallowfullscreen allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'ustream', 'ustream_sc' );
}

if(!function_exists('youmaker_sc')) {

	function youmaker_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.youmaker.com/video/showAFlvEmbed-b5-'.$source.'.html"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'youmaker', 'youmaker_sc' );
}

if(!function_exists('youku_sc')) {

	function youku_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://player.youku.com/embed/'.$source.'=="' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'youku', 'youku_sc' );
}

if(!function_exists('yfrog_sc')) {

	function yfrog_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://yfrog.com/'.$source.':embed"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'yfrog', 'yfrog_sc' );
}

if(!function_exists('yahoo_sc')) {

	function yahoo_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//screen.yahoo.com/'.$source.'.html?format=embed"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true" allowtransparency="true">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'yahoo', 'yahoo_sc' );
}

if(!function_exists('veoh_sc')) {

	function veoh_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$sources = ($source !='') ? '"http://www.veoh.com/swf/webplayer/WebPlayer.swf?version=AFrontend.5.7.0.1504&permalinkId='.$source.'&player=videodetailsembedded&videoAutoPlay=0&id=anonymous"' : '';

		return '<object'.$option.' id="veohFlashPlayer" name="veohFlashPlayer"><param name="movie" value'.$sources.'</param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src='.$sources.' type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true"'.$option.' id="veohFlashPlayerEmbed" name="veohFlashPlayerEmbed"></embed></object>'.$content;
	}
		
	add_bbcodes( 'veoh', 'veoh_sc' );
}

if(!function_exists('vbox7_sc')) {

	function vbox7_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://vbox7.com/emb/external.php?'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'vbox7', 'vbox7_sc' );
}

if(!function_exists('dotsub_sc')) {

	function dotsub_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//dotsub.com/media/'.$source.'/embed/"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'dotsub', 'dotsub_sc' );
}

if(!function_exists('gametrailers_sc')) {

	function gametrailers_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://media.mtvnservices.com/embed/mgid:arc:video:gametrailers.com:'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'gametrailers', 'gametrailers_sc' );
}

if(!function_exists('gloria_sc')) {

	function gloria_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? 'width/'.$width : '';
		$option .= ($height !='') ? 'height/'.$height : '';
		$options = ($source !='') ? ' src="//gloria.tv/embed/frame/media/'.$source : '';

		return '<iframe'.$options.'/'.$option.'" frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'gloria', 'gloria_sc' );
}

if(!function_exists('godtube_sc')) {

	function godtube_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$optionw = ($width !='') ? 'w='.$width : '';
		$optionh = ($height !='') ? 'h='.$height : '';
		$options = ($source !='') ? ' src="http://www.godtube.com/embed/source/'.$source : '';

		return '<script type="text/javascript" src="'.$options.'.js?'.$optionw.'&'.$optionh.'&ap=false&sl=true&title=false"></script>'.$content;
	}
		
	add_bbcodes( 'godtube', 'godtube_sc' );
}

if(!function_exists('ku6_sc')) {

	function ku6_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' data-width="'.$width.'"' : '';
		$option .= ($height !='') ? ' data-height="'.$height.'"' : '';
		$option .= ($source !='') ? ' data-vid="'.$source.'"' : '';

		return '<script'.$option.' src="//player.ku6.com/out/v.js"></script>';
	}
		
	add_bbcodes( 'ku6', 'ku6_sc' );
}

if(!function_exists('screenr_sc')) {

	function screenr_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="//www.screenr.com/embed/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'screenr', 'screenr_sc' );
}

if(!function_exists('xvideos_sc')) {

	function xvideos_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://flashservice.xvideos.com/embedframe/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'xvideos', 'xvideos_sc' );
}

if(!function_exists('liveleak_sc')) {

	function liveleak_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.liveleak.com/ll_embed?f=2eb_'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'liveleak', 'liveleak_sc' );
}

if(!function_exists('twitch_sc')) {

	function twitch_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.twitch.tv/'.$source.'/embed"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'twitch', 'twitch_sc' );
}

if(!function_exists('fbvideo_sc')) {

	function fbvideo_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'autoplay' => '',
				'allowfullscreen' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' data-width="'.$width.'"' : ' data-width="100%"';
		$option .= ($autoplay !='') ? ' data-autoplay="'.$autoplay.'"' : '';
		$option .= ($allowfullscreen !='') ? ' data-allowfullscreen="'.$allowfullscreen.'"' : ' data-allowfullscreen="true"';
		$option .= ($source !='') ? ' data-href="https://www.facebook.com/facebook/videos/'.$source.'/"' : '';

		return '<div class="fb-video"'.$option.'></div>'.$content;
	}
		
	add_bbcodes( 'facebook', 'fbvideo_sc' );
}

if(!function_exists('pornhub_sc')) {

	function pornhub_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.pornhub.com/embed/'.$source.'"' : '';

		return '<iframe'.$option.' frameborder="0" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'pornhub', 'pornhub_sc' );
}
if(!function_exists('youporn_sc')) {

	function youporn_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://www.youporn.com/embed/'.$source.'/n-a/"' : '';

		return '<iframe'.$option.' name="yp_embed_video" scrolling="no">'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'youporn', 'youporn_sc' );
}

if(!function_exists('anysex_sc')) {

	function anysex_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'width' => '',
				'height' => '',
				'source' => ''
		 ), $atts));
		 
		$option = ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
		$option .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
		$option .= ($source !='') ? ' src="http://anysex.com/embed/'.$source.'/embed"' : '';

		return '<iframe'.$option.' frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen>'.do_bbcodes($content).'</iframe>';
	}
		
	add_bbcodes( 'anysex', 'anysex_sc' );
}