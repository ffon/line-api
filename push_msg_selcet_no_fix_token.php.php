<?php

$token = $_GET['token_line_mas'];
$text = $_GET['textArea'];
$midUser = $_GET['mid']; 
$strAccessTokens = '3Wv1vcrB1uJCUf4D+nqgA8mcjtSTPYCbe5ZpR4LgyoMKb764ZewaWwAtn3kqRZLFcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQoqaMfbpRNftFepCpuS+Hw/TdH7gkctEgiYIj4ot5A3hQdB04t89/1O/w1cDnyilFU=';


$strAccessToken = $token;
echo 'token';echo "<br>";
var_dump($token);echo "<br>";
echo 'strAccessTokens' ;echo "<br>";
var_dump($strAccessTokens);echo "<br>";
echo 'strAccessToken';echo "<br>";
var_dump($strAccessToken);echo "<br>";
echo "Mid User ";echo "<br>";
var_dump($midUser);echo "<br>";

foreach($midUser as $key => $mid){        
        $messages = [
            "type" => "text",
            "text" => $text
        ];
 
        $post_data = [
            "to" => $mid,
            "messages" => [$messages]
        ];
 
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
        );
        $url = 'https://api.line.me/v2/bot/message/push';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        curl_close($ch);
}
echo "result ";echo "<br>";
var_dump($result);
 

 
 ?>
