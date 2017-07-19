<?php
get_mid();

function get_name($mid)
{
    $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $strAccessToken = "3Wv1vcrB1uJCUf4D+nqgA8mcjtSTPYCbe5ZpR4LgyoMKb764ZewaWwAtn3kqRZLFcFvVkJH2cMox8g/ml2Ulw7YGORdDhgVXJvKZs24dnQoqaMfbpRNftFepCpuS+Hw/TdH7gkctEgiYIj4ot5A3hQdB04t89/1O/w1cDnyilFU=";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/profile/$mid";
    $header = array(
    'Content-Type: application/json',
    'Authorization: Bearer ' . $strAccessToken
    );
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, $strUrl);
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
   insert_data_tb($result);
}

function insert_data_tb($mid)
{
    $de_mid = json_decode($mid);
    $name = $de_mid->displayName;
    //$mid= $de_mid->userId;
    $image=$de_mid->pictureUrl;
    $sta=$de_mid->statusMessage;


    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/line_member?mid='.$mid.'&line_name=1'.$name.'&image='.$image.'&add_by=1');
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                            )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
}

function get_mid()
{
    $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
    $strAccessToken = "XDEio/U+1tLcglINRntoiWnm3xBRzApRnLm5FHhpqHGEtU21j01yqjlxr83equ5W6qVYXGI80LOObJe1H9EaoK4ZfSiSHwpUrRgQxlREc/aSZQavLqwyHsT1rDcxjzf9ekwtwN1VXkZsCGo9bRxI5AdB04t89/1O/w1cDnyilFU=";
 
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
    $get_mid =  $arrJson['events'][0]['source']['userId'];
    get_name($get_mid);
 
    if ($arrJson['events'][0]['message']['text'] == "a") {
          $arrPostData = array();
          $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
          $arrPostData['messages'][0]['type'] = "text";
          $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
    }else{
          $arrPostData = array();
          $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
          $arrPostData['messages'][0]['type'] = "text";
          $arrPostData['messages'][0]['text'] = "สวัสดี ID คุณคือ ".$arrJson['events'][0]['source']['userId'];
    }
 
 
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
    echo "<br>"."result get_mid()"."<br>";
    var_dump($result);
    echo "<br>"."get mid"."<br>";
    var_dump($get_mid);
}
