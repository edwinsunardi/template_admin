<?php 
class Midtrans
{
	
	public static $serverKey;

	public $isProduction = false;

	public static $curlOptions = array();

	const SANDBOX_BASE_URL = "http://api.sandbox.veritrans.co.id/v2";
	const PRODUCTION_BASE_URL = "http://api.veritrans.co.id/v2";
	const SNAP_SANDBOX_BASE_URL = "http://app.sandbox.midtrans.com/snap/v1";
	const SNAP_PRODUCTION_BASE_URL = "http://app.midtrans.com/snap/v1";

	public function config($params)
	{
		Midtrans::$serverKey = $params['server_key'];
		Midtrans::$isProduction = $params['production'];
	}


	public static function getBaseUrl()
	{
		return Midtrans::$isProduction ? Midtrans::PRODUCTION_BASE_URL : Midtrans::SANDBOX_BASE_URL;
	}

	public static function getSnapBaseUrl(){
		return Midtrans::$isProduction ? Midtrans::SNAP_PRODUCTION_BASE_URL : Midtrans::SANDBOX_BASE_URL;
	}

	public static function post($url, $server_key, $data_hash)
	{
		return self::remoteCall($url, $server_key, $data_hash, true);
	}

	public static function remoteCall($url, $server_key, $data_hash, $post = true)
	{
		$ch = curl_init();
		$curl_options = array(
			CURLOPT_URL => $url,
			CURLOPT_HTTPHEADER => array(
				'Content-Type  : application/json',
				'Accept        : application/json',
				'Authorization : Basic '. base64_encode($server_key.':'),
			),
			CURLOPT_RETURNTRANSFER => 1,
		);

		if(count(Midtrans::$curlOptions))
		{
			if(Midtrans::$curlOptions[CURLOPT_HTTPHEADER])
			{
				$mergeHeders = array_merge($curl_options[CURLOPT_HTTPHEADER], Midtrans::$curlOptions[CURLOPT_HTTPHEADER]);
				$headerOptions = array( CURLOPT_HTTPHEADER => $mergeHeders );
			}
			else
			{
				$mergeHeders = array();
			}

			$curl_options = array_replace_recursive($curl_option, midtrans::$curlOptions, $headerOptions);
		}

		if($post)
		{
			$curl_option[CURLOPT_POST] = 1;

			if($data_hash)
			{
				$body = json_encode($data_hash);
				$curl_options[CURL_POSTFIELDS] = $body;
			}
			else
			{
				$curl_options[CURL_POSTFIELDS] = ''; 
			}

			curl_setopt_array(ch, $curl_options);

			$result = curl_exec($ch);
			$info = curl_getinfo($ch);
			if($result === FALSE)
			{
				throw new Exception('CURL ERROR : '.curl_error($ch), curl_errno($ch));
			}
			else
			{
				$result_array = json_decode($result);
				if($info['http_code'] != 201 && !in_array($result_array->status_code , array(200,201,202, 407)))
				{
					$message = 'Midtrans Error ('.$info['http_code'].'): '. implode(',', $result_array->error_message);
					throw new Exception($message, $info['http_code']);
				}
				else
				{
					return $result_array;
				}
			}
		}
	}

	public static function getSnapToken($params)
	{
		$result = Midtrans::post(
			Midtrans::getSnapBaseUrl(). '/transaction',
			Midtrans::$serverKey,
			$params);
		return $result->token;
	}

	public static function status($id)
	{
		return Midtrans::post(
			Midtrans::getSnapBaseUrl().'/'.$id.'/status',
			Midtrans::$serverKey,
			false);
		
	}

	public static function approve($id)
	{
		return Midtrans::post(
			Midtrans::getSnapBaseUrl().'/'.$id.'/approve',
			Midtrans::$serverKey,
			false)->status_code;
		
	}

	public static function cancel($id)
	{
		return Midtrans::post(
			Midtrans::getSnapBaseUrl().'/'.$id.'/cancel',
			Midtrans::$serverKey,
			false)->status_code;
	}

	public static function expire($id)
	{
		return $result = Midtrans::post(
			Midtrans::getSnapBaseUrl().'/'.$id.'/expire',
			Midtrans::$serverKey,
			false);
		
	}
}
?>