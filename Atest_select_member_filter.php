<html>
    2
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
    $count_line_member = count($de_line_member);
    
    echo "ID line ".$line_id; echo "<br>";
    var_dump($count_line_member);
    echo "<br>";
//     for($i=0;$i<$count_line_member;$i++){
//         if($de_line_member[$i]->line_master_id==$line_id){
//         echo $de_line_member[$i]->member_name;echo "<br>";
//         }else{
//             break;
//         }
//      }

?>
      
    <form action="A_push_msg.php" method="GET">
    <select name="mid">
        <option>Choose line member</option>
        <?php $j=0;
            while($j!=$count_line_member){
            if($de_line_member[$j]->line_master_id == $line_id){?>
            <option value="<?php echo $de_line_member[$j]->user_id; ?>"><?php echo $de_line_member[$j]->member_name; ?></option>
        <?}else{
            break;
            }
            $j++;
        }
        ?>
        
    </select>  
    <button type="submit" name="submit">submit</button>
  </form>

</html>
