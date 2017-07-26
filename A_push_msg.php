<?php
//$strAccessToken = $_GET['access_token'];
// $text = $_GET['textArea'];
// $midUser = $_GET['mid']; 

// $strAccessToken = 'SayhWjVgzo6nk40VS+anrzU+guXmPffyhlYiwLkI859ODhLQNJR5Spsfm8+HFN7bQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBcsTyC1EC8JMhzvS9soYMvVYsqeEWtLJWsgwb7Z7VcbMfAdB04t89/1O/w1cDnyilFU=';
// $midUser = 'U7de80d0a2ceea863e831375badd2eb55'; 
// $text = '123';

$token = $_GET['access_token'];
$text =  $_GET['textArea'];
$midUser = $_GET['mid']; 

$strAccessToken = $token;

echo 'token';echo "<br>";
var_dump($token);echo "<br>";

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
