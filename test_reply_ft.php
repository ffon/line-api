<html>
    <meta charset="utf-8">
<?php
getMid();
function getMid()
{
    $strAccessToken = "token";
    $content = file_get_contents('php://input');
    $arrJson = json_decode($content, true);
    $strUrl = "https://api.line.me/v2/bot/message/reply";
    $arrHeader = array();
    $arrHeader[] = "Content-Type: application/json";
    $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
    
//     $arrPostData = array();
//     $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
//     $arrPostData['messages'][0]['type'] = "follow";
//     $arrPostData['messages'][0]['text'] = "สวัสดี ID = ".$arrJson['events'][0]['source']['userId'];
//     $mid = $arrJson['events'][0]['source']['userId'];
    
    
if ($arrJson['events'][0]['event']['type'] == 'follow') {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "follow";
        $arrPostData['messages'][0]['text'] = "สวัสดี ID = ".$arrJson['events'][0]['source']['userId'];
        getName($mid);
 
     }else{
    
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = $arrJson['events'][0]['follow'];         
     }
   
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $strUrl);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $arrPostData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close ($ch);
    var_dump($result);
    
}
function getName($mid)
{

    $strAccessToken = "token";
    
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
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    
    insert_data_tb($result);
}
function insert_data_tb($data)
{
    $string = preg_replace('/\s+/', '', $data); 
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'url?param='.$string.'&add_by=1');
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

    ?>
    
</html>
