<?php

    $name = isset($_POST['name']) ? $_POST['name'] : 0;
    $token = isset($_POST['token']) ? $_POST['token'] : 0;
    echo "token"."<br>";
    var_dump($token);
    
    $en_token = json_encode($token);
    echo "<br>";
    
    $url = 'http://uat.dxplace.com/dxtms/line_master?line_name='.$name.'&access_token='.$en_token.'&add_by=1';

    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, urlencode($url));
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                            )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    echo "<br>";
    echo "url en"."<br>";
    var_dump($url);echo "<br>";

    echo "result:"."<br>".$result;
    

//     window.open("http://uat.dxplace.com/dxtms/get_line_master");
    
?>
