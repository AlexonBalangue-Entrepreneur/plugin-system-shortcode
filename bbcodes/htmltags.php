<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.2.1
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');


if(!function_exists('address_sc')) {

	function address_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<address'.$option.'>'.do_bbcodes($content).'</address>';
	}
		
	add_bbcodes( 'address', 'address_sc' );
}
if(!function_exists('source_sc')) {

	function source_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'media' => '',
				'src' => '',
				'type' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($media !='') ? ' media="'.$media.'"' : '';
		$option .= ($src !='') ? ' src="'.$src.'"' : '';
		$option .= ($type !='') ? ' type="'.$type.'"' : '';
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<source'.$option.'>'.do_bbcodes($content).'</source>';
	}
		
	add_bbcodes( 'source', 'source_sc' );
}
if(!function_exists('input_sc')) {

	function input_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'name' => '',
				'type' => '',
				'value' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'config' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		$option = ($name !='') ? ' name="'.$name.'"' : '';
		$option .= ($type !='') ? ' type="'.$type.'"' : '';
		$option .= ($value !='') ? ' value="'.$value.'"' : ''; 
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($config !='') ? ' '.$config : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<input'.$option.' />'.$content;
	}
		
	add_bbcodes( 'input', 'input_sc' );
}
if(!function_exists('button_sc')) {

	function button_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'name' => '',
				'type' => '',
				'value' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'config' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		$option = ($name !='') ? ' name="'.$name.'"' : '';
		$option .= ($type !='') ? ' type="'.$type.'"' : '';
		$option .= ($value !='') ? ' value="'.$value.'"' : ''; 
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($config !='') ? ' '.$config : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<button'.$option.'>'.do_bbcodes($content).'</button>';
	}
		
	add_bbcodes( 'button', 'button_sc' );
}
if(!function_exists('doctype_sc')) {

	function doctype_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'html' => ''
		 ), $atts));
		 
		$option = ($html !='') ? ' '.$html : ' html';

		return '<!DOCTYPE'.$option.'>'.$content;
	}
		
	add_bbcodes( 'doctype', 'doctype_sc' );
}

if(!function_exists('link_sc')) {

	function link_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'rel' => '',
				'type' => '',
				'href' => '',
				'other' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($rel !='') ? ' rel="'.$rel.'"' : '';
		$option .= ($type !='') ? ' type="'.$type.'"' : '';
		$option .= ($href !='') ? ' href="'.$href.'"' : '';
		$option .= ($other !='') ? ' '.$other : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<link'.$option.'>'.$content;
	}
		
	add_bbcodes( 'link', 'link_sc' );
}

if(!function_exists('meta_sc')) {

	function meta_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'chrset' => '',
				'sheme' => '',
				'name' => '',
				'httpequiv' => '',
				'contents' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($chrset !='') ? ' chrset="'.$chrset.'"' : '';
		$option .= ($sheme !='') ? ' sheme="'.$sheme.'"' : '';
		$option .= ($name !='') ? ' name="'.$name.'"' : '';
		$option .= ($httpequiv !='') ? ' http-equiv="'.$httpequiv.'"' : '';
		$option .= ($contents !='') ? ' content="'.$contents.'"' : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<meta'.$option.' />'.$content;
	}
		
	add_bbcodes( 'meta', 'meta_sc' );
}


if(!function_exists('acronym_sc')) {

	function acronym_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<acronym'.$option.'>'.do_bbcodes($content).'</acronym>';
	}
		
	add_bbcodes( 'acronym', 'acronym_sc' );
}

if(!function_exists('abbr_sc')) {

	function abbr_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<abbr'.$option.'>'.do_bbcodes($content).'</abbr>';
	}
		
	add_bbcodes( 'abbr', 'abbr_sc' );
}

if(!function_exists('wbr_sc')) {

	function wbr_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<wbr'.$option.'>'.do_bbcodes($content).'</wbr>';
	}
		
	add_bbcodes( 'wbr', 'wbr_sc' );
}

