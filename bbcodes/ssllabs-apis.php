<?php
/**
 * @package	Plugin for Joomla!
 * @subpackage  plg_shortcode
 * @version	4.1.6
 * @author	AlexonBalangue.me
 * @copyright	(C) 2012-2015 Alexon Balangue. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

//no direct accees
defined ('_JEXEC') or die('resticted aceess');
//[ssllabs themes="yes|no" domains="" lang="" provided="yes|no" /]
if(!function_exists('ssllabs_sc')) {
/**
 * PHP-SSLLabs-API
 * 
 * This PHP library provides basic access to the SSL Labs API
 * and is build upon the official API documentation at
 * https://github.com/ssllabs/ssllabs-scan/blob/master/ssllabs-api-docs.md
 * 
 * @author Björn Roland <https://github.com/bjoernr-de>
 * @license GNU GENERAL PUBLIC LICENSE v3
 */

class sslLabsApi
{
	//CONST API_URL = "https://api.ssllabs.com/api/v2";
	
	private $returnJsonObjects;
	
	/**
	 * sslLabsApi::__construct()
	 */
	public function __construct($returnJsonObjects = false)
	{
		$this->returnJsonObjects = (boolean) $returnJsonObjects;
	}
	
	/**
	 * sslLabsApi::fetchApiInfo()
	 * 
	 * API Call: info
	 * @see https://github.com/ssllabs/ssllabs-scan/blob/master/ssllabs-api-docs.md
	 */
	public function fetchApiInfo()
	{
		return ($this->sendApiRequest('info'));
	}
	
	/**
	 * sslLabsApi::fetchHostInformation()
	 * 
	 * API Call: analyze
	 * @see https://github.com/ssllabs/ssllabs-scan/blob/master/ssllabs-api-docs.md
	 * 
	 * @param string $host Hostname to analyze
	 * @param boolean $publish
	 * @param boolean $startNew
	 * @param boolean $fromCache
	 * @param int $maxAge
	 * @param string $all 
	 * @param boolean $ignoreMismatch
	 */
	public function fetchHostInformation($host, $publish = false, $startNew = false, $fromCache = false, $maxAge = NULL, $all = NULL, $ignoreMismatch = false)
	{
		$apiRequest = $this->sendApiRequest
		(
			'analyze',
			array
			(
				'host'				=> $host,
				'publish'			=> $publish,
				'startNew'			=> $startNew,
				'fromCache'			=> $fromCache,
				'maxAge'			=> $maxAge,
				'all'				=> $all,
				'ignoreMismatch'	=> $ignoreMismatch
			)
		);
		
		return ($apiRequest);
	}
	
	/**
	 * sslLabsApi::fetchHostInformationCached()
	 *
	 * API Call: analyze
	 * Same as fetchHostInformation() but prefer to receive cached information
	 *
	 * @param string $host
	 * @param int $maxAge
	 * @param string $publish
	 * @param string $ignoreMismatch
	 */
	public function fetchHostInformationCached($host, $maxAge, $publish = false, $ignoreMismatch = false)
	{
		return($this->fetchHostInformation($host, $publish, false, true, $maxAge, 'done', $ignoreMismatch));
	}
	
	/**
	 * sslLabsApi::fetchEndpointData()
	 * 
	 * API Call: getEndpointData
	 * @see https://github.com/ssllabs/ssllabs-scan/blob/master/ssllabs-api-docs.md
	 * 
	 * @param string $host
	 * @param string $s
	 * @param string $fromCache
	 * @return string 
	 */
	public function fetchEndpointData($host, $s, $fromCache = false)
	{
		$apiRequest = $this->sendApiRequest
		(
			'getEndpointData',
			array
			(
				'host'		=> $host,
				's'			=> $s,
				'fromCache'	=> $fromCache
			)
		);
		
		return ($apiRequest);
	}
	
	/**
	 * sslLabsApi::fetchStatusCodes()
	 * 
	 * API Call: getStatusCodes 
	 */
	public function fetchStatusCodes()
	{
		return ($this->sendApiRequest('getStatusCodes'));
	}
	
	/**
	 * sslLabsApi::sendApiRequest()
	 * 
	 * Send API request
	 * 
	 * @param string $apiCall
	 * @param array $parameters
	 * @return string JSON from API
	 */
	public function sendApiRequest($apiCall, $parameters = array())
	{
		//we also want content from failed api responses
		$context = stream_context_create
		(
			array
			(
				'http' => array
				(
					'ignore_errors' => true
				)
			)
		);
		//$url = self::API_URL . '/' . $apiCall . $this->buildGetParameterString($parameters);
		$url = 'https://api.ssllabs.com/api/v2/' . $apiCall . $this->buildGetParameterString($parameters);
		$apiResponse = file_get_contents($url, false, $context);
		
		if($this->returnJsonObjects)
		{
			return (json_decode($apiResponse));
		}		
		
		return ($apiResponse);	
	}
	
