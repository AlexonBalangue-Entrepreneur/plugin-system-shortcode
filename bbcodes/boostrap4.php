<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.0.1 (BETA)
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2017 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
//no direct accees
defined ('_JEXEC') or die('resticted aceess');

/********************** Category CSS ********************************/
//Grid
/****
How to use Grid BS4 totaly
[bs4gridrow]
	[bs4grid auto='yes']code here ou texte[/bs4grid]	
	[bs4grid auto='yes']code here ou texte[/bs4grid]	
[/bs4gridrow]
--------OR-------
[bs4gridrow]
	[bs4grid xs='6' sm='4' md='4' lg='4' xl='4']code here ou texte[/bs4grid]	
	[bs4grid xs='6' sm='4' md='4' lg='4']code here ou texte[/bs4grid]	
	[bs4clearfix xs='xs' /]
	[bs4grid xs='12' sm='4' md='4' lg='4']code here ou texte[/bs4grid]	
[/bs4gridrow]
****/
//[bs4gridrow]code here ou texte[/bs4gridrow]
if(!function_exists('bs4gridrow_sc')) {

	function bs4gridrow_sc( $atts, $content) {
        ob_start(); 
        ?>
           <div class="row"><?php echo do_bbcodes($content); ?></div>
        <?php
        return ob_get_clean();
	}
		
	add_bbcodes( 'bs4gridrow', 'bs4gridrow_sc' );
}

//[bs4grid xs='12' sm='6' md='4' lg='4' xl='4']code here ou texte[/bs4grid]
//[bs4grid auto="yes/no"]code here ou texte[/bs4grid]
if(!function_exists('bs4grid_sc')) {

	function bs4grid_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'xs' => '',
				'sm' => '',
				'md' => '',
				'lg' => '',
				'grid' => '',
				'offsetxs' => '',
				'offsetsm' => '',
				'offsetmd' => '',
				'offsetlg' => '',
				'offset' => '',
				'pushxs' => '',
				'pushsm' => '',
				'pushmd' => '',
				'pushlg' => '',
				'push' => '',
				'pullxs' => '',
				'pullsm' => '',
				'pullmd' => '',
				'pulllg' => '',
				'pull' => '',
				'auto' => '',
				'more' => ''
		 ), $atts));
		 
		$option = ($xs !='') ? ' col-'.$xs : '';
		$option .= ($sm !='') ? ' col-sm-'.$sm : '';
		$option .= ($md !='') ? ' col-md-'.$md : '';
		$option .= ($lg !='') ? ' col-lg-'.$lg : '';
		$option .= ($grid !='') ? 'col-'.$grid.' col-sm-'.$grid.' col-md-'.$grid.' col-lg-'.$grid.' col-xl-'.$grid : '';
		if($auto=='yes'){ $option .= 'col'; } elseif(!empty($auto)){ $option .= ''; } else { $option .= ''; }
		$option .= ($offsetxs !='') ? ' col-offset-'.$offsetxs : '';
		$option .= ($offsetsm !='') ? ' col-sm-offset-'.$offsetsm : '';
		$option .= ($offsetmd !='') ? ' col-md-offset-'.$offsetmd : '';
		$option .= ($offsetlg !='') ? ' col-lg-offset-'.$offsetlg : '';
		$option .= ($offset !='') ? 'col-offset-'.$offset.' col-sm-offset-'.$offset.' col-md-offset-'.$offset.' col-lg-offset-'.$offset : '';
		$option .= ($pushxs !='') ? ' col-push-'.$pushxs : '';
		$option .= ($pushsm !='') ? ' col-sm-push-'.$pushsm : '';
		$option .= ($pushmd !='') ? ' col-md-push-'.$pushmd : '';
		$option .= ($pushlg !='') ? ' col-lg-push-'.$pushlg : '';
		$option .= ($push !='') ? 'col-push-'.$push.' col-sm-push-'.$push.' col-md-push-'.$push.' col-lg-push-'.$push : '';
		$option .= ($pullxs !='') ? ' col-pull-'.$pullxs : '';
		$option .= ($pullsm !='') ? ' col-sm-pull-'.$pullsm : '';
		$option .= ($pullmd !='') ? ' col-md-pull-'.$pullmd : '';
		$option .= ($pulllg !='') ? ' col-lg-pull-'.$pulllg : '';
		$option .= ($pull !='') ? 'col-pull-'.$pull.' col-sm-pull-'.$pull.' col-md-pull-'.$pull.' col-lg-pull-'.$pull : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<div class="col'.$option.'">'.do_bbcodes($content).'</div>';
	}
		
	add_bbcodes( 'bs4grid', 'bs4grid_sc' );
}

