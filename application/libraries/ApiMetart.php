<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiMetart {
	
	public function getMetArtObjectsFromApi($pStartDate, $pStopDate, $pObjectType, $pSort, $fieldsArray=null, $pLimit)
	{
		$http = 'https://partners.metartmoney.com/module.php?module=exporter&ajax=exporter';
		$params = array(
				'exportType' => 'json',
				'startDate' =>$pStartDate,
				'stopDate' => $pStopDate,
				'sitePicker' => 'E6B595104E3411DF98790800200C9A66',
				'returnObject' => $pObjectType,
				'sort' => $pSort,
				'objectLimit' => $pLimit
		);
		
		if($fieldsArray) {
			foreach($fieldsArray as $key => $field) {
				$params['fields['.$key.']'] = $field;
			}
		}
	
		$response = $this->apiCall($http , $params);
		
		if ($response) {
			return $response;
		}
		return false;
	}
	
	public function getMetArtObjectsFromFile($pFileId)
	{
		$CI =& get_instance();
		$CI->load->helper('url');
		
		$fileLocation = base_url().'assets/json_data/' . $pFileId . '.json';
		$result = file_get_contents($fileLocation);
		
		$json = json_decode($result);
		if(isset($json->code) && isset($json->message)){
			throw new Exception($json->message, $json->code);
			return false;
		}
		
		return $json;
	}
	
	public function apiCall($http_server, $params = array())
	{		
		//Log into MetArtMoney Back Office
		$username = 'bde0510';
		$password = 'MetArt0510';
				
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0');
		curl_setopt($ch, CURLOPT_URL, 'https://partners.metartmoney.com/view/ajax/login-provider.php');
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, 'PartnerUserName_VarChar=' . $username . '&PartnerPassword_VarChar=' . $password);
		curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		//Get the ID cookie content
		$result = curl_exec($ch);
		curl_reset($ch);
		
		//Set the site provider's ID via POST form
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FAILONERROR, true);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:42.0) Gecko/20100101 Firefox/42.0');
		curl_setopt($ch, CURLOPT_URL, 'https://partners.metartmoney.com/view/ajax/marketing-tools-provider.php');
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, 'Site_UUID_FK=E6B595104E3411DF98790800200C9A66&Tour_UUID_FK=0&TourPriceGroup_UUID_FK=0&PartnerProgram_UUID_FK=0&PartnerCampaign_UUID_FK=0&encoded=0');
		curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
		//Get the ID cookie content
		$result = curl_exec($ch);
		curl_reset($ch);
		
		//Construct API url
		$query_string = '';
		if(is_array($params) && count($params)){
			$query_string = '&';
			foreach($params as $k=>$v){
				$query_string .= $k.'='.$v.'&';
			}
			$query_string = rtrim($query_string,'&');
		}
		
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $http_server.$query_string);
		curl_setopt($ch, CURLOPT_VERBOSE, true);
		curl_setopt($ch, CURLINFO_HEADER_OUT, true);
		$headers = array(
				'Host: partners.metartmoney.com',
				'Connection: keep-alive',
				'Cache-Control: max-age=0',
				'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
				'Upgrade-Insecure-Requests: 1',
				'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36',
				'Accept-Encoding: gzip, deflate, sdch',
				'Accept-Language: fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4'
		);
				
		$result = curl_exec($ch);
		curl_close($ch);
		echo $http_server.$query_string;
		$json = json_decode($result);
		if(isset($json->code) && isset($json->message)){
			throw new Exception($json->message, $json->code);
			return false;
		}
		return $json->raw;
	}
}
?>