if(!function_exists('article_sc')) {

	function article_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<article'.$option.'>'.do_bbcodes($content).'</article>';
	}
		
	add_bbcodes( 'article', 'article_sc' );
}

if(!function_exists('aside_sc')) {

	function aside_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';		
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<aside'.$option.'>'.do_bbcodes($content).'</aside>';
	}
		
	add_bbcodes( 'aside', 'aside_sc' );
}

if(!function_exists('b_sc')) {

	function b_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<b'.$option.'>'.do_bbcodes($content).'</b>';
	}
		
	add_bbcodes( 'b', 'b_sc' );
}

if(!function_exists('bdi_sc')) {

	function bdi_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<bdi'.$option.'>'.do_bbcodes($content).'</bdi>';
	}
		
	add_bbcodes( 'bdi', 'bdi_sc' );
}

if(!function_exists('bdo_sc')) {

	function bdo_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<bdo'.$option.'>'.do_bbcodes($content).'</bdo>';
	}
		
	add_bbcodes( 'bdo', 'bdo_sc' );
}

if(!function_exists('big_sc')) {

	function big_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<big'.$option.'>'.do_bbcodes($content).'</big>';
	}
		
	add_bbcodes( 'big', 'big_sc' );
}

if(!function_exists('br_sc')) {

	function br_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';

		return '<br'.$option.' />'.$content;
	}
		
	add_bbcodes( 'br', 'br_sc' );
}

if(!function_exists('center_sc')) {

	function center_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<center'.$option.'>'.do_bbcodes($content).'</center>';
	}
		
	add_bbcodes( 'center', 'center_sc' );
}

if(!function_exists('cite_sc')) {

	function cite_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<cite'.$option.'>'.do_bbcodes($content).'</cite>';
	}
		
	add_bbcodes( 'cite', 'cite_sc' );
}

if(!function_exists('code_sc')) {

	function code_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<code'.$option.'>'.do_bbcodes($content).'</code>';
	}
		
	add_bbcodes( 'code', 'code_sc' );
}

if(!function_exists('datalist_sc')) {

	function datalist_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<datalist'.$option.'>'.do_bbcodes($content).'</datalist>';
	}
		
	add_bbcodes( 'datalist', 'datalist_sc' );
}

if(!function_exists('dd_sc')) {

	function dd_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<dd'.$option.'>'.do_bbcodes($content).'</dd>';
	}
		
	add_bbcodes( 'dd', 'dd_sc' );
}

if(!function_exists('dfn_sc')) {

	function dfn_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<dfn'.$option.'>'.do_bbcodes($content).'</dfn>';
	}
		
	add_bbcodes( 'dfn', 'dfn_sc' );
}

if(!function_exists('dl_sc')) {

	function dl_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<dl'.$option.'>'.do_bbcodes($content).'</dl>';
	}
		
	add_bbcodes( 'dl', 'dl_sc' );
}

if(!function_exists('dt_sc')) {

	function dt_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<dt'.$option.'>'.do_bbcodes($content).'</dt>';
	}
		
	add_bbcodes( 'dt', 'dt_sc' );
}

if(!function_exists('em_sc')) {

	function em_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<em'.$option.'>'.do_bbcodes($content).'</em>';
	}
		
	add_bbcodes( 'em', 'em_sc' );
}

if(!function_exists('figcaption_sc')) {

	function figcaption_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<figcaption'.$option.'>'.do_bbcodes($content).'</figcaption>';
	}
		
	add_bbcodes( 'figcaption', 'figcaption_sc' );
}

if(!function_exists('figure_sc')) {

	function figure_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<figure'.$option.'>'.do_bbcodes($content).'</figure>';
	}
		
	add_bbcodes( 'figure', 'figure_sc' );
}

if(!function_exists('footer_sc')) {

	function footer_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<footer'.$option.'>'.do_bbcodes($content).'</footer>';
	}
		
	add_bbcodes( 'footer', 'footer_sc' );
}

if(!function_exists('header_sc')) {

	function header_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<header'.$option.'>'.do_bbcodes($content).'</header>';
	}
		
	add_bbcodes( 'header', 'header_sc' );
}

