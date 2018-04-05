<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_bbcodes
 * @version	3.9.6
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');
//[googlemap]
if(!function_exists('googlemap_sc')) {
	function googlemap_sc( $atts, $content="" ){
		
			extract(bbcodes_atts(array(
				  'lat' => '',
				  'lng' => '',
				  'maptype'=>'',
				  'height' => '',
				  'zoom' => '',
				  'idcss' => '',				  
				  'api' => '',				  
				  'icon' => '',				  
			 ), $atts));
			
			ob_start();
			?>				
			<script>function initMap(){var mapOptions={zoom:<?php echo $zoom; ?>,center:google.maps.LatLng(<?php echo $lat ?>,<?php echo $lng ?>),mapTypeId:google.maps.MapTypeId.<?php echo $maptype; ?>};var map = new google.maps.Map(document.getElementById('<?php echo $idcss; ?>'),mapOptions);var markers = new google.maps.Marker({position:google.maps.LatLng(<?php echo $lat ?>,<?php echo $lng ?>),map:map,icon:'<?php echo $icon; ?>',draggable:true,animation: google.maps.Animation.DROP});markers.addListener('click', toggleBounce_ANIMATE);}function toggleBounce_ANIMATE(){if(markers.getAnimation()!==null){markers.setAnimation(null);}else{markers.setAnimation(google.maps.Animation.BOUNCE);}}google.maps.event.addDomListener(window, 'load',initMap);</script><div id="<?php echo $idcss; ?>"></div><script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api; ?>&amp;signed_in=true&amp;callback=initMap"></script>
			<?php
			
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'googlemap', 'googlemap_sc' );
}

//[mapbox]
if(!function_exists('mapbox_sc')) {
	function mapbox_sc( $atts, $content="" ){
		
			extract(bbcodes_atts(array(
				  'apitoken' => '',
				  'idcss' => '',
				  'lat' => '',
				  'lng' => '',
				  'zoom' => '',
				  'url' => ''
			 ), $atts));
			
			
			ob_start();
			?><div id="<?php echo $idcss; ?>"></div><script>L.mapbox.accessToken = '<?php echo $apitoken; ?>';var <?php echo $idcss; ?> = L.mapbox.map('map', 'mapbox.streets').setView([<?php echo $lat.','.$lng; ?>], <?php echo $zoom; ?>);var featureLayer = L.mapbox.featureLayer().loadURL('<?php echo $url; ?>').addTo(<?php echo $idcss; ?>);</script><?php
			
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'mapbox', 'mapbox_sc' );
}

//[mappy]
if(!function_exists('mappy_sc')) {
	function mappy_sc( $atts, $content="" ){
		
			extract(bbcodes_atts(array(
				  'functions' => ''		  
			 ), $atts));
			
			ob_start();
			?>				

			<p>This code is not available please awaitting a developper, <br>regards thank take patience!!! (not access for public)<p>
			
			<?php
			
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'mappy', 'mappy_sc' );
}

//[openstreetmap]
if(!function_exists('openstreetmap_sc')) {
	function openstreetmap_sc( $atts, $content="" ){
		
			extract(bbcodes_atts(array(
				  'functions' => ''		  
			 ), $atts));
			
			ob_start();
			?>				

			<p>This code is not available please awaitting a developper, <br>regards thank take patience!!! (Docs not complet)<p>
			
			<?php
			
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'openstreetmap', 'openstreetmap_sc' );
}
//[map]
if(!function_exists('map_sc')) {
	function map_sc($atts, $content){
			ob_start();
			
				echo do_bbcodes($content);
				
			return ob_get_clean();
	}
	add_bbcodes( 'map', 'map_sc' );
}
//[gmaps]
if(!function_exists('iframemap_sc')) {
	function iframemap_sc($atts, $content=""){
		
			extract(bbcodes_atts(array(
				  'url' => '',
				  'width' => '',
				  'height' => ''
			 ), $atts));
			 
			 $gmaps = ($url !='') ? 'src="'.$url.'"' : 'src="https://www.google.fr/maps"';
			 $gmaps .= ($width !='') ? ' width="'.$width.'"' : ' width="100%"';
			 $gmaps .= ($height !='') ? ' height="'.$height.'"' : ' height="450"';
			 ob_start();
?>
		<iframe <?php echo $gmaps; ?> frameborder="0" style="border:0" allowfullscreen></iframe>
<?php
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'gmaps', 'iframemap_sc' );
}


