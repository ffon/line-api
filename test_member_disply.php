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
//         var_dump($result);
        $de = json_decode($result);
        var_dump($de);
        echo $de[0]->member_name;
    ?>
</html>