if(!function_exists('hr_sc')) {

	function hr_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';

		return '<hr'.$option.' />' . $content;
	}
		
	add_bbcodes( 'hr', 'hr_sc' );
}

if(!function_exists('i_sc')) {

	function i_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';

		return '<i'.$option.'>'.do_bbcodes($content).'</i>';
	}
		
	add_bbcodes( 'i', 'i_sc' );
}

if(!function_exists('kbd_sc')) {

	function kbd_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<kbd'.$option.'>'.do_bbcodes($content).'</kbd>';
	}
		
	add_bbcodes( 'kbd', 'kbd_sc' );
}

if(!function_exists('mark_sc')) {

	function mark_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<mark'.$option.'>'.do_bbcodes($content).'</mark>';
	}
		
	add_bbcodes( 'mark', 'mark_sc' );
}

if(!function_exists('nav_sc')) {

	function nav_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<nav'.$option.'>'.do_bbcodes($content).'</nav>';
	}
		
	add_bbcodes( 'nav', 'nav_sc' );
}

if(!function_exists('noframes_sc')) {

	function noframes_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<noframes'.$option.'>'.do_bbcodes($content).'</noframes>';
	}
		
	add_bbcodes( 'noframes', 'noframes_sc' );
}

if(!function_exists('noscript_sc')) {

	function noscript_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<noscript'.$option.'>'.do_bbcodes($content).'</noscript>';
	}
		
	add_bbcodes( 'noscript', 'noscript_sc' );
}

if(!function_exists('script_sc')) {

	function script_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'src' => '',
				'ampelement' => '',
				'type' => '',
				'more' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($src !='') ? ' src="'.$src.'"' : '';
		$option .= ($ampelement !='') ? ' custom-element="amp-'.$ampelement.'"' : '';
		$option .= ($type !='') ? ' type="'.$type.'"' : '';
		$option .= ($more !='') ? ' '.$more : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<script'.$option.'>'.do_bbcodes($content).'</script>';
	}
		
	add_bbcodes( 'script', 'script_sc' );
}

if(!function_exists('style_sc')) {

	function style_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'media' => '',
				'type' => '',
				'more' => '',
				'mdatatype' => '',
				'ampcustom' => '',//yes
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($media !='') ? ' media="'.$media.'"' : '';
		$option .= ($type !='') ? ' type="'.$type.'"' : '';
		$option .= ($more !='') ? ' '.$more : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		if($ampcustom == 'yes'){
			$data = '<style amp-custom>'.do_bbcodes($content).'</style>';
		}else{
			$data = '<style'.$option.' >'.do_bbcodes($content).'</style>';
		}	
		return $data; 
		
	}
		
	add_bbcodes( 'style', 'style_sc' );
}
if(!function_exists('rp_sc')) {

	function rp_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<rp'.$option.'>'.do_bbcodes($content).'</rp>';
	}
		
	add_bbcodes( 'rp', 'rp_sc' );
}

if(!function_exists('p_sc')) {

	function p_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<p'.$option.'>'.do_bbcodes($content).'</p>';
	}
		
	add_bbcodes( 'p', 'p_sc' );
}
if(!function_exists('rt_sc')) {

	function rt_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<rt'.$option.'>'.do_bbcodes($content).'</rt>';
	}
		
	add_bbcodes( 'rt', 'rt_sc' );
}

if(!function_exists('ruby_sc')) {

	function ruby_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<ruby'.$option.'>'.do_bbcodes($content).'</ruby>';
	}
		
	add_bbcodes( 'ruby', 'ruby_sc' );
}

if(!function_exists('s_sc')) {

	function s_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<s'.$option.'>'.do_bbcodes($content).'</s>';
	}
		
	add_bbcodes( 's', 's_sc' );
}

if(!function_exists('samp_sc')) {

	function samp_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<samp'.$option.'>'.do_bbcodes($content).'</samp>';
	}
		
	add_bbcodes( 'samp', 'samp_sc' );
}

if(!function_exists('section_sc')) {

	function section_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<section'.$option.'>'.do_bbcodes($content).'</section>';
	}
		
	add_bbcodes( 'section', 'section_sc' );
}