//[mapbox-intern apitoken="MapBox API ACCESS TOKEN" idcss="MAPIDcss" lat="Latitude" lng="longitude" zoom="2" url="http://link.tld/file (without indicate .geojson)" /]
if(!function_exists('mapboxintern_sc')) {
	function mapboxintern_sc( $atts, $content="" ){
		
			extract(bbcodes_atts(array(
				  'apitoken' => '',
				  'idcss' => '',
				  'lat' => '',
				  'lng' => '',
				  'zoom' => '',
				  'url' => ''
			 ), $atts));
			
			$apitokens= ($apitoken !='') ? $apitoken : 'Api Token on www.MapBox.com';
			$idcsss= ($idcss !='') ? $idcss : 'imapboxgeojsons';
			$lats= ($lat !='') ? $lat : '20.0';#international views
			$lngs= ($lng !='') ? $lng : '0.0';#international views
			$zooms= ($zoom !='') ? $zoom : '2';#international views
			$urls= ($url !='') ? $url.'.geojson' : 'URL here without add .geojson';
			ob_start();
			JFactory::getDocument()->addStyleDeclaration('#'.$idcsss.' { position:absolute; top:0; bottom:0; width:100%; }');
			?>

<div id='<?php echo $idcsss; ?>'></div>
<script>
L.mapbox.accessToken = '<?php echo $apitokens; ?>';
var <?php echo $idcsss; ?> = L.mapbox.map('<?php echo $idcsss; ?>', 'mapbox.streets').setView([<?php echo $lats; ?>, <?php echo $lngs; ?>], <?php echo $zooms; ?>);
var featureLayer = L.mapbox.featureLayer().loadURL('<?php echo $urls; ?>').addTo(<?php echo $idcsss; ?>);</script>

<?php
			
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'mapbox-intern', 'mapboxintern_sc' );
}


