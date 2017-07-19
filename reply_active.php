<html>
    9
<title>@ME</title>

<h1 align = 'center'>@ME</h1>
    <P align=center>
        <img src="http://qr-official.line.me/L/oUypr1a-r8.png">
    </P>
    <div align=center>line@ffon</div>


<?php
    function qr_code(){
        $proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
        $proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
        $strAccessToken = "S3VhGqoaXc1OFAxRsYPrIpcuqMXf7Zc9/b9fXM8iXf3EEAJAMIXtoZBlcrdScnb86qVYXGI80LOObJe1H9EaoK4ZfSiSHwpUrRgQxlREc/Y7ZKfNYCcmdBkE+GPik3HsrAnlLnjICCQtAZXij9VHzwdB04t89/1O/w1cDnyilFU=";
        
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
        
       
        
        if ($arrJson['events'][0]['message']['text'] == "สวัสดี") {
            $arrPostData = array();
            $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
            $arrPostData['messages'][0]['type'] = "text";
            $arrPostData['messages'][0]['text'] = "สวัสดี ".$arrJson['events'][0]['source']['userId'];
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
        
        var_dump($result);
        
    }
    qr_code();
    
            
    
    ?>
    
    </html>
