<?php
class Veritrans
{
	//static property
	
	public static $serverKey;
	
	public static $isProduction = false;

	public static $curlOptions = array();

	const SANDBOX_BASE_URL = 'http://api.sandbox.veritrans.co.id/v2';

	const PRODUCTION_BASE_URL = 'http://api.midtrans.co.id/v2';

	public function config($params)
	{
		Veritrans::$serverKey = $params['server_key'];
		Veritrans::$isProduction = $params['production'];
	}

	public static function getBaseUrl()
	{
		return Veritrans::$isProduction ?
			Veritrans::PRODUCTION_BASE_URL : Veritrans::SANDBOX_BASE_URL;
	}

	public static function get($url, $server_key, $data_hash)
	{
		return self::remoteCall($url, $server_key, $data_hash,false);
	}

	public static function post()
	{
		return self::remoteCall($url, $server_key, $data_hash,true);	
	}

	public static function remoteCall($url, $server_key, $data_hash, $post = true)
	{
		$ch = curl_init();

		$curl_options = array(
			CURLOPT_URL => $url,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
				'Accept: application/json',
				'Authorization: Basic ' . base64_encode($server_key.':')
			),
			CURLOPT_RETURNTRANSFER => 1,
		);
		if(count(Veritrans::$curlOptions)) 
		{
			if(Veritrans::$curlOptions[CURLOPT_HTTPHEADER])
			{
				$mergedHeders = array_merge($curl_options[CURLOPT_HTTPHEADER],veritrans::$curlOptions[CURLOPT_HTTPHEADER]);
				$headerOptions = array( CURLOPT_HTTPHEADER => $mergedHeders );
			}else{
				$mergedHeders = array();
			}
			$curl_options = array_replace_recursive($curl_options, midtrans::$curlOptions, $headerOptions, $headerOptions);
		}
		if($post){
			$curl_options[CURLOPT_POST] = 1;

			if($data_hash){
				$body = json_encode($data_hash);
				$curl_options[CURLOPT_POSTFIELDS] = $body;
			} else {
				$curl_options[CURLOPT_POSTFIELDS] = '';
			}
		}

		curl_setopt_array($ch, $curl_options);

		$result = curl_exec($ch);

		if($result === FALSE)
		{
			throw new Exception('CURL Error : '.curl_error($ch), curl_errorno($ch));
		}else{
			$result_array = json_decode($result);
			if(!in_array($result_array->status_code, array(200,201,202,407)))
			{
				$message = 'Veritrans Error ('.$result_array->status_code.'): '. $result_array->status_message;
				throw new Exception($message, $result_array->status_code);
			}
			else
			{
				return $result_array;
			}
		}

	}

	public static function vtweb_charge($payloads)
	{
		$result = Veritrans::post(
			Veritrans::getBaseUrl().'/charge',
			Veritrans::$serverKey,
			$payloads
		);

		return $result->redirect_url;
	}

	public static function vtdirect_charge($payLoads)
	{
		$result = Veritrans::post(
			Veritrans::getBaseUrl().'/charge',
			Veritrans::$serverKey,
			$payloads
		);

		return $result->redirect_url;
	}

	public static function status($id)
	{
		return Veritrans::post(
			Veritrans::getBaseUrl().'/' . $id . '/status',
			Veritrans::$serverKey,false)->status_code;
		);
	}

	public static function cancel($id)
	{
		return Veritrans::post(
			Veritrans::getBaseUrl().'/' . $id . '/cancel',
			Veritrans::$serverKey,false)->status_code;
		);
	}

	public static function expire($id)
	{
		return Veritrans::post(
			Veritrans::getBaseUrl().'/' . $id . '/expire',
			Veritrans::$serverKey,false)->status_code;
		);
	}
}

?>