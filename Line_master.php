<?php

    $name = isset($_POST['name']) ? $_POST['name'] : 0;
    $token = isset($_POST['token']) ? $_POST['token'] : 0;
    echo "token"."<br>";
    var_dump($token);
    
    $en_token = urlencode($token);
    echo "url en"."<br>";
    echo "<br>";
    var_dump($en_token);
    


    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL,  'url/param'.$name.'&access_token='.$en_token.'&add_by=1');
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
    
//     var_dump($url);echo "<br>";

    echo "result:"."<br>".$result;
    

//     window.open("http://uat.dxplace.com/dxtms/get_line_master");
    
?>
