<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plarge_shortcode
 * @version	3.9.7
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
 defined ('_JEXEC') or die('resticted aceess');
//no direct accees
if(!function_exists('figridrow_sc')) {

	function figridrow_sc( $atts, $content) {		
		extract(bbcodes_atts(array(
				'small' => '',
				'medium' => '',
				'large' => '',
				'more' => ''
		 ), $atts));
		 
		$option = ($small !='') ? ' small-'.$small : '';
		$option .= ($medium !='') ? ' medium-'.$medium : '';
		$option .= ($large !='') ? ' large-'.$large : '';
		
        return '<div class="row'.$option.'">'.do_bbcodes($content).'</div>';

	}
		
	add_bbcodes( 'figridrow', 'figridrow_sc' );
}

//[figrid small='12' sm='6' medium='4' large='4']code here ou texte[/figrid]
//[figrid grid="12"]code here ou texte[/figrid]
if(!function_exists('figrid_sc')) {

	function figrid_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'small' => '',
				'medium' => '',
				'large' => '',
				'grid' => '',
				'offsetsmall' => '',
				'offsetmedium' => '',
				'offsetlarge' => '',
				'offset' => '',
				'pushsmall' => '',
				'pushmedium' => '',
				'pushlarge' => '',
				'push' => '',
				'pullsmall' => '',
				'pullmedium' => '',
				'pulllarge' => '',
				'blockgridsmall' => '',
				'blockgridmedium' => '',
				'blockgridlarge' => '',
				'pull' => '',
				'columns' => '',
				'more' => ''
		 ), $atts));
		 
		$option = ($small !='') ? ' small-'.$small : '';
		$option .= ($medium !='') ? ' medium-'.$medium : '';
		$option .= ($large !='') ? ' large-'.$large : '';
		$option .= ($grid !='') ? 'small-'.$grid.' medium-'.$grid.' large-'.$grid : '';
		$option .= ($offsetsmall !='') ? ' small-offset-'.$offsetsmall : '';
		$option .= ($offsetmedium !='') ? ' medium-offset-'.$offsetmedium : '';
		$option .= ($offsetlarge !='') ? ' large-offset-'.$offsetlarge : '';
		$option .= ($offset !='') ? 'small-offset-'.$offset.' medium-offset-'.$offset.' large-offset-'.$offset : '';
		$option .= ($pushsmall !='') ? ' small-push-'.$pushsmall : '';
		$option .= ($pushmedium !='') ? ' medium-push-'.$pushmedium : '';
		$option .= ($pushlarge !='') ? ' large-push-'.$pushlarge : '';
		$option .= ($push !='') ? 'small-push-'.$push.' medium-push-'.$push.' large-push-'.$push : '';
		$option .= ($pullsmall !='') ? ' small-pull-'.$pullsmall : '';
		$option .= ($pullmedium !='') ? ' medium-pull-'.$pullmedium : '';
		$option .= ($pulllarge !='') ? ' large-pull-'.$pulllarge : '';
		$option .= ($pullsmall !='') ? ' small-block-grid-'.$blockgridsmall : '';
		$option .= ($pullmedium !='') ? ' medium-block-grid-'.$blockgridmedium : '';
		$option .= ($pulllarge !='') ? ' large-block-grid-'.$blockgridlarge : '';
		$option .= ($pull !='') ? 'small-pull-'.$pull.' medium-pull-'.$pull.' large-pull-'.$pull : '';
		$option .= ($more !='') ? ' '.$more : '';

		if($columns == 'yes'){
			return '<div class="'.$option.' columns">'.do_bbcodes($content).'</div>';
		} else {
			return '<div class="'.$option.'">'.do_bbcodes($content).'</div>';
		}
	}	
	add_bbcodes( 'figrid', 'figrid_sc' );

}