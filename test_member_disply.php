<!DOCTYPE html>
<html lang="th">

    <?php
        $chAdd = curl_init();
        curl_setopt($chAdd, CURLOPT_URL, 'url');
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
     
        $j=0;
        while($j<$count){
            echo $de[$j]->member_name;
            echo "<br>";
            $j++;
        }
    
    ?>
   
</html>
