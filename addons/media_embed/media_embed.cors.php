<?php

$url = ( isset($_GET['url']) ) ? $_GET['url'] : false;
if ( !$url ) exit;

$format = ( isset($_GET['format']) ) ? $_GET['format'] : false;

$referer = ( isset($_SERVER['HTTP_REFERER']) ) ? strtolower($_SERVER['HTTP_REFERER']) : false;
$is_allowed = $referer && strpos($referer, strtolower($_SERVER['SERVER_NAME'])) !== false;

if ( $is_allowed )
{
	if ( $format === 'short' )
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['SERVER_NAME']);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow the redirects
		curl_setopt($ch, CURLOPT_HEADER, false); // no needs to pass the headers to the data stream
		curl_setopt($ch, CURLOPT_NOBODY, true); // get the resource without a body
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // accept any server certificate
		curl_exec($ch);

		// get the last used URL
		$lastUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

		curl_close($ch);

		if ( $lastUrl === $url )
		{
			$headers = get_headers($url, 1);
			$location = $headers['Location'] ? $headers['Location'] : $headers['location'];
			echo json_encode($location);
			exit;
		}

		echo $lastUrl;
		exit;
	}
	if ( $format )
	{
		header('Content-type: application/json');
		$result = file_get_contents($url);
	}
	else
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['SERVER_NAME']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		if ( FALSE === ($result = curl_exec($ch)) )
		{
			error_log(curl_error($ch));
		}
		curl_close($ch);
	}
}
else
{
	$result = '서버 설정에 의해 프록시 접근이 불가능합니다';
}

echo $result;
exit;

?>