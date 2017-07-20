<html>
    <?php
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
    
        $de = json_decode($result);
        $count = count($de);
        echo $count;
        echo $de[0]->member_name;
    
        
        for(i=0;i<$de;$i++){
            echo $de[$i]->member_name;
            echo "<br>";
        }
    
    
   

    ?>
</html>
