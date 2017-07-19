<?php
    $proxy = 'http://fixie:aChVS27TDH6KbKG@velodrome.usefixie.com:80';
    $proxyauth = 'http://fixie:aChVS27TDH6KbKG@velodrome.usefixie.com:80';

    $strAccessToken = "3Wv1vcrB1uJCUf4D+nqgA8mcjtSTPYCbe5ZpR4LgyoMKb764ZewaWwAtn3kqRZLFcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQoqaMfbpRNftFepCpuS+Hw/TdH7gkctEgiYIj4ot5A3hQdB04t89/1O/w1cDnyilFU=";
    
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    
    $strUrl = "https://api.line.me/v2/bot/profile/U7de80d0a2ceea863e831375badd2eb55";
    
    $header = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $strAccessToken
    );

    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, $strUrl);
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER,$header);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    echo "result"."<br>";
    var_dump($result);

    echo "result decode "."<br>";
    $result_decode = (array)json_encode($result);
    var_dump($result_decode);
    
//     $name = $result_decode->displayName;
//     var_dump($name);
//     echo "<br>".$result_decode->userId;
//     echo "<br>".$result_decode->pictureUrl;
//     echo "<br>".$result_decode->statusMessage; 