//Table
//[bs4table]code here ou texte[/bs4table]
if(!function_exists('bs4table_sc')) {

	function bs4table_sc( $atts, $content) {
        ob_start(); //responsive table default
        ?>
		   <div class="table-responsive">
				<table class="table">
					<?php echo do_bbcodes($content); ?>
				</table>
			</div>
        <?php
        return ob_get_clean();
	}
		
	add_bbcodes( 'bs4table', 'bs4table_sc' );
}


//Form
//[bs4form form='inline']code here ou texte[/bs4form]
if(!function_exists('bs4form_sc')) {

	function bs4form_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'form' => '',
				'action' => '',
				'method' => 'post'
		 ), $atts));
		 
		$option = ($form !='') ? ' class="'.$form.'"' : ' class="form-inline"';
		$option .= ($action !='') ? ' action="'.$action.'"' : ' action="#"';
		$option .= ($method !='') ? ' method="'.$method.'"' : ' method="get"';

		return '<form'.$option.' role="form">
					<div class="form-group">
						'.do_bbcodes($content).'
					</div>
				</form>';
	}
		
	add_bbcodes( 'bs4form', 'bs4form_sc' );
}


//Button
//[bs4button button='warning' size='lg']code here ou texte[/bs4button]
if(!function_exists('bs4button_sc')) {

	function bs4button_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'button' => '',
				'size' => '',
				'other' => ''
		 ), $atts));
		 
		$option = ($button !='') ? ' btn-'.$button : '';
		$option .= ($size !='') ? ' btn-'.$size : '';
		$option .= ($other !='') ? ' '.$other : '';

		return '<button class="btn'.$option.'">
						'.do_bbcodes($content).'
				</button>';
	}
		
	add_bbcodes( 'bs4button', 'bs4button_sc' );
}

//Images
//[bs4shape src='//link.tld/images.png' alt='title' img='circle' /]code here ou texte
if(!function_exists('bs4shape_sc')) {

	function bs4shape_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'src' => '',
				'alt' => '',
				'img' => '',
				'mdataprop' => 'images'
		 ), $atts));
		 
		$option = ($img !='') ? ' img-'.$img : '';
		$images = ($alt !='') ? ' alt="'.$alt.'"' : '';
		$images .= ($src !='') ? ' src="'.$src.'"' : '';
		$images .= ($mdataprop !='') ? ' itemprop="'.$mdataprop.'"' : '';

		return '<img'.$images.' class="'.$option.'">'.$content;
	}
		
	add_bbcodes( 'bs4shape', 'bs4shape_sc' );
}

//Helper
//[bs4text-color tag="div" textcolor="default" more="class css"]code here ou texte[/bs4text-color]
if(!function_exists('bs4textcolor_sc')) {

	function bs4textcolor_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'tag' => '',
				'textcolor' => '',
				'more' => ''
		 ), $atts));
		 
		$taghtml = ($tag !='') ? $tag : '';
		$option = ($textcolor !='') ? ' text-'.$textcolor : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$taghtml.' class="'.$option.'">'.do_bbcodes($content).'</'.$taghtml.'>';
	}
		
	add_bbcodes( 'bs4text-color', 'bs4textcolor_sc' );
}
//[bs4bg tag='div' bg='default']code here ou texte[/bs4bg]
if(!function_exists('bs4bg_sc')) {

	function bs4bg_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'tag' => '',
				'bg' => '',
				'more' => ''
		 ), $atts));
		 
		$taghtml = ($tag !='') ? $tag : '';
		$option = ($bg !='') ? ' bg-'.$bg : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$taghtml.' class="'.$option.'">'.do_bbcodes($content).'</'.$taghtml.'>';
	}
		
	add_bbcodes( 'bs4bg', 'bs4bg_sc' );
}

