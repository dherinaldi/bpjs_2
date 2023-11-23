<?php

namespace Bpjs\Bridging;

class CurlFactory 
{
	public function request($endpoint, $headers, $method = "", $payload = "")
	{
		$headers = $this->setHeader($headers);

		$optf = [
 			CURLOPT_VERBOSE => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_TIMEOUT => 5,
			CURLOPT_CONNECTTIMEOUT => 5,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => $headers
		];

		if (!empty($method)) {
			$optf[CURLOPT_CUSTOMREQUEST] = $method;
            $optf[CURLOPT_POSTFIELDS] = json_encode($payload);
            $optf[CURLOPT_HTTPHEADER][] = 'Application/x-www-form-urlencoded';
		} else {
			$optf[CURLOPT_HTTPHEADER][] = 'Application/json';
		}

		$ch = curl_init($endpoint);
	 	curl_setopt_array($ch, $optf);
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);

		return $result;
	}

	protected function setHeader($headers)
	{
		$header = [];
		$header[] = 'Accept: application/json';
		$header[] = 'X-cons-id:'. $headers['X-cons-id'];
		$header[] = 'X-timestamp:'. $headers['X-timestamp'];
		$header[] = 'X-signature:'. $headers['X-signature'];
		$header[] = 'user_key:'. $headers['user_key'];
		return $header;
	}
}