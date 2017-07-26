<html>
    5
<?php 
    $line_id = $_GET['id_line_master'];
    //     $access_token = $_GET['access_token'];

    var_dump($line_id);
    // var_dump($access_token);


    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_member');
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                 )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    $de_line_member= json_decode($result);
    $count_line_member = count($de_line_mas);
    
    echo "ID line ".$line_id; 
     $i=0; 
     while($i!=$count_line_member){
             echo  $de_line_member[$i];
     $i++;
     }

?>
    

</html>
