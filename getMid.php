<html>
<?php
    $mid = $_GET["mid"];
    echo $mid;
    echo "<br>";
    
    $strAccessToken = "Token";
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
    echo "result"."<br>";
    var_dump($result);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "result decode ";
    echo "<br>";
    $result_decode = json_decode($result);
    var_dump($result_decode);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $string = preg_replace('/\s+/', '', $result);
    echo "preg_replace var";
    echo "<br>";
    var_dump($string);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $string_decode = json_decode($string);
    echo "string_decode var";
    echo "<br>";
    var_dump($string_decode);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $string_obj = (object)($result);
    echo "string_obj var";
    echo "<br>";
    var_dump($string_obj);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $name = $string_obj->scalar[0];
    echo "name";
    echo "<br>";
    var_dump($name);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $string_arr = (array)($string);
    echo "string_arr var";
    echo "<br>";
    var_dump($string_arr);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    $Object = json_decode($result);
    echo "obj";
    echo "<br>";
    var_dump($Object);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "Name";
    echo $Object->displayName;
    
    
    ?>
</html>
