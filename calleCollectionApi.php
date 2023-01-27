<?php

echo("test");
$url="https://api-na.hosted.exlibrisgroup.com/almaws/v1/electronic/e-collections/61425157830002917?apikey=l7xx2118babda48346bd8fc980afadd6cba3&format=json";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 4);
$json = curl_exec($ch);
if(!$json) {
    echo curl_error($ch);
}
curl_close($ch);
print_r(json_decode($json));
?>