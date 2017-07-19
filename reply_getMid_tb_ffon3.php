<?php
getMid();
function getMid()
{
    $proxy = 'http://fixie:aChVS27TDH6KbKG@velodrome.usefixie.com:80';
    $proxyauth = 'http://fixie:aChVS27TDH6KbKG@velodrome.usefixie.com:80';

    $strAccessToken = "3Wv1vcrB1uJCUf4D+nqgA8mcjtSTPYCbe5ZpR4LgyoMKb764ZewaWwAtn3kqRZLFcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQoqaMfbpRNftFepCpuS+Hw/TdH7gkctEgiYIj4ot5A3hQdB04t89/1O/w1cDnyilFU=";


    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);

    $strUrl = "https://api.line.me/v2/bot/message/reply";

    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";

    $arrPostData = array();
    $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    $arrPostData['messages'][0]['type'] = "text";
    $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
    $mid = $arrJson['events'][0]['source']['userId'];

    // if ($arrJson['events'][0]['message']['text'] == "a") {
    //     $arrPostData = array();
    //     $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    //     $arrPostData['messages'][0]['type'] = "text";
    //     $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
    // } else {
    //     $arrPostData = array();
    //     $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
    //     $arrPostData['messages'][0]['type'] = "text";
    //     $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
    // }


    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($ch);
    curl_close ($ch);
    var_dump($result);
}