//[bs4caret]code here ou texte[/bs4caret]
if(!function_exists('bs4caret_sc')) {

	function bs4caret_sc( $atts, $content="" ) {
        ob_start(); 
        ?>
           <span class="caret"><?php echo do_bbcodes($content); ?></span>
        <?php
        return ob_get_clean();	
	}
		
	add_bbcodes( 'bs4caret', 'bs4caret_sc' );
}

//[bs4pull-left]code here ou texte[/bs4pull-left]
if(!function_exists('bs4pullleft_sc')) {

	function bs4pullleft_sc( $atts, $content="" ) {
        ob_start(); 
        ?>
           <div class="pull-left"><?php echo do_bbcodes($content); ?></div>
        <?php
        return ob_get_clean();	
	}
		
	add_bbcodes( 'bs4pull-left', 'bs4pullleft_sc' );
}
//[bs4pull-right]code here ou texte[/bs4pull-right]
if(!function_exists('bs4pullright_sc')) {

	function bs4pullright_sc( $atts, $content="" ) {
        ob_start(); 
        ?>
           <div class="pull-right"><?php echo do_bbcodes($content); ?></div>
        <?php
        return ob_get_clean();	
	}
		
	add_bbcodes( 'bs4pull-right', 'bs4pullright_sc' );
}
//[bs4center-block]code here ou texte[/bs4center-block]
if(!function_exists('bs4centerblock_sc')) {

	function bs4centerblock_sc( $atts, $content="" ) {
        ob_start(); 
        ?>
           <div class="center-block"><?php echo do_bbcodes($content); ?></div>
        <?php
        return ob_get_clean();	
	}
		
	add_bbcodes( 'bs4center-block', 'bs4centerblock_sc' );
}
//[bs4clearfix xs='xs' sm='sm' md='md' lg='lg' /]
if(!function_exists('bs4clearfix_sc')) {

	function bs4clearfix_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'xs' => '',
				'sm' => '',
				'md' => '',
				'lg' => ''
		 ), $atts));
		 
		$option = ($xs !='') ? ' '.$xs.'-block' : ' hidden-block';
		$option = ($sm !='') ? ' '.$sm.'-sm-block' : ' hidden-sm-block';
		$option = ($md !='') ? ' '.$md.'-md-block' : ' hidden-md-block';
		$option = ($lg !='') ? ' '.$lg.'-lg-block' : ' hidden-lg-block';

		return '<div class="clearfix'.$option.'"></div>'.$content;
	}
		
	add_bbcodes( 'bs4clearfix', 'bs4clearfix_sc' );
}

/**********************Category COMPONENT********************************/

//input-group
//[bs4input-group sign="@" type="text" placeholder="username" size="lg" /]
if(!function_exists('bs4inputgroup_sc')) {

	function bs4inputgroup_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'sign' => '',
				'type' => '',
				'placeholder' => '',
				'size' => ''
		 ), $atts));
		 
		$signs = ($sign !='') ? ' <span class="input-group-addon">'.$sign.'</span>' : '';
		$types = ($type !='') ? $type : '';
		$placeholders = ($placeholder !='') ? ' placeholder="'.$placeholder.'"' : '';
		$sizes = ($size !='') ? ' input-group-'.$size : '';

		return '<div class="input-group'.$sizes.'">
					'.$signs.'
					<input type="'.$types.'" class="form-control"'.$placeholders.' />
				</div>'.$content;
	}
		
	add_bbcodes( 'bs4input-group', 'bs4inputgroup_sc' );
}

//label
//[bs4label more='']code or text[/bs4label]
if(!function_exists('bs4label_sc')) {

	function bs4label_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'more' => ''
		 ), $atts));
		 
		$class = ($more !='') ? ' '.$more : '';

		return '<span class="label'.$class.'">'.do_bbcodes($content).'</span>';
	}
		
	add_bbcodes( 'bs4label', 'bs4label_sc' );
}

