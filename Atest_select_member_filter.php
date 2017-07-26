<html>
    0
<?php 
    $line_id = $_GET['line_id'];
    $access_token = $_GET['access_token'];
    echo "line_id"."<br>";
    var_dump($line_id);
    echo "access_token"."<br>";
    var_dump($access_token);


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
    $count_line_member = count($de_line_member);
    
    echo "ID line ".$line_id; echo "<br>";
    var_dump($count_line_member);
    echo "<br>";

?>
      
    <form action="A_push_msg.php" method="GET">
    <select name="mid[]">
        <option>Choose line member</option>
        <?php $j=0;
            while($j!=$count_line_member){
            if($de_line_member[$j]->line_master_id == $line_id){?>
            <option value="<?php echo $de_line_member[$j]->user_id; ?>"><?php echo $de_line_member[$j]->member_name; ?></option>
        <?}else{
            echo "not have member in line@";
            break;
            }
            $j++;
        }
        ?>
    </select>
        <div>
            <label>Text</label>
            <textarea name="textArea">input msg</textarea>
        </div>
            <input type="hidden" value="<?php echo $access_token; ?>" name="access_token"/>
    <button type="submit" name="submit">submit</button>
  </form>

</html>
