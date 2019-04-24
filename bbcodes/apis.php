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
//[api-myipms query="" id="" key="" /]
if(!function_exists('myipms_sc')) {
	function create_api_url($query, $api_id, $api_key, $api_url, $timestamp = '')
	{
		$url = "";
		if (!$timestamp) $timestamp = gmdate("Y-m-d_H:i:s");
		if (trim($query) != '') {
			$url = $api_url."/".$query.'/api_id/'.$api_id.'/api_key/'.$api_key;  
			$signature = md5($url.'/timestamp/'.$timestamp);
			$url .= '/signature/'.$signature.'/timestamp/'.$timestamp;
		}
		return $url;
	}
	function myipms_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'query' => '',
				'id' => '',
				'key' => ''
		 ), $atts));
		 /*********************************/
		$queries = ($query !='') ? $query : '';
		$ides = ($id !='') ? $id : 'id19337';
		$keyes = ($key !='') ? $key : '1098691316-1417240419-1767585814';
		$api_url = "https://api.myip.ms";
		
		/*  Whois Result  */
		/******************/
		$url  = create_api_url($queries, $ides, $keyes, $api_url);
		$ch = curl_init( $url );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt( $ch, CURLOPT_TIMEOUT, 90);
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 90);
		$data = curl_exec($ch);
		curl_close($ch);
		$arr  = json_decode($data, true);
		
		ob_start();
		if (isset($arr["status"]) && $arr["status"] == "error"){
			echo "Error! ".(isset($arr["error_desc"])?$arr["error_desc"]:"");
		}else{
			if (isset($arr["owners"]["owner"]["ownerName"])) 
				echo "H&eacute;berger chez: ".$arr["owners"]["owner"]["ownerName"]."<br>
				Adresse: ".$arr["owners"]["owner"]["address"]."<br>
				Pays: ".$arr["owners"]["owner"]["countryName"]."<br>";
			if (isset($arr["owners"]["parent_owner"]["ownerName"])) 
				echo "Origine de l'hébergeur: ".$arr["owners"]["parent_owner"]["ownerName"]."<br>
				Adresse: ".$arr["owners"]["parent_owner"]["address"]."<br>
				Pays: ".$arr["owners"]["parent_owner"]["countryName"]."<br>";
			if (isset($arr["owners"]["top_parent_owner"]["ownerName"])) 
				echo "top d'origine de l'hébergeur: ".$arr["owners"]["top_parent_owner"]["ownerName"]."<br>
				Adresse: ".$arr["owners"]["top_parent_owner"]["address"]."<br>
				Pays: ".$arr["owners"]["top_parent_owner"]["countryName"]."<br>";
		}
		// All Whois Data
		//echo "<pre>"; print_r($arr); echo "</pre>";
				
			
			
		$data = ob_get_clean();
		return $data;

	}
		
	add_bbcodes( 'api-myipms', 'myipms_sc' );
}
