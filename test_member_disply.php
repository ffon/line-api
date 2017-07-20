<!DOCTYPE html>
<html lang="th">

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
    
        var_dump($result);
    
        $de = json_decode($result);
        $count = count($de);
        
        
        for($i=0;$i<$count;$i++){
            echo $de[$i]->member_name;
            echo "<br>";
        }
        $j=0;
        while($j<$count){
            echo $de[$i]->member_name;
            echo "<br>";
            $j++;
        }
    
    
   
    ?>
   
</html>