	/**
	 * sslLabsApi::setReturnJsonObjects()
	 * 
	 * Setter for returnJsonObjects
	 * Set true to return all API responses as JSON object, false returns it as simple JSON strings (default)
	 *  
	 * @param boolean $returnJsonObjects
	 */
	public function setReturnJsonObjects($returnJsonObjects)
	{
		$this->returnJsonObjects = (boolean) $returnJsonObjects;
	}
	
	/**
	 * sslLabsApi::getReturnJsonObjects()
	 * 
	 * Getter for returnJsonObjects
	 * 
	 * @return boolean true returns all API responses as JSON object, false returns it as simple JSON string
	 */
	public function getReturnJsonObjects()
	{
		return ($this->returnJsonObjects);
	}
	
	/**
	 * sslLabsApi::buildGetParameterString()
	 * 
	 * Helper function to build get parameter string for URL
	 * 
	 * @param array $parameters
	 * @return string
	 */
	private function buildGetParameterString($parameters)
	{
		$string = '';
			
		$counter = 0;
		foreach($parameters as $name => $value)
		{	
			if(!is_string($name) || (!is_string($value) && !is_bool($value) && !is_int($value)))
			{
				continue;
			}
			
			if(is_bool($value))
			{
				$value = ($value) ? 'on' : 'off';
			}
			
			$string .= ($counter == 0) ? '?' : '&';
			$string .= urlencode($name) . '=' . urlencode($value);
			
			$counter++;
		}
	
		return ($string);
	}
}
	function ssllabs_sc( $atts, $content) {
		extract(bbcodes_atts(array(
				'domains' => '',
				'lang' => '',
				'povided' => ''
		 ), $atts));
		 /*********************************/
		$host = ($domains !='') ? $domains : '';
		$langs = ($lang !='') ? $lang : 'Voir les D&eacute;tailles.';
		$api = $api = new sslLabsApi();

			//$website = 'https://www.alexonbalangue.me'; 
			$json = $api->fetchHostInformation($host);	
			$jsondecode = json_decode($json);

		ob_start(); 
		//if($themes == 'yes'){
			//JFactory::getDocument()->addStyleDeclaration('.ssl-status-summary tr td:first-child,.ssl-status-summary tr.first td,.ssl-status-summary tr.first th{border-bottom:1px solid #D7D7D7}.ssl-status-details,.ssl-status-summary{border-spacing:0;border-collapse:separate}.ssl-status-summary{margin-top:20px}.ssl-status-summary td,.ssl-status-summary th{margin:0;text-align:left;padding:12px 20px;font-size:14px}.ssl-status-summary th{text-transform:uppercase;background-color:#ECECEC}.ssl-status-summary td{background-color:#FFF}.ssl-status-details{margin-top:20px;width:100%}.ssl-status-details th{text-transform:uppercase;background-color:#ECECEC;text-align:left;font-size:14px;padding:12px 20px}.ssl-status-details .grade_col,.ssl-status-details .ipaddress_col{width:76px}.ssl-status-details td{padding-left:22px;padding-right:22px;font-weight:700;font-size:14px;border-bottom:1px solid #F1F1F1}.ssl-status-details tr{background-color:#fff}.ssl-status-details a{color:inherit;text-decoration:underline;font-size:14px}.grade{text-align:center;margin:15px auto;width:72px;height:72px;font-size:50px;line-height:72px;font-weight:400;color:#fff}.grade-a{background-color:#00A500}.grade-b{background-color:#68D035}.grade-c{background-color:#F8CF00}.grade-d{background-color:#FFA901}.grade-e{background-color:#FF7701}.grade-f,.grade-m,.grade-t,.grade-unknown{background-color:#FF4D41}');
		//}

?>
<div class="table-responsive">
    <table class="table table-bordered">
        <tr>
            <th>Grade</th>
            <th>IPv4/v6</th>
            <th>Site</th>
            <th>Info</th>
        </tr>
        <?php foreach($jsondecode->endpoints as $value){ ?>
            <tr>
                <td><div class="grade grade-<?php echo strtolower(substr($value->grade,0,1)); ?>"><?php echo $value->grade ?></div></td>
                <td><?php echo $value->ipAddress; ?></td>
				<td><?php echo $jsondecode->host; ?></td>
                <td><a target="_blank" href="https://www.ssllabs.com/ssltest/analyze.html?d=<?php echo $jsondecode->host; ?>&s=<?php echo $value->ipAddress; ?>"><?php echo $langs; ?></a></td>
            </tr>
			
        <?php } ?>
    </table>
	
<?php
		
		if($provided == 'yes'){
			echo '<br>Scan provided by <a target="_blank" href="https://www.ssllabs.com/ssltest/analyze.html?d='.$domains.'">Qualys SSL Labs</a> <a target="_blank" href="https://www.ssllabs.com/downloads/Qualys_SSL_Labs_Terms_of_Use.pdf">Terms and Conditions</a>';
		} 
		echo '</div>';
		
		$data = ob_get_clean();
		return $data;

	}
		
	add_bbcodes( 'ssllabs', 'ssllabs_sc' );
}
