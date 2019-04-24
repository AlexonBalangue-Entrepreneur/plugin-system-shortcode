<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	3.9.7
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
//no direct accees
defined ('_JEXEC') or die('resticted aceess');

if(!function_exists('muirtl_sc')) {

	function muirtl_sc( $atts, $content ) {
		extract(bbcodes_atts(array(
				'tags' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'mdatatype' => '',
				'mdataprop' => '',
				'more' => ''
		 ), $atts));
		 
		$tag = ($tags !='') ? $tags : 'div';
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$tag.' dir="rtl"'.$option.'>'.do_bbcodes($content).'</'.$tag.'>';
	}
		
	add_bbcodes( 'mui-rtl', 'muirtl_sc' );
}

if(!function_exists('muicons_sc')) {

	function muicons_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'name' => '', 
				'zoom' => '', 
				'color' => '', 
				'more' => ''
		 ), $atts));
		 
		$option = ($name !='') ? ' mif-'.$name : '';
		$option .= ($zoom !='') ? ' mif-'.$zoom : '';
		$option .= ($color !='') ? ' fg-'.$color : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<span class="'.$option.'"></span>' . $content;
	}
		
	add_bbcodes( 'muif', 'muicons_sc' );
}
if(!function_exists('muigridrow_sc')) {

	function muigridrow_sc( $atts, $content) {
        ob_start(); 
        ?>
           <div class="grid"><?php echo do_bbcodes($content); ?></div>
        <?php
        return ob_get_clean();
	}
		
	add_bbcodes( 'muigridrow', 'muigridrow_sc' );
}

if(!function_exists('muigrid_sc')) {

	function muigrid_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				/*DEFAULT*/
				'grid' => '',
				'offset' => '',
				'col' => '',
				/*flex*/
				'flexgrid' => '',
				'size' => '',
				'more' => ''
		 ), $atts));
		 
		$option = ($grid !='') ? ' row cell'.$grid : '';
		$option .= ($flexgrid !='') ? ' row flex-'.$flexgrid : '';
		$option .= ($offset !='') ? ' offset'.$offset : '';
		$option .= ($col !='') ? ' colspan'.$col : '';
		$option .= ($size !='') ? ' size'.$size : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<div class="'.$option.'">'.do_bbcodes($content).'</div>';
	}
		
	add_bbcodes( 'muigrid', 'muigrid_sc' );
}

if(!function_exists('muimg_sc')) {

	function muimg_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'containers' => '', 
				'format' => '', 
				'alt' => '', 
				'src' => '', 
				'more' => ''
		 ), $atts));
		 
		$option = ($containers !='') ? ' '.$containers : '';
		$option .= ($format !='') ? ' image-format-'.$format : '';
		$option .= ($more !='') ? ' '.$more : '';
		$imgs = ($alt !='') ? ' alt="'.$alt.'"' : 'alt=""';
		$imgs .= ($src !='') ? ' src="'.$src.'"' : 'src="#"';

		return '<div class="image-container'.$option.'"><div class="frame"><img'.$imgs.'></div></div>'.$content;
	}
		
	add_bbcodes( 'muimg', 'muimg_sc' );
}

if(!function_exists('muimgoverlay_sc')) {

	function muimgoverlay_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'containers' => '', 
				'format' => '', 
				'alt' => '', 
				'src' => '', 
				'color' => '', 
				'more' => ''
		 ), $atts));
		 
		$option = ($containers !='') ? ' '.$containers : 'image-container';
		$option .= ($format !='') ? ' image-format-'.$format : '';
		$option .= ($more !='') ? ' '.$more : '';
		$imgs = ($alt !='') ? ' alt="'.$alt.'"' : 'alt=""';
		$imgs .= ($src !='') ? ' src="'.$src.'"' : 'src="#"';
		$colors = ($color !='') ? ' op-'.$color : '';

		return '<div class="image-container'.$option.'"><div class="frame"><img'.$imgs.'></div><div class="image-overlay'.$colors.'">'.do_bbcodes($content).'</div></div>';
	}
		
	add_bbcodes( 'muimg-overlay', 'muimgoverlay_sc' );
}

if(!function_exists('muihelper_sc')) {

	function muihelper_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'tags' => '', 
				'padding' => '', 
				'margin' => '', 
				'nomargin' => '', 
				'nopadding' => '', 
				'float' => '', 
				'blockshadow' => '', 
				'rotate' => '', 
				'more' => ''
		 ), $atts));
		 
		$tag = ($tags !='') ? $tags : 'span';
		$option = ($padding !='') ? ' padding'.$padding : '';
		$option .= ($margin !='') ? ' margin'.$margin : '';
		$option .= ($nomargin !='') ? ' no-margin'.$nomargin : '';
		$option .= ($nopadding !='') ? ' no-padding'.$nopadding : '';
		$option .= ($float !='') ? ' place-'.$float : '';
		$option .= ($blockshadow !='') ? ' block-shadow-'.$blockshadow : '';
		$option .= ($rotate !='') ? ' rotate'.$rotate : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$tag.' class="'.$option.'">'.do_bbcodes($content).'</'.$tag.'>';
	}
		
	add_bbcodes( 'mui-helper', 'muihelper_sc' );
}

if(!function_exists('muitable_sc')) {

	function muitable_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'more' => ''
		 ), $atts));
		 
		$option = ($more !='') ? ' '.$more : '';

		return '<table class="table'.$option.'">'.do_bbcodes($content).'</table>';
	}
		
	add_bbcodes( 'mui-table', 'muitable_sc' );
}
if(!function_exists('muidatahotkey_sc')) {

	function muidatahotkey_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'tags' => '',
				'data' => '',
				'class' => '',
				'url' => '',
				'id' => '',
				'more' => ''
		 ), $atts));
		 
		$tag = ($tags !='') ? $tags : 'button';
		$option = ($data !='') ? ' data-hotkey="'.$data.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($url !='') ? ' href="'.$url.'"' : '';
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$tag.$option.'">'.do_bbcodes($content).'</'.$tag.'>';
	}
		
	add_bbcodes( 'mui-hotkey', 'muidatahotkey_sc' );
}