//badge
//[bs4badge number="150" more="" /]
if(!function_exists('bs4badge_sc')) {

	function bs4badge_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'number' => '',
				'more' => ''
		 ), $atts));
		 
		$numbers = ($number !='') ? $number : '';
		$class = ($number !='') ? ' '.$more : '';

		return '<span class="badge'.$class.'">'.$numbers.'</span>'.$content;
	}
		
	add_bbcodes( 'bs4badge', 'bs4badge_sc' );
}

//page header
//[bs4page-header]code or text[/bs4page-header]
if(!function_exists('bs4pageheader_sc')) {

	function bs4pageheader_sc( $atts, $content) {
        ob_start(); 
        ?>
           <div class="page-header"><?php echo do_bbcodes($content); ?></div>
        <?php
        return ob_get_clean();
	}
		
	add_bbcodes( 'bs4page-header', 'bs4pageheader_sc' );
}

//thumbnails
//[bs4thumbnails link='//link.tld' alt='alt text image' size='150' /]
if(!function_exists('bs4thumbnails_sc')) {

	function bs4thumbnails_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'link' => '',
				'image' => '',
				'alt' => '',
				'size' => ''
		 ), $atts));
		 
		$links = ($link !='') ? $link : '';
		$option = ($alt !='') ? ' alt="'.$alt.'"' : '';
		$option .= ($size !='') ? ' style="width:'.$size.'px; height:'.$size.'px;"' : '';
		$option .= ($image !='') ? ' src="'.$image.'"' : '';

		return '<a href="'.$links.'" class="thumbnail"><img'.$option.'></a>'.$content;
	}
		
	add_bbcodes( 'bs4thumbnails', 'bs4thumbnails_sc' );
}

//Alert
//[bs4alert alert='default' other='Headline text']code here ou texte[/bs4alert]
if(!function_exists('bs4alert_sc')) {

	function bs4alert_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'alert' => '',
				'other' => ''
		 ), $atts));
		 
		$option = ($alert !='') ? ' alert-'.$alert : '';
		$option .= ($other !='') ? ' '.$other : '';

		return '<div class="alert'.$option.'" role="alert">'.do_bbcodes($content).'</div>';
	}
		
	add_bbcodes( 'bs4alert', 'bs4alert_sc' );
}

//Progress bar
//[bs4progresbar pourcent="50" style="default" other="" /] 50=50%
if(!function_exists('bs4progresbar_sc')) {

	function bs4progresbar_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'pourcent' => '',
				'other' => '',
				'style' => ''
		 ), $atts));
		 
		$option = ($style !='') ? ' progress-bar-'.$style : '';
		$option .= ($other !='') ? ' '.$other : '';
		$finales = ($pourcent !='') ? $pourcent : '';

		return '<div class="progress">
					<div class="progress-bar '.$option.'" role="progressbar" aria-valuenow="'.$finales.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$finales.'%;">
						'.$finales.'%
					</div>
				</div>'.$content;
	}
		
	add_bbcodes( 'bs4progresbar', 'bs4progresbar_sc' );
}

//Panel
//[bs4panel panel='default' title='Headline text']code here ou texte[/bs4panel]
if(!function_exists('bs4panel_sc')) {

	function bs4panel_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'panel' => '',
				'title' => ''
		 ), $atts));
		 
		$option = ($panel !='') ? ' panel-'.$panel : '';
		$titles = ($title !='') ? $title : '';

		return '<div class="panel'.$option.'">
					<div class="panel-heading" itemprop="AlternativeHeadline">
						'.$titles.'
					</div>
					<div class="panel-body">
						'.do_bbcodes($content).'
					</div>
				</div>';
	}
		
	add_bbcodes( 'bs4panel', 'bs4panel_sc' );
}

//Well
//[bs4well]...[/bs4well]
if(!function_exists('bs4well_sc')) {

	function bs4well_sc( $atts, $content) {
        ob_start(); 
        ?>
           <div class="well"><?php echo do_bbcodes($content); ?></div>
        <?php
        return ob_get_clean();
	}
		
	add_bbcodes( 'bs4well', 'bs4well_sc' );
}

