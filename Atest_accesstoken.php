<html>
  2<br>
<?php 
    $line_id = $_GET['line_id'];
    var_dump($line_id);
    $chAdd = curl_init();
    curl_setopt($chAdd, CURLOPT_URL, 'http://uat.dxplace.com/dxtms/get_line_master');
    curl_setopt($chAdd, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($chAdd, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($chAdd, CURLOPT_HTTPHEADER, array(
    "Content-Type: application/json",
                 )
    );
    $result = curl_exec($chAdd);
    $err    = curl_error($chAdd);
    curl_close($chAdd);
    $de_line_mas= json_decode($result);
    $count_line_mas = count($de_line_mas);
    $i=0;
    while($i!=$count_line_mas){
        if($de_line_mas[$i]->id == $line_id){
              $token=$de_line_mas[$i]->access_token;
        }
        $i++; 
    }
    echo $de_line_mas[$i]->line_name;
    echo $token;
    
?>
 
<form action="Atest_select_member_filter.php" method="GET">
  <input type="hidden" value="<?php echo $line_id;?>" name="line_id"/>
  <input type="hidden" value="<?php echo $token;?>" name="access_token"/>
  <button type="submit" name="submit">submit</button>
</form>


</html>