//[mapbox-custom apitoken="MapBox API ACCESS TOKEN" idcss="MAPIDcss" lat="Latitude" lng="longitude" zoom="2" url="http://link.tld/file (without indicate .geojson)" /]
if(!function_exists('mapbox3d_sc')) {
	function mapbox3d_sc( $atts, $content="" ){
		
			extract(bbcodes_atts(array(
				  'apitoken' => '',
				  'idcss' => '',
				  'style' => '',
				  'pitch' => '',
				  'lat' => '',
				  'lng' => '',
				  'zoom' => '',
				  'url' => '',
				 # 'lang' => '',
				  'parent' => '',
				'category' => '',
				'entreprise' => '',
			 ), $atts));
			
			$apitokens= ($apitoken !='') ? $apitoken : 'pk.eyJ1IjoiYWxleG9uYiIsImEiOiJjajUyb2ttZDkwZDg3MzJvOWh3MmVpOW5yIn0.WTf92RTOswrjqVuNIdZMgw';
			$idcsss= ($idcss !='') ? $idcss : 'map';
			$style= ($style !='') ? $style : 'mapbox/streets-v10';
			$pitch= ($pitch !='') ? $pitch : '20';
			$lats= ($lat !='') ? $lat : '43.927598';#international views
			$lngs= ($lng !='') ? $lng : '6.211543';#international views
			$zooms= ($zoom !='') ? $zoom : '2.0';#international views
			$urls= ($url !='') ? $url : 'https://business.livingxworld.com/map/';
			#$urls .= ($lang !='') ? $lang.'/' : '';
			$urls .= ($parent !='') ? $parent.'/' : '';
			$urls .= ($category !='') ? $category.'/' : '';
			$urls .= ($entreprise !='') ? $entreprise.'.geojson' : 'alexonbalangue.geojson';
			ob_start();
			//JFactory::getDocument()->addStyleDeclaration("#".$idcsss." { position:absolute; top:0; bottom:0; width:100%;}.mapboxgl-popup {max-width: 200px;}.mapboxgl-popup-content {text-align: center;font-family: 'Open Sans', sans-serif;}.marker {background-image: url('data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDIyNC4wNCAyMjQuMDQiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDIyNC4wNCAyMjQuMDQ7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNjRweCIgaGVpZ2h0PSI2NHB4Ij4KPHBhdGggZD0iTTExMi4wMiwwQzY0Ljg3NywwLDI2LjUyNCwzOC4zNTQsMjYuNTI0LDg1LjQ5NmMwLDMyLjIwNywxNy45MDcsNjAuMzAxLDQ0LjI4MSw3NC44NzZsMzcuNTg5LDYxLjE5OSAgYzAuOTYzLDEuNTY5LDIuNDYsMi40NjksNC4xMDYsMi40NjljMS42NTksMCwzLjE3MS0wLjkxMiw0LjE0Ni0yLjUwMWwzOC4xMzEtNjIuMDU0YzI1LjUyMy0xNC44MDcsNDIuNzM5LTQyLjQxNyw0Mi43MzktNzMuOTg5ICBDMTk3LjUxNiwzOC4zNTQsMTU5LjE2MywwLDExMi4wMiwweiBNMTI0LjY4NywxMzguNzI5aC0yNHYtNjZoMjRWMTM4LjcyOXogTTExMi45MzMsNjIuNTg3Yy03Ljg1MSwwLTE0LjIxNS02LjM2NC0xNC4yMTUtMTQuMjE1ICBjMC03Ljg1MSw2LjM2NC0xNC4yMTUsMTQuMjE1LTE0LjIxNXMxNC4yMTUsNi4zNjUsMTQuMjE1LDE0LjIxNUMxMjcuMTQ4LDU2LjIyMywxMjAuNzg0LDYyLjU4NywxMTIuOTMzLDYyLjU4N3oiIGZpbGw9IiMwMDZERjAiLz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==');background-size: cover;width: 50px;height: 50px;border-radius: 50%;cursor: pointer;}");
			?>


<div id='<?php echo $idcsss; ?>'></div>
<script>
mapboxgl.accessToken = '<?php echo $apitokens; ?>';

var <?php echo $idcsss; ?> = new mapboxgl.Map({
    style: 'mapbox://styles/<?php echo $style; ?>',
	center: [<?php echo $lngs; ?>, <?php echo $lats; ?>],
    zoom: <?php echo $zooms; ?>,
    pitch: <?php echo $pitch; ?>, 
    container: '<?php echo $idcsss; ?>'
});


<?php echo $idcsss; ?>.addControl(new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true
    },
    trackUserLocation: true
}));


<?php echo $idcsss; ?>.on('load', function() {
    <?php echo $idcsss; ?>.addLayer({
        'id': '3d-buildings',
        'source': 'composite',
        'source-layer': 'building',
        'filter': ['==', 'extrude', 'true'],
        'type': 'fill-extrusion',
        'minzoom': 15,
        'paint': {
            'fill-extrusion-color': '#aaa',
            'fill-extrusion-height': {
                'type': 'identity',
                'property': 'height'
            },
            'fill-extrusion-base': {
                'type': 'identity',
                'property': 'min_height'
            },
            'fill-extrusion-opacity': .6
        }
    });    
	<?php echo $idcsss; ?>.addSource("marker", {
        "type": "geojson",
        "data": {
            "type": "FeatureCollection",
            "features": []
        }
	});
    <?php echo $idcsss; ?>.addLayer({
        "id": "marker",
        "type": "symbol",
        "source": "marker",
        "layout": {
            "icon-image": "marker",
            "icon-allow-overlap": true,

            "icon-offset": [0, -12]
        }
    });	
});

    $.ajax({
        url: '<?php echo $urls; ?>',
        dataType: 'JSON',
        success: function (geojson) {
            geojson.features.forEach(function(marker) {
		  var el = document.createElement('div');
		  el.className = 'marker';

			new mapboxgl.Marker(el, { offset: [-50 / 2, -50 / 2] })
		  .setLngLat(marker.geometry.coordinates)
		  .setPopup(new mapboxgl.Popup({ offset: 25 }) 
		  .setHTML('<h3>' + marker.properties.title + '</h3><p>' + marker.properties.description + '</p>'))
		  .addTo(<?php echo $idcsss; ?>);
		});
		
        }
		
    });



</script>


<?php
			
			$data = ob_get_clean();
			return $data;
	}
	add_bbcodes( 'mapbox-custom', 'mapbox3d_sc' );
}