/**********************Category JS********************************/
//modal
//[bs4modal label='MyLabel' modal="MyModal" title='Headline text']Code or text[/bs4modal]
if(!function_exists('bs4modal_sc')) {

	function bs4modal_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'label' => '',
				'modal' => '',
				'title' => ''
		 ), $atts));
		 
		$bs4Label = ($label !='') ? 'ModalLabel-'.$label : '';
		$bs4Modal = ($modal !='') ? ' id="'.$modal.'" ' : '';
		$bs4Title = ($title !='') ? $title : '';

		return '<div class="modal fade modal-lg"'.$bs4Modal.'tabindex="-1" role="dialog" aria-labelledby="'.$bs4Label.'" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="'.$bs4Label.'" itemprop="AlternativeHeadline">'.$bs4Title.'</h4>
      </div>
      <div class="modal-body">
        '.do_bbcodes($content).'
      </div>
      <div class="modal-footer">
        &copy; <span itemprop="Date">'.date('Y').'</span> '.$_SERVER['SERVER_NAME'].'
      </div>
    </div>
  </div>
</div>';
	}
		
	add_bbcodes( 'bs4modal', 'bs4modal_sc' );
}
//Tooltip
//[bs4tooltip tags='button' placement='top' title='Tooltip TOP' class='btn btn-default' more='type="button"']code here ou texte[/bs4tooltip]
if(!function_exists('bs4tooltip_sc')) {

	function bs4tooltip_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'tags' => '', //button, a only
				'placement' => '',
				'title' => '',
				'class' => '',
				'more' => ''
		 ), $atts));
		 
		$taghtml = ($tags !='') ? $tags : '';
		$option = ($placement !='') ? ' data-placement="'.$placement.'"' : '';
		$option .= ($title !='') ? ' data-original-title="'.$title.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$taghtml.' data-toggle="tooltip"'.$option.'>'.do_bbcodes($content).'</'.$taghtml.'>';
	}
		
	add_bbcodes( 'bs4tooltip', 'bs4tooltip_sc' );
}
//Popover
//[bs4popover tags='button' placement='top' title='popover TOP'content='popover content' class='btn btn-default' more='type="button" disabled']code here ou texte[/bs4popover]
if(!function_exists('bs4popover_sc')) {

	function bs4popover_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'tags' => '', //button, a only
				'placement' => '',
				'title' => '',
				'content' => '',
				'class' => '',
				'more' => ''
		 ), $atts));
		 
		$taghtml = ($tags !='') ? $tags : '';
		$option = ($placement !='') ? ' data-placement="'.$placement.'"' : '';
		$option .= ($title !='') ? ' title="'.$title.'"' : '';
		$option .= ($content !='') ? ' data-content="'.$content.'"' : '';
		$option .= ($class !='') ? ' class="'.$class.'"' : '';
		$option .= ($more !='') ? ' '.$more : '';

		return '<'.$taghtml.' data-container="body" data-toggle="popover"'.$option.'>'.do_bbcodes($content).'</'.$taghtml.'>';
	}
		
	add_bbcodes( 'bs4popover', 'bs4popover_sc' );
}

//[bs4carousel]
if(!function_exists('bs4carousel_sc')) {
	$carouselArray = array();
	function bs4carousel_sc( $atts, $content="" ){
		global $carouselArray;
		$caption = array(
			'[caption]'=>'<div class="carousel-caption">',
			'[/caption]'=>'</div>'
		);
		
		$params = bbcodes_atts(array(
			  'id' => 'myCarousel'
		 ), $atts);
		
		do_bbcodes( $content );
		
		$html = '<div class="carousel slide" id="' . $params['id'] . '">';
		$html .= '<div class="carousel-inner">';
		
		//carousels
		foreach ($carouselArray as $key=>$carousel) {
			$html .='<div class="'. ( ($key==0) ? "active" : "").' item">' . do_bbcodes( strtr($carousel['content'], $caption) ) . '</div>';
		}
		
		$html .='</div>';//end carousel-inner
		
		$html .='<a class="carousel-control left" href="#' . $params['id'] . '" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control right" href="#' . $params['id'] . '" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>';
		
		$html .='</div>';
	
		$carouselArray = array();	
		return $html;
	}
	
	add_bbcodes( 'bs4carousel', 'bs4carousel_sc' );
		
	//carousel Items
	function bs4carousel_item_sc( $atts, $content="" ){
		global $carouselArray;
		$carouselArray[] = array('content'=>$content);
	}
	add_bbcodes( 'bs4carousel-item', 'bs4carousel_item_sc' );			
}