if(!function_exists('small_sc')) {

	function small_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<small'.$option.'>'.do_bbcodes($content).'</small>';
	}
		
	add_bbcodes( 'small', 'small_sc' );
}

if(!function_exists('span_sc')) {

	function span_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<span'.$option.'>'.do_bbcodes($content).'</span>';
	}
		
	add_bbcodes( 'span', 'span_sc' );
}

if(!function_exists('strike_sc')) {

	function strike_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<strike'.$option.'>'.do_bbcodes($content).'</strike>';
	}
		
	add_bbcodes( 'strike', 'strike_sc' );
}

if(!function_exists('strong_sc')) {

	function strong_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<strong'.$option.'>'.do_bbcodes($content).'</strong>';
	}
		
	add_bbcodes( 'strong', 'strong_sc' );
}

if(!function_exists('sub_sc')) {

	function sub_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<sub'.$option.'>'.do_bbcodes($content).'</sub>';
	}
		
	add_bbcodes( 'sub', 'sub_sc' );
}

if(!function_exists('summary_sc')) {

	function summary_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<summary'.$option.'>'.do_bbcodes($content).'</summary>';
	}
		
	add_bbcodes( 'summary', 'summary_sc' );
}

if(!function_exists('sup_sc')) {

	function sup_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<sup'.$option.'>'.do_bbcodes($content).'</sup>';
	}
		
	add_bbcodes( 'sup', 'sup_sc' );
}

if(!function_exists('table_sc')) {

	function table_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<table'.$option.'>'.do_bbcodes($content).'</table>';
	}
		
	add_bbcodes( 'table', 'table_sc' );
}

if(!function_exists('td_sc')) {

	function td_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<td'.$option.'>'.do_bbcodes($content).'</td>';
	}
		
	add_bbcodes( 'td', 'td_sc' );
}

if(!function_exists('tt_sc')) {

	function tt_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<tt'.$option.'>'.do_bbcodes($content).'</tt>';
	}
		
	add_bbcodes( 'tt', 'tt_sc' );
}

if(!function_exists('u_sc')) {

	function u_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<u'.$option.'>'.do_bbcodes($content).'</u>';
	}
		
	add_bbcodes( 'u', 'u_sc' );
}

if(!function_exists('var_sc')) {

	function var_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<var'.$option.'>'.do_bbcodes($content).'</var>';
	}
		
	add_bbcodes( 'var', 'var_sc' );
}
if(!function_exists('tr_sc')) {

	function tr_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<tr'.$option.'>'.do_bbcodes($content).'</tr>';
	}
		
	add_bbcodes( 'tr', 'tr_sc' );
}


if(!function_exists('img_sc')) {

	function img_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'src' => '',
				'alt' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		
		$option = ($src !='') ? ' src="'.$src.'"' : '';
		$option .= ($alt !='') ? ' alt="'.$alt.'"' : '';
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';
		
		return '<img'.$option.'>'.$content;
	}
		
	add_bbcodes( 'img', 'img_sc' );
}
if(!function_exists('a_sc')) {

	function a_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'href' => '',
				'xlinkhref' => '',
				'title' => '',
				'rel' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'onclick' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		
		$option = ($href !='') ? ' href="'.$href.'"' : '';
		$option .= ($xlinkhref !='') ? ' xlink:href="'.$xlinkhref.'"' : '';
		$option .= ($title !='') ? ' title="'.$title.'"' : '';
		$option .= ($rel !='') ? ' rel="'.$rel.'"' : '';
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($onclick !='') ? ' onclick="'.$onclick.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';
		
		return '<a'.$option.'>'.do_bbcodes($content).'</a>';
	}
		
	add_bbcodes( 'a', 'a_sc' );
}

