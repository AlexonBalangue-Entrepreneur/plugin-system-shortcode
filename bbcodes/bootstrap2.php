<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.1.5
 * @author	AlexonBalangue.me
 * @original & imported from Helix2 Framework compatible Bootstrap2 - for Joomla 2.5
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');
//[Accordion]
if(!function_exists('bs2_accordion_sc')) {
	$accordionArray = array();
	function bs2_accordion_sc( $atts, $content="" ){
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
	
	add_bbcodes( 'bs2-accordion', 'bs2_accordion_sc' );
		
	//Accordion Items
	function bs2_accordion_item_sc( $atts, $content="" ){
		global $accordionArray;
		$accordionArray[] = array('title'=>$atts['title'], 'content'=>$content);
	}
	add_bbcodes( 'bs2-accordion_item', 'bs2_accordion_item_sc' );			
}
//[alert]
if(!function_exists('bs2_alert_sc')){
	function bs2_alert_sc($atts, $content=''){
		 extract(bbcodes_atts(array(
        "type" => '',
		"style" =>'',
        "close" => true
     ), $atts));
     return '<div class="alert alert-' . $type . ' fade in" . style=' . $style . '><button type="button" class="close" data-dismiss="alert">&times;</button><div>' . do_bbcodes( $content ) . '</div></div>';
	}
	add_bbcodes('bs2_alert','bs2_alert_sc');
}

if(!function_exists('bs2_button_sc')){
	function button_sc($atts, $content='') {
		extract(bbcodes_atts(array(
					"type" => '',
					"size" => '',
					"link" => '',
					"target"=>''
				), $atts));
		return '<a href="' . $link . '" target=" '.$target.' "  class="btn btn-' . $type . ' btn-' . $size . '" >' .  do_bbcodes($content)  . '</a>';
	}
	add_bbcodes('bs2_button', 'bs2_button_sc');
}

//[carousel]
if(!function_exists('bs2_carousel_sc')) {
	$carouselArray = array();
	function bs2_carousel_sc( $atts, $content="" ){
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
		
		$html .='<a class="carousel-control left" href="#' . $params['id'] . '" data-slide="prev">&lsaquo;</a><a class="carousel-control right" href="#' . $params['id'] . '" data-slide="next">&rsaquo;</a>';
		
		$html .='</div>';
	
		$carouselArray = array();	
		return $html;
	}
	
	add_bbcodes( 'bs2-carousel', 'bs2_carousel_sc' );
		
	//carousel Items
	function bs2_carousel_item_sc( $atts, $content="" ){
		global $carouselArray;
		$carouselArray[] = array('content'=>$content);
	}
	add_bbcodes( 'bs2-carousel_item', 'bs2_carousel_item_sc' );			
}

//[Row]
if(!function_exists('bs2_row_sc')) {
	$columnArray = array();
	function bs2_row_sc( $atts, $content="" ){
		global $columnArray;
		$id='';
		
		$params = bbcodes_atts(array(
			  'id' => '',
			  'class' => ''
		 ), $atts);
		
		 if ($params['id']) 
			$id = 'id="' . $params['id'] . '"'; 
		
		do_bbcodes( $content );
		
		//Row
		$html = '<div class="row-fluid ' . $params['class'] . '" ' . $id . '>';
		//Columns
		foreach ($columnArray as $key=>$value) $html .='<div class="' . $value['width'] . ' ' . $value['class'] . '">' . do_bbcodes($value['content']) . '</div>';
		$html .='</div>';
	
		$columnArray = array();	
		return $html;
	}
	
	add_bbcodes( 'bs2-row', 'bs2_row_sc' );
		
	//Row Items
	function bs2_span_sc( $atts, $content="" ){
		global $columnArray;
		$width = array(
			'1' => 'span12',
			'1/2' => 'span6',
			'1/3' => 'span4',
			'1/4' => 'span3',
			'2/3' => 'span8',
			'3/4' => 'span9'
		);
		$atts['width'] = isset($atts['width']) ? $atts['width'] : '';
		$columnArray[] = array(
			'class'=>$atts['class'],
			'width' => strtr( $atts['width'], $width ),
			'content'=>$content
		);
	}
	add_bbcodes( 'bs2-col', 'bs2_span_sc' );			
}

if(!function_exists('bs2_divider_sc')){
	function bs2_divider_sc($atts, $content='') {
		extract(bbcodes_atts(array(
					'margin_top'=>'18px',
					'margin_bottom'=>'18px',
					'border'=>0
				), $atts));
		return '<div class="sp-divider clearfix" style="margin-top:' . $margin_top . '; margin-bottom:' . $margin_bottom . '; border-top:' . $border . ';"></div>';
	}
	add_bbcodes('bs2_divider', 'bs2_divider_sc');
}

//[Gallery]
if(!function_exists('bs2_gallery_sc')) {
	$galleryArray = array();
	function bs2_gallery_sc( $atts, $content="" ){
		global $galleryArray;
		
		$tags = array();
		
		extract(bbcodes_atts(array(
			'columns' => 3,
			'modal' => 'yes',
			'filter' => 'no'
		), $atts));
		 
		do_bbcodes( $content );
		
		//Add gallery.css file
		//Helix::addShortcodeStyle('gallery.css');
		//isotope
		if($filter=='yes')
			//Helix::addShortcodeScript('jquery.isotope.min.js');
		
		$tags = '';
		
		foreach ($galleryArray as $key=>$item) $tags .= ',' . $item['tag'];
		$tags = ltrim($tags, ',');
		$tags = explode(',', $tags);
		$newtags = array();
		foreach($tags as $tag) $newtags[] = trim($tag);
		$tags = array_unique($newtags);
		
		ob_start();
		if($filter=='yes') {
		?>
		
		<div class="gallery-filters btn-group">
			<a class="btn active" href="#" data-filter="*"><?php echo JText::_('Show All'); ?></a>
			<?php foreach ($tags as $tag) { ?>		  
				<a class="btn" href="#" data-filter=".<?php echo trim($tag) ?>"><?php echo ucfirst(trim($tag)) ?></a>
			<?php } ?>
		</div>
		<?php } ?>
		
		<ul class="gallery">
			<?php foreach ($galleryArray as $key=>$item) { ?>	
				<li style="width:<?php echo round(100/$columns); ?>%" class="<?php echo str_replace(',', ' ', $item['tag']) ?>">
					<a class="img-polaroid" data-toggle="modal" href="<?php echo ($modal=='yes')? '#modal-' . $key . '':'#' ?>">
						<?php
							echo '<img alt=" " src="' . $item['src'] . '" />';
						?>
						<?php if($item['content'] !='') { ?>
							<div>
								<div>
									<?php echo do_bbcodes($item['content']); ?>
								</div>
							</div>
						<?php } ?>
					</a>
				</li>
				
				<?php if($modal=='yes') { ?>
				<div id="modal-<?php echo $key; ?>" class="modal hide fade" tabindex="-1">
					<a class="close-modal" href="javascript:;" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i></a>
					<div class="modal-body">
						<?php echo '<img src="' . $item['src'] . '" alt=" " width="100%" style="max-height:400px" />';?>
					</div>
				</div>
				<?php } ?>
				
			<?php } ?>
		</ul>
		
		<?php if($filter=='yes') { ?>
			<script type="text/javascript">
				spnoConflict(function($){
					$(window).load(function(){
						$gallery = $('.gallery');
						$gallery.isotope({
				  			// options
				  			itemSelector : 'li',
				  			layoutMode : 'fitRows'
						});
						$filter = $('.gallery-filters');
						$selectors = $filter.find('>a');
						$filter.find('>a').click(function(){
							var selector = $(this).attr('data-filter');
							$selectors.removeClass('active');
							$(this).addClass('active');
							
							$gallery.isotope({ filter: selector });
							return false;
						});
					});
				});
			</script>
		<?php } ?>
		  
		<?php
		$galleryArray = array();	
		//return $html;
		return ob_get_clean();
	}
	add_bbcodes( 'bs2-gallery', 'bs2_gallery_sc' );
	
	//Accordion Items
	function bs2_gallery_item_sc( $atts, $content="" ){
		global $galleryArray;
		$galleryArray[] = array(
			'src'=>(isset($atts['src'])?$atts['src']:''),
			'tag'=>(isset($atts['tag']) && $atts['tag'] !='')?$atts['tag']:'',
			'content'=>$content
		);
	}
	add_bbcodes( 'bs2-gallery_item', 'bs2_gallery_item_sc' );
}


//[Map]
if(!function_exists('bs2_map_sc')) {
	function map_sc( $atts, $content="" ){
		
			extract(bbcodes_atts(array(
				  'lat' => '-34.397',
				  'lng' => '150.644',
				  'maptype'=>'ROADMAP',
				  'height' => '200',
				  'zoom' => 8
			 ), $atts));
			
			ob_start();
			?>
				
			<script type="text/javascript">
			  var myLatlng  = new google.maps.LatLng(<?php echo $lat ?>,<?php echo $lng ?>);
			  function initialize() {
				var mapOptions = {
				  zoom: <?php echo $zoom; ?>,
				  center: myLatlng,
					mapTypeId: google.maps.MapTypeId.<?php echo $maptype; ?>
				};
				var map = new google.maps.Map(document.getElementById('sp_simple_map_canvas'), mapOptions);
				var marker = new google.maps.Marker({position:myLatlng, map:map});	
			  }
			  google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			
			<div style="height:<?php echo $height ?>px" id="sp_simple_map_canvas"></div>
				
			<?php
			
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'bs2-map', 'bs2_map_sc' );
}

//[Progressbar]
if(!function_exists('bs2_progressbar_sc')) 
{
	function bs2_progressbar_sc($atts, $content='')
	{
		extract(bbcodes_atts(array(
			"text"=>'',
			"type"=>'',
			"striped"=>'',
			"active"=>'',
			"bar"=>''
		), $atts));
		$striped 	= ( $striped === 'yes' ) ? 'progress-striped' : '';
		$active 	= ( $active  === 'yes' ) ? 'active' : '';
		
		$output  	= '<div class="progress progress-' . $type . ' ' . $striped . ' ' . $active . '">';
 		$output    .= '<div class="bar" style="width: ' . $bar . ';">' . do_bbcodes( $text ) . '</div>';
		$output    .= '</div>';
		return $output;
	}
	add_bbcodes('bs2_progressbar', 'bs2_progressbar_sc');
}

//[Tab]
if(!function_exists('bs2_tab_sc')) {
	$tabArray = array();
	function bs2_tab_sc( $atts, $content="" ){
		global $tabArray;
		
		$params = bbcodes_atts(array(
			  'button' => 'nav-tabs',
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
	add_bbcodes( 'bs2-tab', 'bs2_tab_sc' );
	
	//Tab Items
	function tab_item_sc( $atts, $content="" ){
		global $tabArray;
		$tabArray[] = array('title'=>$atts['title'], 'content'=>$content);
	}
	add_bbcodes( 'bs2-tab_item', 'bs2_tab_item_sc' );	
}

//[Testimonial]
if(!function_exists('testimonial_sc')) {
	function testimonial_sc( $atts, $content="" ){
		extract(bbcodes_atts(array(
					'name' => 'John Doe',
					'designation' => '',
					'email' => 'email@email.com',
					'url' => '',
					'img'=> ''
					
				), $atts));
		ob_start();
	?>
	<div class="media testimonial">
		<div class="pull-left">
			<i style="font-size:48px" class="icon-quote-<?php echo (Shortcodes::direction()=='rtl')?'right':'left'; ?>"></i>
		</div>
		<div class="media-body">
			<div class="testimonial-content">
				<?php echo do_bbcodes($content); ?>
			</div>
			<div style="margin-top:5px" class="media testimonial-author">
				<div class="pull-left">
					<img class="img-circle" alt="<?php echo $name; ?>" src="//1.gravatar.com/avatar/<?php echo md5($email); ?>?s=68&amp;r=pg&amp;d=mm" width="68">
				</div>
				<div class="media-body">
					<strong><?php echo $name; ?></strong>
					<br />
					<?php echo $designation; ?>
					<br/>
					<a href="<?php echo $url; ?>"><?php echo $url; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php 
		return ob_get_clean();
	}
	add_bbcodes( 'bs2-testimonial', 'bs2_testimonial_sc' );
}

//[Dropcap]
if(!function_exists('bs2_dropcap_sc')) {
	function bs2_dropcap_sc( $atts, $content="" ) {
		return '<p class="sp-dropcap">' . $content .'</p>';
	}
		
	add_bbcodes( 'bs2-dropcap', 'bs2_dropcap_sc' );
}
//[Block Numbers]
if(!function_exists('bs2_blocknumber_sc')) {
	function bs2_blocknumber_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'text' => '01',
				'background' => '#000',
				'color' => '#666',
				'type' =>''//rounded, circle
		 ), $atts));
	
		return '<p class="sp-blocknumber"><span style="background:'.$background.';color:'.$color.'" class="' .$type .'">' . $text . '</span> ' . do_bbcodes( $content ) . '</p>';
	}
		
	add_bbcodes( 'bs2-blocknumber', 'bs2_blocknumber_sc' );
}
//[Block]
if(!function_exists('bs2_block_sc')) {
	function bs2_block_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'background' => 'transparent',
			    'color' => '#666',
			    'padding' => '15px',
			    'border' => '0',
				'type' =>''//rounded, circle
		 ), $atts));
	
		return '<div class="sp-block '.$type.'" style="background:'.$background.';color:'.$color.';padding:'.$padding.';border:'.$border.'">'. do_bbcodes( $content ) .'</div>';
	}
		
	add_bbcodes( 'bs2-block', 'bs2_block_sc' );
}
//[Bubble]
if(!function_exists('bs2_bubble_sc')) {
	function bs2_bubble_sc( $atts, $content="" ) {
		extract(bbcodes_atts(array(
				'author' => 'Ahmed',
				'background' => '#CCC',
			    'color' => '',
			    'padding' => '10px',
			    'border' => '0',
				'type' =>''//rounded, circle
		 ), $atts));
		 
		$bg			= $background;
		 
		$background = ($background !='') ? 'background:'.$background.';' : '';
		$color = ($color !='') ? 'color:'.$color.';' : '';
		
		if($border!=0) {
			$border_color = explode(' ', $border);
			$border_color = $border_color[2];
		}
		
		$cite = ($border!=0) ? $border_color : $bg;
	
		return '<div class="sp-bubble '.$type.'" style="'.$background.'padding:'.$padding.';border:'.$border.'"><div style="'.$color.'">'. do_bbcodes( $content ) .'</div><cite><span style="border:15px solid '.$cite.'"></span>'.$author.'</cite></div>';
	}
		
	add_bbcodes( 'bs2-bubble', 'bs2_bubble_sc' );
}