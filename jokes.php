<?php

date_default_timezone_set('Europe/Amsterdam');

$url_hangout    = $_ENV["GOOGLE_CHAT_ROOM_VULNERABLE_PLUGINS_URL"];
$url_rocketchat = $_ENV["ROCKETCHAT_ROOM_HOOK_URL"];
$url            = 'https://icanhazdadjoke.com/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);

$headers = [
    'Accept: text/plain'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$text = curl_exec ($ch);

// Send the data to google hangout chat
$post_data = array(
	'text' => $text,
);
$result = '';
$result = httpJsonPost( $url_hangout, $post_data );
if ( false === $result ) {
	/* Handle error */
	echo 'we had an errror';
}
//rprint($kitems);


// Send the data to RocketChat
$post_data = array(
	'text' => $text
);
$result = '';
$result = httpJsonPost( $url_rocketchat, $post_data );
if ( false === $result ) {
	/* Handle error */
	echo 'we had an errror';
}




function httpJsonPost($url, $data) {
	$ch        = curl_init( $url );
	$json_data = json_encode( $data, JSON_FORCE_OBJECT );
	//echo "the json data is: " . $json_data . "<br>";
	curl_setopt_array($ch, array(
		CURLOPT_POST => true,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json',
		),
		CURLOPT_POSTFIELDS => $json_data,
	));

	// Send the request
	$response = curl_exec($ch);

	// Check for errors
	if($response === FALSE){
		die(curl_error($ch));
	}
	return $response;
}



function rprint($var) {
	echo "<pre> \n";
	print_r($var);
	echo "</pre> \n";
}