if(!function_exists('url_sc')) {

	function url_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'href' => '',
				'title' => '',
				'rel' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'onclick' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		
		$option = ($href !='') ? ' href="'.$href.'"' : '';
		$option .= ($title !='') ? ' title="'.$title.'"' : '';
		$option .= ($rel !='') ? ' rel="'.$rel.'"' : '';
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($onclick !='') ? ' onclick="'.$onclick.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';
		
		return '<a'.$option.'>'.do_bbcodes($content).'</a>';
	}
		
	add_bbcodes( 'url', 'url_sc' );
}

if(!function_exists('ul_sc')) {

	function ul_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<ul'.$option.'>'.do_bbcodes($content).'</ul>';
	}
		
	add_bbcodes( 'ul', 'ul_sc' );
}

if(!function_exists('title_sc')) {

	function title_sc( $atts, $content) {
        ob_start(); 
        ?>
           <title><?php echo do_bbcodes($content); ?></title>
        <?php
        return ob_get_clean();
	}
		
	add_bbcodes( 'title', 'title_sc' );
}

if(!function_exists('none_sc')) {

	function none_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'begin' => '',
				'end' => ''
		 ), $atts));
		 
		$begins = ($begin !='') ? '('.$begin.')'."\r\n" : '';
		$ends = ($end !='') ? "\r\n".'('.$end.')' : '';

		return '<!--'.$begins.do_bbcodes($content).$ends.'-->';
	}
		
	add_bbcodes( 'none', 'none_sc' );
}

if(!function_exists('applet_sc')) {

	function applet_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'config' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($config !='') ? ' '.$config : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<applet'.$option.'>'.do_bbcodes($content).'</applet>';
	}
		
	add_bbcodes( 'applet', 'applet_sc' );
}
/****
applet Obligation code and object
****/

if(!function_exists('base_sc')) {

	function base_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'link' => '',
				'target' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($link !='') ? ' href="'.$link.'"' : '';
		$option .= ($target !='') ? ' target="'.$target.'"' : '';
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';	
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<base'.$option.'>' . $content;
	}
		
	add_bbcodes( 'base', 'base_sc' );
}

if(!function_exists('basefont_sc')) {

	function basefont_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<basefont'.$option.'/>' . $content;
	}
		
	add_bbcodes( 'basefont', 'basefont_sc' );
}

if(!function_exists('blockquote_sc')) {

	function blockquote_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<blockquote'.$option.'>'.do_bbcodes($content).'</blockquote>';
	}
		
	add_bbcodes( 'blockquote', 'blockquote_sc' );
}

if(!function_exists('body_sc')) {

	function body_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<body'.$option.'>'.do_bbcodes($content).'</body>';
	}
		
	add_bbcodes( 'body', 'body_sc' );
}

if(!function_exists('canvas_sc')) {

	function canvas_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<canvas'.$option.'>'.do_bbcodes($content).'</canvas>';
	}
		
	add_bbcodes( 'canvas', 'canvas_sc' );
}

if(!function_exists('caption_sc')) {

	function caption_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<caption'.$option.'>'.do_bbcodes($content).'</caption>';
	}
		
	add_bbcodes( 'caption', 'caption_sc' );
}

if(!function_exists('h1_sc')) {

	function h1_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<h1'.$option.'>'.do_bbcodes($content).'</h1>';
	}
		
	add_bbcodes( 'h1', 'h1_sc' );
}
if(!function_exists('h2_sc')) {

	function h2_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<h2'.$option.'>'.do_bbcodes($content).'</h2>';
	}
		
	add_bbcodes( 'h2', 'h2_sc' );
}
if(!function_exists('h3_sc')) {

	function h3_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<h3'.$option.'>'.do_bbcodes($content).'</h3>';
	}
		
	add_bbcodes( 'h3', 'h3_sc' );
}
if(!function_exists('h4_sc')) {

	function h4_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<h4'.$option.'>'.do_bbcodes($content).'</h4>';
	}
		
	add_bbcodes( 'h4', 'h4_sc' );
}
if(!function_exists('h5_sc')) {

	function h5_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<h5'.$option.'>'.do_bbcodes($content).'</h5>';
	}
		
	add_bbcodes( 'h5', 'h5_sc' );
}
if(!function_exists('h6_sc')) {

	function h6_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<h6'.$option.'>'.do_bbcodes($content).'</h6>';
	}
		
	add_bbcodes( 'h6', 'h6_sc' );
}

