<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.1.1
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('badgelxw_sc')) {

	function badgelxw_sc( $atts, $content) {
		extract(bbcodes_atts(array(
		/****Images badge*****/
				'url' => '',//not use this on your website indicate on LivingxWorld because will current link from on your website.
				'parent' => '',
				'category' => '',
				'entreprise' => '',
				'css' => '',
		/****Embed code*****/
				'showembed' => ''
		 ), $atts));
		 
		$urls = ($url !='') ? $url : JURI::current();
		$LivingxWorld = ($parent !='') ? $parent.'/' : '';
		$LivingxWorld .= ($category !='') ? $category.'/' : '';
		$LivingxWorld .= ($entreprise !='') ? $entreprise.'.html' : 'index.html';
		$style_img = ($css !='') ? ' class="'.$css.'"' : '';
		$embeds = ($showembed !='') ? $showembed : 'no';
		ob_start();
			echo '<img src="https://business.livingxworld.com/advice/'.$LivingxWorld.'" alt="Note attribuer par LivingxWorld.com" itemprop="image">';
			if($embeds == 'yes'){
				echo '<textarea cols="40" rows="6"><a href="'.$urls.'" rel="next" target="_top" itemprop="url"><img src="https://business.livingxworld.com/advice/'.$LivingxWorld.'"'.$style_img.' alt="Note attribuer par livingxworld.com" itemprop="image" /></a></textarea>';
			}
		
		
		
		//return '<address'.$option.'>'.do_bbcodes($content).'</address>';
		$data = ob_get_clean();
		return $data;
	}
		
	add_bbcodes( 'lxw-badge', 'badgelxw_sc' );
}