//[Tab]
if(!function_exists('bs4tab_sc')) {
	$tabArray = array();
	function bs4tab_sc( $atts, $content="" ){
		global $tabArray;
		
		$params = bbcodes_atts(array(
			  'button' => 'nav-tabs4',
			  'id' => 'tab',
			  'class'=>''
		 ), $atts);
		
		do_bbcodes( $content );
		
		$html = '<div class="tab">';
		
		$html .= '<div class="' . $params['class'] . '">';
		
		//Tab Title
		$html .='<ul class="nav ' . $params['button'] . '" id="' . $params['id'] . '">';
		foreach ($tabArray as $key=>$tab) {
			$html .='<li class="'. ( ($key==0) ? "active" : "").'"><a href="#'. Shortcodes::slug( $params['id'] ) . '-' . Shortcodes::slug($tab['title']).'" data-toggle="tab">'. $tab['title'] .'</a></li>';
		}
		$html .='</ul>';
		
		//Tab Content
		$html .='<div class="tab-content">';
		foreach ($tabArray as $key=>$tab) {
			$html .='<div class="tab-pane fade'. ( ($key==0) ? " active in" : "").'" id="'. Shortcodes::slug( $params['id'] ) . '-' . Shortcodes::slug($tab['title']).'">' . do_bbcodes($tab['content']) .'</div>';
		}
		$html .='</div>';		
		$html .='</div>';		
		$html .='</div>';
		
		$tabArray = array();
		
		return $html;
	}
	add_bbcodes( 'bs4tab', 'bs4tab_sc' );
	
	//Tab Items
	function bs4tab_item_sc( $atts, $content="" ){
		global $tabArray;
		$tabArray[] = array('title'=>$atts['title'], 'content'=>$content);
	}
	add_bbcodes( 'bs4tab-item', 'tab_item_sc' );	
}

//[Accordion]
if(!function_exists('bs4accordion_sc')) {
	$accordionArray = array();
	function bs4accordion_sc( $atts, $content="" ){
		global $accordionArray;
		
		$params = bbcodes_atts(array(
			  'id' => 'accordion1'
		 ), $atts);
		
		do_bbcodes( $content );
		
		$html = '<div class="accordion" id="' . $params['id'] . '">';
		
		//Accordions
		foreach ($accordionArray as $key=>$accordion) {
			$html .= '<div class="accordion-group">';
			
			$html .= '<div class="accordion-heading">';
			$html .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#' . $params['id'] . '" href="#'.Shortcodes::slug($accordion['title']).'">';
			$html .= $accordion['title'];
			$html .= '</a>';
			$html .= '</div>';//end Accordion Heading
			
			$html .= '<div id="'.Shortcodes::slug($accordion['title']).'" class="accordion-body collapse' . ( ($key==0) ? " in" : "") . '">';
			$html .= '<div class="accordion-inner">';
			$html .= do_bbcodes($accordion['content']);
			$html .= '</div>';
			$html .= '</div>';//end Accordion Content
			
			$html .= '</div>';//end accordion group
			
		}
		
		$html .='</div>';
	
		$accordionArray = array();	
		return $html;
	}
	
	add_bbcodes( 'bs4accordion', 'bs4accordion_sc' );
		
	//Accordion Items
	function bs4accordion_item_sc( $atts, $content="" ){
		global $accordionArray;
		$accordionArray[] = array('title'=>$atts['title'], 'content'=>$content);
	}
	add_bbcodes( 'bs4accordion-item', 'bs4accordion_item_sc' );			
}

/****
 * 
 * More information on http://getbootstrap.com/ latest version
 *
****/