if(!function_exists('div_sc')) {

	function div_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'id' => '',
				'class' => '',
				'style' => '',
				'js' => '',
				'css' => '',		
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($js !='') ? ' '.$js : '';
		$option .= ($css !='') ? ' '.$css : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<div'.$option.'>'.do_bbcodes($content).'</div>';
	}
		
	add_bbcodes( 'div', 'div_sc' );
}

if(!function_exists('head_sc')) {

	function head_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'profile' => '',
				'other' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		 
		$option = ($profile !='') ? ' profile="'.$profile.'"' : '';
		$option .= ($other !='') ? ' '.$other : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<head'.$option.'>'.do_bbcodes($content).'</head>';
	}
		
	add_bbcodes( 'head', 'head_sc' );
}

if(!function_exists('html_sc')) {

	function html_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'xmlns' => '',
				'lang' => '',
				'manifest' => '',
				'amp' => '',
				'other' => '',
				'mdatatype' => '',
				'mdataprop' => ''
		 ), $atts));
		
		$option = ($xmlns !='') ? ' xmlns="'.$xmlns.'"' : '';
		$option .= ($lang !='') ? ' lang="'.$lang.'"' : '';
		$option .= ($manifest !='') ? ' manifest="'.$manifest.'"' : '';
		$option .= ($other !='') ? ' '.$other : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';
		/*AMP REQUISE*/
		if($amp == 'yes') {
			$data = '<html amp'.$option.'>';
			$data .= '<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript><script async src="https://cdn.ampproject.org/v0.js"></script>';
			$data .= do_bbcodes($content);
			$data .= '</html>';
		}else{
			$data = '<html'.$option.'>'.do_bbcodes($content).'</html>';
		}
		return $data;
	}
		
	add_bbcodes( 'html', 'html_sc' );
}
/****************If you meet the problem with your template do this************************/
/**
Exemple:
[begins tags='div' more='class="col-sx-12"' /]
[ends tags='div' /]
**/
if(!function_exists('begins_sc')) {

	function begins_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'tags' => '',
				'amptags' => '',
				'layout' => '',
				'width' => '',
				'height' => '',
				'id' => '',
				'class' => '',
				'style' => '',
				'mdatatype' => '',
				'mdataprop' => '',				
				'durationwow' => '',
				'delaywow' => '',
				'offsetwow' => '',
				'iterationwow' => '',				
				'more' => ''
		 ), $atts));
		
		$option = ($tags !='') ? $tags : '';
		$option .= ($amptags !='') ? 'amp-'.$amptags : '';
		$option .= ($layout !='') ? 'layout="'.$layout.'"' : '';
		$option .= ($width !='') ? 'width="'.$width.'"' : '';
		$option .= ($height !='') ? 'height="'.$height.'"' : '';
		$option .= ($id !='') ? ' id="'.$id.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($style !='') ? ' style="'.$style.'"' : '';
		$option .= ($mdatatype !='') ? ' itemscope itemtype="'.$mdatatype.'"' : '';
		$option .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';		
		$option .= ($durationwow !='') ? ' data-wow-duration="'.$durationwow.'"' : '';
		$option .= ($delaywow !='') ? ' data-wow-delay="'.$delaywow.'"' : '';
		$option .= ($offsetwow !='') ? ' data-wow-offset="'.$offsetwow.'"' : '';
		$option .= ($iterationwow !='') ? ' data-wow-iteration="'.$iterationwow.'"' : '';		
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$option.'>'.$content;
	}
		
	add_bbcodes( 'begins', 'begins_sc' );
}

if(!function_exists('ends_sc')) {

	function ends_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'amptags' => '',
				'tags' => ''
		 ), $atts));
		
		$option = ($amptags !='') ? 'amp-'.$amptags : '';
		$option .= ($tags !='') ? $tags : '';

		return $content.'</'.$option.'>';
	}
		
	add_bbcodes( 'ends', 'ends_sc' );
}
