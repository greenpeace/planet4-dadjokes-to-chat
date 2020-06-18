<?php

date_default_timezone_set('Europe/Amsterdam');

$url = 'https://icanhazdadjoke.com/';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$url);

$headers = [
    'Accept: text/plain'
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$text = curl_exec ($ch);

echo $text;
